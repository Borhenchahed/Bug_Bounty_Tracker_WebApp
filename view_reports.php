<?php
require 'database_config.php';

$query = "SELECT title, description, severity, status FROM bug_reports";
$results = $db_conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bug Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="view-container">
        <h2>Bug Reports</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Severity</th>
                <th>Status</th>
            </tr>
            <?php
            if ($results->num_rows > 0) {
                while ($row = $results->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['severity'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No bug reports available</td></tr>";
            }
            $db_conn->close();
            ?>
        </table>
    </div>
</body>
</html>
