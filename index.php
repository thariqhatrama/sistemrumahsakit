<?php 
  include 'config.php';
  include ('functions.php');
  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  $kueri = mysqli_query($con, "SELECT * FROM kategori");
  $data = array();
  while (($row = mysqli_fetch_array($kueri)) != null){
    $data[] = $row;
  }
    $jumlah = count($data);

    $subkat = mysqli_query($con, "SELECT * FROM subkat"); 
    $dt_subkat = array ();
    while (($row = mysqli_fetch_array($subkat)) != null){
    $dt_subkat[] = $row;
  }
    $jml_subkat = count ($dt_subkat);

    $barang = mysqli_query($con, "SELECT * FROM barang"); 
    $dt_barang = array ();
    while (($row = mysqli_fetch_array($barang)) != null){
    $dt_barang[] = $row;
  }
    $jml_barang = count ($dt_barang);

    $brg_masuk = mysqli_query($con, "SELECT * FROM brg_masuk"); 
    $dt_brg_masuk = array ();
    while (($row = mysqli_fetch_array($brg_masuk)) != null){
    $dt_brg_masuk[] = $row;
  }
    $jml_brg_masuk = count ($dt_brg_masuk);

    $keluar = mysqli_query($con, "SELECT * FROM brg_keluar WHERE status='Belum di setujui'"); 
    $dt_keluar = array ();
    while (($row = mysqli_fetch_array($keluar)) != null){
    $dt_keluar[] = $row;
  }
    $jml_keluar = count ($dt_keluar);

    $blm_pinjam = mysqli_query($con, "SELECT * FROM peminjaman WHERE status='Belum di setujui'"); 
    $dt_blm_pinjam = array ();
    while (($row = mysqli_fetch_array($blm_pinjam)) != null){
    $dt_blm_pinjam[] = $row;
  }
    $jml_blm_pinjam = count ($dt_blm_pinjam);

    $pinjam = mysqli_query($con, "SELECT * FROM peminjaman WHERE status='Telah di setujui'"); 
    $dt_pinjam = array ();
    while (($row = mysqli_fetch_array($pinjam)) != null){
    $dt_pinjam[] = $row;
  }
    $jml_pinjam = count ($dt_pinjam);

    $perbaikan = mysqli_query($con, "SELECT * FROM perbaikan"); 
    $dt_perbaikan = array ();
    while (($row = mysqli_fetch_array($perbaikan)) != null){
    $dt_perbaikan[] = $row;
  }
    $jml_perbaikan = count ($dt_perbaikan);

    $blm_perbaikan = mysqli_query($con, "SELECT * FROM perbaikan WHERE status='Belum di setujui'"); 
    $dt_blm_perbaikan = array ();
    while (($row = mysqli_fetch_array($blm_perbaikan)) != null){
    $dt_blm_perbaikan[] = $row;
  }
    $jml_blm_perbaikan = count ($dt_blm_perbaikan);

    $pros_perbaikan = mysqli_query($con, "SELECT * FROM perbaikan WHERE status='Telah di setujui'"); 
    $dt_pros_perbaikan = array ();
    while (($row = mysqli_fetch_array($pros_perbaikan)) != null){
    $dt_pros_perbaikan[] = $row;
  }
    $jml_pros_perbaikan = count ($dt_pros_perbaikan);

    $penyerahan = mysqli_query($con, "SELECT * FROM penyerahan"); 
    $dt_penyerahan = array ();
    while (($row = mysqli_fetch_array($penyerahan)) != null){
    $dt_penyerahan[] = $row;
  }
    $jml_penyerahan = count ($dt_penyerahan);

    $user = mysqli_query($con, "SELECT * FROM users"); 
    $dt_user = array ();
    while (($row = mysqli_fetch_array($user)) != null){
    $dt_user[] = $row;
  }
    $jml_user = count ($dt_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>RS Buah Hati - Dashboard</title>

    <!-- Custom fonts for this template-->
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
          href="index.php"
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
          <a class="nav-link" href="index.php">
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
                <a class="nav-link" href="pinjam/pinjam.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Peminjaman Barang</span></a
                >
              </li>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="kembali/kembali.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Pengembalian Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="perbaikan/perbaikan.php">
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
                    <a class="collapse-item" href="kategori/kategori.php">Kategori</a>
                    <a class="collapse-item" href="subkat/subkat.php">Sub-Kategori</a>
                    <a class="collapse-item" href="barang/barang.php">Barang</a>
                    <a class="collapse-item" href="tempat/tempat.php">Lokasi Barang</a>
                    <h6 class="collapse-header">Transactions :</h6>
                    <a class="collapse-item" href="masuk/masuk.php">Barang Masuk</a>
                    <a class="collapse-item" href="keluar/keluar.php">Barang Keluar</a>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="unit/unit.php">
                  <i class="fas fa-hospital"></i>
                  <span>Unit RS</span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="supplier/supplier.php">
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
                <a class="nav-link" href="pinjam/pinjam.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Peminjaman Barang</span></a
                >
              </li>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="kembali/kembali.php">
                  <i class="fas fa-people-carry fa-2x"></i>
                  <span>Pengembalian Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="perbaikan/perbaikan.php">
                  <i class="fas fa-tools"></i>
                  <span>Perbaikan Barang</span></a
                >
              </li>

              <!-- Nav Item - Tables -->
              <li class="nav-item">
                <a class="nav-link" href="penyerahan/penyerahan.php">
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
              <a class="nav-link" href="user/user.php">
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
              <a class="collapse-item" href="persetujuan/pers_keluar.php">Barang Keluar</a>
              <a class="collapse-item" href="persetujuan/pers_perbaikan.php">Perbaikan Barang</a>
              <a class="collapse-item" href="persetujuan/pers_pinjam.php">Peminjaman Barang</a>
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
              <a class="collapse-item" href="laporan/laporan_masuk.php"
                >Laporan Barang Masuk</a
              >
              <a class="collapse-item" href="laporan/laporan_keluar.php"
                >Laporan Barang Keluar</a
              >
              <a class="collapse-item" href="laporan/laporan_pinjam.php"
                >Laporan Peminjaman</a
              >
              <a class="collapse-item" href="laporan/laporan_penyerahan.php"
                >Laporan Penyerahan</a
              >
              <a class="collapse-item" href="laporan/laporan_perbaikan.php">Laporan Perbaikan</a>
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
                    src="img/undraw_profile.svg"
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
            <!-- Page Heading -->
            <div
              class="d-sm-flex align-items-center justify-content-between mb-4"
            >
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <?php if (isUnit()){ ?>
      <!-- Content Row -->            
      <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">                
                <div class="card border-left-primary shadow h-100 py-2">
                  <a href="pinjam/pinjam.php">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="
                              text-md
                              font-weight-bold
                              text-primary text-uppercase
                              mb-1
                            "
                          >
                            Peminjaman
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <?php
                           echo $jml_blm_pinjam;
                           ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>  

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <a href="kembali/kembali.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          Pengembalian
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_pinjam;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>      

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <a href="perbaikan/perbaikan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-info text-uppercase
                            mb-1
                          "
                        >
                          Perbaikan
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                              <?php echo $jml_pros_perbaikan;?>
                            </div>
                          </div>                          
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-tools fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>  
            </div>     
      
            <!-- CARD -->
            <?php
            $perbaikan_fin = mysqli_query($con, "SELECT perbaikan.*, barang.* FROM perbaikan 
            INNER JOIN barang ON perbaikan.id_barang=barang.id_barang WHERE status='Selesai' ORDER BY id_perbaikan DESC LIMIT 1");
            while($fin = mysqli_fetch_array($perbaikan_fin)){
            ?>
            <div class="alert alert-success alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Barang <?=$fin['nama_barang']?></strong> telah selesai diperbaiki!
            </div>
          <?php
            }
          }
          ?>

      <?php if (isOperator()){ ?>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">                
                <div class="card border-left-primary shadow h-100 py-2">
                  <a href="kategori/kategori.php">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="
                              text-md
                              font-weight-bold
                              text-primary text-uppercase
                              mb-1
                            "
                          >
                            Kategori
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <?php
                           echo $jumlah;
                           ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">                
                <div class="card border-left-info shadow h-100 py-2">
                  <a href="subkat/subkat.php">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div
                            class="
                              text-md
                              font-weight-bold
                              text-info text-uppercase
                              mb-1
                            "
                          >
                            Sub-Kategori
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                           <?php
                           echo $jml_subkat;
                           ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>  

                 <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <a href="barang/barang.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          Barang
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                              <?php echo $jml_barang;?>
                            </div>
                          </div>                        
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-boxes fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>  

                 <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                <a href="masuk/masuk.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-warning text-uppercase
                            mb-1
                          "
                        >
                          Barang Masuk
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                              <?php echo $jml_brg_masuk;?>
                            </div>
                          </div>                        
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-truck-loading fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>  

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                <a href="keluar/keluar.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-danger text-uppercase
                            mb-1
                          "
                        >
                          Barang Keluar
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_keluar;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-truck-moving fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

           <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <a href="pinjam/pinjam.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-primary text-uppercase
                            mb-1
                          "
                        >
                          Peminjaman
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                              <?php echo $jml_pinjam;?>
                            </div>
                          </div>                        
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-people-carry fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>  
              
                <!-- Earnings (Monthly) Card Example -->
           <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <a href="kembali/kembali.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-info text-uppercase
                            mb-1
                          "
                        >
                          Pengembalian
                        </div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div
                              class="
                                h5
                                mb-0
                                mr-3
                                font-weight-bold
                                text-gray-800
                              "
                            >
                              <?php echo $jml_pinjam;?>
                            </div>
                          </div>                        
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="fas fa-people-carry fa-2x text-gray-300"
                        ></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>  
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <a href="perbaikan/perbaikan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          Perbaikan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_perbaikan;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-tools fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                <a href="penyerahan/penyerahan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-dark text-uppercase
                            mb-1
                          "
                        >
                          Penyerahan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_penyerahan;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-hand-holding fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
        </div>

        <!-- CARD PINJAM -->
        <?php
            $pinjam = mysqli_query($con, "SELECT peminjaman.*, barang.* FROM peminjaman
            INNER JOIN barang ON peminjaman.id_barang=barang.id_barang WHERE status='Telah di setujui' 
            ORDER BY id_pinjam DESC LIMIT 1");
            while($pjm = mysqli_fetch_array($pinjam)){
            ?>
            <div class="alert alert-warning alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Peminjaman Barang <strong><?=$pjm['nama_barang']?> Telah di setujui!</strong>
            </div>
          <?php
            }   
          ?>

          <?php
            $bar_keluar = mysqli_query($con, "SELECT brg_keluar.*, barang.* FROM brg_keluar
            INNER JOIN barang ON brg_keluar.id_barang=barang.id_barang WHERE status='Telah di setujui' 
            ORDER BY id_keluar DESC LIMIT 1");
            while($klr = mysqli_fetch_array($bar_keluar)){
            ?>
            <div class="alert alert-info alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Barang <?=$klr['nama_barang']?></strong> Keluar, telah disetujui!
            </div>
          <?php
            }        
            ?>
          <?php
            }
          ?>
        
          <?php if (isAdmin()){ ?>
          <div class="row">        
              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <a href="user/user.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-info text-uppercase
                            mb-1
                          "
                        >
                          Users
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_user;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>                 
            
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <a href="persetujuan/pers_keluar.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          Pers Barang
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_keluar;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-box-open fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div> 
              
              <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                <a href="persetujuan/pers_pinjam.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-warning text-uppercase
                            mb-1
                          "
                        >
                          Pers Pinjam
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_blm_pinjam;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div> 

              <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                <a href="persetujuan/pers_perbaikan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-danger text-uppercase
                            mb-1
                          "
                        >
                          Pers Perbaikan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $jml_blm_perbaikan;?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-tools fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div> 
          </div>

          <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />
            
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            </div>
          <div class="row">
              <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <a href="laporan/laporan_masuk.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-primary text-uppercase
                            mb-1
                          "
                        >
                          Laporan Barang Masuk
                        </div>
                        
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-paste fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <a href="laporan/laporan_keluar.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-info text-uppercase
                            mb-1
                          "
                        >
                          Laporan Barang Keluar
                        </div>
                        
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-paste fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

               <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                <a href="laporan/laporan_pinjam.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-success text-uppercase
                            mb-1
                          "
                        >
                          Laporan Peminjaman Barang
                        </div>
                        
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-paste fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                <a href="laporan/laporan_penyerahan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-warning text-uppercase
                            mb-1
                          "
                        >
                          Laporan Penyerahan Barang
                        </div>
                        
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-paste fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>

              <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                <a href="laporan/laporan_perbaikan.php">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div
                          class="
                            text-md
                            font-weight-bold
                            text-danger text-uppercase
                            mb-1
                          "
                        >
                          Laporan Perbaikan Barang
                        </div>
                        
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-paste fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>             
            </div> 

            <!-- PERSETUJUAN -->
            <?php
            $pers_keluar = mysqli_query($con, "SELECT brg_keluar.*, barang.* FROM brg_keluar
            INNER JOIN barang ON brg_keluar.id_barang=barang.id_barang WHERE status='Belum di setujui' 
            ORDER BY id_keluar DESC LIMIT 1");
            while($pin = mysqli_fetch_array($pers_keluar)){
            ?>
            <div class="alert alert-info alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Permohonan <strong>Barang <?=$pin['nama_barang']?></strong> Keluar!
            </div>
          <?php
            }        
            ?>

            <?php
            $pers_pinjam = mysqli_query($con, "SELECT peminjaman.*, barang.* FROM peminjaman
            INNER JOIN barang ON peminjaman.id_barang=barang.id_barang WHERE status='Belum di setujui' 
            ORDER BY id_pinjam DESC LIMIT 1");
            while($pin = mysqli_fetch_array($pers_pinjam)){
            ?>
            <div class="alert alert-warning alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Permohonan <strong>Peminjaman Barang <?=$pin['nama_barang']?></strong>!
            </div>
          <?php
            }   
          ?>

          <?php
            $pers_perbaikan = mysqli_query($con, "SELECT perbaikan.*, barang.* FROM perbaikan
            INNER JOIN barang ON perbaikan.id_barang=barang.id_barang WHERE status='Belum di setujui' 
            ORDER BY id_perbaikan DESC LIMIT 1");
            while($pin = mysqli_fetch_array($pers_perbaikan)){
            ?>
            <div class="alert alert-primary alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Permohonan <strong>Perbaikan Barang <?=$pin['nama_barang']?></strong>!
            </div>
          <?php
            }        
        }
        ?>


            <!-- Content Row -->
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

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
