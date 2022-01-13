<?php 
include '../config.php';

    $id_pinjam = $_GET['id_pinjam'];
    $query = mysqli_query($con,"DELETE FROM peminjaman WHERE id_pinjam='$id_pinjam'");

    header("location:pinjam.php");
?>
