<?php
// removeMeal.php

include('../../../settings/connection.php');
header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Get JSON data from POST request
$data = json_decode(file_get_contents("php://input"), true);

// Check if data is valid and contains mealID
if (isset($data['mealID'])) {
    $mealID = $data['mealID'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("UPDATE meals SET mealStatus = 'UNAVAILABLE' WHERE mealID = ?");
    $stmt->bind_param("i", $mealID);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid input."]);
}

$conn->close();
?>