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

    <title>Barang - RS Buah Hati</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1> 
                    <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-barang">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Barang</span>
                    </a>                      
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Barang</th>
                                            <th>Sub-Kategori</th>
                                            <th>Nama Barang</th>                                                                                        
                                            <th>Stok</th>
                                            <th style="width:20%;">Aksi</th>                                           
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
											$barang = mysqli_query($con, "SELECT barang.*, subkat.* FROM barang 
                                            INNER JOIN subkat ON barang.id_subkat=subkat.id_subkat");
											while ($data = mysqli_fetch_array($barang)) {
											?>
                                        <tr>
                                            <td><?php echo $data['id_barang'];?></td>                                            
                                            <td><?php echo $data['nama_subkat'];?></td>                                            
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['stok'];?></td>
                                            <td>                                               
                                                <a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2" data-toggle="modal" data-target="#edit<?= $data['id_barang'] ?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>  
                                                <a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_barang'] ?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </td>                                            
                                        </tr>
                                        <!-- EDIT barang -->
                                        <div class="modal fade" id="edit<?= $data['id_barang'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_barang.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="id_barang">ID Barang</label>
                                                                    <input type="text" class="form-control mt-3" id="id_barang" name="id_barang" value="<?php echo $data['id_barang']; ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_barang">Nama Barang</label>
                                                                    <input type="text" class="form-control mt-3" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_subkat">Sub-Kategori Barang</label>
                                                                    <select class="custom-select rounded-1" id="id_subkat" name="id_subkat" required>
                                                                        <option value="">Pilih Sub-Kategori Barang</option>
                                                                        <?php $subkat = mysqli_query($con, "SELECT subkat.*, kategori.* FROM subkat 
                                                                        INNER JOIN kategori ON subkat.id_kategori=kategori.id_kategori WHERE id_subkat='$data[id_subkat]'");
                                                                            while($result = mysqli_fetch_array($subkat)){ ?>
                                                                        <option value="<?php echo $result['id_subkat']; ?>"
                                                                        <?php  echo "selected";?>><?php echo $result['nama_kategori']." | ".$result['nama_subkat'];?></option>
                                                                        <?php }
                                                                        ?>
                                                                    </select>
                                                                </div>                                                               
                                                                <div class="form-group">
                                                                    <label for="stok">Stok</label>
                                                                    <input type="number" class="form-control" id="stok" id="stok" name="stok" value="<?php echo $data['stok'];?>" readonly>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_barang.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE barang -->
                                        <div class="modal fade" id="delete<?= $data['id_barang'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_barang.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?php echo $data['nama_barang']; ?>?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_barang.php?id_barang=<?=$data['id_barang'];?>" type="button" name="submit" action="hapus_barang.php" class="btn btn-primary float-right">Submit</a>
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
        <!-- End of Content Wrapper -->

    </div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>   

<?php
$query = mysqli_query($con, "SELECT max(id_barang) as kodeTerbesar FROM barang");
$data = mysqli_fetch_array($query);
$id_barang = $data['kodeTerbesar'];

$urutan = (int) substr($id_barang, 4, 4);

$urutan++;

$huruf = "BRG";
$id_barang = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah Barang Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-barang" tabindex="-1" role="dialog" aria-labelledby="tambah-barangTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="upload_barang.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_barang">ID barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo $id_barang; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama barang</label>
                        <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan Nama barang" name="nama_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="id_subkat">Sub-Kategori Barang</label>
                        <select class="custom-select rounded-1" id="id_subkat" name="id_subkat" required>
                            <option value="">Pilih Sub-Kategori Barang</option>
                            <?php $subkat = mysqli_query($con, "SELECT subkat.*, kategori.* FROM subkat 
                            INNER JOIN kategori ON subkat.id_kategori=kategori.id_kategori ORDER BY id_subkat ASC");
                                while($result = mysqli_fetch_array($subkat)){ ?>
                            <option value="<?php echo $result['id_subkat']; ?>"><?php echo $result['nama_kategori']." | ".$result['nama_subkat'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>                       
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" id="stok" name="stok" placeholder="0" readonly>
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
$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    
});
</script>
</body>

</html>