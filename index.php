<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {   

    $name = $_POST["username"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $issue = $_POST["issue"];
    date_default_timezone_set("Asia/Calcutta");
    $date = date('Y-m-d');
    $time = date('H:i:s');

    require("mysqlconnection.php");

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues</title>
    <link rel="stylesheet" href="query.css">
</head>
<body>
    <main>
        <header>
            <h1>Issue-Tracker</h1>
            <span>
                <a href="adminlogin.php" class='adminlog' >Admin</a>
            </span>

        </header>
        <div class="form-container">
            <div class="left-container">
                <h1 id="side-text">
                    READY TO SERVE YOU.. <br>24/7
                    <br><br>
                </h1>
                <div class="help">
                    <img width="252" src="img.jpg" alt="Help Image">
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-header">
                    <h1 id="Form-head">Please submit your Issues to the admin</h1>
                </div>
                <div class="form-input">
                    <form action="index.php" method="post">
                        <input type="text" name="username" placeholder="Your Full Name">
                        <input type="email" name="email" id="email" placeholder="Your Email address">
                        <input type="tel" name="number" id="number" placeholder="Contact Number">
                        <select name="subject" id="s3">
                            <option value aria-placeholder="Choose Issue Subject">Choose Issue Subject</option>
                            <option value="Light Fixture not working">Light Fixture not working</option>
                            <option value="Exhaust fan not working">Exhaust fan not working</option>
                            <option value="Ceiling Fan not working">Ceiling Fan not working</option>
                            <option value="Switchboard/socket not working">Switchboard/socket not working</option>
                            <option value="Corridor light fixture not working">Corridor light fixture not working</option>
                            <option value="MCB tripping">MCB tripping</option>
                            <option value="Others">Others</option>
                            <option value="Parking light fixture not working">Parking light fixture not working</option>
                            <option value="Parcel/garden light fixture not working">Parcel/garden light fixture not working</option>
                            <option value="Street light not working">Street light not working</option>
                            <option value="Fire fighting">Fire fighting</option>
                        </select>
                        <textarea name="issue" id="issue" rows="5" cols="50" placeholder="Explain Your Issue Briefly"></textarea>
                        <div id="file-container">
                            <h3>Upload an image</h3>
                            <input type="link" name="img" placeholder="Image drive link">
                        </div>
                        <input type="submit" id="button" value="Submit the Issue">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
