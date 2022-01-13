<?php
    include '../config.php';
    
    $id_unit = $_POST['id_unit'];
    $nama_unit = $_POST['nama_unit'];
        

    $ceknm = mysqli_query($con, "SELECT * FROM unit WHERE nama_unit = '$nama_unit'");

    if(mysqli_num_rows($ceknm) > 0) { 
        echo '<script language="javascript">
              alert ("Nama Unit telah terdaftar");
              window.location="unit.php";
              </script>';
    }else{
        $query = "UPDATE unit SET id_unit = '$id_unit', nama_unit = '$nama_unit' WHERE id_unit = '$id_unit'";
        mysqli_query($con, $query);
        
         header("location:unit.php");
    }

?>