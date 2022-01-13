<?php
    include '../config.php';
        
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $id_subkat = $_POST['id_subkat'];        
    $stok = 0;


    $ceknm = mysqli_query($con, "SELECT * FROM barang WHERE nama_barang = '$nama_barang'");

    if(mysqli_num_rows($ceknm) > 0) {
        echo '<script language="javascript">
              alert ("barang sudah terdaftar");
              window.location="barang.php";
              </script>';
        exit();
    }
    else{
    mysqli_query($con,"INSERT INTO barang (id_barang, id_subkat, nama_barang, stok) 
    VALUES ('$id_barang', '$id_subkat', '$nama_barang', '$stok')")or die(mysqli_error($con));
    
    echo '<script language="javascript">
              alert ("barang Berhasil Terdaftar");
              window.location="barang.php";
              </script>';
    }

    

?>