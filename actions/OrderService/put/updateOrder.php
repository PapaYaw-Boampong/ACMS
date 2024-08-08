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
    $userID = isset($_POST['userID']) ? (int)$_POST['userID'] : null;
    $mealID = isset($_POST['mealID']) ? (int)$_POST['mealID'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    // Check if required parameters are provided
    if ($userID === null || $mealID === null) {
        throw new Exception("User ID and Meal ID are required.");
    }

    // Call the function to update an order
    $result = updateOrder($userID, $mealID, $quantity);

    if (strpos($result, 'successfully') !== false) {
        $response['success'] = true;
        $response['message'] = $result;
    } else {
        $response['success'] = false;
        $response['message'] = $result;
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
