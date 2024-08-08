<?php
include('../../../settings/connection.php');

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
$paymentMethod = $input['paymentMethod'];
$paymentID = $input['paymentID'];

// Update delivery option
$stmt = $conn->prepare("UPDATE orders SET deliveryStatus = ? WHERE orderID = ?");
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

// Update payment method
$updatePaymentSql = "UPDATE payment SET method = ? WHERE paymentID = ?";
$stmt = $conn->prepare($updatePaymentSql);
$stmt->bind_param('si', $paymentMethod, $paymentID);

if (!$stmt->execute()) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update payment method']);
    $stmt->close();
    $conn->close();
    exit();
}

$stmt->close();
$conn->close();
?>