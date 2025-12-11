<?php
$host = "db";           
$user = "user";
$password = "password";
$database = "crud_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>