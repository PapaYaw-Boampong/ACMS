<?php
// Include the connection file
include_once "../settings/connection.php";

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Check if required fields are set
    if (isset($email) && isset($phoneNo) && isset($name) && isset($password)) {
        // Encrypt the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Write your INSERT query
        $query = "INSERT INTO users (email, phoneNo, name, password) VALUES (?, ?, ?, ?)";

        // Prepare the statement
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            die("Error: " . mysqli_error($conn));
        }

        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, "ssss", $email, $phoneNo, $name, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page if execution is successful
            header("Location: ../login.php");
            exit();
        } else {
            // Redirect back to the registration page with an error message
            header("Location: ../register.html?error=registration_failed");
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        header("Location: ../register.html?error=missing_fields");
        exit();
    }
}

// Close the connection
mysqli_close($conn);
