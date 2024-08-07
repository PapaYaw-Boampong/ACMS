<?php
include('../settings/connection.php');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['mealID']) && isset($input['quantity'])) {
        $mealID = $input['mealID'];
        $quantity = $input['quantity'];

        // Update query
        $stmt = $conn->prepare('UPDATE meals SET mealQuantity = ? WHERE mealID = ?');
        $stmt->bind_param('ii', $quantity, $mealID);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update meal quantity']);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
