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

    <title>Pengembalian - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Pengembalian Barang</h1>                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengembalian Barang</h6>
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
                                        $pinjam = mysqli_query($con, "SELECT peminjaman.*, barang.*, unit.* FROM peminjaman 
                                        INNER JOIN barang ON peminjaman.id_barang=barang.id_barang
                                        INNER JOIN unit ON peminjaman.id_unit=unit.id_unit                                        
                                        WHERE status='$status'");
                                        while ($data = mysqli_fetch_array($pinjam)) {
                                        ?>
                                    <tr>
                                            <td><?php echo $data['id_pinjam'];?></td>
                                            <td><?php echo $data['nma_peminjam'];?></td>
                                            <td><?php echo $data['nama_unit'];?></td>                                            
                                            <td><?php echo $data['tgl_pinjam'];?></td>
                                            <td><span class="badge badge-success"><?php echo $data['status']?></span></td>                                            
                                            <td>				
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>			
                                            <?php if(isOperator()){ ?>
											<a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#edit<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Pengembalian</span>
											</a>                      
                                            <?php } ?>                      
                                            </td>                                            
                                        </tr>					

                                        <!-- DETAIL pinjam -->
                                        <div class="modal fade" id="detail<?= $data['id_pinjam'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail pengembalian <?php echo $data['id_pinjam'];?></h4>
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

                                        <!-- EDIT pinjam -->
                                        <div class="modal fade" id="edit<?= $data['id_pinjam'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Pengembalian Barang <?php echo $data['id_pinjam'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
															Apakah anda yakin menyetujui pengembalian barang <strong><?php echo $data['nama_barang'];?></strong>
                                                            dengan jumlah <strong><?php echo $data['jumlah'];?> buah</strong> oleh <strong><?php echo $data['nma_peminjam'];?></strong> 
                                                            Unit <strong><?php echo $data['nama_unit'];?></strong> pada tanggal <strong><?php echo date('l, d-M-Y');?></strong>
                                                        </div>
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <form action="upload_kembali.php?id_pinjam=<?=$data['id_pinjam'];?>" method="POST" >
                                                                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                                                                </form>
                                                            </div>
                                                        </form>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengembalian Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pinjam</th>                                                                                        
                                            <th>Nama Peminjam</th>
                                            <th>Unit Peminjam</th>                                            
                                            <th>Tanggal Pinjam</th>    
                                            <th>Tanggal Kembali</th>                                                                                        
                                            <th>Status</th>                                            
                                            <th style="width:20%;">Aksi</th>                                                                                 
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php                                    
                                    $status2 = "Telah di kembalikan";
                                    $pinjam2 = mysqli_query($con, "SELECT peminjaman.*, barang.*, unit.* FROM peminjaman 
                                    INNER JOIN barang ON peminjaman.id_barang=barang.id_barang
                                    INNER JOIN unit ON peminjaman.id_unit=unit.id_unit
                                    WHERE status='$status2' ORDER BY id_pinjam DESC");
                                    while ($data2 = mysqli_fetch_array($pinjam2)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data2['id_pinjam'];?></td>
                                        <td><?php echo $data2['nma_peminjam'];?></td>
                                        <td><?php echo $data2['nama_unit'];?></td>
                                        <td><?php echo $data2['tgl_pinjam'];?></td>                                                                                
                                        <td><?php echo $data2['tgl_pengembalian'];?></td>   
                                        <td>
                                            <?php if($data2['status'] == $status2){ ?>
                                                <span class='badge badge-success'><?php echo $data2['status'];?></span></td>
                                                <?php }else{ ?>
                                                    <span class='badge badge-danger'><?php echo $data2['status'];?></span></td>
                                                <?php 
                                                }
                                                ?>                                        
                                        <td>				                                            
                                        <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2" data-toggle="modal" data-target="#detail<?= $data2['id_pinjam'] ?>">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </a>
                                        </td>                                                                                       
                                    </tr>	
                                    
                                    <!-- DETAIL pinjam -->
                                    <div class="modal fade" id="detail<?= $data2['id_pinjam'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail pengembalian <?php echo $data2['id_pinjam'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
															<strong>ID Pinjam : </strong> <?php echo $data2['id_pinjam'];?><br>                                                            
                                                            <strong>Nama Peminjam : </strong> <?php echo $data2['nma_peminjam'];?><br>
                                                            <strong>Unit Peminjam : </strong> <?php echo $data2['nama_unit'];?><br>
                                                            <strong>Nama Barang : </strong> <?php echo $data2['nama_barang'];?><br>
                                                            <strong>Jumlah Pinjam : </strong> <?php echo $data2['jumlah'];?><br>
                                                            <strong>Tanggal Pinjam : </strong> <?php echo $data2['tgl_pinjam'];?><br>
                                                            <strong>Tanggal Pengembalian : </strong> <?php echo $data2['tgl_pengembalian'];?><br>
                                                            <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data2['status'];?></span><br>                                                           
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