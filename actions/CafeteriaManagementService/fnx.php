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


// Function to retrieve recent meals purchased by a specific user
function getRecentMeals($userID, $numMeals) {
    global $conn;

    $meals = array();

    // Prepare the SQL statement
    $sql = "SELECT Meals.mealID, Meals.name, Meals.price, Meals.avgRating, Meals.timeframe, Cafeterias.cafeteriaName,Cafeterias.cafeteriaID
            FROM Meals
            INNER JOIN MealOrder ON Meals.mealID = MealOrder.mealID
            INNER JOIN Orders ON MealOrder.orderID = Orders.orderID
            INNER JOIN Cafeterias ON Meals.cafeteriaID = Cafeterias.cafeteriaID
            WHERE Orders.userID = ? AND Meals.mealStatus = 'AVAILABLE'
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



// Function to retrieve trending meals based on average ratings
function trendingMeals($numMeals) {
    global $conn;

    $trendingMeals = array();

    // Prepare the SQL statement
    $sql = "SELECT m.mealID, m.name, m.price, m.timeframe, c.cafeteriaName, m.avgRating, c.cafeteriaName, c.cafeteriaID
            FROM meals m
            INNER JOIN cafeterias c ON m.cafeteriaID = c.cafeteriaID
            WHERE m.mealStatus = 'AVAILABLE'
            ORDER BY m.avgRating DESC
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


// Function to retrieve recent meals from a specific cafeteria
function getRecentMealsByCafeteria($cafeteriaID, $numMeals = 10) {
    global $conn;

    $meals = array();

    // Prepare the SQL statement
    $sql = "SELECT Meals.mealID, Meals.name, Meals.price, Meals.avgRating, Meals.timeframe, Cafeterias.cafeteriaName
            FROM Meals
            INNER JOIN Cafeterias ON Meals.cafeteriaID = Cafeterias.cafeteriaID
            WHERE Meals.cafeteriaID = ? AND Meals.mealStatus = 'AVAILABLE'
            ORDER BY Meals.mealID DESC
            LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cafeteriaID, $numMeals);

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