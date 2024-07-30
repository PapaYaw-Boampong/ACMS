<?php
// Include your database connection file
include_once "../settings/connection.php";

// Get the cafeteriaID from the request (e.g., from GET or POST method)
$cafeteriaID = isset($_GET['cafeteriaID']) ? intval($_GET['cafeteriaID']) : 0;

// Check if the cafeteriaID is valid
if ($cafeteriaID <= 0) {
    echo json_encode(["error" => "Invalid cafeteria ID"]);
    exit();
}

// Prepare the SQL query to get the ratings for the specified cafeteria
$query = "SELECT ratingID, ratingValue, cafeteriaID FROM CafeteriaRatings WHERE cafeteriaID = ?";

// Prepare and execute the query
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $cafeteriaID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results
    $ratings = [];
    while ($row = $result->fetch_assoc()) {
        $ratings[] = $row;
    }

    // Output the results as JSON
    echo json_encode(["ratings" => $ratings]);

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(["error" => "Failed to prepare the query"]);
}

// Close the database connection
$conn->close();
?>
