<?php
session_start();
include_once '../settings/connection.php';

// Assuming user is logged in and userID is stored in session
$userID = $_SESSION['userID'];

$dietaryRestrictions = implode(',', $_POST['dietaryRestrictions'] ?? []);
$diet = implode(',', $_POST['diet'] ?? []);
$culturalRestrictions = implode(',', $_POST['culturalRestrictions'] ?? []);

$query = "UPDATE preferences SET dietaryRestrictions = ?, diet = ?, culturalRestrictions = ? WHERE userID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssi", $dietaryRestrictions, $diet, $culturalRestrictions, $userID);

if ($stmt->execute()) {
    echo "Preferences updated successfully";
} else {
    echo "Failed to update preferences";
}

$stmt->close();
$conn->close();
?>
