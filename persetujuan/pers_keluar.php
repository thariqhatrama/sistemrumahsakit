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

    <title>Persetujuan Barang Keluar - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Persetujuan Barang Keluar</h1>     
                    
                    <?php
                    $i = 1;
                    $status2 = "Belum di setujui";
                    $keluar2 = mysqli_query($con, "SELECT brg_keluar.*, barang.* FROM brg_keluar 
                    INNER JOIN barang ON barang.id_barang=brg_keluar.id_barang
                    WHERE status='$status2' ORDER BY id_keluar ASC");
                    while ($data2 = mysqli_fetch_array($keluar2)){
                    ?>
                    <!-- Collapsable Card Example -->
                    <div class="card shadow border-info mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample<?=$i?>" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample<?-$i;?>">
                            <h6 class="m-0 font-weight-bold text-warning">Permohonan Barang <?php echo $data2['nama_barang'];?> Keluar</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCardExample<?=$i;?>">
                            <div class="card-body">
                                <strong>ID Keluar : </strong><?php echo $data2['id_keluar'];?><br>
                                <strong>Nama Barang : </strong><?php echo $data2['nama_barang'];?><br>
                                <strong>Jumlah Keluar : </strong><?php echo $data2['jumlah'];?><br>
                                <strong>Keterangan : </strong><?php echo $data2['keterangan'];?><br>
                                <strong>Penanggung Jawab : </strong><?php echo $data2['nama'];?><br>
                            </div>
                            <div class="card-footer">
                            <a href="#" class="btn btn-sm btn-danger btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#delete<?= $data2['id_keluar'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Tolak</span>
                            </a> 
                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#setuju<?= $data2['id_keluar'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Setuju</span>
                            </a>  												                            
                            </div>
                        </div>
                    </div>

                     <!-- EDIT keluar -->
                     <div class="modal fade" id="setuju<?= $data2['id_keluar'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Setujui Barang Keluar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form action="setuju_keluar.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menyetujui barang <?php echo $data2['id_keluar']." ".$data2['nama_barang']; ?> 
                                        keluar?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="setuju_keluar.php?id_keluar=<?=$data2['id_keluar'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE keluar -->
                    <div class="modal fade" id="delete<?= $data2['id_keluar'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tolak Barang keluar</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="tolak_keluar.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin tolak barang <?php echo $data2['id_keluar']." ".$data2['nama_barang']; ?> keluar?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="tolak_keluar.php?id_keluar=<?=$data2['id_keluar'];?>" type="button" name="submit" action="tolak_keluar.php" class="btn btn-primary float-right">Submit</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    }
                    ?>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Persetujuan Barang Keluar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Keluar</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Penanggung Jawab</th>                                                                                      
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                        $status = "Telah di setujui";
                                        $status1 = "Ditolak";
                                        $keluar = mysqli_query($con, "SELECT brg_keluar.*, barang.* FROM brg_keluar 
                                        INNER JOIN barang ON brg_keluar.id_barang=barang.id_barang
                                        WHERE status='$status' OR status='$status1'
                                        ORDER BY id_keluar ASC");
                                        while ($data = mysqli_fetch_array($keluar)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['id_keluar'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['jumlah'];?></td>
                                            <td style="white-space:pre-line"><?php echo $data['keterangan'];?></td>
                                            <td>
                                            <?php if($data['status'] == "Telah di setujui" ){?>
                                                <span class="badge badge-success"><?php echo $data['status']?></span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="badge badge-danger"><?php echo $data['status']?></span>
                                            <?php } 
                                            ?>
                                            </td>
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
<script>
 $(document).ready(function () {
  bsCustomFileInput.init()
})
</script>
</body>

</html>