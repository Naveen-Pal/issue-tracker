<?php
// Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "issues";
$con = mysqli_connect($server, $username, $password, $database);
    // Fetch issues from the database
$sql = "SELECT * FROM issue_details";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <table>
        <tr>
            <th>Issue ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["issue_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td><a href='issue_details.php?id=" . $row["issue_id"] . "'>View Details</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
