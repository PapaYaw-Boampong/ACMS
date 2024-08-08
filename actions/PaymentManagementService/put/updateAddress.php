<?php
header('Content-Type: application/json');
include('../../../settings/connection.php');

$data = json_decode(file_get_contents('php://input'), true);

$addressID = intval($data['addressID']);
$address = $data['address'];
$deliveryInstruction = $data['deliveryInstruction'];

$sql = "UPDATE address SET address = ?, deliveryInstruction = ? WHERE addressID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $address, $deliveryInstruction, $addressID);
$success = $stmt->execute();

echo json_encode(['success' => $success]);
?>
