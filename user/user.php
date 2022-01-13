<?php 
  include '../config.php';
  include '../functions.php';

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:../login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - RS Buah Hati</title>

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

<div id="wrapper">
  <!-- Navbar -->

  <!-- Sidebar -->
  <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="../index.php"
        >
          <div class="sidebar-brand-icon">
            <i class="fas fa-hospital-alt"></i>
          </div>
          <div class="sidebar-brand-text mx-2">RS Buah Hati</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="../index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />
              <?php if (isUnit()){ ?>          
              <!-- Heading -->
              <div class="sidebar-heading">Transactions</div>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="../pinjam/pinjam.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Peminjaman Barang</span></a
                >
              </li>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="../kembali/kembali.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Pengembalian Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="../perbaikan/perbaikan.php">
                  <i class="fas fa-tools"></i>
                  <span>Perbaikan Barang</span></a
                >
              </li>              
              <?php
              }
              ?>

              <?php if (isOperator()){ ?>
               <!-- Heading -->
              <div class="sidebar-heading">Masters</div>

              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#collapseTwo"
                  aria-expanded="true"
                  aria-controls="collapseTwo"
                >
                  <i class="fas fa-boxes"></i>
                  <span>Barang</span>
                </a>
                <div
                  id="collapseTwo"
                  class="collapse"
                  aria-labelledby="headingTwo"
                  data-parent="#accordionSidebar"
                >
                  <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Masters :</h6>
                    <a class="collapse-item" href="../kategori/kategori.php">Kategori</a>
                    <a class="collapse-item" href="../subkat/subkat.php">Sub-Kategori</a>
                    <a class="collapse-item" href="../barang/barang.php">Barang</a>
                    <a class="collapse-item" href="../tempat/tempat.php">Lokasi Barang</a>
                    <h6 class="collapse-header">Transactions :</h6>
                    <a class="collapse-item" href="../masuk/masuk.php">Barang Masuk</a>
                    <a class="collapse-item" href="../keluar/keluar.php">Barang Keluar</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../unit/unit.php">
                  <i class="fas fa-hospital"></i>
                  <span>Unit RS</span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../supplier/supplier.php">
                  <i class="fas fa-warehouse"></i>
                  <span>Supplier</span></a
                >
              </li>             

              <!-- Divider -->
              <hr class="sidebar-divider" />

              <!-- Heading -->
              <div class="sidebar-heading">Transactions</div>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="../pinjam/pinjam.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Peminjaman Barang</span></a
                >
              </li>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="../kembali/kembali.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Pengembalian Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="../perbaikan/perbaikan.php">
                  <i class="fas fa-tools"></i>
                  <span>Perbaikan Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="../penyerahan/penyerahan.php">
                  <i class="fas fa-hand-holding"></i>
                  <span>Penyerahan Barang</span></a
                >
              </li>
              <?php
              }
              ?>

              <?php if (isAdmin()){ ?>
            <!-- Heading -->
            <div class="sidebar-heading">Masters</div>
                    <li class="nav-item">
              <a class="nav-link" href="../user/user.php">
                <i class="fas fa-users-cog"></i>
                <span>Users</span></a
              >
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

                 <!-- Heading -->
              <div class="sidebar-heading">Transactions</div>
                <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseSetuju"
            aria-expanded="true"
            aria-controls="collapseSetuju"
          >
          <i class="fas fa-hands-helping"></i>
            <span>Persetujuan</span>
          </a>
          <div
            id="collapseSetuju"
            class="collapse"
            aria-labelledby="headingSetuju"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">                                          
              <a class="collapse-item" href="../persetujuan/pers_keluar.php">Barang Keluar</a>
              <a class="collapse-item" href="../persetujuan/pers_perbaikan.php">Perbaikan Barang</a>
              <a class="collapse-item" href="../persetujuan/pers_pinjam.php">Peminjaman Barang</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseReport"
            aria-expanded="true"
            aria-controls="collapseReport"
          >
            <i class="fas fa-paste"></i>
            <span>Laporan</span>
          </a>
          <div
            id="collapseReport"
            class="collapse"
            aria-labelledby="headingReport"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Transactions :</h6>
              <a class="collapse-item" href="../laporan/laporan_masuk.php"
                >Laporan Barang Masuk</a
              >
              <a class="collapse-item" href="../laporan/laporan_keluar.php"
                >Laporan Barang Keluar</a
              >
              <a class="collapse-item" href="../laporan/laporan_pinjam.php"
                >Laporan Peminjaman</a
              >
              <a class="collapse-item" href="../laporan/laporan_penyerahan.php"
                >Laporan Penyerahan</a
              >
              <a class="collapse-item" href="../laporan/laporan_perbaikan.php">Laporan Perbaikan</a>
            </div>
          </div>
        </li>
        <?php
        }
        ?>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->                
    
   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="
              navbar navbar-expand navbar-light
              bg-white
              topbar
              mb-4
              static-top
              shadow
            "
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >                
                <?php if(isset($_SESSION['user']['username'])) : ?>
                  <span class="mr-3 d-none d-lg-inline text-gray-600 small">
                    <?php echo $_SESSION['user']['username'];?></span>
                    <?php endif ?>  
                     
                  <img
                    class="img-profile rounded-circle"
                    src="../img/undraw_profile.svg"
                  />
                </a>
                <!-- Dropdown - User Information -->
                <div
                  class="
                    dropdown-menu dropdown-menu-right
                    shadow
                    animated--grow-in
                  "
                  aria-labelledby="userDropdown"
                >                  
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

 <!-- Begin Page Content -->
 <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data user</h1> 
      <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-user">
          <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah User</span>
      </a>                      
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User</h6>
          </div>
    <!-- /.content-header -->

    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID User</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Level</th>                                            
                                            <th style="width:20%;">Aksi</th>                                           
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
											$user = mysqli_query($con, "SELECT * FROM users");
											while ($data = mysqli_fetch_array($user)) {
											?>
                                        <tr>
                                            <td><?php echo $data['id_user'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php echo $data['level'];?></td>                                            
                                            <td>                                               
                                                <a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2" data-toggle="modal" data-target="#edit<?= $data['id_user'] ?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>  
                                                <a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_user'] ?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </td>                                            
                                        </tr>
                                        <!-- EDIT user -->
                                        <div class="modal fade" id="edit<?= $data['id_user'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit user</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_user.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="id_user">ID User</label>
                                                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $data['id_user']; ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Nama User</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $data['nama']; ?>" name="nama" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                <input type="text" class="form-control" id="username" value="<?php echo $data['username']; ?>" name="username" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="level">Level</label>
                                                                <select class="custom-select rounded-1" id="level" name="level" required>
                                                                    <option value="">Pilih Level User</option>
                                                                    <?php $kategori = mysqli_query($con, "SELECT * FROM users WHERE id_user='$data[id_user]' ORDER BY level ASC");
                                                                            while($result = mysqli_fetch_array($kategori)){ ?>
                                                                        <option value="<?php echo $data['level']; ?>"
                                                                        <?php  echo "selected";?>><?php echo $result['level'];?></option>
                                                                        <?php }
                                                                        ?>
                                                                </select>
                                                            </div>                                                                                                                            
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_user.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE user -->
                                        <div class="modal fade" id="delete<?= $data['id_user'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus User</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_user.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus User <?php echo $data['nama']; ?>?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_user.php?id_user=<?=$data['id_user'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
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
$query = mysqli_query($con, "SELECT max(id_user) as kodeTerbesar FROM users");
$data = mysqli_fetch_array($query);
$id_user = $data['kodeTerbesar'];

$urutan = (int) substr($id_user, 3, 4);

$urutan++;

$huruf = "ID";
$id_user = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah user Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-labelledby="tambah-userTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="user.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" class="form-control" id="user" placeholder="Masukkan Nama user" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="custom-select rounded-1" id="level" name="level" required>
                            <option value="">Pilih Level User</option>
                            <option value="Admin">Administrator</option>
                            <option value="Operator">Operator</option>
                            <option value="Unit">Staff Unit</option>
                        </select>
                    </div>                                               
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
                <button type="submit" name="register_btn" class="btn btn-primary">Save changes</button>                
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
</body>

</html>