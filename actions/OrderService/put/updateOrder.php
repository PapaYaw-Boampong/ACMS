<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../../settings/connection.php';
include '../fnx.php';  // Assuming functions are stored in fnx.php

$response = array();

try {
    $orderID = $_POST['orderID'];
    $mealID = $_POST['mealID'];
    $quantity = $_POST['quantity'];
    $cafeteriaID = $_POST['cafID']; // Assuming this is passed

    // Check if the meal belongs to the cafeteria
    if (!doesMealBelongToSameCafeteria($orderID, $mealID)) {
        $response['success'] = false;
        $response['message'] = "Meals in the same order must come from the same cafeteria.";
    } else {
        // Check if the meal is already in the order
        if (isMealInOrder($orderID, $mealID)) {
            $response = updateMealQuantityInOrder($orderID, $mealID, $quantity);
        } else {
            $response = insertMealIntoOrder($orderID, $mealID, $quantity);
        }
    }

    echo json_encode($response);
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = "An error occurred: " . $e->getMessage();
    echo json_encode($response);
}


?>
