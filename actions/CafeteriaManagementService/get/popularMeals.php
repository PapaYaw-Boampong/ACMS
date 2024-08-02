<?php
// Include the database connection file
include '../../../settings/connection.php';

// Include the functions file (where getTrendingMeals is defined)
include '../fnx.php';
// Initialize response array
$response = array();

try {
    // Call the function to get trending meals
    $trendingMeals = getTrendingMeals(10); // Fetch top 10 trending meals

    if (!empty($trendingMeals)) {
        $response['success'] = true;
        $response['data'] = $trendingMeals;
    } else {
        $response['success'] = false;
        $response['message'] = "No trending meals found.";
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
