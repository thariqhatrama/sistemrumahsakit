<?php 
include '../config.php';

    $id_unit = $_GET['id_unit'];
    $query = mysqli_query($con,"DELETE FROM unit WHERE id_unit='$id_unit' ");

    header("location:unit.php");
?>
