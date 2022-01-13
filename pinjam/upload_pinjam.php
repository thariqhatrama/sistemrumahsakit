<?php
    include '../config.php';
        
    date_default_timezone_set("Asia/Jakarta");
    $id_pinjam = $_POST['id_pinjam'];    
    $id_barang = $_POST['id_barang'];
    $nma_peminjam = $_POST['nma_peminjam'];
    $id_unit = $_POST['id_unit'];    
    $jumlah = $_POST['jumlah'];    
    $tgl = date("Y-m-d");
    $tgl_pengembalian = NULL;    
    $status = "Belum di setujui";    

    $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_array($stokawal);
    $jmlstok = $data['stok'];

    if ($jmlstok < $jumlah) {
        echo '<script language="javascript">
              alert ("Jumlah pinjam lebih banyak dari stok!");
              window.location="pinjam.php";
              </script>';
    }else{

    mysqli_query($con,"INSERT INTO peminjaman 
    (id_pinjam, id_barang, nma_peminjam, id_unit, jumlah, tgl_pinjam, tgl_pengembalian, status) 
    VALUES ('$id_pinjam', '$id_barang', '$nma_peminjam', '$id_unit','$jumlah', '$tgl', '$tgl_pengembalian', '$status')")or die(mysqli_error($con));    
        
    header("location:pinjam.php");
    }

?>