<?php
session_start();

// Include the connection file
include_once '../../../settings/connection.php';

// Initialize response array
$response = array();

// function isValidPassword($password) {
//     // Regex to check if the password has more than 11 letters
//     return preg_match('/^[a-zA-Z]{12,}$/', $password);
// }

// Function to validate password format
function isValidPassword($password) {
    // Regex: at least 11 characters, must include at least one letter, one number, and one special character
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{11,}$/', $password);
}

// Function to validate email format
function isValidEmail($email) {
    // Regex to check if the email has a structure like some.letters@ashesi.edu.gh
    if($email===""){

    }
    return preg_match('/^[a-zA-Z]+\.[a-zA-Z]+@ashesi\.edu\.gh$/', $email) && strlen($email) > 15;
}

// Function to check email availability
function checkEmail($conn, $email) {
    if (!isValidEmail($email)) {
        return array('success' => false, 'message' => 'Invalid email format.');
    }

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        return array('success' => false, 'message' => "Database error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return array('success' => true, 'message' => 'Email Found.');
    }

    mysqli_stmt_close($stmt);
}

// Function to check password correctness
function checkPassword($password) {
    if (!isValidPassword($password)) {
        return array('success' => false, 'message' => 'Invalid Password');
    }else{
        return array('success' => true, 'message' => 'Looks Good! ');
    }
}

// Check if the email availability check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_email') {
    $email = $_POST['email'];
    $response = checkEmail($conn, $email);
    echo json_encode($response);
    exit();
}



// Check if the password correctness check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_password') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $response = checkPassword($password);
    echo json_encode($response);
    exit();
}

// Check if the login form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = str_replace(' ', '', $email);
    $password = str_replace(' ', '', $password);
    // Validate email and password formats
    if (!isValidEmail($email)) {
        $response = array('success' => false, 'message' => 'Invalid email format.');
    } elseif (!isValidPassword($password)) {
        $response = array('success' => false, 'message' => 'Password does not meet requirements.');
    } else {
        // Write a query to SELECT a record from the users table using the email
        $query = "SELECT * FROM users WHERE email = ?";

        // Prepare the statement
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            $response = array('success' => false, 'message' => "Database error: " . mysqli_error($conn));
        } else {
            // Bind parameters and execute the query
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            // Check if any row was returned
            if (mysqli_num_rows($result) == 0) {
                $response = array('success' => false, 'message' => 'User not registered or incorrect email.');
            } else {
                // Fetch the record
                $row = mysqli_fetch_assoc($result);

                // Verify password user provided against database record using password_verify()
                if (password_verify($password, $row['password'])) {
                    // Passwords match, continue with the processing
                    // Create session for user id
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['username'] = $row['name'];


                    // Check roleID and if it is 3, get cafeteriaID
                    $roleID = $row['roleID'];
                    if ($roleID == 4) {
                        $userID = $row['userID'];
                        $query = "SELECT cafeteriaID FROM ManagerCafeteria WHERE userID = ?";
                        if ($stmt = mysqli_prepare($conn, $query)) {
                            mysqli_stmt_bind_param($stmt, "i", $userID);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if ($managerRow = mysqli_fetch_assoc($result)) {
                                $_SESSION['cafID'] = $managerRow['cafeteriaID'];
                                $response = array('success' => true, 'message' => 'Login successful.', 'redirect' => `../views/cafeteria.php?userID=$userID`);
                            }
                            mysqli_stmt_close($stmt);
                        }
                    } else {
                        $response = array('success' => true, 'message' => 'Login successful.', 'redirect' => '../views/home.php');
                    }
                } else {
                    $response = array('success' => false, 'message' => 'Incorrect password.');
                }
            }
        }
    }

    echo json_encode($response);
    exit();
}

// Close the connection
mysqli_close($conn);


?>




