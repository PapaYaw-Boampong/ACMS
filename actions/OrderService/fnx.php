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
