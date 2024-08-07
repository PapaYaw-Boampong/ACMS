<?php
include('../settings/connection.php');

$addressID = intval($_GET['addressID']);
$sql = "SELECT address, deliveryInstruction FROM address WHERE addressID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $addressID);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data);

$stmt->close();
$conn->close();
?>