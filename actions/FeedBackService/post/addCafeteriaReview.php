<?php
// Include your database connection file
include_once "../settings/connection.php";
include_once "../settings/core.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ratingBtn"])) {
    // Collect form data
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
    $feedback = isset($_POST['feedback']) ? trim($_POST['feedback']) : '';
    $cafeteriaID = isset($_POST['cafeteriaID']) ? intval($_POST['cafeteriaID']) : null;
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : null;

    // Validate inputs
    if ($rating === null || $cafeteriaID === null || $userID === null) {
        echo "Rating, Cafeteria ID, and User ID are required.";
        exit();
    }

    // Insert into database
    $query = "INSERT INTO `CafeteriaReviews` (`rating`, `feedback`, `cafeteriaID`, `userID`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("isii", $rating, $feedback, $cafeteriaID, $userID);

    if ($stmt->execute()) {
        echo "Rating submitted successfully.";
        // Redirect to a success page or perform another action
        header("Location: success.html"); // Example redirect
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
