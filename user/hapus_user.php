<?php 
include '../config.php';

    $id_user = $_GET['id_user'];
    $query = mysqli_query($con,"DELETE FROM users WHERE id_user='$id_user' ");

    header("location:user.php");
?>
