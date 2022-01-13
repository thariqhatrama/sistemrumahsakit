<?php 
include '../config.php';

    $id_keluar = $_GET['id_keluar'];
    $query = mysqli_query($con,"DELETE FROM brg_keluar WHERE id_keluar='$id_keluar'");
    header("location:keluar.php");
?>
