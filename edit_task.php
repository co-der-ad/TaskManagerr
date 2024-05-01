<?php
// edit_task.php

// Include config file
include 'includes/config.php';

// Check if task ID is set
if(isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Your logic to fetch task details and edit the task goes here
    // Redirect to user_data.php after editing
    header("Location: user_data.php");
    exit();
} else {
    // Redirect to user_data.php if task ID is not set
    header("Location: user_data.php");
    exit();
}
?>
