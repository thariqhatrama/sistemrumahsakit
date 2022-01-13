<?php
      // con ke mysql 
      include "../config.php";      
      
      //pengecekan tipe harus pdf
      $tipe_file = $_FILES['file']['type']; //mendapatkan mime type
      if ($tipe_file == "application/pdf") //mengecek apakah file tersebut pdf atau bukan
      {            
          // membaca ID file yang akan diedit
            $id_perbaikan=$_POST['id_perbaikan'];
            $id_barang=$_POST['id_barang'];
            $jumlah=$_POST['jumlah'];      
            $pemohon=$_POST['pemohon'];
            $id_unit=$_POST['id_unit'];
            $file = trim($_FILES['file']['name']);

            //dapatkan id terkahir
            $query = mysqli_query($con,"SELECT id_perbaikan FROM perbaikan WHERE id_perbaikan='$id_perbaikan");
            $data  = mysqli_fetch_array($query);
            
            //mengganti nama pdf
            $file_temp = $_FILES['file']['tmp_name']; //data temp yang di upload
            $folder    = "file"; //folder tujuan
            
            $nama_baru = $file;
            move_uploaded_file($file_temp, "file/" . $nama_baru);//fungsi upload
            
            //update nama file di database
            $query="UPDATE perbaikan SET jumlah='$jumlah', pemohon='$pemohon', id_unit='$id_unit', file='$nama_baru' WHERE 
            id_perbaikan='$id_perbaikan' ";
      }
      
      // jalankan query update          
      $hasil = mysqli_query($con,$query);
      if ($hasil){ 
?> 
<script>
      alert('Perbaikan berhasil di Update!');
      window.location.href='perbaikan.php?berhasil';
</script>
<?php
      } else{ 
?>
<script>
      alert('Gagal Update Perbaikan!');
      window.location.href='perbaikan.php?fail';
</script>
<?php
      }
?>