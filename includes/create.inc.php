<?php
global $conn;
global $username;

session_start();
include_once 'config.php';

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
    while ($row = mysqli_fetch_assoc($sql)) {
        $username = $row['username'];
    }
}
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$priority = mysqli_real_escape_string($conn, $_POST['priority']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$date = date('Y-m-d');

if(!empty($_POST['subject']) && !empty($_POST['description']) && !empty($_POST['priority']) && !empty($_POST['status'])) {
//    Generate unique id for ticket
    $unique_id = random_int(1000000,9999999);

    $sql2 = mysqli_query($conn, "INSERT INTO tickets (unique_id, subject, description, author, created_on, priority, status)
    VALUES ('{$unique_id}','{$subject}','{$description}','{$username}','{$date}','{$priority}', '{$status}')");
    if ($sql2) {
        echo 'success';
    } else {
        echo 'There was an error creating the ticket';
    }
} else {
    echo 'All fields are required';
}
