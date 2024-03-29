<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Kendaraan</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

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
                            <li class="nav-item active">
                            <a class="nav-link" href="index.php">Informasi Kendaraan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="riwayat/riwayat.php">Riwayat Pajak</a>
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
        <div class="backgroundtambahdata">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- /.container-fluid -->

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Data Kendaraan</h1>
                        </div>

                        <div class="p-5">
                            <form action="crud/tambah.php" method="POST" enctype="multipart/form-data" name="add" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" required placeholder="Nama Pemilik (Lengkap)">
                                </div>
                                <div class="form-check-inline">
                                    <label for="jeniskendaraan" style="margin-left: 10px; margin-bottom: 10px; font-size: 20px">Jenis Kendaraan : <br>
                                        <label class="form-check-label" style="font-size: 20px">
                                            <input type="radio" class="form-check-input" name="jeniskendaraan" value="Mobil" required>Mobil
                                        </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" style="font-size: 20px"> <br>
                                        <input type="radio" class="form-check-input" name="jeniskendaraan" value="Motor" required>Motor
                                    </label>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="jenismobilmotor" style="margin-left: 10px; margin-bottom: 10px; font-size: 20px">Jenis Mobil/Motor : <br>
                                    <select id="jenismobilmotor" name="jenismobilmotor" required>
                                        <option value="" disabled selected style="width: 100px">Pilih Jenis</option>
                                        <optgroup label="Mobil">
                                            <option value="Sedan">Sedan</option>
                                            <option value="Sport Sedan">Sport Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="MPV">MPV</option>
                                            <option value="Hatchback">Hatchback</option>
                                            <option value="Convertible">Convertible</option>
                                            <option value="Coupe">Coupe</option>
                                            <option value="Wagon">Wagon</option>
                                            <option value="Van">Van</option>
                                            <option value="Double Cabin">Double Cabin</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="LCGC">LCGC</option>
                                            <option value="Pickup">Pickup Truck</option>
                                            <option value="Off Road">Off Road</option>
                                            <option value="Crossover">Crossover</option>
                                        </optgroup>
                                        <optgroup label="Motor">
                                            <option value="Sport">Sport</option>
                                            <option value="Dual Sport">Dual Sport</option>
                                            <option value="Cruiser">Cruiser</option>
                                            <option value="Touring">Touring</option>
                                            <option value="Retro">Retro</option>
                                            <option value="Standard">Standard</option>
                                            <option value="Dirt Bike">Dirt Bike</option>
                                            <option value="Moped">Moped</option>
                                            <option value="Scooter">Scooter</option>
                                            <option value="Naked Bike">Naked Bike</option>
                                            <option value="Lower Underbone">Lower Underbone</option>
                                            <option value="Adventure Bike">Adventure Bike</option>
                                        </optgroup>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <input type="text" style="text-transform: uppercase" class="form-control form-control-user" name="nopolisi" aria-describedby="emailHelp" required placeholder="Nomor Polisi. Cth: BP XXX XX">
                                </div>
                                <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-control-user" name="pembuatan" aria-describedby="emailHelp" required placeholder="Tahun Pembuatan">
                                </div>
                                <div class="form-group">
                                    <input type="text" style="text-transform: uppercase" class="form-control form-control-user" name="rangka" aria-describedby="emailHelp" required placeholder="Nomor Rangka(17 digit). Cth:MHYKZE82C34J55067">
                                </div>
                                <div class="form-group">
                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" class="form-control form-control-user" id="exampleInputEmail" name="masapajak" aria-describedby="emailHelp" required placeholder="Jatuh tempo pajak tahun ini">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" id="image">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-user" style="width: 300px; margin-left:38%;" display="flex">
                                    Submit
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
            // Add event listener for the change event on radio buttons
            var radioButtons = document.querySelectorAll('input[name="jeniskendaraan"]');
            radioButtons.forEach(function(radioButton) {
                radioButton.addEventListener('change', function() {
                    // Get the selected value
                    var selectedValue = this.value;

                    // Show/hide options based on the selected value
                    if (selectedValue === 'Mobil') {
                        document.getElementById('jenismobilmotor').querySelector('optgroup[label="Mobil"]').style.display = 'block';
                        document.getElementById('jenismobilmotor').querySelector('optgroup[label="Motor"]').style.display = 'none';
                    } else if (selectedValue === 'Motor') {
                        document.getElementById('jenismobilmotor').querySelector('optgroup[label="Mobil"]').style.display = 'none';
                        document.getElementById('jenismobilmotor').querySelector('optgroup[label="Motor"]').style.display = 'block';
                    }
                });
            });
        </script>


</body>

</html>
