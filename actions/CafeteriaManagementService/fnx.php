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



// Function to retrieve trending meals based on average ratings
function trendingMeals($numMeals) {
    global $conn;

    $trendingMeals = array();

    // Prepare the SQL statement
    $sql = "SELECT Meals.mealID, Meals.name, Meals.price, Meals.timeframe, AVG(MealRatings.ratingValue) as avgRating
            FROM Meals
            INNER JOIN MealRatings ON Meals.mealID = MealRatings.mealID
            GROUP BY Meals.mealID
            ORDER BY avgRating DESC
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numMeals);

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



// Function to retrieve recent meals purchased by a specific user
function getRecentMeals($userID = -1, $numMeals=10) {
    global $conn;

    $meals = array();

    // Prepare the SQL statement
    $sql = "SELECT Meals.mealID, Meals.name, Meals.price, Meals.timeframe
            FROM Meals
            INNER JOIN OrderDetails ON Meals.mealID = OrderDetails.mealID
            INNER JOIN Orders ON OrderDetails.orderID = Orders.orderID
            WHERE Orders.userID = ?
            ORDER BY Orders.orderID DESC
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userID, $numMeals);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are any results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $meals[] = $row;
        }
    } else {
        return null; // No results found
    }

    // Close the statement
    $stmt->close();

    return $meals;
}


?>