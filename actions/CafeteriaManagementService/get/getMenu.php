<?php 
include_once '../settings/connection.php';

function getCafeteriaMenus($conn, $parameter) {
    $cafID = isset($_GET['cafID']) ? intval($_GET['cafID']) : 0; // Default to 0 if cafID is not provided
    $sql = "
        SELECT 
            mealID, mealStatus, timeframe, cafeteriaID, name,price
        FROM 
            Meals
        WHERE 
            cafeteriaID = ? and mealStatus = 'AVAILABLE' and timeFrame= ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $cafID, $parameter);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize an array to hold the associative results
    $menus = array();

    if ($result->num_rows > 0) {
        // Fetch each row as an associative array
        while ($row = $result->fetch_assoc()) {
            $menus[] = $row;
        }
    }

    $stmt->close();
    return $menus;
}