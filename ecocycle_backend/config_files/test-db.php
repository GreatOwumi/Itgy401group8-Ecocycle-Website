<?php
// Include the database connection
include('database.php');

// Define the test user credentials
$username = 'testuser';
$password = 'testpassword'; // Plain text password

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Test user inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>