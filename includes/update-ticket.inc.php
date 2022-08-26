<?php
session_start();
include_once 'config.php';
global $conn;
global $id;
global $username;
global $description;
global $status;
global $priority;

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '{$username}'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $username = $row['username'];
}

// Update the user's profile information

if (isset($_POST['updateid'])) {
    $id = $_POST['updateid'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];


//    Check if any field is empty
    if (!empty($_POST['subject']) && !empty($_POST['description']) && !empty($_POST['priority']) && !empty($_POST['status'])) {
        $sql = "UPDATE tickets SET subject = '$subject', description = '$description', priority = '$priority', status = '$status' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../home.php?update=success");
            echo '';
        } else {
            $_SESSION['sqlError'] = "Something went wrong. Please try again.";
            header("Location: ../home.php?updateid=failed");
        }
    } else {
        $_SESSION['updateError'] =  "Please fill in all fields";
        header("Location: ../home.php?updateid=error");
    }

}