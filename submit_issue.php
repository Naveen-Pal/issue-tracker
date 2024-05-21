<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "issues";

    $name = $_POST["username"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $issue = $_POST["issue"];
    date_default_timezone_set("Asia/Calcutta");
    $date = date('Y-m-d'); // Correct date format for SQL
    $time = date('H:i:s'); // Current time

    // Create a connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$con) {
        die("Connection with database failed due to " . mysqli_connect_error());
    }

    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $name);
    $number = mysqli_real_escape_string($con, $number);
    $email = mysqli_real_escape_string($con, $email);
    $subject = mysqli_real_escape_string($con, $subject);
    $issue = mysqli_real_escape_string($con, $issue);

    // Prepare the SQL query
    $sql = "INSERT INTO `issue_details` (`name`, `number`, `email`, `subject`, `issue`, `date`, `time`) 
            VALUES ('$name', '$number', '$email', '$subject', '$issue', '$date', '$time')";

    // Execute the query and check the result
    if ($con->query($sql) === TRUE) {
        echo "Your issue has been successfully submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close the connection
    $con->close();
}
?>
