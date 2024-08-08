<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection file
include '../../../settings/connection.php';
include '../fnx.php';

// Initialize response array
$response = array();

// Check the request method
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET['cafID'])) {
        $cafID = (int) $_GET['cafID'];
    } else {
        $cafID = -1;
    }

    // Call the function to get cafeteria information
    $cafeteriaData = getCafeteriaInfo($cafID);

    if ($cafeteriaData !== null) {
        $response['success'] = true;
        $response['data'] = $cafeteriaData;
    } else {
        $response['success'] = false;
        $response['message'] = "Cafeteria Not Found";
    }

    // Encode the response array as JSON and echo it
    echo json_encode($response);
    exit;
}
?>
