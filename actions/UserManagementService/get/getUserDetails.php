<?php
include_once "../../../settings/connection.php";
include_once "../../../settings/core.php";

function getUserDetailsByID($conn, $userID) {
    $query = "SELECT * FROM users WHERE userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return null;
    }

    mysqli_stmt_close($stmt);
}

// echo getUserDetailsByID($conn, $userID);