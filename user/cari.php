<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cari Info Pajak</title>

    </li> <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min(1).css" rel="stylesheet">

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
                    <a class="navbar-brand" href="index.html"> <img src="../img/logo.png" alt="" style="width: 180px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" style="color: white" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

<div class="col-xl-10 col-lg-12 col-md-9">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div>
        <div class="kotak">
            <div class="container">
                <div class="card-body p-0">        
                    <div class="col-lg-6">
                        <div class="p-5" style="margin-top: 10%;">
                            <form action="info.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" style="border-radius: 30px; height: 60px; width: 70%; margin-left: 15%;"
                                        id="exampleInputEmail" name="nopolisi" aria-describedby="emailHelp" required
                                        placeholder="Nomor Polisi. Cth: BP XXXX XX">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" style="border-radius: 30px; height: 60px; width: 70%; margin-left: 15%;"
                                        id="exampleInputEmail" name="rangka" aria-describedby="emailHelp" required
                                        placeholder="Nomor Rangka 17 Digit">
                                </div>
                            
                                <button name="cari" value="cari" class="btn btn-primary btn-user btn-block" style="border-radius: 30px; height: 60px; width: 50%; margin-left: 24%;">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

           <!-- Footer -->
           <footer class="sticky-footer bg-white" style="margin-top: 9px">
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
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
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


</body>

</html>