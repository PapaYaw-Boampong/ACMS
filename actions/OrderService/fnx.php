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




function doesMealBelongToSameCafeteria($orderID, $mealID) {
    global $conn;

    // Step 1: Get the earliest meal associated with the order
    $sqlGetFirstMeal = "SELECT m.cafeteriaID 
                        FROM mealorder mo
                        INNER JOIN meals m ON mo.mealID = m.mealID
                        WHERE mo.orderID = ?
                        ORDER BY mo.mealID ASC 
                        LIMIT 1";
    
    $stmtGetFirstMeal = $conn->prepare($sqlGetFirstMeal);
    $stmtGetFirstMeal->bind_param("i", $orderID);
    $stmtGetFirstMeal->execute();
    $resultGetFirstMeal = $stmtGetFirstMeal->get_result();

    if ($resultGetFirstMeal->num_rows > 0) {
        $rowFirstMeal = $resultGetFirstMeal->fetch_assoc();
        $firstMealCafeteriaID = $rowFirstMeal['cafeteriaID'];
        $stmtGetFirstMeal->close();
    } else {
        $stmtGetFirstMeal->close();
        return false; // No meals associated with the order yet
    }

    // Step 2: Get the cafeteria ID of the new meal
    $sqlCheckCafeteria = "SELECT cafeteriaID FROM meals WHERE mealID = ?";
    $stmtCheckCafeteria = $conn->prepare($sqlCheckCafeteria);
    $stmtCheckCafeteria->bind_param("i", $mealID);
    $stmtCheckCafeteria->execute();
    $resultCheckCafeteria = $stmtCheckCafeteria->get_result();

    if ($resultCheckCafeteria->num_rows > 0) {
        $rowNewMeal = $resultCheckCafeteria->fetch_assoc();
        $newMealCafeteriaID = $rowNewMeal['cafeteriaID'];
        $stmtCheckCafeteria->close();
        
        // Step 3: Compare the cafeteria IDs
        return $firstMealCafeteriaID == $newMealCafeteriaID;
    } else {
        $stmtCheckCafeteria->close();
        return false; // The mealID provided does not exist in the database
    }
}



// Function to check if a meal is already associated with an order
function isMealInOrder($orderID, $mealID) {
    global $conn;

    $sqlCheck = "SELECT * FROM mealorder WHERE orderID = ? AND mealID = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ii", $orderID, $mealID);

    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();
    $stmtCheck->close();

    return $resultCheck->num_rows > 0;
}


// Function to update meal quantity in an order
function updateMealQuantityInOrder($orderID, $mealID, $quantity) {
    global $conn;

    $sqlUpdate = "UPDATE mealorder SET quantity = ? WHERE orderID = ? AND mealID = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("iii", $quantity, $orderID, $mealID);

    $response = array();

    if ($stmtUpdate->execute()) {
        $response['success'] = true;
        $response['message'] = "Meal quantity updated successfully.";
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating meal quantity: " . $stmtUpdate->error;
    }

    $stmtUpdate->close();

    return $response;
}


// Function to insert a meal into an order
function insertMealIntoOrder($orderID, $mealID, $quantity) {
    global $conn;

    $sqlInsert = "INSERT INTO mealorder (orderID, mealID, quantity) VALUES (?, ?, ?)";
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param("iii", $orderID, $mealID, $quantity);

    $response = array();

    if ($stmtInsert->execute()) {
        $response['success'] = true;
        $response['message'] = "Meal added to the order successfully.";
    } else {
        $response['success'] = false;
        $response['message'] = "Error adding meal to order: " . $stmtInsert->error;
    }

    $stmtInsert->close();

    return $response;
}


// Function to insert a new order
function insertOrder($userID) {
    global $conn;

    $sql = "INSERT INTO orders (userID, status, deliveryStatus, orderTotal, orderDate)
            VALUES (?, 'IN_PROGRESS', 'pickup', 0, CURDATE())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        $orderID = $stmt->insert_id;
        $stmt->close();
        return array('success' => true, 'orderID' => $orderID);
    } else {
        $stmt->close();
        return array('success' => false, 'message' => "Error: " . $stmt->error);
    }
}


// Function to create an order and add a meal, verifying the cafeteria
function createOrderWithMeal($userID, $mealID, $cafeteriaID, $quantity = 1) {

    // Insert the order
    $orderResult = insertOrder($userID);
    if (!$orderResult['success']) {
        return $orderResult; // Return error if order insertion failed
    }

    $orderID = $orderResult['orderID'];

    // Insert the meal into the order
    $mealResult = insertMealIntoOrder($orderID, $mealID, $quantity);
    if (!$mealResult['success']) {
        return $mealResult; // Return error if meal insertion failed
    }

    return array('success' => true, 'message' => "Order created successfully.", 'orderID' => $orderID);
}


