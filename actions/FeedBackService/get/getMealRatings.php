<?php
// Include your database connection file
include_once "../settings/connection.php";

// Get the mealID from the request (e.g., from GET method)
$mealID = isset($_GET['mealID']) ? intval($_GET['mealID']) : 0;

// Check if the mealID is valid
if ($mealID <= 0) {
    echo json_encode(["error" => "Invalid meal ID"]);
    exit();
}

// Prepare the SQL query to get the rating values for the specified meal
$query = "SELECT ratingValue FROM MealRatings WHERE mealID = ?";

// Prepare and execute the query
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $mealID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results
    $ratingValues = [];
    while ($row = $result->fetch_assoc()) {
        $ratingValues[] = $row['ratingValue'];
    }

    // Output the results as JSON
    echo json_encode(["ratingValues" => $ratingValues]);

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(["error" => "Failed to prepare the query"]);
}

// Close the database connection
$conn->close();
?>
