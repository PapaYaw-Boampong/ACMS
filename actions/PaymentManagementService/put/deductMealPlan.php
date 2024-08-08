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
$amount = isset($input['amount']) ? $input['amount'] : null;
$userID = isset($input['userID']) ? $input['userID'] : null;

// Check if required parameters are provided
if ( $amount === null || $userID === null) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
    exit;
}

// Begin a transaction
$conn->begin_transaction();

try {
    // Query to get the current balance
    $sql = "SELECT amount FROM mealplan_accounts WHERE userID = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        throw new Exception('Failed to prepare statement for balance retrieval');
    }

    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();

    if ($balance === null) {
        throw new Exception('User not found or failed to retrieve balance');
    }

    if ($balance >= $amount) {
        // Deduct the amount from the balance
        $newBalance = $balance - $amount;
        $updateSql = "UPDATE mealplan_accounts SET amount = ? WHERE userID = ?";
        $stmt = $conn->prepare($updateSql);

        if ($stmt === false) {
            throw new Exception('Failed to prepare statement for balance update');
        }

        $stmt->bind_param('di', $newBalance, $userID);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction
        $conn->commit();
        echo json_encode(['status' => 'success', 'newBalance' => $newBalance]);
    } else {
        throw new Exception('Insufficient balance');
    }
} catch (Exception $e) {
    // Rollback the transaction on error
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$conn->close();
?>