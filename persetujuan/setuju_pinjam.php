<?php
    include '../config.php';
            
    $id_pinjam = $_GET['id_pinjam'];    

    $peminjaman = mysqli_query($con, "SELECT * FROM peminjaman WHERE id_pinjam='$id_pinjam'");
    $kel = mysqli_fetch_array($peminjaman);
    $id_barang = $kel['id_barang'];
    $jumlah = $kel['jumlah'];

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok = $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah Pinjam lebih banyak dari stok!");
              window.location="pers_pinjam.php";
              </script>';
    }else{
        
    $stokakhir = $jmlstok - $jumlah;
    $status = "Telah di setujui";

    $pinjam = mysqli_query($con,"UPDATE peminjaman SET status='$status' WHERE id_pinjam='$id_pinjam'");    

    $updatestok = "UPDATE barang SET stok = '$stokakhir' WHERE id_barang = '$id_barang'";
    mysqli_query($con, $updatestok);
    
    header("location:pers_pinjam.php");
    }    
?>