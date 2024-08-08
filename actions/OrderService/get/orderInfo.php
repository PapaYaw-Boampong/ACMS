<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where getOrderInfo is defined)
include '../fnx.php';

// Initialize response array
$response = array();

try {
    // Retrieve parameters from the request
    $orderID = isset($_GET['orderID']) ? (int)$_GET['orderID'] : null;
    $userID = isset($_GET['userID']) ? (int)$_GET['userID'] : null;
    // Check if orderID is provided
    if ($orderID === null) {
        throw new Exception("Order ID is required.");
    }

    // Call the function to get order info
    $orderInfo = getOrderInfo($orderID);

    if ($orderInfo !== null) {
        $response['success'] = true;
        $response['data'] = $orderInfo;
    } else {
        $response['success'] = false;
        $response['message'] = "No order found with the given ID.";
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

// Close the connection
$conn->close();

?>
