<?php
// Enable error reporting (optional, depending on your environment)
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Function to retrieve cafeteria information
function getCafeteriaInfo($cafID = -1) {
    global $conn;

    $cafeterias = array();

    // Prepare the SQL statement
    if ($cafID == -1) {
        $sql = "SELECT * FROM Cafeterias";
        $stmt = $conn->prepare($sql);
    } else {
        $sql = "SELECT * FROM Cafeterias WHERE cafeteriaID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cafID);
    }

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cafeterias[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $cafeterias;
}



// Function to retrieve trending meals
function getTrendingMeals($limit = 10) {
    global $conn;

    $trendingMeals = array();

    // Prepare the SQL statement
    $sql = "
        SELECT Meals.mealID, Meals.mealStatus, Meals.timeframe, Meals.cafeteriaID, 
               COALESCE(AVG(Reviews.rating), 0) as averageRating,
               COUNT(Reviews.reviewID) as reviewCount
        FROM Meals
        LEFT JOIN Reviews ON Meals.mealID = Reviews.mealID
        GROUP BY Meals.mealID
        HAVING averageRating > 0
        ORDER BY averageRating DESC, reviewCount DESC
        LIMIT ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $trendingMeals[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $trendingMeals;
}


// Function to retrieve recent meals without ratings
function getRecentMeals($number = 10) {
    global $conn;

    $recentMeals = array();

    // Prepare the SQL statement
    $sql = "
        SELECT Meals.mealID, Meals.mealStatus, Meals.timeframe, Meals.cafeteriaID, 
               Meals.created_at
        FROM Meals
        ORDER BY Meals.created_at DESC
        LIMIT ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $number);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recentMeals[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $recentMeals;
}


?>