<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header('location: adminlogin.php');
    exit();
}
require("mysqlconnection.php");

if (isset($_POST['issue_id']) && isset($_POST['current_status'])) {
    $issue_id = $_POST['issue_id'];
    $current_status = $_POST['current_status'];
    $new_status = $current_status == 1 ? 0 : 1;

    $sql_update = "UPDATE issue_details SET status=$new_status WHERE issue_id=$issue_id";
    if ($con->query($sql_update) === TRUE) {
        echo json_encode(['success' => true, 'new_status' => $new_status]);
    } else {
        echo json_encode(['success' => false, 'error' => $con->error]);
    }
    $con->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input']);
}
?>