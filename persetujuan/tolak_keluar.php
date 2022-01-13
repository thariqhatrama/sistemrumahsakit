<?php
    include '../config.php';
            
    $id_keluar = $_GET['id_keluar'];        
    $status = "Ditolak";

    $keluar = mysqli_query($con,"UPDATE brg_keluar SET status='$status' WHERE id_keluar='$id_keluar'");    
    
    header("location:pers_keluar.php");    
?>