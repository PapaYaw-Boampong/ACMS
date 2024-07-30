<?php
// Include your database connection file
include_once "../settings/connection.php";
include_once "../settings/core.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reviewBtn"])) {
    // Collect form data
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : null;
    $comments = isset($_POST['comments']) ? trim($_POST['comments']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : null;
    $mealID = isset($_POST['mealID']) ? intval($_POST['mealID']) : null;

    // Validate inputs
    if ($userID === null || $rating === null || $mealID === null) {
        echo "All fields are required.";
        exit();
    }

    // Prepare and execute the SQL statement
    $query = "INSERT INTO `MealReviews` (`userID`, `comments`, `rating`, `mealID`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("isii", $userID, $comments, $rating, $mealID);

    if ($stmt->execute()) {
        echo "Review added successfully.";
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
