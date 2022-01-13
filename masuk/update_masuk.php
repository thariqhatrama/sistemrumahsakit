<?php
      // con ke mysql 
      include "../config.php";            
      
      //pengecekan tipe harus pdf     
            $id_masuk = $_POST['id_masuk'];
            $tgl = date("Y-m-d");
            $id_barang = $_POST['id_barang'];
            $jumlah = $_POST['jumlah'];                
            $nama = $_POST['nama'];
            
             // Cek stok saat ini 
            $stokawal = mysqli_query($con, "SELECT * FROM barang WHERE id_barang ='$id_barang'");
            $data1 = mysqli_fetch_array($stokawal);
            $jmlstok =  $data1['stok'];

            $cekstoksekarang = mysqli_query($con, "SELECT * FROM brg_masuk WHERE id_masuk = '$id_masuk'");
            $data2 = mysqli_fetch_array($cekstoksekarang);
            $stoksekarang = $data2['jumlah'];

            // UPDATE
            $selisih = $jumlah - $stoksekarang;
            $kurangi = $jmlstok + $selisih;
            $minstok = mysqli_query($con, "UPDATE barang SET stok = '$kurangi' WHERE id_barang = '$id_barang'");
            //update nama file di database
            $updatemasuk = mysqli_query($con, "UPDATE brg_masuk SET jumlah='$jumlah' WHERE 
            id_masuk='$id_masuk'");                                   

            header("location:masuk.php");
?> 