<?php
require ('koneksi.php');
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Export Excel</title>

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

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                <a class="navbar-brand" href="index.html">Indo Baru</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="infoadmin.php">Info</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="add.php">Tambah Data</a>
                            </li>
                            <li class="nav-item active">
                            <a class="nav-link" href="datatable.php">Export  <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </div>
            </nav>

                    <div class="table-responsive">
                            <table class="table table-bordered" id="customers" style="width: 100%; margin-left: 50px; margin-right: 50px; margin-top: 70px;" cellspacing="0">
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
                        
                        
                        <button style="margin-left: 70px; color: green"> <a onclick="tableToExcel('htmltable', 'W3C Example Table')" id="dlink">Export</button>

                        <script>
                                var tableToExcel = (function() {
                                    var uri = 'data:application/vnd.ms-excel;base64,', 
                                    template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                                    base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },
                                    format = function(s, c) { 
                                        return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) 
                                    }
                                    return function(table, name) {
                                        if (!table.nodeType) table = document.getElementById(table)
                                            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                                            //window.location.href = uri + base64(format(template, ctx))
                                            document.getElementById("dlink").href = uri + base64(format(template, ctx));
                                            document.getElementById("dlink").download = 'Data Pajak.xls';
                                            document.getElementById("dlink").click();
                                    }
                                })()
                        </script>

                        <a href="infoadmin.php" style="margin-top: 100px;margin-left: 40px; width: 300px" class="btn btn-primary btn-user btn-block">
                        Kembali
                        </a>
            <footer>
                <div style="position: relative; font-size: .8rem; top: 300px;" class="container my-auto justify-content-center">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024 Institut Indobaru Nasional. All Rights Reserved</span>
                    </div>
                </div>
            </footer>

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
