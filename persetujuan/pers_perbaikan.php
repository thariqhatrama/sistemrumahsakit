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

    <title>Persetujuan Perbaikan Barang - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Persetujuan Perbaikan Barang</h1>     
                    
                    <?php
                    $i = 1;
                    $status2 = "Belum di setujui";
                    $perbaikan2 = mysqli_query($con, "SELECT perbaikan.*, barang.*, unit.* FROM perbaikan 
                    INNER JOIN barang ON barang.id_barang=perbaikan.id_barang                    
                    INNER JOIN unit ON perbaikan.id_unit=unit.id_unit
                    WHERE status='$status2' ORDER BY id_perbaikan ASC");
                    while ($data2 = mysqli_fetch_array($perbaikan2)){
                    ?>
                    <!-- Collapsable Card Example -->
                    <div class="card shadow border-info mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample<?=$i?>" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample<?-$i;?>">
                            <h6 class="m-0 font-weight-bold text-warning">Permohonan Perbaikan 
                                Barang <?php echo $data2['nama_barang'];?></h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapseCardExample<?=$i;?>">
                            <div class="card-body">
                                <strong>ID Perbaikan : </strong> <?php echo $data2['id_perbaikan'];?><br>                                                            
                                <strong>Tanggal Permohonan : </strong> <?php echo $data2['tgl_perbaikan'];?><br>
                                <strong>Nama Pemohon : </strong> <?php echo $data2['pemohon'];?><br>
                                <strong>Unit Pemohon : </strong> <?php echo $data2['nama_unit'];?><br>
                                <strong>Nama Barang : </strong> <?php echo $data2['nama_barang'];?><br>
                                <strong>Jumlah Perbaikan : </strong> <?php echo $data2['jumlah'];?><br>
                                <strong>Tanggal Perbaikan : </strong> <?php echo $data2['tgl'];?><br>                                                            
                                <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data2['status'];?></span><br>                                
                                <strong>Surat Permohonan : </strong> <?php echo $data2['file'];?><br>
                                <center>
                                <embed src="../perbaikan/file/<?=$data2['file'];?>" width="600" height="500">
                                </center>
                            </div>
                            <div class="card-footer">
                            <a href="#" class="btn btn-sm btn-danger btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#delete<?= $data2['id_perbaikan'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Tolak</span>
                            </a> 
                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-3 float-right" data-toggle="modal" data-target="#setuju<?= $data2['id_perbaikan'] ?>">
                                <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Setuju</span>
                            </a>  												                            
                            </div>
                        </div>
                    </div>

                     <!-- EDIT perbaikan -->
                     <div class="modal fade" id="setuju<?= $data2['id_perbaikan'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Setujui Perbaikan Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form action="setuju_perbaikan.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menyetujui perbaikan barang <?php echo $data2['id_perbaikan']." ".$data2['nama_barang']; ?>?                                        
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="setuju_perbaikan.php?id_perbaikan=<?=$data2['id_perbaikan'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE perbaikan -->
                    <div class="modal fade" id="delete<?= $data2['id_perbaikan'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tolak Perbaikan Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="tolak_perbaikan.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin tolak perbaikan barang <?php echo $data2['id_perbaikan']." ".$data2['nama_barang']; ?>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                        <a href="tolak_perbaikan.php?id_perbaikan=<?=$data2['id_perbaikan'];?>" type="button" name="submit" action="tolak_perbaikan.php" class="btn btn-primary float-right">Submit</a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Persetujuan Perbaikan Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Perbaikan</th>
                                            <th>Tanggal Perbaikan</th>
                                            <th>Nama Barang</th>
                                            <th>Status</th>
                                            <th>Pemohon</th>
                                            <th>Nama Unit</th>                                            
                                            <th style="width:20%;">Aksi</th>                                                                                  
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                        $status1 = "Ditolak";
                                        $status2 = "Telah di setujui";    
                                        $status3 = "Selesai";                             
                                        $perbaikan1 = mysqli_query($con, "SELECT perbaikan.*, barang.*, unit.* FROM perbaikan 
                                        INNER JOIN barang ON barang.id_barang=perbaikan.id_barang
                                        INNER JOIN unit ON perbaikan.id_unit=unit.id_unit                                        
                                        WHERE status='$status1' OR status='$status2' OR status='$status3' ORDER BY id_perbaikan DESC");
                                        while ($data1 = mysqli_fetch_array($perbaikan1)){
                                        ?>
                                        <tr>
                                        <td><?php echo $data1['id_perbaikan'];?></td>
                                            <td><?php echo $data1['tgl'];?></td>
                                            <td><?php echo $data1['nama_barang'];?></td>                                                                                        
                                            <td>
                                            <?php if($data1['status'] == "Telah di setujui" ){?>
                                                <span class="badge badge-success"><?php echo $data1['status']?></span>
                                                <?php }else if($data1['status'] == "Selesai" ){?>
                                                <span class="badge badge-info"><?php echo $data1['status']?></span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="badge badge-danger"><?php echo $data1['status']?></span>
                                            <?php } 
                                            ?>
                                            </td>
                                            <td><?php echo $data1['pemohon'];?></td>
                                            <td><?php echo $data1['nama_unit'];?></td>                                            
                                            <td>
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data1['id_perbaikan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>
                                            </td>						                                             
                                        </tr>	

                                        
                                        <!-- DETAIL perbaikan -->
                                        <div class="modal fade" id="detail<?= $data1['id_perbaikan'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail Perbaikan <?php echo $data1['id_perbaikan'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
															<strong>ID Perbaikan : </strong> <?php echo $data1['id_perbaikan'];?><br>                                                            
                                                            <strong>Tanggal Permohonan : </strong> <?php echo $data1['tgl_perbaikan'];?><br>
                                                            <strong>Nama Pemohon : </strong> <?php echo $data1['pemohon'];?><br>
                                                            <strong>Unit Pemohon : </strong> <?php echo $data1['nama_unit'];?><br>
                                                            <strong>Nama Barang : </strong> <?php echo $data1['nama_barang'];?><br>
                                                            <strong>Jumlah Perbaikan : </strong> <?php echo $data1['jumlah'];?><br>
                                                            <strong>Tanggal Perbaikan : </strong> <?php echo $data1['tgl'];?><br>                                                            
                                                            <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data1['status'];?></span><br>                                                            
                                                            <strong>Surat Permohonan : </strong> <?php echo $data1['file'];?><br>
                                                            <center>
                                                            <embed src="../perbaikan/file/<?=$data1['file'];?>" width="600" height="500">
                                                            </center>
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