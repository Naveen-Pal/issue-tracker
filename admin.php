<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header('location: adminlogin.php');
}
require("mysqlconnection.php");

if (isset($_POST['toggle_status'])) {
    $issue_id = $_POST['issue_id'];
    $current_status = $_POST['current_status'];
    $new_status = $current_status == 1 ? 0 : 1;
    $sql_update = "UPDATE issue_details SET status=$new_status WHERE issue_id=$issue_id";
    $con->query($sql_update);
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
                <button name="logout" class="lo">LogOut</button>
            </form>
        </div>
    </header>
    <main>
        <p><b>Below are listed all submitted issues</b></p>
        <div class="issue-box">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $issue_id = $row["issue_id"];
                    $name = $row["name"];
                    $number = $row["number"];
                    $email = $row["email"];
                    $subject = $row["subject"];
                    $date = $row["date"];
                    $time =  $row["time"];
                    $issue = $row["issue"];
                    $status = $row["status"];
                    $link = $row["link"];

                    $s_sta = $status == 1 ? 'Status: Resolved' : 'Status: Open';
                    $button_text = $status == 1 ? 'Reopen' : 'Close';

                    echo "
                    <div class=\"entry\"> 
                        <div class=\"en-ma in\">
                            <span class=\"id\">#" . $issue_id . "</span>
                            <span class=\"name\">" . $name . "</span>
                            <span class=\"subject\">" . $subject . "</span>
                            <span class=\"date val\">" . $date . "</span>
                            <span class=\"time\">" . $time . "</span>
                            <span class=\"issue\">" . $issue . "</span>
                            <span class=\"email\"><b>Email: </b>" . $email . "</span>
                            <span class=\"number\"><b>Contact no.: </b>" . $number . "</span>

                        </div>
                        <div class=\"sta in\">
                        <span class=\"status\">" . $s_sta . "</span>
                        <form method=\"post\">
                        <input type=\"hidden\" name=\"issue_id\" value=\"" . $issue_id . "\">
                        <input type=\"hidden\" name=\"current_status\" value=\"" . $status . "\">
                        <button type=\"submit\" name=\"toggle_status\" class=\"ch-st\">" . $button_text . "</button>
                        </form>
                        <span class=\"link\"><a href=" . $link . ">Media link</a></span>
                        </div>
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
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: adminlogin.php');
}

?>
