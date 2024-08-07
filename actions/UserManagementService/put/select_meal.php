<?php
// Include the connection file
include_once "../settings/connection.php";

function getMealstatus() {
    global $conn;

    // Write a select query on the "family" table
    $querys = "SELECT * FROM mealplanstatus";

    // Execute the query using the connection
    $results = mysqli_query($conn, $querys);

    // Check if execution worked
    if (!$results) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the results
    $status = mysqli_fetch_all($results, MYSQLI_ASSOC);

    mysqli_free_result($results);
    // Return the plan array
    return $status;
}
?>