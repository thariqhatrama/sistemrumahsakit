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

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok = $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah penyerahan lebih banyak dari stok!");
              window.location="keluar.php";
              </script>';
    }else{

    $stokakhir = $jmlstok - $jumlah;

    $updatestok = "UPDATE barang SET stok = '$stokakhir' WHERE id_barang = '$id_barang'";
    mysqli_query($con, $updatestok);

    mysqli_query($con,"INSERT INTO penyerahan 
    (id_penyerahan, id_barang, nma_penerima, jumlah, id_unit, tgl_penyerahan, nama) 
    VALUES ('$id_penyerahan', '$id_barang', '$nma_penerima', '$jumlah', '$id_unit', '$tgl', '$nama')")or die(mysqli_error($con));    
        
    header("location:penyerahan.php");
    }

    

?>