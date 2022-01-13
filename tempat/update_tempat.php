<?php
    include '../config.php';
    
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
        

    $ceknm = mysqli_query($con, "SELECT * FROM barang WHERE nama_barang = '$nama_barang'");

    if(mysqli_num_rows($ceknm) > 1) { 
        echo '<script language="javascript">
            alert ("Nama barang telah terdaftar");
            window.location="barang.php";
            </script>';
    }else{
        $query = "UPDATE barang SET id_barang = '$id_barang', nama_barang = '$nama_barang' WHERE id_barang = '$id_barang'";
        mysqli_query($con, $query);
        
        header("location:barang.php");
    }
?>