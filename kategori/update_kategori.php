<?php
    include '../config.php';
    
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
        

    $ceknm = mysqli_query($con, "SELECT * FROM kategori WHERE nama_kategori = '$nama_kategori'");

    if(mysqli_num_rows($ceknm) > 0) { 
        echo '<script language="javascript">
              alert ("Nama kategori telah terdaftar");
              window.location="kategori.php";
              </script>';
    }else{
        $query = "UPDATE kategori SET id_kategori = '$id_kategori', nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
        mysqli_query($con, $query);
        
         header("location:kategori.php");
    }

?>