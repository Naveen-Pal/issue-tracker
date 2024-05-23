<?php
session_start();
if(!isset($_SESSION['adminID'])){
    header('location: adminlogin.php');
}
$server = "localhost";
$username = "root";
$password = "";
$database = "issues";
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection with database failed due to " . mysqli_connect_error());
}
$sql = "SELECT * FROM issue_details";
$result = $con->query($sql);
?>
        


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <header>    
        <div class="nav">
            <h1>Admin Panel</h1>
            <form method="post">
                <button name="logout">LogOut</button>
            </form>
        </div>
    </header>
    <main>
        <p>Below are listed all submitted issues</p>
        <i class="fa fa-bars" aria-hidden="true"></i>
        <div class="issue-box">
            <?php

            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
            $issue_id = $row["issue_id"];
            $name = $row["name"];
            $number = $row["number"];
            $email = $row["email"];
            $subject = $row["subject"];
            $date = $row["date"];
            $time =  $row["time"];
            $issue = $row["issue"];

            echo "<div class=\"entry\"> 
            <span class=\"id\">#" . $issue_id . "</span>
            <i class=\"fa-solid fa-user\" aria-hidden=\"true\"></i>
            <span class=\"name\">" . $name . "</span>
            <span class=\"subject\">" . $subject . "</span>
            <span class=\"date\">" . $date . "</span>
            <span class=\"time\">" . $time . "</span>
            <span class=\"issue\">" . $issue . "</span>
            <button>check</button>
            </div>";
        }

        } else {
            echo "0 results";
        }
        $con->close();
        ?>
        </div>
    </main>
    <script src="admin.js"></script>
</body>
</html>
<?php
if(isset($_POST['logout'])){
    session_destroy();
    header('location: adminlogin.php');
}
?>