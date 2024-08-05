<?php
// Include your database connection file
include_once "../../../settings/connection.php";
include_once "../../../settings/core.php";
// $userID = $_SESSION["userID"];
$userID = 1;


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $cafeteriaID = isset($_GET['cafID']) ? intval($_GET['cafID']) : 0;
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
    $feedback = isset($_POST['feedback']) ? trim($_POST['feedback']) : '';
    // $userID = 1; // Assuming the user is logged in and you have their ID.

    // Set the timezone if needed (optional)
    date_default_timezone_set('Africa/Accra');

    // Get current date and time
    $currentDateTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS
    // echo $currentDateTime;
    // Validate inputs
    if ($rating === null || $cafeteriaID === 0 || $userID === null) {
        echo "Rating, Cafeteria ID, and User ID are required.";
        echo $rating, $cafeteriaID, $userID;
        exit();
    }

    // Insert into database
    $query = "INSERT INTO `CafeteriaReviews` (`rating`, `feedback`, `cafeteriaID`, `userID`, `dateTime`) VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("isiis", $rating, $feedback, $cafeteriaID, $userID, $currentDateTime);

    if ($stmt->execute()) {
        echo "Rating submitted successfully.";
        // Redirect to a success page or perform another action
        header("Location: ../../../views/restaurant.php?cafID=" . $cafeteriaID);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted.";
}
?>