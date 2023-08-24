<?php
$hostname = "localhost"; // Change this if your database is on a different host
$username = "root";
$password = "";
$database = "todolist";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
