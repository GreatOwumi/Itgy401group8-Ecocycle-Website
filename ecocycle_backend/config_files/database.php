# Database connection setup
<?php
$servername = "localhost";
$username = "root";        // Default username for local databases
$password = "";            // Default password (leave empty for local servers)
$dbname = "ecocycle";      // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
