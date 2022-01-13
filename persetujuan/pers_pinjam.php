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

    <title>Persetujuan Peminjaman - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Persetujuan Peminjaman</h1>     
                    
                    <?php
                    $i = 1;
                    $status2 = "Belum di setujui";
                    $pinjam2 = mysqli_query($con, "SELECT peminjaman.*, barang.*, unit.* FROM peminjaman 
                    INNER JOIN barang ON peminjaman.id_barang=barang.id_barang
                    INNER JOIN unit ON peminjaman.id_unit=unit.id_unit
                    WHERE status='$status2'");
                    while ($data2 = mysqli_fetch_array($pinjam2)){
                    ?>
                    <!-- Collapsable Card Example -->
                    <div class="card shadow border-info mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample<?=$i?>" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample<?-$i;?>">
                            <h6 class="m-0 font-weight-bold text-warning">Permohonan Peminjaman Barang <?php echo $data2['nama_barang'];?></h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCardExample<?=$i;?>">
                            <div class="card-body">                                            
                                <strong>ID pinjam : </strong><?php echo $data2['id_pinjam'];?><br>
                                <strong>Nama Peminjam : </strong><?php echo $data2['nma_peminjam'];?><br>
                                <strong>Unit Peminjam : </strong><?php echo $data2['nama_unit'];?><br>
                                <strong>Nama Barang : </strong><?php echo $data2['nama_barang'];?><br>
                                <strong>Jumlah Pinjam : </strong><?php echo $data2['jumlah'];?><br>                        
                                <strong>Tanggal Pinjam : </strong><?php echo $data2['tgl_pinjam'];?><br>                                
                            </div>
                            <div class="card-footer">
                            <a href="#" class="btn btn-sm btn-danger btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#delete<?= $data2['id_pinjam'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Tolak</span>
                            </a> 
                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#setuju<?= $data2['id_pinjam'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Setuju</span>
                            </a>  												                            
                            </div>
                        </div>
                    </div>

                     <!-- EDIT pinjam -->
                     <div class="modal fade" id="setuju<?= $data2['id_pinjam'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Setujui Peminjaman Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form action="setuju_pinjam.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menyetujui peminjaman barang <?php echo $data2['id_pinjam']." ".$data2['nama_barang']; ?>?                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="setuju_pinjam.php?id_pinjam=<?=$data2['id_pinjam'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE pinjam -->
                    <div class="modal fade" id="delete<?= $data2['id_pinjam'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tolak Peminjaman Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="tolak_pinjam.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin tolak peminjaman barang <?php echo $data2['id_pinjam']." ".$data2['nama_barang']; ?>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="tolak_pinjam.php?id_pinjam=<?=$data2['id_pinjam'];?>" type="button" name="submit" action="tolak_pinjam.php" class="btn btn-primary float-right">Submit</a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Persetujuan Peminjaman Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pinjam</th>                                                                                        
                                            <th>Nama Peminjam</th>
                                            <th>Unit Peminjam</th>                                            
                                            <th>Tanggal Pinjam</th>                                                                                        
                                            <th>Status</th>                                            
                                            <th style="width:20%;">Aksi</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                        $status = "Telah di setujui";   
                                        $status1 = "Ditolak";
                                        $status4 = "Telah di kembalikan";
                                        $pinjam = mysqli_query($con, "SELECT peminjaman.*, barang.*, unit.* FROM peminjaman 
                                        INNER JOIN barang ON peminjaman.id_barang=barang.id_barang
                                        INNER JOIN unit ON peminjaman.id_unit=unit.id_unit                                        
                                        WHERE status='$status' OR status='$status1' OR status='$status4' ORDER BY id_pinjam ASC");
                                        while ($data = mysqli_fetch_array($pinjam)) {
                                        ?>
                                    <tr>
                                            <td><?php echo $data['id_pinjam'];?></td>
                                            <td><?php echo $data['nma_peminjam'];?></td>
                                            <td><?php echo $data['nama_unit'];?></td>                                            
                                            <td><?php echo $data['tgl_pinjam'];?></td>
                                            <td>
                                                <?php if($data['status'] == "Telah di setujui" ){?>
                                                <span class="badge badge-success"><?php echo $data['status']?></span>
                                                <?php
                                                }else if($data['status'] == $status4){
                                                ?>
                                                <span class="badge badge-info"><?php echo $data['status']?></span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="badge badge-danger"><?php echo $data['status']?></span>
                                                <?php } 
                                                ?>
                                            </td>                                            
                                            <td>				                                            
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2" data-toggle="modal" data-target="#detail<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>
                                            </td>
                                            </tr>
                                             <!-- DETAIL pinjam -->
                                        <div class="modal fade" id="detail<?= $data['id_pinjam'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail Peminjaman <?php echo $data['id_pinjam'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
															<strong>ID Pinjam : </strong> <?php echo $data['id_pinjam'];?><br>                                                            
                                                            <strong>Nama Peminjam : </strong> <?php echo $data['nma_peminjam'];?><br>
                                                            <strong>Unit Peminjam : </strong> <?php echo $data['nama_unit'];?><br>
                                                            <strong>Nama Barang : </strong> <?php echo $data['nama_barang'];?><br>
                                                            <strong>Jumlah Pinjam : </strong> <?php echo $data['jumlah'];?><br>
                                                            <strong>Tanggal Pinjam : </strong> <?php echo $data['tgl_pinjam'];?><br>
                                                            <strong>Tanggal Pengembalian : </strong> <?php echo $data['tgl_pengembalian'];?><br>
                                                            <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data['status'];?></span><br>                                                            
                                                        </div>
													<!-- Modal footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                                                                                        
													</div>                                                    
                                                </div>
                                            </div>
                                        </div>	
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
            
            <!-- End of Footer -->

        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RS Buah Hati 2021</span>
                    </div>
                </div>
            </footer>
        <!-- End of Content Wrapper -->

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