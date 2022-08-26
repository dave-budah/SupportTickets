<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <script src="js/password.js" defer></script>
    <script src="js/signup.js" defer></script>
    <title>Document</title>
</head>
<body>
<section class="wrapper">
    <form action="">
        <div class="heading">
            <h3>Create account</h3>
        </div>
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>
        <div class="form-group pwd-field">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <span class="pwd-toggle"><i class="fa-solid fa-eye"></i></span>
        </div>
        <div class="form-group pwd-field2">
            <label for="password-confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password-confirm" id="password-confirm">
            <span class="pwd-toggler"><i class="fa-solid fa-eye"></i></span>
        </div>

        <div class="submitBtn">
            <button class="btn" type="submit">Signup</button>
            <p>Already have an account <a href="index.php">Login here</a></p>
        </div>
    </form>
</>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>
<script src="js/sweetAlert2.min.js"></script>
</body>
</html>
