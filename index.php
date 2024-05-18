<?php
// Start PHP session
session_start();

// Check if the user is already logged in, if yes then redirect them to the welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Redirect to login.php
header("Location: login.php");
exit;
?>
