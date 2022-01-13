<?php 
  include 'config.php';
  include ('functions.php');
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

  <!-- Main Sidebar Container -->
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
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

