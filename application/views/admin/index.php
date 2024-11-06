<?php
session_start(); // Start the session

// Check if the admin session exists
if (isset($_SESSION['user_id']) && $_SESSION['role_id'] == 1) {
    // Admin is logged in, redirect to the admin dashboard
    header("Location: dashboard/index.php");
    exit();
} else {
    // Admin is not logged in, redirect to the login page
    header("Location: admin/login/index.php");
    exit();
}
?>
