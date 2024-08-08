<?php
// fetchPaymentMethods.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../../settings/connection.php');

// Fetch payment methods from the database
$sql = "SELECT methodID, payment_method FROM paymentmethod";
$result = $conn->query($sql);

// Create an array to store payment methods
$paymentMethods = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $paymentMethods[] = $row;
    }
}

// Close connection
$conn->close();

// Return the payment methods as JSON
header('Content-Type: application/json');
echo json_encode($paymentMethods);

// Debugging: Check for JSON encoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON encoding error: " . json_last_error_msg());
}
?>