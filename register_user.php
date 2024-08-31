<?php
require 'database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_user = $_POST['new_user'];
    $new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
    $email = $_POST['user_email'];

    $query = "INSERT INTO users (username, password, email) VALUES ('$new_user', '$new_pass', '$email')";
    if ($db_conn->query($query) === TRUE) {
        header("Location: user_login.html");
    } else {
        echo "Error: " . $query . "<br>" . $db_conn->error;
    }

    $db_conn->close();
}
?>
