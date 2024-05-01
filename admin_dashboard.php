<!-- admin_dashboard.php -->

<?php
session_start();
require_once('includes/config.php');

// Fetch tasks from the database
$query = "SELECT * FROM tasks";
$result = mysqli_query($con, $query);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Fetch users from the database
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($con, $query_users);
$users = mysqli_fetch_all($result_users, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <!-- Add your header content here -->

    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Display tasks -->
        <h2>Tasks</h2>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li><?php echo $task['title']; ?></li>
            <?php endforeach; ?>
        </ul>

        <!-- Assign Task Form -->
        <h2>Assign Task</h2>
        <form action="assign_task.php" method="post">
            <label for="task_id">Select Task:</label>
            <select name="task_id" id="task_id">
                <?php foreach ($tasks as $task): ?>
                    <option value="<?php echo $task['id']; ?>"><?php echo $task['title']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="user_id">Assign to User:</label>
            <select name="user_id" id="user_id">
                <?php foreach ($users as $user): ?>
                    <?php if (isset($user['username'])): ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="assign_task">Assign Task</button>
        </form>
    </div>

    <!-- Add your footer content here -->

    <!-- Add your script includes here -->
</body>
</html>
