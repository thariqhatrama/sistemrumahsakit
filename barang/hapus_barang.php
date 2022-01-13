<?php 
include '../config.php';

    $id_barang = $_GET['id_barang'];
    $query = mysqli_query($con,"DELETE FROM barang WHERE id_barang='$id_barang' ");

    header("location:barang.php");
?>
