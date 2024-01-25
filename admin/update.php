<?php 
  
  include('koneksi.php');
    $nopolisi = $_GET['nopolisi'];
    $query = "SELECT * FROM kendaraan WHERE nopolisi = '$nopolisi'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Data</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                    <a class="navbar-brand" href="index.html"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="infoadmin.php">Info <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="add.php">Tambah Data</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="datatable.php">Export</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- /.container-fluid -->      
                <div class="col-lg-6 d-none d-lg-block"></div>
            
                <div class="col-lg-6">
                    <div class="p-5">
                        
                        <form action="crud/updatedata.php" method="POST" name="add" class="user">
                            <div class="form-group">
                            <input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan Nama" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input type="text" name="jeniskendaraan" value="<?php echo $row['jeniskendaraan'] ?>" placeholder="Masukkan Jenis Kendaraan" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input type="text" name="jenismobilmotor" value="<?php echo $row['jenismobilmotor'] ?>" placeholder="Masukkan Mobil Motor" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input type="text" name="nopolisi" value="<?php echo $row['nopolisi'] ?>" placeholder="Masukkan No Polisi" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input type="text"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')" name="pembuatan" value="<?php echo $row['pembuatan'] ?>" placeholder="Masukkan Tanggal Pembuatan" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input type="text" name="rangka" value="<?php echo $row['rangka'] ?>" placeholder="Masukkan No Rangka" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                            <input
                            type="text"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')"
                            name="masapajak" value="<?php echo $row['masapajak'] ?>" placeholder="Masukkan Masa Pajak" class="form-control form-control-user" >
                            </div>
                        
                            <button type="submit" name="submit" class="btn btn-primary btn-user" style="margin-left: 1483px; width: 300px">
                                Update
                            </button>
                                <a href="infoadmin.php" class="btn btn-primary btn-user" style="margin-left: 1483px; width: 300px; margin-top: 5px">
                                Kembali
                                </a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footerinfo bg-white" style="margin-top: 158px;">
                <div class="container my-auto justify-content-center">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024 Institut Indobaru Nasional. All Rights Reserved</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluar dari akun ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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

</body>

</html>