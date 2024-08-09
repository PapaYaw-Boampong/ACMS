<?php
session_start();
include_once '../settings/connection.php';

// Assuming user is logged in and userID is stored in session
$userID = $_SESSION['userID'];

$query = "SELECT dietaryRestrictions, diet, culturalRestrictions FROM preferences WHERE userID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $preferences = $result->fetch_assoc();
    echo json_encode($preferences);
} else {
    echo json_encode([
        "dietaryRestrictions" => "",
        "diet" => "",
        "culturalRestrictions" => ""
    ]);
}

$stmt->close();
$conn->close();
?>
