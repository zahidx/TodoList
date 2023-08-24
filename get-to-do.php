<?php
require_once 'database.php';

$query = "SELECT * FROM todo";
$result = mysqli_query($connection, $query);
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
