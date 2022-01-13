<?php
    // 1. Buat con
    $con = mysqli_connect("localhost", "root", "", "rsbuahhati");

    // Cek con
    if($con->connect_error){
        die("con Gagal");
    }

    $view = 'fungsi/view/view.php';
?>