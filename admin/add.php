<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img style="width: 100px; " src="img/logo.png" alt="">
           
            </a>
                <br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="keterangan.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Keterangan Kendaraan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambahken.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Form</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
       

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="login.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Login</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg- topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars">
                        
                        </i>
                    </button>

                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <h1 style="left: 10px;position: absolute; top: 10px;">Tambah Data</h1>
                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- /.container-fluid -->
                        
                <div class="col-lg-6 d-none d-lg-block"></div>
            
                <div class="col-lg-6">
                    <div class="p-5">
                        <form action="addnew.php" method="POST" name="add" class="user">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="nama" name="nama" aria-describedby="emailHelp" required
                                    placeholder="Nama Pemilik (Lengkap)">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="jeniskendaraan" aria-describedby="emailHelp" required
                                    placeholder="Jenis Kendaraan. Cth: Mobil">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="jenismobilmotor" aria-describedby="emailHelp" required
                                    placeholder="Jenis Mobil/Motor. Cth: SUV, Sport, ATV">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="pembuatan" aria-describedby="emailHelp" required
                                    placeholder="Nomor Polisi. Cth: BP XXXX XX">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="pembuatan" aria-describedby="emailHelp" required
                                    placeholder="Tahun Pembuatan. Cth: yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="rangka" aria-describedby="emailHelp" required
                                    placeholder="Nomor Rangka/Mesin">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="masapajak" aria-describedby="emailHelp" required
                                    placeholder="Masa Pajak. Cth: yyyy-mm-dd">
                            </div>

                        
                            <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                Tambahkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footerinfo bg-white">
                <div class="container my-auto">
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>