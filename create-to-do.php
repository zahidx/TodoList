<?php
require_once 'database.php';

if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $query = "INSERT INTO todo (task) VALUES ('$task')";
    mysqli_query($connection, $query);
    header("Location: index.php");
}
?>
