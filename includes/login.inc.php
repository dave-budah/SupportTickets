<?php
/**
 * @var $conn;
 */
session_start();
include_once 'config.php';

$uid = mysqli_real_escape_string($conn, $_POST['uid']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($_POST['uid']) && !empty($_POST['password'])) {
    $sql = "SELECT * FROM users WHERE username = '$uid' OR email = '$uid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            echo "success";
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Please fill in all fields";
}