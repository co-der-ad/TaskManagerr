<?php
// Filename: add_task.php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];
    $user_id = $_POST['user_id'];

    // Check if the connection is established
    if ($con) {
        // Escape special characters to prevent SQL injection
        $title = mysqli_real_escape_string($con, $title);
        $description = mysqli_real_escape_string($con, $description);
        $status = mysqli_real_escape_string($con, $status);
        $due_date = mysqli_real_escape_string($con, $due_date);
        $user_id = mysqli_real_escape_string($con, $user_id);

        $sql = "INSERT INTO tasks (title, description, status, due_date, user_id) VALUES ('$title', '$description', '$status', '$due_date', '$user_id')";
        
        if (mysqli_query($con, $sql)) {
            // Success message
            $success_message = "New task created successfully";
        } else {
            $error_message = "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        $error_message = "Failed to connect to MySQL";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <!-- Materialize CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        .center-align {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <?php if(isset($success_message)): ?>
                <div class="row">
                    <div class="col s12 center-align">
                        <div class="card green lighten-2">
                            <div class="card-content white-text">
                                <span class="card-title"><?= $success_message ?></span>
                                <p><a href="add_task_form.html" class="white-text">Go back to Add Task form</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(isset($error_message)): ?>
                <div class="row">
                    <div class="col s12 center-align">
                        <div class="card red lighten-2">
                            <div class="card-content white-text">
                                <span class="card-title"><?= $error_message ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Materialize JavaScript CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
