<?php
    include '../config.php';
            
    $id_perbaikan = $_GET['id_perbaikan'];        
    $status = "Ditolak";

    $perbaikan = mysqli_query($con,"UPDATE perbaikan SET status='$status' WHERE id_perbaikan='$id_perbaikan'");    
    
    header("location:pers_perbaikan.php");    
?>