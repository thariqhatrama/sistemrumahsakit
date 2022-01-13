<?php
include '../config.php';
    
date_default_timezone_set("Asia/Jakarta");
    $id_penyerahan = $_POST['id_penyerahan'];    
    $id_barang = $_POST['id_barang'];       
    $nma_penerima = $_POST['nma_penerima'];        
    $jumlah = $_POST['jumlah']; 
    $id_unit = $_POST['id_unit'];
    $tgl = date("Y-m-d");        
    $nama = $_POST['nama'];

    // Cek stok saat ini 
    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang ='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok =  $data['stok'];

    $cekstoksekarang = mysqli_query($con, "SELECT * FROM penyerahan WHERE id_penyerahan = '$id_penyerahan'");
    $data1 = mysqli_fetch_array($cekstoksekarang);
    $stoksekarang = $data1['jumlah'];

    // UPDATE STOK
        $selisih = $jumlah - $stoksekarang;
        $kurangi = $jmlstok - $selisih;
        $minstok = mysqli_query($con, "UPDATE barang SET stok = '$kurangi' WHERE id_barang = '$id_barang'");
        $updatepenyerahan = mysqli_query($con, "UPDATE penyerahan SET nma_penerima='$nma_penerima', jumlah = '$jumlah' WHERE id_penyerahan='$id_penyerahan'");
    
        header("location:penyerahan.php");

  

?>