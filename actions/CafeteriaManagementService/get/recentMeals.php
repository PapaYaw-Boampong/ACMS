<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where getRecentMeals is defined)
include '../fnx.php';

// Initialize response array
$response = array();

try {
    // Determine the number of recent meals to fetch
    $numberOfMeals = isset($_GET['number']) ? (int)$_GET['number'] : 10; // Default to 10 if not specified

    // Call the function to get recent meals
    $recentMeals = getRecentMeals($numberOfMeals);

    if (!empty($recentMeals)) {
        $response['success'] = true;
        $response['data'] = $recentMeals;
    } else {
        $response['success'] = false;
        $response['message'] = "No recent meals found.";
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
