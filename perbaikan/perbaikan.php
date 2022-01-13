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

    <title>Perbaikan - RS Buah Hati</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Data Perbaikan Barang</h1> 
                    <?php if (isUnit()){ ?>
                    <a href="#" class="btn btn-primary btn-icon-split my-3" data-toggle="modal" data-target="#tambah-perbaikan">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Perbaikan Barang</span>
                    </a>  
                    <?php } ?>                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perbaikan Barang</h6>
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
                                        $status = "Belum di setujui";  
                                        $status2 = "Telah di setujui";                                      
                                        $perbaikan = mysqli_query($con, "SELECT perbaikan.*, barang.*, unit.* FROM perbaikan 
                                        INNER JOIN barang ON barang.id_barang=perbaikan.id_barang
                                        INNER JOIN unit ON perbaikan.id_unit=unit.id_unit                                        
                                        WHERE status='$status' OR status='$status2'");
                                        while ($data = mysqli_fetch_array($perbaikan)) {
                                        ?>
                                    <tr>
                                            <td><?php echo $data['id_perbaikan'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $data['nama_barang'];?></td>                                            
                                            <td>
                                                <?php if($data['status'] == "Belum di setujui" ){?>
                                                <span class="badge badge-warning"><?php echo $data['status']?></span>
                                                <?php
                                                }else if($data['status'] == $status2 ){?>
                                                <span class="badge badge-success"><?php echo $data['status']?></span>
                                                <?php
                                                }else{
                                                ?>
                                                <span class="badge badge-danger"><?php echo $data['status']?></span>
                                                <?php } 
                                                ?>
                                            </td>
                                            <td><?php echo $data['pemohon'];?></td>
                                            <td><?php echo $data['nama_unit'];?></td>                                            
                                            <td>	
                                            <?php if($data['status'] == $status2){?>	
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data['id_perbaikan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>
                                            <?php if(isOperator()){?>
                                            <a href="#" class="btn btn-sm btn-info btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#selesai<?= $data['id_perbaikan'] ?>">
                                                <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Perbaikan Selesai</span>
                                            </a>		
                                            <?php } 
                                            } ?>
                                            <?php if($data['status'] == $status){?>	
                                            <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data['id_perbaikan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Detail</span>
											</a>		
                                            <?php if (isUnit()){ ?>				                                             
											<a href="#" class="btn btn-sm btn-warning btn-icon-split mr-2 " data-toggle="modal" data-target="#edit<?= $data['id_perbaikan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
												</span>
												<span class="text">Edit</span>
											</a>  												
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_perbaikan'] ?>">
												<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
												</span>
												<span class="text">Delete</span>
											</a>
                                            <?php } ?>
                                            <?php
                                            }else{
                                                echo "";
                                            }
                                            ?>

                                            <?php if($data['status'] == "Ditolak"){?>							                                             																						
											<a href="#" class="btn btn-sm btn-danger btn-icon-split" data-toggle="modal" data-target="#delete<?= $data['id_perbaikan'] ?>">
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

                                        <!-- DETAIL perbaikan -->
                                        <div class="modal fade" id="detail<?= $data['id_perbaikan'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail Perbaikan <?php echo $data['id_perbaikan'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
															<strong>ID Perbaikan : </strong> <?php echo $data['id_perbaikan'];?><br>                                                            
                                                            <strong>Tanggal Permohonan : </strong> <?php echo $data['tgl_perbaikan'];?><br>
                                                            <strong>Nama Pemohon : </strong> <?php echo $data['pemohon'];?><br>
                                                            <strong>Unit Pemohon : </strong> <?php echo $data['nama_unit'];?><br>
                                                            <strong>Nama Barang : </strong> <?php echo $data['nama_barang'];?><br>
                                                            <strong>Jumlah Perbaikan : </strong> <?php echo $data['jumlah'];?><br>
                                                            <strong>Tanggal Perbaikan : </strong> <?php echo $data['tgl'];?><br>                                                            
                                                            <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data['status'];?></span><br>                                                            
                                                            <strong>Surat Permohonan : </strong> <?php echo $data['file'];?><br>
                                                            <center>
                                                            <embed src="file/<?=$data['file'];?>" width="600" height="500">
                                                            </center>
                                                        </div>
													<!-- Modal footer -->
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                                                                                        
													</div>                                                    
                                                </div>
                                            </div>
                                        </div>				

                                        <!-- EDIT perbaikan -->
                                        <div class="modal fade" id="edit<?= $data['id_perbaikan'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Barang perbaikan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="update_perbaikan.php" method="POST" enctype="multipart/form-data">
                                                            <div class="card-body">																									
															<div class="form-group">
                                                                <label for="id_perbaikan">ID Perbaikan</label>
                                                                <input type="text" class="form-control" id="id_perbaikan" name="id_perbaikan" value="<?php echo $data['id_perbaikan']; ?>" readonly>
                                                            </div>   
                                                            <div class="form-group">
                                                                <label for="tgl">Tanggal Perbaikan</label>
                                                                <input type="text" class="form-control" id="tgl" value="<?php echo $data['tgl'];?>" name="tgl" readonly>                                                                        
                                                            </div>                 
                                                            <div class="form-group">
                                                                <label for="id_barang">Nama Barang</label>
                                                                <select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
                                                                    <option value="">Pilih Barang</option>
                                                                    <?php $barang = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$data[id_barang]'");
                                                                        while($result2 = mysqli_fetch_array($barang)){ ?>
                                                                    <option value="<?php echo $result2['id_barang']; ?>"
                                                                    <?php echo "selected"?>><?php echo $result2['nama_barang'];?></option>
                                                                    <?php }
                                                                    ?>
                                                                </select>
                                                            </div>  
                                                            <div class="form-group">
                                                                <label for="jumlah">Jumlah</label>
                                                                <input type="number" class="form-control" min="0" id="jumlah" value="<?php echo $data['jumlah'];?>" name="jumlah" required>
                                                            </div>                                           
                                                            <div class="form-group">
                                                                <label for="file">Surat Permohonan</label>
                                                                <div class="custom-file">
                                                                    <input type="hidden" id="foto" name="foto">
                                                                    <input type="file" class="custom-file-input" name="file" id="file" accept = ".pdf">
                                                                    <label class="custom-file-label" for="file" >Choose file</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pemohon">Pemohon</label>
                                                                <input type="text" class="form-control" id="pemohon" name="pemohon" value="<?php echo $data['pemohon'];?>" required>                
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="id_unit">Nama Unit</label>
                                                                <select class="custom-select rounded-1" id="id_unit" name="id_unit" required>
                                                                    <option value="">Pilih Unit</option>
                                                                    <?php $unit = mysqli_query($con, "SELECT * FROM unit WHERE id_unit='$data[id_unit]'");
                                                                        while($result2 = mysqli_fetch_array($unit)){ ?>
                                                                    <option value="<?php echo $result2['id_unit']; ?>"
                                                                    <?php echo "selected";?>><?php echo $result2['nama_unit'];?></option>
                                                                    <?php }
                                                                    ?>
                                                                </select>
                                                            </div>                                                                                            
                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" action="update_perbaikan.php" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- DELETE perbaikan -->
                                        <div class="modal fade" id="delete<?= $data['id_perbaikan'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus perbaikan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_perbaikan.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data <?php echo $data['id_perbaikan'];?> dari perbaikan?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="hapus_perbaikan.php?id_perbaikan=<?=$data['id_perbaikan'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                            <!-- SELESAI perbaikan -->
                                            <div class="modal fade" id="selesai<?= $data['id_perbaikan'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Selesaikan Perbaikan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="hapus_perbaikan.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menyelesaikan perbaikan barang <?php echo $data['nama_barang'];?> 
                                                            dengan ID <?php echo $data['id_perbaikan'];?>?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                                                            
                                                            <a href="selesai_perbaikan.php?id_perbaikan=<?=$data['id_perbaikan'];?>" type="button" name="submit" class="btn btn-primary float-right">Submit</a>
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
                            <h6 class="m-0 font-weight-bold text-primary">Perbaikan Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" id="" width="100%" cellspacing="0">
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
                                    $status3 = "Selesai";
                                    $perbaikan2 = mysqli_query($con, "SELECT perbaikan.*, barang.*, unit.* FROM perbaikan 
                                    INNER JOIN barang ON barang.id_barang=perbaikan.id_barang
                                    INNER JOIN unit ON perbaikan.id_unit=unit.id_unit                                    
                                    WHERE status='$status1' OR status='$status3' ORDER BY id_perbaikan DESC");
                                    while ($data2 = mysqli_fetch_array($perbaikan2)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data2['id_perbaikan'];?></td>
                                        <td><?php echo $data2['tgl'];?></td>
                                        <td><?php echo $data2['nama_barang'];?></td>
                                        <td>
                                        <?php if($data2['status'] == $status2){ ?>
                                            <span class='badge badge-success'><?php echo $data2['status'];?></span></td>
                                            <?php }else if($data2['status'] == "Selesai"){ ?>
                                            <span class='badge badge-info'><?php echo $data2['status'];?></span></td>
                                            <?php }else{ ?>
                                            <span class='badge badge-danger'><?php echo $data2['status'];?></span></td>
                                        <?php 
                                        }
                                        ?>                                        
                                        <td><?php echo $data2['pemohon'];?></td>
                                        <td><?php echo $data2['nama_unit'];?></td>                                        
                                        <td>			
                                        <?php if($data2['status'] == $status2){ ?>	                                        
                                        <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data2['id_perbaikan'] ?>">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </a>                                      
                                        <?php }else{ ?>	
                                        <a href="#" class="btn btn-sm btn-success btn-icon-split mr-2 mb-2" data-toggle="modal" data-target="#detail<?= $data2['id_perbaikan'] ?>">
                                            <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </a>
                                        <?php 
                                        }
                                        ?>  			                                               
                                    </tr>	
                                    
                                    <!-- DETAIL perbaikan -->
                                    <div class="modal fade" id="detail<?= $data2['id_perbaikan'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Detail perbaikan <?php echo $data2['id_perbaikan'];?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->                                                    
                                                        <div class="modal-body">                            
                                                        <strong>ID Perbaikan : </strong> <?php echo $data2['id_perbaikan'];?><br>                                                            
                                                            <strong>Tanggal Permohonan : </strong> <?php echo $data2['tgl'];?><br>
                                                            <strong>Nama Pemohon : </strong> <?php echo $data2['pemohon'];?><br>
                                                            <strong>Unit Pemohon : </strong> <?php echo $data2['nama_unit'];?><br>
                                                            <strong>Nama Barang : </strong> <?php echo $data2['nama_barang'];?><br>
                                                            <strong>Jumlah Perbaikan : </strong> <?php echo $data2['jumlah'];?><br>
                                                            <strong>Tanggal Perbaikan : </strong> <?php echo $data2['tgl'];?><br>                                                            
                                                            <strong>Nama Barang : </strong><span class="badge badge-info"><?php echo $data2['status'];?></span><br>                                                            
                                                            <strong>Surat Permohonan : </strong> <?php echo $data2['file'];?><br>
                                                            <center>
                                                            <embed src="file/<?=$data2['file'];?>" width="600" height="500">
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

<?php
$query = mysqli_query($con, "SELECT max(id_perbaikan) as kodeTerbesar FROM perbaikan");
$data = mysqli_fetch_array($query);
$id_perbaikan = $data['kodeTerbesar'];

$urutan = (int) substr($id_perbaikan, 4, 4);

$urutan++;

$huruf = "PER";
$id_perbaikan = $huruf . sprintf("%04s", $urutan);
?>
<!-- Tambah perbaikan Modal -->
<!-- Modal -->
<div class="modal fade" id="tambah-perbaikan" tabindex="-1" role="dialog" aria-labelledby="tambah-perbaikanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah perbaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="upload_perbaikan.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_perbaikan">ID Perbaikan</label>
                        <input type="text" class="form-control" id="id_perbaikan" name="id_perbaikan" value="<?php echo $id_perbaikan; ?>" readonly>
                    </div>   
                    <div class="form-group">
                        <label for="tgl">Tanggal Perbaikan</label>
                        <input type="text" class="form-control" id="tgl" value="<?php echo date("d-m-Y");?>" name="tgl" readonly>                                                                        
                    </div>                 
                    <div class="form-group">
                        <label for="id_barang">Nama Barang</label>
                        <select class="custom-select rounded-1" id="id_barang" name="id_barang" required>
                            <option value="">Pilih Barang</option>
                            <?php $barang = mysqli_query($con, "SELECT * FROM barang ORDER BY id_barang ASC");
                                while($result2 = mysqli_fetch_array($barang)){ ?>
                            <option value="<?php echo $result2['id_barang']; ?>"><?php echo $result2['nama_barang'];?></option>
                            <?php }
                            ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" min="0" id="jumlah" placeholder="Masukkan Jumlah Barang yang ingin diperbaiki" name="jumlah" required>
                    </div>                                           
                    <div class="form-group">
                        <label for="file">Surat Permohonan</label>
                        <div class="custom-file">
                            <input type="hidden" id="foto" name="foto">
                            <input type="file" class="custom-file-input" name="file" id="file" accept = ".pdf">
                            <label class="custom-file-label" for="file" >Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pemohon">Pemohon</label>
                        <?php if(isset($_SESSION['user']['nama'])) : ?>
                        <input type="text" class="form-control" id="pemohon" name="pemohon" value="<?php echo $_SESSION['user']['nama'];?>" readonly>                
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="id_unit">Nama Unit</label>
                        <select class="custom-select rounded-1" id="id_unit" name="id_unit" required>
                            <option value="">Pilih Unit</option>
                            <?php $unit = mysqli_query($con, "SELECT * FROM unit ORDER BY id_unit ASC");
                                while($result2 = mysqli_fetch_array($unit)){ ?>
                            <option value="<?php echo $result2['id_unit']; ?>"><?php echo $result2['nama_unit'];?></option>
                            <?php }
                            ?>
                        </select>
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