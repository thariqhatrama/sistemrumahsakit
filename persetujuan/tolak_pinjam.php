<?php
    include '../config.php';
            
    $id_pinjam = $_GET['id_pinjam'];    
    $status = "Ditolak";

    $pinjam = mysqli_query($con,"UPDATE peminjaman SET status='$status' WHERE id_pinjam='$id_pinjam'");    
    
    header("location:pers_pinjam.php");    
?>