<?php
include_once '../settings/connection.php';
function getReviewCount($conn) {
    $cafID = isset($_GET['cafID']) ? intval($_GET['cafID']) : 0; // Default to 0 if cafID is not provided
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