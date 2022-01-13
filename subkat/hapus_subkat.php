<?php 
include '../config.php';

    $id_subkat = $_GET['id_subkat'];
    $query = mysqli_query($con,"DELETE FROM subkat WHERE id_subkat='$id_subkat' ");

    header("location:subkat.php");
?>
