<?php
include('../settings/connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Read input
$input = json_decode(file_get_contents('php://input'), true);
if (!isset($input['orderID']) || !isset($input['deliveryPickup'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}
$orderID = $input['orderID'];
$deliveryPickup = $input['deliveryPickup'];

$stmt = $conn->prepare("UPDATE OrderDetails SET deliveryStatus = ? WHERE orderID = ?");
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("si", $deliveryPickup, $orderID);
if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>