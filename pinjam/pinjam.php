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

    <title>Peminjaman - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman Barang</h1> 
                    <?php if (isUnit()){ ?>
                    <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-pinjam">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Peminjaman Barang</span>
                    </a>                   
                    <?php
                    }
                    ?>   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Peminjaman Barang</h6>
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
                                        $status = "Belum di setujui";                                        
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
                                            <td>
                                                <?php if($data['status'] == "Belum di setujui" ){?>
                                                <span class="badge badge-warning"><?php echo $data['status']?></span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="badge badge-danger"><?php echo $data['status']?></span>
                                                <?php } 
                                                ?>
                                            </td>                                            
                                            <td>				
                                            <?php if($data['status'] == "Belum di setujui"){?>	
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>		
                                            <?php if (isUnit()){ ?>				                                             
											<a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#edit<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Edit</span>
											</a>  												
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            }else{
                                                echo "";
                                            }
                                            ?>

                                            <?php if($data['status'] == "Ditolak"){?>							                                             																						
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_pinjam'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
                                            <?php
                                            }else{
                                                echo "";
                                            }
                                            ?>
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

                                        <!-- EDIT pinjam -->
                                        <div class="modal fade" id="edit<?= $data['id_pinjam'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Barang pinjam</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_pinjam.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">
															<div class="form-group">
																<label for="id_pinjam">ID pinjam</label>
																<input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?php echo $data['id_pinjam']; ?>" readonly>
															</div>															
															<div class="form-group">
																<label for="id_barang">Nama Barang</label>
																<select class="custom-select rounded-1" id="id_barang" name="id_barang" readonly>
																	<option value="">Pilih Barang pinjam</option>
																	<?php $barang = mysqli_query($con, "SELECT peminjaman.*, barang.* FROM peminjaman
                                                                    INNER JOIN barang ON peminjaman.id_barang=barang.id_barang WHERE id_pinjam='$data[id_pinjam]'");
																		while($result2 = mysqli_fetch_array($barang)){ ?>
																	<option value="<?php echo $result2['id_barang']; ?>" 
																	<?php echo "selected";?>><?php echo $result2['nama_barang'];?></option>
																	<?php }
																	?>																	 
																</select>
															</div>                    														 
                                                            <div class="form-group">
                                                                <label for="nma_peminjam">Nama Peminjam</label>
                                                                <input type="text" class="form-control" id="nma_peminjam" value="<?php echo $data['nma_peminjam'];?>" name="nma_peminjam" readonly>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label for="id_unit">Unit Peminjam</label>
                                                                <select class="custom-select rounded-1" id="id_unit" name="id_unit" readonly>
																	<option value="">Pilih Unit Peminjam</option>
																	<?php $unit = mysqli_query($con, "SELECT peminjaman.*, unit.* FROM peminjaman
                                                                    INNER JOIN unit ON peminjaman.id_unit=unit.id_unit WHERE id_pinjam='$data[id_pinjam]'");
																		while($result2 = mysqli_fetch_array($unit)){ ?>
																	<option value="<?php echo $result2['id_unit']; ?>" 
																	<?php echo "selected";?>><?php echo $result2['nama_unit'];?></option>
																	<?php }
																	?>																	 
																</select>
                                                            </div>                 
                                                            <div class="form-group">
                                                                <label for="jumlah">Jumlah pinjam</label>
                                                                <input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" value="<?php echo $data['jumlah'];?>" required>                
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tgl">Tanggal pinjam</label>
                                                                <input type="text" class="form-control" id="tgl" value="<?php echo date("d-m-Y");?>" name="tgl" readonly>
                                                            </div>                                                                                               
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_pinjam.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE pinjam -->
                                        <div class="modal fade" id="delete<?= $data['id_pinjam'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus pinjam</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_pinjam.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data <?php echo $data['id_pinjam'];?> dari peminjaman?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_pinjam.php?id_pinjam=<?=$data['id_pinjam'];?>" type="button" name="submit" action="hapus_pinjam.php" class="btn btn-primary float-right">Submit</a>
                                                        </div>
                                                    </form>
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
                            <h6 class="m-0 font-weight-bold text-primary">Peminjaman Barang</h6>
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
                                            <th>Status</th>                                           
                                            <th style="width:20%;">Aksi</th>                                                                                 
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                    $status1 = "Ditolak";
                                    $status2 = "Telah di setujui";
                                    $status3 = "Telah di kembalikan";
                                    $pinjam2 = mysqli_query($con, "SELECT peminjaman.*, barang.*, unit.* FROM peminjaman 
                                    INNER JOIN barang ON peminjaman.id_barang=barang.id_barang
                                    INNER JOIN unit ON peminjaman.id_unit=unit.id_unit                                    
                                    WHERE status='$status1' OR status='$status2' OR status='$status3' ORDER BY id_pinjam DESC");
                                    while ($data2 = mysqli_fetch_array($pinjam2)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data2['id_pinjam'];?></td>
                                        <td><?php echo $data2['nma_peminjam'];?></td>
                                        <td><?php echo $data2['nama_unit'];?></td>
                                        <td><?php echo $data2['tgl_pinjam'];?></td>                                                                                
                                        <td>
                                            <?php if($data2['status'] == $status2){ ?>
                                                <span class='badge badge-success'><?php echo $data2['status'];?></span></td>
                                                <?php }else if($data2['status'] == $status3){ ?>
                                                    <span class='badge badge-info'><?php echo $data2['status'];?></span></td>
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
                                                        <h4 class="modal-title">Detail Peminjaman <?php echo $data2['id_pinjam'];?></h4>
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

<?php
$query = mysqli_query($con, "SELECT max(id_pinjam) as kodeTerbesar FROM peminjaman");
$data = mysqli_fetch_array($query);
$id_pinjam = $data['kodeTerbesar'];

$urutan = (int) substr($id_pinjam, 4, 4);

$urutan++;

$huruf = "PIN";
$id_pinjam = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah pinjam Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-pinjam" tabindex="-1" role="dialog" aria-labelledby="tambah-pinjamTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="upload_pinjam.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pinjam">ID pinjam</label>
                        <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?php echo $id_pinjam; ?>" readonly>
                    </div>                    
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
                            <option value="">Pilih Barang pinjam</option>
                            <?php $barang = mysqli_query($con, "SELECT * FROM barang ORDER BY id_barang ASC");
                                while($result2 = mysqli_fetch_array($barang)){ ?>
                            <option value="<?php echo $result2['id_barang']; ?>"><?php echo $result2['nama_barang'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="nma_peminjam">Nama Peminjam</label>
                        <?php if(isset($_SESSION['user']['nama'])) : ?>
                        <input type="text" class="form-control" id="nma_peminjam" value="<?php echo $_SESSION['user']['nama']?>" name="nma_peminjam" readonly>
                        <?php endif ?>
                    </div> 
                    <div class="form-group">
                        <label for="id_unit">Unit Peminjam</label>
                        <select class="custom-select rounded-1" id="id_unit" name="id_unit" required>
                            <option value="">Pilih Unit Peminjam</option>
                            <?php $unit = mysqli_query($con, "SELECT * FROM unit ORDER BY id_unit ASC");
                                while($result2 = mysqli_fetch_array($unit)){ ?>
                            <option value="<?php echo $result2['id_unit']; ?>"><?php echo $result2['nama_unit'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>                 
                    <div class="form-group">
                        <label for="jumlah">Jumlah pinjam</label>
                        <input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" placeholder="Masukkan Jumlah pinjam" required>                
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal pinjam</label>
                        <input type="text" class="form-control" id="tgl" value="<?php echo date("d-m-Y");?>" name="tgl" readonly>
                    </div>                                   					
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>                
            </div>
            </form>
        </div>
    </div>
</div>

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