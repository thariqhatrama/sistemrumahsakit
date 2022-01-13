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

    <title>Masuk - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Barang Masuk</h1> 
                    <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-masuk">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Barang Masuk</span>
                    </a>                      
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Barang Masuk</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Masuk</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>                                            
                                            <th>Penanggung Jawab</th>
                                            <th style="width:20%;">Aksi</th>                                           
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
											$masuk = mysqli_query($con, "SELECT brg_masuk.*, barang.* FROM brg_masuk 
                                            INNER JOIN barang ON barang.id_barang=brg_masuk.id_barang");
											while ($data = mysqli_fetch_array($masuk)) {
											?>
                                        <tr>
                                            <td><?php echo $data['id_masuk'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['jumlah'];?></td>                                            
                                            <td><?php echo $data['nama'];?></td>
                                            <td>											
											<a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2" data-toggle="modal" data-target="#edit<?= $data['id_masuk'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Edit</span>
											</a>  												
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_masuk'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
                                            </td>                                            
                                        </tr>

                                        <!-- EDIT masuk -->
                                        <div class="modal fade" id="edit<?= $data['id_masuk'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Masuk</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_masuk.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">
															<div class="form-group">
																<label for="id_masuk">ID Masuk</label>
																<input type="text" class="form-control" id="id_masuk" name="id_masuk" value="<?php echo $data['id_masuk']; ?>" readonly>
															</div>
															<div class="form-group">
																<label for="tgl">Tanggal Masuk</label>
																<input type="text" class="form-control" id="tgl" value="<?php echo $data['tgl'];?>" name="tgl" readonly>
															</div>
															<div class="form-group">
																<label for="id_barang">Nama Barang</label>
																<select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
																	<option value="">Pilih Barang Masuk</option>
																	<?php $barang = mysqli_query($con, "SELECT brg_masuk.*, barang.* FROM brg_masuk
                                                                    INNER JOIN barang ON brg_masuk.id_barang=barang.id_barang WHERE id_masuk='$data[id_masuk]'");
																		while($result2 = mysqli_fetch_array($barang)){ ?>
																	<option value="<?php echo $result2['id_barang']; ?>" 
																	<?php echo "selected";?>><?php echo $result2['nama_barang'];?></option>
																	<?php }
																	?>																	 
																</select>
															</div>                    
															<div class="form-group">
																<label for="jumlah">Jumlah Masuk</label>
																<input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" value="<?php echo $data['jumlah'];?>" required>                
															</div>															
															<div class="form-group">
																<label for="nama">Nama User</label>
																<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'];?>" readonly>                
															</div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_masuk.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE masuk -->
                                        <div class="modal fade" id="delete<?= $data['id_masuk'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus masuk</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_masuk.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?php echo $data['id_masuk']." ".$data['nama_barang']; ?> dari barang masuk?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_masuk.php?id_masuk=<?=$data['id_masuk'];?>" type="button" name="submit" action="hapus_masuk.php" class="btn btn-primary float-right">Submit</a>
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
$query = mysqli_query($con, "SELECT max(id_masuk) as kodeTerbesar FROM brg_masuk");
$data = mysqli_fetch_array($query);
$id_masuk = $data['kodeTerbesar'];

$urutan = (int) substr($id_masuk, 4, 4);

$urutan++;

$huruf = "MAS";
$id_masuk = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah masuk Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-masuk" tabindex="-1" role="dialog" aria-labelledby="tambah-masukTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="upload_masuk.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_masuk">ID masuk</label>
                        <input type="text" class="form-control" id="id_masuk" name="id_masuk" value="<?php echo $id_masuk; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Masuk</label>
                        <input type="text" class="form-control" id="tgl" value="<?php echo date("d-m-Y");?>" name="tgl" readonly>
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
                            <option value="">Pilih Barang Masuk</option>
                            <?php $barang = mysqli_query($con, "SELECT * FROM barang ORDER BY id_barang ASC");
                                while($result2 = mysqli_fetch_array($barang)){ ?>
                            <option value="<?php echo $result2['id_barang']; ?>"><?php echo $result2['nama_barang'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label for="jumlah">Jumlah Masuk</label>
                        <input type="number" class="form-control" id="jumlah"  min="0" name="jumlah" placeholder="Masukkan Jumlah Masuk" required>                
                    </div>                    
					<div class="form-group">
                        <label for="nama">Penanggung Jawab</label>
                        <?php  if (isset($_SESSION['user']['nama'])) : ?>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?=$_SESSION['user']['nama'];?>" readonly>
                          <?php 
                          endif                           
                          ?>                       
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