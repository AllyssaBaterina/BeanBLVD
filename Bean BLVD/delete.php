<?php
    include_once("connection.php");

    $id = $_GET['id'];

    $result = mysqli_query($con, "DELETE from orders WHERE id = $id");

    header("Location: view.php");
?>