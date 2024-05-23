
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 30px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    color: #2196F3;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>
<body>
    <div class="container">
        <h2>Admin Login Panel</h2>
        <form method="post">
            <label for="username">Admin Name:</label>
            <i class="fas fa-user"></i>
            <input type="text" name="username" id="username" required><br>
            <label for="password">Password:</label>
            <i class="fas fa-user"></i>
            <input type="password" name="password" id="password" required><br>
            <button type="submit" name="signin">Sign in</button>
            <!-- <input type="submit" value="Sign In" name="signin"> -->
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST["signin"])) {

    require("mysqlconnection.php");
    // echo "clicked";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password' ";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['adminID'] = $username;
        header("location: admin.php");
    }
    else{
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>