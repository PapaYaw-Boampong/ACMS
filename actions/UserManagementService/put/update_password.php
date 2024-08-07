<?php
include_once '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $token = $_POST['token'];

    // Check if the token is valid and not expired
    $query = "SELECT userID FROM password_resets WHERE token = ? AND expiry_time > NOW()";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $userID = $row['userID'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the users table
        $update_query = "UPDATE users SET password = ? WHERE userID = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $hashed_password, $userID);
        if ($update_stmt->execute()) {
            // Delete the token from the password_resets table
            $delete_query = "DELETE FROM password_resets WHERE token = ?";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bind_param("s", $token);
            $delete_stmt->execute();

            echo "Your password has been successfully reset.";
        } else {
            echo "Failed to reset password.";
        }
    } else {
        echo "Invalid or expired token.";
    }

    $stmt->close();
    $conn->close();
}
?>
