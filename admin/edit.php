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
                    <a class="navbar-brand" href="index.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="index.php">Info <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->
                <div class="backgroundtambahdata">
                    <div class="container">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" style="height: 1525px";>

                <!-- /.container-fluid -->      
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                </div>
                    <div class="p-5">
                        <form action="crud/update.php" method="POST" name="add" class="user" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Pemilik (lengkap) </label>
                                    <input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan Nama" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="rangka">Jenis Kendaraan </label>
                                    <input type="text"  name="jeniskendaraan" value="<?php echo $row['jeniskendaraan'] ?>" placeholder="Masukkan Jenis Kendaraan (Mobil/Motor)" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="jenismobil/motor">Jenis Mobil/Motor </label>
                                    <input type="text" name="jenismobilmotor" value="<?php echo $row['jenismobilmotor'] ?>" placeholder="Masukkan Mobil Motor" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="nopolisi">Nopolisi </label>
                                    <input type="text" style="text-transform: uppercase"  name="nopolisi" value="<?php echo $row['nopolisi'] ?>" placeholder="Masukkan No Polisi" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="pembuatan">Tahun Pembuatan </label>
                                    <input type="text"
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')" name="pembuatan" value="<?php echo $row['pembuatan'] ?>" placeholder="Masukkan Tanggal Pembuatan" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="rangka">Nomor Rangka </label>
                                    <input type="text" style="text-transform: uppercase"  name="rangka" value="<?php echo $row['rangka'] ?>" placeholder="Masukkan No Rangka" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="masapajak">Masa Pajak </label>
                                <input type="text"
                                onfocus="(this.type='date')"
                                onblur="(this.type='text')"
                                name="masapajak" value="<?php echo $row['masapajak'] ?>" placeholder="Masukkan Masa Pajak" class="form-control form-control-user" >
                            </div>
                            <div class="form-group">
                                <label for="image">Foto STNK</label><br>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="Current STNK Image" style="width: 300px"><br>
                                <label for="new_image">Upload STNK baru</label> <br>
                                <input type="file" name="new_image" id="new_image">
                            </div>



                            <button type="submit" name="submit" class="btn btn-primary btn-user" style="width: 300px; margin-right: 10px">
                                Simpan
                            </button>
                                <a href="index.php" class="btn btn-primary btn-user" style="width: 300px;margin-left:70%;margin-top: -7%; ">
                                Kembali</a>
                        </form>
                    </div>
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