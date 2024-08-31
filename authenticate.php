<?php
session_start();
require 'database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $db_conn->query($query);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['userid'] = $user_data['id'];
            header("Location: bug_report.html");
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $db_conn->close();
}
?>
