<?php
$host = 'localhost';
$database = 'support';
$user = 'root';
$password = 'selvigtech';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    http_response_code(400);
    header('Content-Type: text/plain');
    echo $conn->connect_error;
    exit();
}
