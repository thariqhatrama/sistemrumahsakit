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

        // UPDATE 
    mysqli_query($con,"UPDATE peminjaman SET nma_peminjam='$nma_peminjam', id_unit='$id_unit', 
    jumlah='$jumlah', tgl_pinjam = '$tgl'");    
        
    header("location:pinjam.php");
    }

?>