<?php 
include '../config.php';

    $id_masuk = $_GET['id_masuk'];    

    $cekstoksekarang = mysqli_query($con, "SELECT * FROM brg_masuk WHERE id_masuk = '$id_masuk'");
    $data = mysqli_fetch_array($cekstoksekarang);
    $id_barang = $data['id_barang'];
    $jumlah = $data['jumlah'];
    
    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang ='$id_barang'");
    $data1 = mysqli_fetch_array($stokawal);
    $jmlstok =  $data1['stok'];
  
    // echo $id_bb;
   
    $stoksekarang = $data['jumlah'];

    $selisih = $jmlstok - $jumlah;

    $query = mysqli_query($con, "UPDATE barang SET stok = '$selisih' WHERE id_barang = '$id_barang'");
    $hapus = mysqli_query($con, "DELETE FROM brg_masuk WHERE id_masuk='$id_masuk'");
    
    header("location:masuk.php");
?>
