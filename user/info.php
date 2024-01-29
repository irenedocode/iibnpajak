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
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #7992af;
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

            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
               <a class="navbar-brand" href="../index.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
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
                        <div class="table-responsive" style="margin-top: 100px; margin-left: 50px; margin-right: 50px">
                        <table id="customers" width="100%" cellspacing="0">                                
                            <thead>
                                <tr>
                                    <th>Nama Pemilik</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Jenis Mobil/Motor</th>
                                    <th>No Plat</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Nomor Rangka/Mesin</th>
                                    <th>Masa Pajak</th>
                                    <th></th>
                                </tr>
                            </thead>                                
                                <tbody>
                                    <?php
                                        if (isset($_POST['cari'])) {
                                            $nopolisi=trim($_POST['nopolisi']);
                                            $rangka=trim($_POST['rangka']);
                                            $sql= "select * from kendaraan where rangka = '$rangka' and nopolisi = '$nopolisi'";

                                        }else {
                                            echo "data tidak ditemukan";
                                        }
                                    
                                        $hasil=mysqli_query($con, $sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                            ?>
                                            <tbody>
                                            <tr>
                                                <td><?php echo $data["nama"];   ?></td>
                                                <td><?php echo $data["jeniskendaraan"];   ?></td>
                                                <td><?php echo $data["jenismobilmotor"];   ?></td>
                                                <td><?php echo $data["nopolisi"];   ?></td>
                                                <td><?php echo $data["pembuatan"];   ?></td>
                                                <td><?php echo $data["rangka"];   ?></td>
                                                <td><?php echo $data["masapajak"];   ?></td>
                                                <td class="text-center">
                                                <a href="riwayat.php?nopolisi=<?php echo $data['nopolisi']?>" class="btn btn-primary btn-user btn-block" style="">Riwayat</a>
                                                </tr>
                                                </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php     
                                        }
                                        ?>
                                </tbody>
                            </table>
                    
                        </div>
                    
                    <a href="cari.php" class="btn btn-primary btn-user btn-block" style="margin-left: 50px; margin-top: 100px; width: 20%">
                        Kembali
                        </a>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <style>
            .footer {
            position: static;
            margin-top: 350px;
            height: 150px;
            left: 0;
            bottom: 0;
            width: 100%;
            font-size: 14px;
            background-color: #353e5f;
            color: #f8f8f8;
            text-align: center;
            padding: 20px;
            }
            </style>

            <!-- Footer -->
            <div class="footer">
                <div  class="container my-auto justify-content-center" style="margin-top: 20px">
                    <div class="copyright text-center my-auto" style="line-height: 120px">
                        <span>Copyright &copy; 2024 Institut Indobaru Nasional. All Rights Reserved</span>
                    </div>
                </div>    
            </footer>
<!-- End of Footer -->
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

</html>

