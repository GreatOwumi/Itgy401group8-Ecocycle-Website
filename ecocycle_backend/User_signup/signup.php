<?php
include('database.php');
// Signup backend example
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Please fill all fields.";
    }
}
?>
