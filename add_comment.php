<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (task_id, comment) VALUES ($task_id, '$comment')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Comment added successfully";
    } else {
        echo "Error adding comment: " . $conn->error;
    }

    $conn->close();
}
?>
