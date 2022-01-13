<?php
    include "../config.php";

    date_default_timezone_set("Asia/Jakarta");
    //pengecekan tipe harus pdf
        $id_masuk = $_POST['id_masuk'];
        $tgl = date("Y-m-d");
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];                
        $nama = $_POST['nama'];        

        $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barang'");
        $data1 = mysqli_fetch_array($stokawal);

        $jmlstok = $data1['stok'];
        $stokakhir = $jmlstok + $jumlah;                

        $sql = "INSERT INTO brg_masuk (id_masuk, tgl, id_barang, jumlah, nama) 
        VALUES ('$id_masuk', '$tgl', '$id_barang', '$jumlah', '$nama')";
        mysqli_query($con,$sql); //simpan data judul dahulu untuk mendapatkan id

        $updatestok = "UPDATE barang SET stok = '$stokakhir' WHERE id_barang = '$id_barang'";
        mysqli_query($con, $updatestok);

        header('location:masuk.php');    
?>