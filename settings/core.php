<?php
if (session_status() == PHP_SESSION_NONE) {
    // Session has not been started, so start it
    session_start();
}
if (!function_exists('userIdExist')) {
    function userIdExist() {
        if(!isset($_SESSION['userID'])){
            header("Location: ../Login/login.php");
            die();
        }
        return $_SESSION["userID"];
    }
}
if(!function_exists("userRoleIdExist")){
    function userRoleIdExist() {
        if (!isset($_SESSION['roleID'])) {
            header("Location: ../Login/login.php");
            return false;
    
        }
        return $_SESSION['roleID'];
    }
}

if (!function_exists('cafIdExist')) {
    function cafIdExist() {
        if(!isset($_SESSION['cafID'])){
            header("Location: ../Login/login.php");
            die();
        }
        return $_SESSION["cafID"];
    }
}