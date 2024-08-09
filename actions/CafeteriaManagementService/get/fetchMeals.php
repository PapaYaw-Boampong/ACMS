<?php
include('../../../settings/connection.php');

// Fetch current meals
$currentMeals = [];
$currentMealsQuery = "SELECT * FROM meals WHERE cafeteriaID = 1 AND mealStatus = 'AVAILABLE'";
$result = mysqli_query($conn, $currentMealsQuery);

while ($row = mysqli_fetch_assoc($result)) {
    $currentMeals[] = $row;
}

// Fetch archived meals
$archivedMeals = [];
$archivedMealsQuery = "SELECT * FROM meals WHERE cafeteriaID = 1 AND mealStatus = 'UNAVAILABLE'";
$archivedResult = mysqli_query($conn, $archivedMealsQuery);

while ($row = mysqli_fetch_assoc($archivedResult)) {
    $archivedMeals[] = $row;
}

echo json_encode(['currentMeals' => $currentMeals, 'archivedMeals' => $archivedMeals]);

$conn->close();
?>
