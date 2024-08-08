<?php

function createMeal($mealData, $conn) {
    // Start a transaction
    $conn->beginTransaction();
    try {
        // Insert into Meals table
        $stmt = $conn->prepare("INSERT INTO Meals (mealStatus, timeframe, cafeteriaID) VALUES (?, ?, ?)");
        $stmt->execute([$mealData['mealStatus'], $mealData['timeframe'], $mealData['cafeteriaID']]);
        $mealID = $conn->lastInsertId();

        // Insert into MealIngredients table
        if (isset($mealData['ingredients'])) {
            $stmt = $conn->prepare("INSERT INTO MealIngredients (mealID, ingredID) VALUES (?, ?)");
            foreach ($mealData['ingredients'] as $ingredID) {
                $stmt->execute([$mealID, $ingredID]);
            }
        }

        // Handle meal image upload if provided
        if (isset($mealData['mealImage'])) {
            // Example: store the image in the database or file system
            $imageData = file_get_contents($mealData['mealImage']['tmp_name']);
            $stmt = $conn->prepare("UPDATE Meals SET mealImage = ? WHERE mealID = ?");
            $stmt->execute([$imageData, $mealID]);
        }

        // Insert into MealDescription (if needed) or update description in Meals
        $stmt = $conn->prepare("UPDATE Meals SET description = ? WHERE mealID = ?");
        $stmt->execute([$mealData['description'], $mealID]);

        // Commit transaction
        $conn->commit();
        return $mealID;
    } catch (PDOException $e) {
        // Rollback transaction in case of an error
        $conn->rollBack();
        throw $e;
    }
}


