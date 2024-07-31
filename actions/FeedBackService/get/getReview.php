<?php 
include_once '../settings/connection.php';
function getRecentReviews($conn) {
    $sql = "
        SELECT 
            R.ratingID, R.userID, R.cafeteriaID, R.dateTime, R.rating, R.feedback,
            U.name, C.cafeteriaName
        FROM 
            CafeteriaReviews R
        JOIN 
            Users U ON R.userID = U.userID
        JOIN 
            Cafeterias C ON R.cafeteriaID = C.cafeteriaID
        ORDER BY 
            R.dateTime DESC 
        LIMIT 2;";

    $result =  $conn->query($sql);
    return $result;
    }
