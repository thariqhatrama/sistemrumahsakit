<?php 
include '../config.php';

    $id_supplier = $_GET['id_supplier'];
    $query = mysqli_query($con,"DELETE FROM supplier WHERE id_supplier='$id_supplier' ");

    header("location:supplier.php");
?>
