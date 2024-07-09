<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to login page
    header("Location: index.php");
    exit();
}
?>