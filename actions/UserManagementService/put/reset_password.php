<?php
session_start();
include_once '../../../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists
    $query = "SELECT userID FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expiry_time = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token valid for 1 hour

        // Insert the token into the database
        $row = $result->fetch_assoc();
        $userID = $row['userID'];
        $insert_query = "INSERT INTO password_resets (userID, token, expiry_time) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("iss", $userID, $token, $expiry_time);
        $insert_stmt->execute();

        // Send the email
        $reset_link = "http://yourdomain.com/reset_password_form.php?token=" . $token;
        $subject = "Password Reset Request";
        $message = "Click the link below to reset your password: \n" . $reset_link;
        $headers = "From: no-reply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "An email has been sent to your email address with instructions to reset your password.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "No account found with that email address.";
    }

    $stmt->close();
    $conn->close();
}
?>
