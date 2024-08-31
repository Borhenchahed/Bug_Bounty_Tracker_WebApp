<?php
session_start();
require 'database_config.php';

if (!isset($_SESSION['userid'])) {
    header("Location: user_login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['bug_title'];
    $description = $_POST['bug_desc'];
    $severity = $_POST['bug_severity'];
    $user_id = $_SESSION['userid'];

    $query = "INSERT INTO bug_reports (title, description, severity, status, user_id) VALUES ('$title', '$description', '$severity', 'Open', '$user_id')";
    if ($db_conn->query($query) === TRUE) {
        header("Location: view_reports.php");
    } else {
        echo "Error: " . $query . "<br>" . $db_conn->error;
    }

    $db_conn->close();
}
?>
