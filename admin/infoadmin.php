<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Admin</title>

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

                <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
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
                            <a class="nav-link" href="export.php">Export</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                Logout
                            </a>
                            </li>
                        </ul>
                    </div>
            </nav>
            <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div>
                    <div class="row">
                        <a class="sidebar-brand d-flex align-items-center justify-content-left" href="keterangan.html">
                        </a>
                    <img style="display: flex; position :relative; width: 500px; margin-left: 500px; " src="img/mobil.png" alt="">
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                            <div class="form-group"style="margin-top: 50px;" >
                                <label style="margin-left: -880px;" for="sel1">Nama:</label>
                                    <?php
                                        $masapaja="";
                                        if (isset($_POST['cari'])) {
                                        $cari=$_POST['cari'];
                                        $query = "SELECT * FROM kendaraan WHERE CONCAT(`nama`, `jeniskendaraan`, `jenismobilmotor`, `nopolisi`, `pembuatan`, `rangka`, `masapajak`) LIKE '%".$cari."%'";
                                            $search_result = filterTable($query);
                                            
                                        }
                                        else {
                                            $query = "SELECT * FROM kendaraan";
                                            $search_result = filterTable($query);
                                        }

                                        function filterTable($query)
                                        {
                                        $connect = mysqli_connect("localhost", "root", "", "data");
                                        $filter_Result = mysqli_query($connect, $query);
                                        return $filter_Result;
                                        }
                                    ?>
                                <input style="margin-left: -880px; width: 200px;" type="text" name="cari" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <input style="margin-left: -880px;" type="submit" class="btn btn-primary" value="Pilih">
                            </div>
                        </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="customers" style="width: 90%; margin-left: 100px; margin-right: 50px;" cellspacing="0">
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
                                            <tbody>
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