<?php
session_start(); // Start session to access user data

// Check if user is logged in
if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    echo "Welcome, $name! You have successfully logged in.";  
    header("Location: partycschedule.html");
    exit();
} else {
    echo "login failed";  
  
}
?>
