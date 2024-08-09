<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where createOrderWithMeal and other functions are defined)
include '../fnx.php';

// Initialize response array
$response = array();

try {
    // Retrieve parameters from the request
    $userID = isset($_POST['userID']) ? (int)$_POST['userID'] : null;
    $mealID = isset($_POST['mealID']) ? (int)$_POST['mealID'] : null;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $cafeteriaID = isset($_POST['cafeteriaID']) ? (int)$_POST['cafeteriaID'] : null;

    // Check if required parameters are provided
    if ($userID === null || $mealID === null || $cafeteriaID === null) {
        throw new Exception("User ID, Meal ID, and Cafeteria ID are required.");
    }

    // Call the function to create an order with the meal
    $result = createOrderWithMeal($userID, $mealID, $cafeteriaID, $quantity);

    if ($result['success']) {
        $response['success'] = true;
        $response['message'] = $result['message'];
        $response['orderID'] = $result['orderID'];
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
