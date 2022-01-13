<?php 
include '../config.php';

    $id_kategori = $_GET['id_kategori'];
    $query = mysqli_query($con,"DELETE FROM kategori WHERE id_kategori='$id_kategori' ");

    header("location:kategori.php");
?>
