<?php
    include '../config.php';
    
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp']; 
        

    $ceknm = mysqli_query($con, "SELECT * FROM supplier WHERE nama_supplier = '$nama_supplier'");

    if(mysqli_num_rows($ceknm) > 1) { 
        echo '<script language="javascript">
              alert ("Nama supplier telah terdaftar");
              window.location="supplier.php";
              </script>';
    }else{
        $query = "UPDATE supplier SET id_supplier = '$id_supplier', nama_supplier = '$nama_supplier',
        alamat='$alamat', no_telp='$no_telp' WHERE id_supplier = '$id_supplier'";
        mysqli_query($con, $query);
        
         header("location:supplier.php");
    }

?>