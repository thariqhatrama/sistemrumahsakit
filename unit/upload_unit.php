<?php
    include '../config.php';
        
    $id_unit = $_POST['id_unit'];
    $nama_unit = $_POST['nama_unit'];


    $ceknm = mysqli_query($con, "SELECT * FROM unit WHERE nama_unit = '$nama_unit'");

    if(mysqli_num_rows($ceknm) > 0) {
        echo '<script language="javascript">
              alert ("Unit RS sudah terdaftar");
              window.location="unit.php";
              </script>';
        exit();
    }
    else{
    mysqli_query($con,"INSERT INTO unit (id_unit, nama_unit) 
    VALUES ('$id_unit','$nama_unit')")or die(mysqli_error($koneksi));
    
    echo '<script language="javascript">
              alert ("Unit RS Berhasil Terdaftar");
              window.location="unit.php";
              </script>';
    }

    

?>