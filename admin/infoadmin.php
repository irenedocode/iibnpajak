<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" style="color: #f8f8f8;">
                <a class="navbar-brand" href="index.html"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="infoadmin.php">Info</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="add.php">Tambah Data <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="datatable.php">Export</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                Logout
                            </a>
                            </li>
                        </ul>
                    </div>
            </nav>

                    <!-- Page Heading -->   
                            <div class="table-responsive" style="margin-top: 100px; margin-left: 100px;">
                                <table class="table table-bordered" id="dataTable" style="width: 110%;" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemilik</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Jenis Mobil/Motor</th>
                                            <th>No Plat</th>
                                            <th>Tahun Pembuatan</th>
                                            <th>Nomor Rangka/Mesin</th>
                                            <th>Masa Pajak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        include ('cari.php');
                                        if (isset($_POST['nama'])) {
                                            $nama=trim($_POST['nama']);
                                            $sql="select * from kendaraan where nama = '$nama' order by nama asc";

                                        }else {
                                            $sql="select * from kendaraan order by nama asc";
                                        }

                                        $hasil=mysqli_query($con,$sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                            $no++;

                                            ?>         
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data["nama"];?></td>
                                                <td><?php echo $data["jeniskendaraan"];?></td>
                                                <td><?php echo $data["jenismobilmotor"];?></td>
                                                <td><?php echo $data["nopolisi"];?></td>
                                                <td><?php echo date("d-M-y", strtotime($data["pembuatan"]));?></td>
                                                <td><?php echo $data["rangka"];?></td>
                                                <td><?php echo date("d-M-y", strtotime($data["masapajak"]));?></td>
                                                <td class="text-center">
                                                <a href="update.php?nopolisi=<?php echo $data['nopolisi'] ?>" class="btn btn-sm btn-primary alert_notif">Edit</a>
                                                <a href="crud/hapusdata.php?nopolisi=<?php echo $data['nopolisi'] ?>" class="btn btn-sm btn-secondary alert_notif">Hapus</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <?php
                                        }
                                        ?>
                                   
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

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
       function preventBack() {window.history.forward();}
       setTimeout(preventBack(), 0);
       window.onunload = function() {null};
    </script> 

</body>

</html>