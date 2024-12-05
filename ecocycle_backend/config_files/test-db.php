<?php
include('db.php'); // Include the database connection file

if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed.";
}
?>
