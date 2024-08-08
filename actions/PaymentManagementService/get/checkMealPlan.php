<?php
include('../../../settings/connection.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Read input
$input = json_decode(file_get_contents('php://input'), true);

// Check if JSON decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

// Extract values from input
$orderID = isset($input['orderID']) ? $input['orderID'] : null;
$amount = isset($input['amount']) ? $input['amount'] : null;
$userID = isset($input['userID']) ? $input['userID'] : null;

// Check if required parameters are provided
if ($orderID === null || $amount === null || $userID === null) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
    exit;
}

// Query to check the current balance of the meal plan for the user
$sql = "SELECT amount FROM mealplan_accounts WHERE userID = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement']);
    exit;
}

$stmt->bind_param('i', $userID);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();

// Check if balance was fetched
if (!isset($balance)) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch balance']);
    $conn->close();
    exit;
}

if ($balance >= $amount) {
    echo json_encode(['status' => 'success', 'balanceSufficient' => true]);
} else {
    echo json_encode(['status' => 'success', 'balanceSufficient' => false]);
}

$conn->close();
?>
