<?php 
include '../config.php';

    $id_perbaikan = $_GET['id_perbaikan'];
    $query = mysqli_query($con,"DELETE FROM perbaikan WHERE id_perbaikan='$id_perbaikan'");

    header("location:perbaikan.php");
?>
