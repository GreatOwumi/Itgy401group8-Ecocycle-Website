<?php
// Include database connection
include('db.php');

// If the token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database
    $sql = "SELECT * FROM users WHERE reset_token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Token is valid, process password reset
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = $_POST['password'];

            // Hash the new password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Update the password in the database and remove the reset token
            $updateSql = "UPDATE users SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Password successfully updated. You can now <a href='login.php'>log in</a>.";
            } else {
                echo "Error updating password.";
            }
        }
    } else {
        echo "Invalid or expired token.";
    }
}
?>
