<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where updateOrder is defined)
include '../fnx.php';

// Initialize response array
$response = array();

try {
    // Retrieve parameters from the request
    $orderID = isset($_POST['orderID']) ? (int)$_POST['orderID'] : null;
    $mealID = isset($_POST['mealID']) ? (int)$_POST['mealID'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    // Check if required parameters are provided
    if ($orderID === null || $mealID === null) {
        throw new Exception("Order ID and Meal ID are required.");
    }

    // Call the function to update an order
    $result = updateOrder($orderID, $mealID, $quantity);

    if ($result['success']) {
        $response['success'] = true;
        $response['message'] = $result['message'];
    } else {
        $response['success'] = false;
        $response['message'] = $result['message'];
    }

    // Encode the response array as JSON and echo it
    echo json_encode($response);
    exit;
} catch (Exception $e) {
    // Handle errors
    $response['success'] = false;
    $response['message'] = $e->getMessage();
    echo json_encode($response);
    exit;
}

?>
