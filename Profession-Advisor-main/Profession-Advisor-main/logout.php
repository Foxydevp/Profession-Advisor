<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Remove the user ID cookie (if set)
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, '/'); // Expire the cookie one hour ago
}

// Redirect to the login page or any other desired page
header('Location: index.php');
exit;