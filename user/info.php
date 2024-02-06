<?php

$con = mysqli_connect("localhost", "root", "", "data"); //ganti ke iibn1 ntar

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


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                    <a class="navbar-brand" href="info.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
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


                <div class="table-responsive-lg" style="margin-top: 100px; margin-left: 50px; margin-right: 70px">
                    <table width="100%" cellspacing="0" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>Jenis Kendaraan</th>
                                <th>Jenis Mobil/Motor</th>
                                <th>No Plat</th>
                                <th>Wilayah</th>
                                <th>Tahun Pembuatan</th>
                                <th>Nomor Rangka/Mesin</th>
                                <th>Masa Pajak</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['cari'])) {
                                $nama = trim($_POST['nama']);
                                $nopolisi = trim($_POST['nopolisi']);

                                // Determine wilayah based on nopolisi
                                if (substr($nopolisi, 0, 2) === "BP") {
                                    $wilayah = "Batam";
                                } elseif (substr($nopolisi, 0, 2) === "BB") { //yang 2 huruf, diduluankan, baru satu huruf
                                    $wilayah = "Sumatera Utara";          
                                } elseif (substr($nopolisi, 0, 1) === "B") {
                                    $wilayah = "Jakarta";
                                } elseif (substr($nopolisi, 0, 1) === "D") {
                                    $wilayah = "Bandung";
                                } elseif (substr($nopolisi, 0, 1) === "L") {
                                    $wilayah = "Surabaya";      
                                } else {
                                    $wilayah = "Unknown";
                                }

                                $sql = "SELECT * FROM kendaraan WHERE nama = '$nama' AND nopolisi = '$nopolisi'";
                            } else {
                                echo "data tidak ditemukan";
                            }

                            $hasil = mysqli_query($con, $sql);
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                            ?>
                                <tbody>
                                    <tr>

                                        <td><?php echo $data["nama"];   ?></td>
                                        <td><?php echo $data["jeniskendaraan"];   ?></td>
                                        <td><?php echo $data["jenismobilmotor"];   ?></td>
                                        <td><?php echo $data["nopolisi"];   ?></td>
                                        <td><?php echo $wilayah; ?></td>
                                        <td><?php echo date("Y", strtotime($data["pembuatan"])); ?></td>
                                        <td><?php echo $data["rangka"];   ?></td>
                                        <td><?php echo date("d-M-y", strtotime($data["masapajak"])); ?></td>
                                        <td class="text-center">
                                            <a href="riwayat.php?nopolisi=<?php echo $data['nopolisi'] ?>" class="btn btn-primary btn-user btn-block">Riwayat</a>
                                        </td>
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

                <a href="index.php" class="btn btn-primary btn-user btn-block" style="margin-left: 50px; margin-top: 100px; width: 20%"> Kembali </a>

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <?php
            include "../footer.php"
            ?>
            <!-- End of Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        function preventBack() {
            window.history.forward();
        }
        setTimeout(preventBack(), 0);
        window.onunload = function() {
            null
        };
    </script>

</body>

</html>
