<?php
include('../settings/connection.php');

// Fetch current meals
$currentMeals = [];
$currentMealsQuery = "SELECT mealName, mealPrice, mealQuantity FROM meals WHERE mealStatus = 'AVAILABLE'";
$result = $conn->query($currentMealsQuery);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $currentMeals[] = [
            'mealName' => $row['mealName'],
            'mealPrice' => $row['mealPrice'],
            'mealQuantity' => $row['mealQuantity']
        ];
    }
}

// Fetch archived meals
$archivedMeals = [];
$archivedMealsQuery = "SELECT mealName, mealPrice, mealQuantity FROM meals WHERE mealStatus = 'UNAVAILABLE'";
$result = $conn->query($archivedMealsQuery);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $archivedMeals[] = [
            'mealName' => $row['mealName'],
            'mealPrice' => $row['mealPrice'],
            'mealQuantity' => $row['mealQuantity']
        ];
    }
}

echo json_encode(['currentMeals' => $currentMeals, 'archivedMeals' => $archivedMeals]);

$conn->close();
?>
