<?php
// restoreMeal.php

include('../../../settings/connection.php');
header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Get JSON data from POST request
$data = json_decode(file_get_contents("php://input"), true);

// Check if data is valid and contains mealID
if (isset($data['mealID'])) {
    $mealID = $data['mealID'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("UPDATE meals SET mealStatus = 'AVAILABLE' WHERE mealID = ?");
    $stmt->bind_param("i", $mealID);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid input."]);
}

$conn->close();
?>