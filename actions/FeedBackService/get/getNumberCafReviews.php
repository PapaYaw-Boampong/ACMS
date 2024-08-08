<?php
include_once '../settings/connection.php';
function getReviewCount($conn, $cafID) {
    $sql = "
        SELECT COUNT(*) as reviewCount
        FROM CafeteriaReviews
        WHERE cafeteriaID = $cafID;
    ";

    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['reviewCount'];
    } else {
        return 0; // Return 0 if there are no reviews or query fails
    }
}