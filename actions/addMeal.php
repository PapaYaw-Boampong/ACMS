<?php
include('../settings/connection.php');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['mealName'], $data['mealPrice'], $data['mealQuantity'])) {
    $mealName = $data['mealName'];
    $mealPrice = $data['mealPrice'];
    $mealQuantity = $data['mealQuantity'];

    // Example query - replace with your actual table and columns
    $query = "INSERT INTO meals (name, price, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sii', $mealName, $mealPrice, $mealQuantity);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error"]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid input"]);
}
$conn->close();
?>
