<?php
session_start();
include_once '../../../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION['userID'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "New passwords do not match.";
        exit();
    }

    // Fetch the old password from the database
    $query = "SELECT password FROM users WHERE userID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($old_password, $user['password'])) {
        // Update the password
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password = ? WHERE userID = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $hashedPassword, $userID);

        if ($update_stmt->execute()) {
            echo "<span style='color:green'>Password changed successfully.</span>";
        } else {
            echo "<span style='color:red'>Error updating password: " . $conn->error . "</span>";
        }

        $update_stmt->close();
    } else {
        echo "<span style='color:red'>Old password is incorrect.</span>";
    }

    $stmt->close();
    $conn->close();
}
?>
