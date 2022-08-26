<?php
/**
 * @var $conn;
 */
session_start();
include_once 'config.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$passwordConfirm = mysqli_real_escape_string($conn, $_POST['password-confirm']);

if(!empty($username) && !empty($email) && !empty($password) && !empty($passwordConfirm)) {
//    Check if email is in valid format
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0) {
            echo "$email is already in use";
        } else {
//            Check if username is available
            $sql = mysqli_query($conn, "SELECT username FROM users WHERE username = '{$username}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "$username is already in use";
            } else {
//                Check if passwords match
                if($password !== $passwordConfirm) {
                    echo "Passwords don't match";
                } else {
//                Lets encrypt password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $password = $hashedPassword;

                    $sql2 = mysqli_query($conn, "INSERT INTO users (username, email, password) 
                    VALUES ('{$username}', '{$email}', '{$password}')");
                    if ($sql2) {
                        $sql3 = mysqli_query( $conn,"SELECT username FROM users WHERE username = '{$username}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['username'] = $row['username'];
                                    echo 'success';
                                }
                    } else {
                        echo 'There was an error. Please try again.';
                    }
                }
            }
        }
    } else {
        echo "$email, is not a valid email address";
    }
} else {
    echo 'All fields are required';
}