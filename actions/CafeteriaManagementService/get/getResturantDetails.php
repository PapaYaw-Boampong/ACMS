<?php 
include_once '../settings/connection.php';

function getAllCafeteriaDetails($conn) {
    $cafID = isset($_GET['cafID']) ? intval($_GET['cafID']) : 0; // Default to 0 if cafID is not provided
    $sql = "
        SELECT 
            cafeteriaID, cafeteriaName, description, cafeteriaImage, openingTime, closingTime
        FROM 
            Cafeterias
        WHERE 
            cafeteriaID = $cafID;
    ";

    $result = $conn->query($sql);

    // Initialize an array to hold the associative results
    if ($result->num_rows > 0) {
        // Fetch the single row as an associative array
        $cafeteria = $result->fetch_assoc();
        return $cafeteria;
    } else {
        return null; // No cafeteria found
    }

}
// echo getAllCafeteriaDetails($conn);