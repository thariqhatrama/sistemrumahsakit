<?php
    include '../config.php';
            
    $id_keluar = $_GET['id_keluar'];    

    $brg_keluar = mysqli_query($con, "SELECT * FROM brg_keluar WHERE id_keluar='$id_keluar'");
    $kel = mysqli_fetch_array($brg_keluar);
    $id_barang = $kel['id_barang'];
    $jumlah = $kel['jumlah'];

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok = $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah keluar lebih banyak dari stok!");
              window.location="pers_persetujuan.php";
              </script>';
    }else{
        
    $stokakhir = $jmlstok - $jumlah;
    $status = "Telah di setujui";

    $keluar = mysqli_query($con,"UPDATE brg_keluar SET status='$status' WHERE id_keluar='$id_keluar'");    

    $updatestok = "UPDATE barang SET stok = '$stokakhir' WHERE id_barang = '$id_barang'";
    mysqli_query($con, $updatestok);
    
    header("location:pers_keluar.php");
    }    
?>