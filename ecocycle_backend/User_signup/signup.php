<?php

 include('database.php');

// Database configuration
$host = 'localhost'; // Database host
$db_name = 'ecocycle_db'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Create a connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $conn->real_escape_string(trim($_POST['first-name']));
    $last_name = $conn->real_escape_string(trim($_POST['last-name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password'];
    $country = $conn->real_escape_string(trim($_POST['country']));

    // Check if the email already exists
    $check_email_stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $result = $check_email_stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind for users table
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, country) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $country);

        // Execute the statement for users table
        if ($stmt->execute()) {
            echo "New record created successfully. You can now log in.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_email_stmt->close();
}

// Close the connection
$conn->close();
?>