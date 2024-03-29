<?php 
  
  include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riwayat Pembayaran Pajak</title>

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
               <a class="navbar-brand" href="index.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                

                <div class="row">
                <div class="table-responsive"  
                style="
                margin-top: 100px; 
                margin-left: 50px; 
                margin-right: 50px">
                <table width="100%" cellspacing="0" class="table table-bordered">      
                                    <tr class="text-center">
                                        <th>No Plat</th>
                                        <th>Tahun/Masa Pajak</th>
                                        <th>Tanggal Bayar</th>
                                        <th>NTPN</th>
                                        <th>Status</th>
                                    </tr>
                                <tbody>
                                <?php

                                    $nopolisi = $_GET['nopolisi'];                    
                                    $query = ("SELECT * FROM history WHERE nopolisi = '$nopolisi'");


                                    $hasil=mysqli_query($con, $query);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <tr>        
                                        <td><?php echo $data["nopolisi"];   ?></td>
                                        <td class="text-center"><?php echo $data["masapajak"];   ?></td>
                                        <td><?php echo $data["bayar"];   ?></td>
                                        <td><?php echo $data["ntpn"];   ?></td>
                                        <td class="text-center"><?php echo $data["status"];   ?></td>
                                    </tr>
                                </tbody>
                                
                                    <?php 
                                        } 
                                    ?> 
                            </table>
                        </div>
                        <a href="index.php" class="btn btn-primary btn-user btn-block" 
                        style="
                        margin-left: 50px; 
                        margin-top: 100px; 
                        width: 20%">
                        Kembali
                        </a>
                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require "../footer.php"
            ?>
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

    <script>
       function preventBack() {window.history.forward();}
       setTimeout(preventBack(), 0);
       window.onunload = function() {null};
    </script>

</body>

</html