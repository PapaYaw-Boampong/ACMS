<?php
// Function to create an order and insert the first meal associated with the order
function createOrderWithMeal($userID, $mealID, $quantity = 1) {
    global $conn;

    // Step 1: Insert the order into the orders table
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

    // Step 2: Get the price of the meal
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

    // Step 3: Calculate the order total
    $orderTotal = $mealPrice * $quantity;

    // Step 4: Insert the meal into the mealorder table
    $sqlMealOrder = "INSERT INTO mealorder (mealID, orderID, quantity) VALUES (?, ?, ?)";
    $stmtMealOrder = $conn->prepare($sqlMealOrder);
    $stmtMealOrder->bind_param("iii", $mealID, $orderID, $quantity);

    if (!$stmtMealOrder->execute()) {
        return array('success' => false, 'message' => "Error: " . $stmtMealOrder->error);
    }
    $stmtMealOrder->close();

    // Step 5: Update the order total in the orders table (a trigger may handle this)
    $sqlUpdateOrder = "UPDATE orders SET orderTotal = ? WHERE orderID = ?";
    $stmtUpdateOrder = $conn->prepare($sqlUpdateOrder);
    $stmtUpdateOrder->bind_param("di", $orderTotal, $orderID);

    if (!$stmtUpdateOrder->execute()) {
        return array('success' => false, 'message' => "Error: " . $stmtUpdateOrder->error);
    }
    $stmtUpdateOrder->close();

    // Step 6: Create a payment record using the helper function
    $paymentResult = createPaymentRecord($orderID);
    if (!$paymentResult['success']) {
        return array('success' => false, 'message' => $paymentResult['message']);
    }

    return array('success' => true, 'message' => "Order created successfully.", 'orderID' => $orderID);
}


?>