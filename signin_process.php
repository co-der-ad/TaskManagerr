<?php
session_start();
require_once('includes/config.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if($row) {
        // User exists, set session variables and redirect to user data page
        $_SESSION['user_id'] = $row['id'];
        header("Location: user_data.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password');</script>";
        header("Location: signin.php");
        exit();
    }
}
?>
