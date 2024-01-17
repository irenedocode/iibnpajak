<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Kendaraan</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

    <style>
        #customers {
          font-family: Poppins;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #f2f2f2;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4a756e;
          color: white;
        }
        </style>

</head>

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
                <a class="nav-link" href="info.html">
                    <span>Cari Info Pajak</span>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="informasi.html">
                    <span>Data Diri</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="infokendaraan.html">
                    <span>Informasi Pajak Kendaraan</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="riwayatpembayaran.html">
                    <span>Riwayat Pembayaran</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.html">
                    <span>Menambahkan Kendaraan</span>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
       
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="login.html">
                    <span>Login</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="register.html">
                    <span>Register</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="index.html">
                    <span>Home</span></a>
            </li>


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
                <nav class="navbar navbar-expand navbar-light bg- topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <h1 style="left: 10px;position: absolute; top: 10px;">Informasi Pajak Kendaraan</h1>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div>
                <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>
                <div class="row">
                    <a class="sidebar-brand d-flex align-items-center justify-content-left" href="keterangan.html">
                        
                    </a>
                    <img style="display: flex; position :relative; width: 500px; margin-left: 500px; " src="img/mobil.png" alt="">
                    <div class="col-md-4 text-right"> <button id="exporttable" class="btn btn-primary">Export</button> </div>
                        <div class="table-responsive">
                            <table id="customers">
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Jenis Mobil Motor</th>
                                        <th>No Polisi</th>
                                        <th>Tahun Pembuatan</th>
                                        <th>Nomor Rangka/Mesin</th>
                                        <th>Masa Pajak</th>
                                    </tr>
                                    <?php

                                    include ('cari.php')


                                    $query = mysqli_query($con,"SELECT * FROM kendaraan WHERE nama = '$nama'");
                                        
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo "<tr>";
                                            echo "<td>".$row['no']."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['jeniskendaraan']."</td>";
                                            echo "<td>".$row['jenismobilmotor']."</td>";	
                                            echo "<td>".$row['nopolisi']."</td>";
                                            echo "<td>".$row['pembuatan']."</td>";
                                            echo "<td>".$row['rangka']."</td>";			
                                            echo "<td><a href=\"edit.php?no=$row[no]\">Edit</a> | 
                                            <a href=\"delete.php?no=$row[no]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                        }
                                    }
                                    ?>
                            </table>
                        
                        </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block" style="margin-left: 50px; margin-right: 50px; margin-top: 100px;">
                        Kembali
                    </a>
                    <a href="riwayatpembayaran.html" class="btn btn-primary btn-user btn-block" style="margin-left: 50px; margin-right: 50px;">
                        History
                    </a>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

