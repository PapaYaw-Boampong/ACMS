<?php
session_start();
include_once '../../../settings/connection.php';

// Fetch current meals
$query = "SELECT * FROM meals WHERE mealStatus = 'AVAILABLE'";
$result = mysqli_query($conn, $query);
$currentMeals = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Prepend data URL scheme to Base64 image data
    $row['mealimg'] = 'data:image/jpeg;base64,' . base64_encode($row['mealimg']);
    $currentMeals[] = $row;
}

// Fetch archived meals
$query = "SELECT * FROM meals WHERE mealStatus = 'UNAVAILABLE'";
$result = mysqli_query($conn, $query);
$archivedMeals = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row['mealimg'] = 'data:image/jpeg;base64,' . base64_encode($row['mealimg']);
    $archivedMeals[] = $row;
}

// Output the data as JSON
echo json_encode([
    'currentMeals' => $currentMeals,
    'archivedMeals' => $archivedMeals
]);

mysqli_close($conn);
?>
