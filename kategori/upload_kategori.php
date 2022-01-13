<?php
    include '../config.php';
        
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];


    $ceknm = mysqli_query($con, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");

    if(mysqli_num_rows($ceknm) > 0) {
        echo '<script language="javascript">
              alert ("kategori Barang sudah terdaftar");
              window.location="kategori.php";
              </script>';
        exit();
    }
    else{
    mysqli_query($con,"INSERT INTO kategori (id_kategori, nama_kategori) 
    VALUES ('$id_kategori','$nama_kategori')")or die(mysqli_error($koneksi));
    
    echo '<script language="javascript">
              alert ("Kategori Barang Berhasil Terdaftar");
              window.location="kategori.php";
              </script>';
    }

    

?>