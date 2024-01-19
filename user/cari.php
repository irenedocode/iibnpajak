<?php

$con = mysqli_connect("localhost","root","","data"); //ganti ke iibn1 ntar

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Pajak-User</title>

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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
                       <h1 style="">User</h1>
                  
                        

                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div>
                <div class="row">
                    <a class="sidebar-brand d-flex align-items-center justify-content-left" href="keterangan.html">
                        
                    </a>
                    <img style="display: flex; position :relative; width: 500px; margin-left: 500px; " src="img/mobil.png" alt="">
                        <div class="table-responsive">
                        <table id="customers" width="100%" cellspacing="0">                                
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Jenis Mobil Motor</th>
                                    <th>No Polisi</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Nomor Rangka/Mesin</th>
                                    <th>Masa Pajak</th>
                                </tr>
                            </thead>
                                
                                <tbody>
                                <?php

                                        if (isset($_POST['nama'])) {
                                            $nama=trim($_POST['nama']);
                                            $jeniskendaraan=trim($_POST['jeniskendaraan']);
                                            $nopolisi=trim($_POST['nopolisi']);
                                            $sql="select * from kendaraan where nama = '$nama' && jeniskendaraan = '$jeniskendaraan' && nopolisi = '$nopolisi'";

                                        }else {
                                            echo "data tidak ditemukan";
                                        }


                                        $hasil=mysqli_query($con, $sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                            $no++;

                                            ?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data["nama"];   ?></td>
                                                <td><?php echo $data["jeniskendaraan"];   ?></td>
                                                <td><?php echo $data["jenismobilmotor"];   ?></td>
                                                <td><?php echo $data["nopolisi"];   ?></td>
                                                <td><?php echo $data["pembuatan"];   ?></td>
                                                <td><?php echo $data["rangka"];   ?></td>
                                                <td><?php echo $data["masapajak"];   ?></td>
                                            </tr>
                                            </tbody>
                                            <?php
                                        }
                                        ?>
                                   
                                </tbody>
                            </table>
                    
                        </div>
                        <a href="riwayatpembayaran.php" class="btn btn-primary btn-user btn-block" style="margin-left: 50px; margin-right: 50px; margin-top: 100px;">
                        History
                    </a>
                    <a href="info.php" class="btn btn-primary btn-user btn-block" style="margin-left: 75px; margin-right: 75px;">
                        Kembali
                    </a>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024 Institut Indobaru Nasional. All Rights reserved</span>
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

