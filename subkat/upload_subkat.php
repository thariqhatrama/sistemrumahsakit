<?php
    include '../config.php';
        
    $id_subkat = $_POST['id_subkat'];
    $id_kategori = $_POST['id_kategori'];
    $nama_subkat = $_POST['nama_subkat'];


    $ceknm = mysqli_query($con, "SELECT * FROM subkat WHERE nama_subkat = '$nama_subkat'");

    if(mysqli_num_rows($ceknm) > 0) {
        echo '<script language="javascript">
              alert ("subkat Barang sudah terdaftar");
              window.location="subkat.php";
              </script>';
        exit();
    }
    else{
    mysqli_query($con,"INSERT INTO subkat (id_subkat, id_kategori, nama_subkat) 
    VALUES ('$id_subkat', '$id_kategori','$nama_subkat')")or die(mysqli_error($koneksi));
    
    echo '<script language="javascript">
              alert ("Sub-Kategori Berhasil Terdaftar");
              window.location="subkat.php";
              </script>';
    }

    

?>