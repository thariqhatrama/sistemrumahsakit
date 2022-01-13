<?php
    include '../config.php';
        
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];    


    $ceknm = mysqli_query($con, "SELECT * FROM supplier WHERE nama_supplier = '$nama_supplier'");

    if(mysqli_num_rows($ceknm) > 0) {
        echo '<script language="javascript">
              alert ("Supplier sudah terdaftar");
              window.location="supplier.php";
              </script>';
        exit();
    }
    else{
    mysqli_query($con,"INSERT INTO supplier (id_supplier, nama_supplier, alamat, no_telp) 
    VALUES ('$id_supplier','$nama_supplier', '$alamat', '$no_telp')")or die(mysqli_error($koneksi));
    
    echo '<script language="javascript">
              alert ("Supplier Berhasil Terdaftar");
              window.location="supplier.php";
              </script>';
    }

    

?>