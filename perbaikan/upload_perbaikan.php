<?php
    include "../config.php";

    date_default_timezone_set("Asia/Jakarta");
    //pengecekan tipe harus pdf
    $tipe_file = $_FILES['file']['type']; //mendapatkan mime type
    if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
    {  
        $id_perbaikan = $_POST['id_perbaikan'];        
        $id_barang = $_POST['id_barang'];        
        $jumlah = $_POST['jumlah'];      
        $tgl = date("Y-m-d");          
        $status = "Belum di setujui";
        $pemohon = $_POST['pemohon'];
        $id_unit = $_POST['id_unit'];        
        $file = trim($_FILES['file']['name']);              

        $sql = "INSERT INTO perbaikan (id_perbaikan, id_barang, jumlah, tgl, file, status, pemohon, id_unit) 
        VALUES ('$id_perbaikan', '$id_barang', '$jumlah', '$tgl', NULL, '$status','$pemohon', '$id_unit')";
        mysqli_query($con,$sql); //simpan data judul dahulu untuk mendapatkan id

        //dapatkan id terkahir
        $query = mysqli_query($con,"SELECT id_perbaikan FROM perbaikan ORDER BY id_perbaikan DESC LIMIT 1");
        $data  = mysqli_fetch_array($query);

        $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload
        $folder    = "file"; //folder tujuan

        $nama_baru = $file;
        move_uploaded_file($file_temp, "file/" . $nama_baru);

        //fungsi upload
        //update nama file di database
        mysqli_query($con,"UPDATE perbaikan SET file='$nama_baru' WHERE 
        id_perbaikan='$data[id_perbaikan]' ");

        header('location:perbaikan.php');
    } else {
?>
<script>
    alert('Gagal Upload, Tipe File tidak Support!');
    window.location.href='perbaikan.php?fail';
</script>
<?php
    }
?>