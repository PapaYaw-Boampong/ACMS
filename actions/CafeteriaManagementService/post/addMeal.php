<?php
session_start();
include_once '../../../settings/connection.php';

// Get the cafeteria ID from the session
$cafID = $_SESSION['cafID'];

// Get the data from the request
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$type = $_POST['mealType'];

// Handle the file upload
$imageData = null;

if (isset($_POST['mealImage'])) {
    $base64Image = $_POST['mealImage'];
    $image = str_replace('data:image/jpeg;base64,', '', $base64Image);
    $image = str_replace(' ', '+', $image);
    $imageData = base64_decode($image);
} else {
    echo json_encode(['success' => false, 'message' => "No file was uploaded."]);
    exit();
}

// Insert the meal into the database
$query = "INSERT INTO meals (cafeteriaID, name, price, quantity, timeframe, mealimg, mealStatus) VALUES (?, ?, ?, ?, ?, ?, 'AVAILABLE')";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $query)) {
    echo json_encode(['success' => false, 'message' => "SQL error: " . mysqli_error($conn)]);
    exit();
}

// Bind parameters and execute statement
mysqli_stmt_bind_param($stmt, "issdss", $cafID, $name, $price, $quantity, $type, $imageData);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => true, 'message' => "Meal added successfully"]);
} else {
    echo json_encode(['success' => false, 'message' => "Failed to add meal: " . mysqli_error($conn)]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
