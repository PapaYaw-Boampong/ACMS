<?php
include_once '../settings/connection.php';
include_once '../settings/core.php';
// Function to get cafeteria details by ID
function getCafeteriaDetails($conn, $cafID) {
    // SQL query to get cafeteria details for a specific ID
    $query = "SELECT * FROM cafeterias WHERE cafeteriaID = ?";
    $stmt = mysqli_stmt_init($conn);

    // Prepare the statement
    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind the cafeteria ID parameter
    mysqli_stmt_bind_param($stmt, "i", $cafID);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row as an associative array
    $cafeteriaDetails = mysqli_fetch_assoc($result);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Return the cafeteria details
    return $cafeteriaDetails;
}
?>
