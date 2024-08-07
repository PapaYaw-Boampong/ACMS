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


// Function to retrieve orders and related information for a specific user
function getUserOrders($userID, $limit, $status = null) {
    global $conn;

    $orders = array();

    // Prepare the base SQL statement
    // Prepare the base SQL statement
    $sql = "SELECT Orders.orderID, Orders.status, OrderDetails.quantity, OrderDetails.orderDate, Meals.mealID As mealID,
            Meals.name AS mealName, Meals.price, Cafeterias.cafeteriaID, Cafeterias.cafeteriaName AS cafeteriaName
            FROM Orders
            JOIN OrderDetails ON Orders.orderID = OrderDetails.orderID
            JOIN Meals ON OrderDetails.mealID = Meals.mealID
            JOIN Cafeterias ON Meals.cafeteriaID = Cafeterias.cafeteriaID
            WHERE Orders.userID = ?";

    // Append status filter if provided
    if ($status !== null) {
        $sql .= " AND Orders.status = ?";
    }

    // Append the limit
    $sql .= " LIMIT ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters based on the presence of the status
    if ($status !== null) {
        $stmt->bind_param("isi", $userID, $status, $limit);
    } else {
        $stmt->bind_param("ii", $userID, $limit);
    }

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $orders;
}


