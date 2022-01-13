<?php
    include '../config.php';
    
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
        
    $ceknm = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($ceknm) > 0) { 
        echo '<script language="javascript">
              alert ("Username telah terdaftar");
              window.location="user.php";
              </script>';
    }else{
        $query = "UPDATE users SET id_user = '$id_user', nama = '$nama', password = '$password', level = '$level' WHERE id_user = '$id_user'";
        mysqli_query($con, $query);
        
         header("location:user.php");
    }

?>