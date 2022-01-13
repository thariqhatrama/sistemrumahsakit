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

    <title>Penyerahan Barang - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Penyerahan Barang</h1> 
                    <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-penyerahan">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Penyerahan Barang</span>
                    </a>                      
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Penyerahan Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Penyerahan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Nama Penerima</th>
                                            <th>Unit Penerima</th>
                                            <th>Penanggung Jawab</th>
                                            <th style="width:20%;">Aksi</th>                                           
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php                                                                             
                                        $penyerahan = mysqli_query($con, "SELECT penyerahan.*, barang.*, unit.* FROM penyerahan 
                                        INNER JOIN barang ON barang.id_barang=penyerahan.id_barang                                        
                                        INNER JOIN unit ON penyerahan.id_unit=unit.id_unit");
                                        while ($data = mysqli_fetch_array($penyerahan)) {
                                        ?>
                                    <tr>
                                            <td><?php echo $data['id_penyerahan'];?></td>
                                            <td><?php echo $data['tgl_penyerahan'];?></td>
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['jumlah'];?></td>
                                            <td><?php echo $data['nma_penerima'];?></td>
                                            <td><?php echo $data['nama_unit'];?></td>                                            
                                            <td><?php echo $data['nama'];?></td>
                                            <td>				                                            
											<a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2" data-toggle="modal" data-target="#edit<?= $data['id_penyerahan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Edit</span>
											</a>  												
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_penyerahan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>                                            
                                            </td>                                            
                                        </tr>										

                                        <!-- EDIT penyerahan -->
                                        <div class="modal fade" id="edit<?= $data['id_penyerahan'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Barang penyerahan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_penyerahan.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">
															<div class="form-group">
																<label for="id_penyerahan">ID Penyerahan</label>
																<input type="text" class="form-control" id="id_penyerahan" name="id_penyerahan" value="<?php echo $data['id_penyerahan']; ?>" readonly>
															</div>
															<div class="form-group">
																<label for="tgl">Tanggal Penyerahan</label>
																<input type="text" class="form-control" id="tgl" value="<?php echo $data['tgl_penyerahan'];?>" name="tgl" readonly>
															</div>
															<div class="form-group">
																<label for="id_barang">Nama Barang</label>
																<select class="custom-select rounded-1" id="id_barang" name="id_barang" readonly>
																	<option value="">Pilih Barang Penyerahan</option>
																	<?php $barang = mysqli_query($con, "SELECT penyerahan.*, barang.* FROM penyerahan
                                                                    INNER JOIN barang ON penyerahan.id_barang=barang.id_barang WHERE id_penyerahan='$data[id_penyerahan]'");
																		while($result2 = mysqli_fetch_array($barang)){ ?>
																	<option value="<?php echo $result2['id_barang']; ?>" 
																	<?php echo "selected";?>><?php echo $result2['nama_barang'];?></option>
																	<?php }
																	?>																	 
																</select>
															</div>                    
															<div class="form-group">
																<label for="jumlah">Jumlah Penyerahan</label>
																<input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" value="<?php echo $data['jumlah'];?>" required>                
															</div>
                                                            <div class="form-group">
																<label for="nma_penerima">Nama Penerima</label>
																<input type="text" class="form-control" id="nma_penerima" name="nma_penerima" style="white-space:pre-line" value="<?php echo $data['nma_penerima'];?>" required></input>
															</div>
                                                            <div class="form-group">
																<label for="div_penerima">Unit Penerima</label>
																<select class="custom-select rounded-1" id="div_penerima" name="div_penerima" readonly>
																	<option value="">Pilih Unit Penerima</option>
																	<?php $unit = mysqli_query($con, "SELECT penyerahan.*, unit.* FROM penyerahan
                                                                    INNER JOIN unit ON penyerahan.id_unit=unit.id_unit WHERE id_penyerahan='$data[id_penyerahan]'");
																		while($result2 = mysqli_fetch_array($unit)){ ?>
																	<option value="<?php echo $result2['id_unit']; ?>" 
																	<?php echo "selected";?>><?php echo $result2['nama_unit'];?></option>
																	<?php }
																	?>																	 
																</select>
															</div>                    
															<div class="form-group">
																<label for="nama">Penanggung Jawab</label>
																<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'];?>" readonly>                
															</div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_penyerahan.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE penyerahan -->
                                        <div class="modal fade" id="delete<?= $data['id_penyerahan'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus penyerahan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_penyerahan.php?id_penyerahan=<?=$data['id_penyerahan'];?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?php echo $data['id_penyerahan']." ".$data['nama_barang']; ?> dari barang penyerahan?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_penyerahan.php?id_penyerahan=<?=$data['id_penyerahan'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
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
$query = mysqli_query($con, "SELECT max(id_penyerahan) as kodeTerbesar FROM penyerahan");
$data = mysqli_fetch_array($query);
$id_penyerahan = $data['kodeTerbesar'];

$urutan = (int) substr($id_penyerahan, 4, 4);

$urutan++;

$huruf = "PEN";
$id_penyerahan = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah penyerahan Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-penyerahan" tabindex="-1" role="dialog" aria-labelledby="tambah-penyerahanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Penyerahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="upload_penyerahan.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_penyerahan">ID Penyerahan</label>
                        <input type="text" class="form-control" id="id_penyerahan" name="id_penyerahan" value="<?php echo $id_penyerahan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Penyerahan</label>
                        <input type="text" class="form-control" id="tgl" value="<?php echo date("d-m-Y");?>" name="tgl" readonly>
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
                            <option value="">Pilih Barang Penyerahan</option>
                            <?php $barang = mysqli_query($con, "SELECT * FROM barang ORDER BY id_barang ASC");
                                while($result2 = mysqli_fetch_array($barang)){ ?>
                            <option value="<?php echo $result2['id_barang']; ?>"><?php echo $result2['nama_barang'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="jumlah">Jumlah Penyerahan</label>
                        <input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" placeholder="Masukkan Jumlah Penyerahan" required>                
                    </div>
                    <div class="form-group">
                        <label for="nma_penerima">Nama Penerima</label>
                        <input type="text" class="form-control" id="nma_penerima" name="nma_penerima" placeholder="Masukkan Nama Penerima"></input>
                    </div>                
                    <div class="form-group">
                        <label for="id_unit">Unit Penerima</label>
                        <select class="custom-select rounded-1" id="id_unit" name="id_unit" required>
                            <option value="">Pilih Unit Penerima</option>
                            <?php $unit = mysqli_query($con, "SELECT * FROM unit ORDER BY id_unit ASC");
                                while($result2 = mysqli_fetch_array($unit)){ ?>
                            <option value="<?php echo $result2['id_unit']; ?>"><?php echo $result2['nama_unit'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>                               
					<div class="form-group">
                        <label for="nama">Penanggung Jawab</label>
                        <?php if(isset($_SESSION['user']['nama'])) : ?>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['user']['nama'];?>" readonly>                
                        <?php endif ?>
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