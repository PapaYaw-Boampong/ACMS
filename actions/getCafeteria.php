<?php
include_once "../settings/connection.php";
include_once "../settings/core.php";
function getCafeterias($conn) {
    $sql = "SELECT * FROM Cafeterias";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cafeterias = [];
        while($row = $result->fetch_assoc()) {
            $cafeterias[] = $row;
        }
        return $cafeterias;
    } else {
        return [];
    }
}