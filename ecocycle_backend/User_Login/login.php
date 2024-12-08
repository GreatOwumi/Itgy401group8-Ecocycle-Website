<?php
session_start(); // Start the session

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php'); // Include the database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password fields are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Get the posted data
        $email = $conn->real_escape_string(trim($_POST['username'])); // Assuming you are using email as username
        $password = $_POST['password'];

        // Prepare and bind
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $email; // Store email in session
                header("Location: ../../ecocycle_frontend/User_dashboard/dashboard.php");
                exit();
            } else {
                echo "Invalid email or password"; // Password does not match
            }
        } else {
            echo "Invalid email or password"; // Email does not exist
        }

        $stmt->close();
    } else {
        echo "Please enter both email and password."; // Handle case where fields are not set
    }
}

// Close the connection
$conn->close();
?>