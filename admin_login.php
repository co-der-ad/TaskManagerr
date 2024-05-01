<?php
// Filename: admin_login.php

// Start session
session_start();

// Check if username and password are correct
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password match
    if($username === 'admin' && $password === 'admin') {
        // Set session variables
        $_SESSION['admin'] = true;
        
        // Redirect to add_task_form.html
        header("Location: add_task_form.html");
        exit();
    } else {
        // Invalid credentials, redirect back to admin_login.html
        header("Location: admin_login.html");
        exit();
    }
} else {
    // Redirect back to admin_login.html if username and password are not set
    header("Location: admin_login.html");
    exit();
}
?>
