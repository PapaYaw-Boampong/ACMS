<?php
$host = "127.0.0.1";
$dbname = "acms";
$username = "root"; 
$password = ""; 

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
}
