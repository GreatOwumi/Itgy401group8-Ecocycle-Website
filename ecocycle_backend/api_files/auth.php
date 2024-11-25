# handles authentication operations(signup and login)
<?php
require_once '../config/database.php';
require_once '../helpers/authHelper.php';
require_once '../helpers/responseHelper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';
    if ($action === 'signup') {
        // Code for signing up a user
    } elseif ($action === 'login') {
        // Code for logging in a user
    }
}
?>
