<?php
// Start session
session_start();

// Include the connection file
include_once '../../../settings/connection.php';

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
        echo "<span style='color:green'> Registered Email.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:red'> Unregistered Email.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }

    mysqli_stmt_close($stmt);
}

// Function to check password correctness
function checkPassword($conn, $email, $password) {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        echo "<span style='color:red'> Unregistered Email.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
        mysqli_stmt_close($stmt);
        return;
    }

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        echo "<span style='color:green'> Password is correct.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    } else {
        echo "<span style='color:red'> Incorrect password.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }

    mysqli_stmt_close($stmt);
}

// Check if the email availability check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_email') {
    $email = $_POST['email'];
    checkEmail($conn, $email);
    exit();
}

// Check if the password correctness check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_password') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    checkPassword($conn, $email, $password);
    exit();
}

// Check if the login form was submitted
if (isset($_POST['login'])) {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Write a query to SELECT a record from the users table using the email
    $query = "SELECT * FROM users WHERE email = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any row was returned
    if (mysqli_num_rows($result) == 0) {
        // No record found, provide appropriate response
        echo "User not registered or incorrect email.";
        exit();
    }

    // Fetch the record
    $row = mysqli_fetch_assoc($result);

    // Verify password user provided against database record using password_verify()
    if (password_verify($password, $row['password'])) {
        // Passwords match, continue with the processing
        // Create session for user id
        $_SESSION['userID'] = $row['userID'];

        // Check the role ID
        $roleID = $row['roleID'];

        if ($roleID == 2 || $roleID == 3) {
            // Redirect to home/dashboard page
            header("Location: ../views/home.php");
        } elseif ($roleID == 4) {
            // Fetch cafeteriaID
            $cafeteriaID = $row['cafeteriaID'];
            // Redirect to cafeteria page with cafeteriaID as a GET parameter
            header("Location: ../views/cafeteria.php?cafID=" . $cafeteriaID);
        }
        exit();
    } else {
        // Passwords don't match, provide appropriate response
        echo "Incorrect password.";
        exit();
    }
}

// Close the connection
mysqli_close($conn);
?>
