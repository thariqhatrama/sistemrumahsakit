<?php
include '../config.php';

date_default_timezone_set("Asia/Jakarta");
    $id_keluar = $_POST['id_keluar'];
    $tgl = date("Y-m-d");
    $id_barang = $_POST['id_barang'];    
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $nama = $_POST['nama'];

    // Cek stok saat ini 
    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang ='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok =  $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah keluar lebih banyak dari stok!");
              window.location="keluar.php";
              </script>';
    }else{
    // UPDATE STOK    
        $updatekeluar = mysqli_query($con, "UPDATE brg_keluar SET tgl='$tgl', jumlah = '$jumlah', keterangan='$keterangan' 
        WHERE id_keluar='$id_keluar'");
    
        header("location:keluar.php");
    }
?>