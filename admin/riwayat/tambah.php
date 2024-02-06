<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

            <!-- Main Content -->
            <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                <a class="navbar-brand" href="../info.php"> <img src="../../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="../info.php">Info</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="riwayat.php">Riwayat</a>
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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Data Riwayat</h1>
                            </div>
                
                    <div class="p-5">
                        <form action="koneksi.php" method="POST" name="add" class="user">
                        
                            <div class="form-group">
                                <input type="text" style="text-transform: uppercase" class="form-control form-control-user"
                                    id="exampleInputEmail" name="nopolisi" aria-describedby="emailHelp" required
                                    placeholder="Nomor Polisi. Cth: BP XXX XX">
                            </div>
                            

                            <div class="form-group">
                            <input
                            type="text"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')"
                            id="date"  class="form-control form-control-user"
                                    id="exampleInputEmail" name="bayar" aria-describedby="emailHelp" required
                                    placeholder="Tanggal Bayar">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="exampleInputEmail" name="ntpn" aria-describedby="emailHelp" required
                                    placeholder="NTPN">
                            </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-user" style="width: 300px;" display="flex">
                            Submit
                        </button>
                        <a href="riwayat.php" class="btn btn-primary btn-user" style="width: 300px;">
                            Kembali</a>
                        </form>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#exampleInputEmail').on('change', function() {
            var nopolisi = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'fetch_masa_pajak.php', // Update with your server-side script URL
                data: {
                    nopolisi: nopolisi
                },
                success: function(response) {
                    // Update the masapajak field with the fetched data
                    $('#masapajak').val(response);
                }
            });
        });
    });

       function preventBack() {window.history.forward();}
       setTimeout(preventBack(), 0);
       window.onunload = function() {null};
    </script>


</body>

</html>