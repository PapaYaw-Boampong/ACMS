<?php
session_start();
// Include the connection file
include_once '../../../settings/connection.php';

// Check if the form is submitted to update user information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_SESSION['userID'];
    $name = $_POST['name'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];

    // Update user data in the database
    $query = "UPDATE users SET name = ?, phoneNo = ?, email = ? WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "<span style='color:red'>Error: " . mysqli_error($conn) . "</span>";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssi", $name, $phoneNo, $email, $userID);
    if (mysqli_stmt_execute($stmt)) {
        echo "<span style='color:green'>Changes saved successfully.</span>";
    } else {
        echo "<span style='color:red'>Error: " . mysqli_error($conn) . "</span>";
    }
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>
