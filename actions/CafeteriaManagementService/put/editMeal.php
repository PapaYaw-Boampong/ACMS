<?php
include('../../../settings/connection.php');

header('Content-Type: application/json');

// Handle GET request to fetch meal data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['mealID'])) {
        $mealID = intval($_GET['mealID']);

        $query = "SELECT mealID, name, price FROM meals WHERE mealID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $mealID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $meal = $result->fetch_assoc();
            echo json_encode($meal);
        } else {
            echo json_encode(["error" => "Meal not found"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "No mealID provided"]);
    }

// Handle POST request to update meal data
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['mealID'], $data['name'], $data['price'])) {
        $mealID = $data['mealID'];
        $name = $data['name'];
        $price = $data['price'];

        error_log("Received data - mealID: $mealID, name: $name, price: $price");

        $query = "UPDATE meals SET name = ?, price = ? WHERE mealID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sii', $name, $price, $mealID);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Database error"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid input"]);
    }

} else {
    echo json_encode(["error" => "Unsupported request method"]);
}

$conn->close();
?>
