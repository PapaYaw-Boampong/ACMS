<?php
// Include the connection file
include_once '../settings/connection.php';

// Function to check email availability
function checkEmail($conn, $email) {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<span style='color:red'> Email already registered.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'> Email available for registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

    mysqli_stmt_close($stmt);
}

// Function to check phone number availability
function checkPhoneNumber($conn, $phoneNo) {
    $query = "SELECT * FROM users WHERE phoneNo = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $phoneNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<span style='color:red'> Phone number already registered.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'> Phone number available for registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

    mysqli_stmt_close($stmt);
}

// Check if the email availability check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_email') {
    $email = $_POST['email'];
    checkEmail($conn, $email);
    exit();
}

// Check if the phone number availability check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_phoneNo') {
    $phoneNo = $_POST['phoneNo'];
    checkPhoneNumber($conn, $phoneNo);
    exit();
}

// Check if the signup form was submitted
if (isset($_POST['signup'])) {
    // Collect form data
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $name = $_POST['name'];
    $password = $_POST['password'];

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
        header("Location: ../login.html");
        exit();
    } else {
        // Redirect back to the registration page with an error message
        header("Location: ../register.html?error=registration_failed");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>
