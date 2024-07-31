<?php
include('../settings/connection.php');

// Fetch current meals
$currentMeals = [];
$currentMealsQuery = "SELECT meal_name, description, price, quantity FROM meals WHERE is_archived = 0";
$result = $conn->query($currentMealsQuery);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $currentMeals[] = [
            'mealName' => $row['meal_name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'mealQuantity' => $row['quantity']
        ];
    }
}

// Fetch archived meals
$archivedMeals = [];
$archivedMealsQuery = "SELECT meal_name, description, price, quantity FROM meals WHERE is_archived = 1";
$result = $conn->query($archivedMealsQuery);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $archivedMeals[] = [
            'mealName' => $row['meal_name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'mealQuantity' => $row['quantity']
        ];
    }
}

echo json_encode(['currentMeals' => $currentMeals, 'archivedMeals' => $archivedMeals]);

$conn->close();
?>
