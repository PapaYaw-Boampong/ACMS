<?php
include('../settings/connection.php');

// Get the JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if mealID is provided
if (isset($data['mealID'])) {
    $mealID = $data['mealID'];

    // Prepare SQL statement to delete the meal
    $stmt = $conn->prepare("DELETE FROM meals WHERE mealID = ?");
    $stmt->bind_param("i", $mealID);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete meal']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'No mealID provided']);
}

$conn->close();
?>