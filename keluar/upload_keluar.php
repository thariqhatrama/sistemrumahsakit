<?php
    include '../config.php';
        
    date_default_timezone_set("Asia/Jakarta");
    $id_keluar = $_POST['id_keluar'];
    $tgl = date("Y-m-d");
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];    
    $keterangan = $_POST['keterangan'];    
    $status = "Belum di setujui";
    $nama = $_POST['nama'];

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok = $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah keluar lebih banyak dari stok!");
              window.location="keluar.php";
              </script>';
    }else{    

    $updatestok = mysqli_query($con, "INSERT INTO brg_keluar (id_keluar, tgl, id_barang, jumlah, keterangan, status,
    nama) VALUES ('$id_keluar', '$tgl', '$id_barang', '$jumlah', '$keterangan', '$status', '$nama')");

    header("location:keluar.php");
    }

?>