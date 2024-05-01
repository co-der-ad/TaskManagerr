<?php
include 'includes/config.php';

// Fetch all tasks data from the database
$query = "SELECT * FROM tasks";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Tasks</title>
    <!-- Materialize CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h2>User Tasks</h2>
        <table class="striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any tasks
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['due_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_task.php?id=" . $row['id'] . "'><i class='material-icons'>edit</i></a>";
                        echo "<a href='delete_task.php?id=" . $row['id'] . "' onClick='return confirm(\"Do you really want to delete this task?\");'><i class='material-icons'>delete</i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No tasks found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
