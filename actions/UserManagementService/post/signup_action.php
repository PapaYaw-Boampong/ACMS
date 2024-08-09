<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
// Include the connection file
include_once '../../../settings/connection.php';
global $conn;


// Initialize response array
$response = array();
// Function to validate email format
function isValidEmail($email) {
    // Regex to check if the email has a structure like some.letters@ashesi.edu.gh
    return preg_match('/^[a-zA-Z]+\.[a-zA-Z]+@ashesi\.edu\.gh$/', $email) && strlen($email) > 15;
}
// Function to validate password format
function isValidPassword($password) {
    // Regex: at least 11 characters, must include at least one letter, one number, and one special character
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{11,}$/', $password);
}
// Function to validate phone number format
function isValidPhoneNumber($phoneNo) {
    return preg_match('/^[0-9]{10,15}$/', $phoneNo); // Adjust regex according to your phone number format
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
        return array('success' => false, 'message' => 'Email already registered.');
    } else {
        return array('success' => true, 'message' => 'Email available for registration.');
    }

    mysqli_stmt_close($stmt);
}
// Function to check phone number availability
function checkPhoneNumber($conn, $phoneNo) {
    if (!isValidPhoneNumber($phoneNo)) {
        return array('success' => false, 'message' => 'Invalid phone number format.');
    }

    $query = "SELECT * FROM users WHERE phoneNo = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        return array('success' => false, 'message' => "Database error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $phoneNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return array('success' => false, 'message' => 'Phone number already registered.');
    } else {
        return array('success' => true, 'message' => 'Phone number available for registration.');
    }

    mysqli_stmt_close($stmt);
}
// Function to check password correctness
function checkPassword( $password) {
    if (!isValidPassword($password)) {
        return array('success' => false, 'message' => 'Invalid Password');
    }else{
        return array('success' => true, 'message' => 'Valid Password ');
    }
}




// Check if the password correctness check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_password') {
    $password = $_POST['password'];
    $response = checkPassword($password);
    echo json_encode($response);
    exit();
}

// Check if the email availability check was requested
if (isset($_POST['action']) && $_POST['action'] == 'check_email') {
    $email = $_POST['email'];
    $response = checkEmail($conn, $email);
} 

// Check if the phone number availability check was requested
elseif (isset($_POST['action']) && $_POST['action'] == 'check_phoneNo') {
    $phoneNo = $_POST['phoneNo'];
    $response = checkPhoneNumber($conn, $phoneNo);
} 



// Check if the signup form was submitted
elseif (isset($_POST['signup'])) {
    // Collect form data
    $email = $_POST['email'];
    $phoneNo = $_POST['phoneNo'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $mealPlan = $_POST['mealPlan'];

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Read the default image file in binary mode
    $defaultImage = file_get_contents('../../../img/user/1.jpg');

    // Check if email is already registered
    $emailCheck = checkEmail($conn, $email);
    if (!$emailCheck['success']) {
        $response = $emailCheck;
    } else {
        // Insert new user into the database
        $query = "INSERT INTO users (email, phoneNo, name, password, roleID, mealPlanStatus, userImage) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            $response['success'] = false;
            $response['message'] = "Database error: " . mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param($stmt, "ssssibs", $email, $phoneNo, $name, $hashedPassword, $role, $mealPlan, $defaultImage);

            if (mysqli_stmt_execute($stmt)) {
                $response['success'] = true;
                $response['message'] = "Signup successful.";
            } else {
                $response['success'] = false;
                $response['message'] = "Registration failed. Please try again.";
            }
        }
        mysqli_stmt_close($stmt);
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method.";
}

// Close the connection
mysqli_close($conn);

// Encode the response array as JSON and echo it
echo json_encode($response);
?>