// Function to retrieve orders of a specific user
function getUserOrders($userID) {
    global $conn;

    $userOrders = array();

    // Prepare the SQL statement
    $sql = "SELECT o.orderID,o.orderDate, o.status, o.deliveryStatus, o.orderTotal, 
                   GROUP_CONCAT(mo.mealID) as mealIDs, GROUP_CONCAT(m.name) as mealName, 
                   MIN(m.name) as firstMealName, GROUP_CONCAT(mo.quantity) as quantity, 
                   GROUP_CONCAT(m.price) as prices, c.cafeteriaName
            FROM orders o
            INNER JOIN mealorder mo ON o.orderID = mo.orderID
            INNER JOIN meals m ON mo.mealID = m.mealID
            INNER JOIN cafeterias c ON m.cafeteriaID = c.cafeteriaID
            WHERE o.userID = ?
            GROUP BY o.orderID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userOrders[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $userOrders;
}


function getOrderInfo($orderID) {
    global $conn;

    $orderInfo = array();

    // Prepare the SQL statement
    $sql = "SELECT o.orderID, o.orderDate, o.status, o.deliveryStatus, o.orderTotal, 
                   GROUP_CONCAT(mo.mealID) as mealIDs, GROUP_CONCAT(m.name) as mealNames, 
                   MIN(m.name) as firstMealName, GROUP_CONCAT(mo.quantity) as quantities, 
                   GROUP_CONCAT(m.price) as prices, c.cafeteriaName
            FROM orders o
            INNER JOIN mealorder mo ON o.orderID = mo.orderID
            INNER JOIN meals m ON mo.mealID = m.mealID
            INNER JOIN cafeterias c ON m.cafeteriaID = c.cafeteriaID
            WHERE o.orderID = ?
            GROUP BY o.orderID";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderID);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mealIDs = explode(',', $row['mealIDs']);
            $mealNames = explode(',', $row['mealNames']);
            $quantities = explode(',', $row['quantities']);
            $prices = explode(',', $row['prices']);
            
            $meals = array();
            for ($i = 0; $i < count($mealIDs); $i++) {
                $meals[] = array(
                    "mealID" => $mealIDs[$i],
                    "mealName" => $mealNames[$i],
                    "quantity" => $quantities[$i],
                    "price" => $prices[$i]
                );
            }
            
            $orderInfo = array(
                "orderID" => $row['orderID'],
                "orderDate" => $row['orderDate'],
                "status" => $row['status'],
                "deliveryStatus" => $row['deliveryStatus'],
                "orderTotal" => $row['orderTotal'],
                "meals" => $meals,
                "cafeteriaName" => $row['cafeteriaName'],
                "firstMealName" => $row['firstMealName']
            );
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $orderInfo;
    
}


// Function to create an order and insert the first meal associated with the order
function createOrder($userID, $mealID, $quantity = 1) {
    global $conn;

    // Insert the order into the orders table
    $sqlOrder = "INSERT INTO orders (userID, status, deliveryStatus, orderTotal, orderDate)
                 VALUES (?, 'IN_PROGRESS', 'pickup', 0, CURDATE())";
    $stmtOrder = $conn->prepare($sqlOrder);
    $stmtOrder->bind_param("i", $userID);
    
    if (!$stmtOrder->execute()) {
        return array('success' => false, 'message' => "Error: " . $stmtOrder->error);
    }

    // Get the inserted order ID
    $orderID = $stmtOrder->insert_id;
    $stmtOrder->close();

    // Get the price of the meal
    $sqlMeal = "SELECT price FROM meals WHERE mealID = ?";
    $stmtMeal = $conn->prepare($sqlMeal);
    $stmtMeal->bind_param("i", $mealID);
    $stmtMeal->execute();
    $resultMeal = $stmtMeal->get_result();
    if ($resultMeal->num_rows > 0) {
        $meal = $resultMeal->fetch_assoc();
        $mealPrice = $meal['price'];
    } else {
        return array('success' => false, 'message' => "Error: Meal not found.");
    }
    $stmtMeal->close();

    // Calculate the order total
    $orderTotal = $mealPrice * $quantity;

    // Insert the meal into the mealorder table
    $sqlMealOrder = "INSERT INTO mealorder (mealID, orderID, quantity)
                     VALUES (?, ?, ?)";
    $stmtMealOrder = $conn->prepare($sqlMealOrder);
    $stmtMealOrder->bind_param("iii", $mealID, $orderID, $quantity);

    if (!$stmtMealOrder->execute()) {
        return array('success' => false, 'message' => "Error: " . $stmtMealOrder->error);
    }
    $stmtMealOrder->close();

    // Update the order total in the orders table
    $sqlUpdateOrder = "UPDATE orders SET orderTotal = ? WHERE orderID = ?";
    $stmtUpdateOrder = $conn->prepare($sqlUpdateOrder);
    $stmtUpdateOrder->bind_param("di", $orderTotal, $orderID);

    if (!$stmtUpdateOrder->execute()) {
        return array('success' => false, 'message' => "Error: " . $stmtUpdateOrder->error);
    }
    $stmtUpdateOrder->close();

    return array('success' => true, 'message' => "Order created successfully.", 'orderID' => $orderID);
}

// Function to update an order by adding a meal
function updateOrder($userID, $mealID, $quantity = 1) {
    global $conn;

    // Step 1: Check for an open order
    $sqlOpenOrder = "SELECT orderID, orderTotal FROM orders WHERE userID = ? AND status = 'IN_PROGRESS'";
    $stmtOpenOrder = $conn->prepare($sqlOpenOrder);
    $stmtOpenOrder->bind_param("i", $userID);
    $stmtOpenOrder->execute();
    $resultOpenOrder = $stmtOpenOrder->get_result();

    if ($resultOpenOrder->num_rows === 0) {
        return "No open order found for this user.";
    }

    $openOrder = $resultOpenOrder->fetch_assoc();
    $orderID = $openOrder['orderID'];
    $stmtOpenOrder->close();

    // Step 2: Check if the meal is already associated with the order
    $sqlMealCheck = "SELECT mealID FROM mealorder WHERE orderID = ? AND mealID = ?";
    $stmtMealCheck = $conn->prepare($sqlMealCheck);
    $stmtMealCheck->bind_param("ii", $orderID, $mealID);
    $stmtMealCheck->execute();
    $resultMealCheck = $stmtMealCheck->get_result();

    if ($resultMealCheck->num_rows > 0) {
        return "Meal is already associated with the order.";
    }
    $stmtMealCheck->close();

    // Step 3: Check if the meal comes from the same cafeteria as other meals in the order
    $sqlCafeteriaCheck = "SELECT m.cafeteriaID
                          FROM meals m
                          INNER JOIN mealorder mo ON m.mealID = mo.mealID
                          WHERE mo.orderID = ?";
    $stmtCafeteriaCheck = $conn->prepare($sqlCafeteriaCheck);
    $stmtCafeteriaCheck->bind_param("i", $orderID);
    $stmtCafeteriaCheck->execute();
    $resultCafeteriaCheck = $stmtCafeteriaCheck->get_result();
    $sameCafeteria = true;

    while ($row = $resultCafeteriaCheck->fetch_assoc()) {
        if ($row['cafeteriaID'] != getCafeteriaIDByMeal($mealID)) {
            $sameCafeteria = false;
            break;
        }
    }

    if (!$sameCafeteria) {
        return "Meals come from different cafeterias. Order cannot be updated.";
    }
    $stmtCafeteriaCheck->close();

    // Step 4: Add the meal to the order
    $mealPrice = getMealPrice($mealID);
    $sqlAddMeal = "INSERT INTO mealorder (mealID, orderID, quantity) VALUES (?, ?, ?)";
    $stmtAddMeal = $conn->prepare($sqlAddMeal);
    $stmtAddMeal->bind_param("iii", $mealID, $orderID, $quantity);

    if (!$stmtAddMeal->execute()) {
        return "Error: " . $stmtAddMeal->error;
    }
    $stmtAddMeal->close();

    // Step 5: Update the order total
    $newOrderTotal = $openOrder['orderTotal'] + ($mealPrice * $quantity);
    $sqlUpdateOrderTotal = "UPDATE orders SET orderTotal = ? WHERE orderID = ?";
    $stmtUpdateOrderTotal = $conn->prepare($sqlUpdateOrderTotal);
    $stmtUpdateOrderTotal->bind_param("di", $newOrderTotal, $orderID);

    if (!$stmtUpdateOrderTotal->execute()) {
        return "Error: " . $stmtUpdateOrderTotal->error;
    }
    $stmtUpdateOrderTotal->close();

    return "Order updated successfully.";
}

// Helper function to get the cafeteria ID by meal ID
function getCafeteriaIDByMeal($mealID) {
    global $conn;
    $sql = "SELECT cafeteriaID FROM meals WHERE mealID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $mealID);
    $stmt->execute();
    $result = $stmt->get_result();
    $cafeteriaID = $result->fetch_assoc()['cafeteriaID'];
    $stmt->close();
    return $cafeteriaID;
}

// Helper function to get the price of a meal by meal ID
function getMealPrice($mealID) {
    global $conn;
    $sql = "SELECT price FROM meals WHERE mealID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $mealID);
    $stmt->execute();
    $result = $stmt->get_result();
    $price = $result->fetch_assoc()['price'];
    $stmt->close();
    return $price;
}


// // Function to fetch order information based on order ID and user ID
// function getOrderInfo($orderID, $userID) {
//     global $conn;

//     $orderInfo = array();

//     // Prepare the SQL statement
//     $sql = "SELECT o.orderID, o.orderDate, o.status, o.deliveryStatus, o.orderTotal, o.message,
//                    m.mealID, m.name as mealName, m.price, mo.quantity, c.cafeteriaName
//             FROM orders o
//             INNER JOIN mealorder mo ON o.orderID = mo.orderID
//             INNER JOIN meals m ON mo.mealID = m.mealID
//             INNER JOIN cafeterias c ON m.cafeteriaID = c.cafeteriaID
//             WHERE o.orderID = ? AND o.userID = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ii", $orderID, $userID);

//     // Execute the query
//     $stmt->execute();

//     // Get the result
//     $result = $stmt->get_result();

//     // Check if there are any results
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $orderInfo[] = $row;
//         }
//     } else {
//         return null; // No results found
//     }

//     // Close the statement
//     $stmt->close();

//     return $orderInfo;
// }


