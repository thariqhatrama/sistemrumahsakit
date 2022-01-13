<?php
    include "../navbar.php";
    include "../config.php";
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location:../login.php');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Barang Masuk - RS Buah Hati</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">    

    <!-- File Input -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">                    
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Laporan Barang Masuk</h1>   
                    <div class="row my-3">
                            <div class="col">             
                                <form method="POST" class="form-inline">                 
                                    <input type="date" name="tgl_mulai" class="form-control">
                                    <input type="date" name="tgl_selesai" class="form-control ml-3">
                                    <button type="submit" name="filter" class="btn btn-success ml-3">Submit</button>
                                </form>
                            </div>
                        </div>                                     
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Barang Masuk</h6>
                        </div>
                        <div class="card-body">                       
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Masuk</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>                                            
                                            <th>Penanggung Jawab</th>                                           
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                    if(isset($_POST['filter'])){
                                        $mulai =$_POST['tgl_mulai'];
                                        $selesai = $_POST['tgl_selesai'];

											$masuk = mysqli_query($con, "SELECT brg_masuk.id_masuk, brg_masuk.tgl,
                                            brg_masuk.id_barang, SUM(brg_masuk.jumlah) AS jumlah, brg_masuk.nama, 
                                            barang.* FROM brg_masuk 
                                            INNER JOIN barang ON barang.id_barang=brg_masuk.id_barang                                            
                                            WHERE DATE(brg_masuk.tgl) BETWEEN '$mulai' AND '$selesai'
                                            GROUP BY brg_masuk.tgl, brg_masuk.id_barang");

                                            }else{
                                            
                                            $masuk = mysqli_query($con, "SELECT brg_masuk.id_masuk, brg_masuk.tgl,
                                            brg_masuk.id_barang, SUM(brg_masuk.jumlah) AS jumlah, brg_masuk.nama, 
                                            barang.* FROM brg_masuk 
                                            INNER JOIN barang ON barang.id_barang=brg_masuk.id_barang                                                                                        
                                            GROUP BY brg_masuk.tgl, brg_masuk.id_barang                                            
                                            ");
                                            }

											while ($data = mysqli_fetch_array($masuk)) {
											?>
                                        <tr>
                                            <td><?php echo $data['id_masuk'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['jumlah'];?></td>                                            
                                            <td><?php echo $data['nama'];?></td>                                                                                       
                                        </tr>                                        
                                        <?php
                                        }
                                        ?>                                      
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->                
            </div>
            <!-- End of Main Content -->           

        </div>
        <!-- End of Content Wrapper -->
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RS Buah Hati 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    </div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>   

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
 $(document).ready(function () {
  bsCustomFileInput.init()
})
</script>
<script>
  $(function () {
    var currentDate = new Date()
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()

    var d = day + "-" + month + "-" + year;
    $("#dataTables").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", 
                {
                extend: 'csv',                                
                title: function(){
                var printTitle = 'Laporan Barang Masuk ('+d+')';
                return printTitle }
                },  
                {
                extend: 'excel',
                title: function(){
                var printTitle = 'Laporan Barang Masuk ('+d+')';
                return printTitle }
                }, 
                {
                extend: 'pdf',
                title: function(){
                var printTitle = 'Laporan Barang Masuk ('+d+')';
                return printTitle }
                }, 
                {                
                extend: 'print',
                title: function(){
                var printTitle = 'Laporan Barang Masuk ('+d+')';
                return printTitle 
                    } 
                }]
    }).buttons().container().appendTo('#dataTables_wrapper .col-md-6:eq(0)');
  });
</script>
</body>

</html>