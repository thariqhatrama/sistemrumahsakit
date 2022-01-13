<?php
    include '../config.php';
    
    $id_subkat = $_POST['id_subkat'];
    $id_kategori = $_POST['id_kategori'];
    $nama_subkat = $_POST['nama_subkat'];
        

    $ceknm = mysqli_query($con, "SELECT * FROM subkat WHERE nama_subkat = '$nama_subkat'");

    if(mysqli_num_rows($ceknm) > 0) { 
        echo '<script language="javascript">
              alert ("Nama Sub-Kategori telah terdaftar");
              window.location="subkat.php";
              </script>';
    }else{
        $query = "UPDATE subkat SET id_subkat = '$id_subkat', id_kategori='$id_kategori', nama_subkat = '$nama_subkat' WHERE id_subkat = '$id_subkat'";
        mysqli_query($con, $query);
        
         header("location:subkat.php");
    }

?>