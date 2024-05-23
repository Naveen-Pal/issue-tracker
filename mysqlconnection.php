<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "issues";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection with database failed due to " . mysqli_connect_error());
    }
?>