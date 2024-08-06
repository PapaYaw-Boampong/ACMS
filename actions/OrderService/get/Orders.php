<?php
// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where getUserOrders is defined)
include '../fnx.php';

// Initialize response array
$response = array();

try {
    // Retrieve parameters from the request
    $userID = isset($_GET['userID']) ? (int)$_GET['userID'] : null;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    $status = isset($_GET['status']) ? $_GET['status'] : null;

    // Check if userID is provided
    if ($userID === null) {
        throw new Exception("User ID is required.");
    }
   
    // Call the function to get user orders
    $orders = getUserOrders($userID, $limit, $status);
    
    if (!empty($orders)) {
        $response['success'] = true;
        $response['data'] = $orders;
    } else {
        $response['success'] = false;
        $response['message'] = "No orders found for the specified user.";
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
