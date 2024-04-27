<!-- Code Author(s): 
Team Members: Inigo Abuel, Luxsan Jeyasingam, Robelene Icalina
Date: 31 March 2024
Section: 313

This file is used for back end management.
This file connects to the database to be included in other php files that connect to the database.
Code Author(s): 

PHP - Luxsan Jeyasingam -->

<?php
    session_start();
    $servername = $_SESSION['dbserver'];
    $username = $_SESSION['dbusername']; 
    $sqlpassword = $_SESSION['dbpassword']; 
    $database = "assignment_2_database"; 


    $conn = mysqli_connect($servername, $username, $sqlpassword, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>