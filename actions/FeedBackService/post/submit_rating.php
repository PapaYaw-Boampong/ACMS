<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = intval($_POST['rating']);
    $userId = intval($_POST['userId']);
    $cafeteriaId = intval($_POST['cafId']);

    // Validate input
    if ($rating < 1 || $rating > 5 || !$userId || !$cafeteriaId) {
        echo "Invalid input";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO CafeteriaReviews (userID, cafeteriaID, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $userId, $cafeteriaId, $rating);

    // Execute the query
    if ($stmt->execute()) {
        echo "Rating successfully submitted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

