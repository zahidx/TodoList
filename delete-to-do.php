<?php
require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM todo WHERE id = $id";
    mysqli_query($connection, $query);
    header("Location: index.php");
}
?>
