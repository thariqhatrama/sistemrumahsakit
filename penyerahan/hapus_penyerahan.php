<?php 
include '../config.php';

    $id_penyerahan = $_GET['id_penyerahan'];
    
    $cekstoksekarang = mysqli_query($con, "SELECT * FROM penyerahan WHERE id_penyerahan = '$id_penyerahan'");
    $data1 = mysqli_fetch_array($cekstoksekarang);
    $stoksekarang = $data1['jumlah'];
    $id_barang = $data1['id_barang'];    

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang ='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok =  $data['stok'];    
    

    $selisih = $jmlstok + $stoksekarang;

    $query = mysqli_query($con, "UPDATE barang SET stok = '$selisih' WHERE id_barang = '$id_barang'");
    $hapus = mysqli_query($con, "DELETE FROM penyerahan WHERE id_penyerahan='$id_penyerahan'");

    header("location:penyerahan.php");


?>
