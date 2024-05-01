<!-- assign_task.php -->

<?php
session_start();
require_once('includes/config.php');

if(isset($_POST['assign_task'])) {
    $task_id = $_POST['task_id'];
    $user_id = $_POST['user_id'];

    // Update the task with the selected user ID
    $query = "UPDATE tasks SET user_id = '$user_id' WHERE id = '$task_id'";
    $result = mysqli_query($con, $query);

    if($result) {
        // Task assigned successfully, redirect back to admin dashboard or display a success message
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Error occurred while assigning task, display error message
        echo "<script>alert('Error assigning task');</script>";
    }
}
?>
