<?php
global $conn;

include_once 'includes/config.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `tickets` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header('Location: home.php?delete=success');
    } else {
        echo "Tickets not deleted";
    }
}