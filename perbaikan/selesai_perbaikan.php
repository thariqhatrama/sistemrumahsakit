<?php 
include '../config.php';

    $id_perbaikan = $_GET['id_perbaikan'];
    $status = "Selesai";
    $query = mysqli_query($con,"UPDATE perbaikan SET status='$status' WHERE id_perbaikan='$id_perbaikan'");

    header("location:perbaikan.php");
?>
