<?php
$servername = "localhost";
$username = "root";    // Default username for XAMPP
$password = "";        // Default password for XAMPP is blank
$dbname = "ecocycle_db";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
