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
                    <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="index.php">Info</a>
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
                    <form action="" class="form" style="margin-left: 70px; margin-top: 50px;">
                    <input type="text" id="1" class="cari" onkeyup="searchTable(1)" size="10" placeholder="Cari Nama">
                    </form>           
                    <a href="export.php" class="btn btn-primary" style="height: 40px; margin-top: 50px; margin-left: 900px; display: flex">Export All</a>                                      
    
                    <div class="table-responsive">
                        <table class="table1 table-bordered" id="table1" name="#htmltable" style="width: 100%; margin-left: 50px; margin-right: 50px; margin-top: 50px;" cellspacing="0">
                            <thead>
                            <tr>
                                <th onclick="sortTable('num',0)">No</th>
                                <th onclick="sortTable('alfa',1)">Nama Pemilik</th>
                                <th onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                                <th onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                                <th onclick="sortTable('alfa',4)">No Plat</th>
                                <th onclick="sortTable('date',5)">Tahun Pembuatan</th>
                                <th onclick="sortTable('alfa',6)">Nomor Rangka</th>
                                <th onclick="sortTable('date',7)">Rilis</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        <tbody>
                        <?php
                            include ('koneksi.php');
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

        var cols = document.getElementById('table1').rows[0].cells;
        var headerCol = new Array();
        for (var i = 0; i < (cols.length); i++) {
            headerCol[i]=cols[i].textContent;
        }
            
        function searchTable(col) {
        var input, filter, table, tr, td, i;
        input = document.getElementById(col);
        filter = input.value.toUpperCase();
        table = document.getElementById("table1");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            if(col=='1') td = tr[i].getElementsByTagName("td")[1];
            else if(col=='3') td = tr[i].getElementsByTagName("td")[3];
            if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }     
        }
        }
        function resetHeader(){
            var c = document.getElementById('table1').rows[0].cells;
            for (var i = 0; i < (c.length); i++) {
                c[i].textContent=headerCol[i];
            }
        }
        function sortTable(d,n) {
        var table, rows, col_header, switching, i, x, y, a,b,shouldSwitch, dir = "asc", switchcount = 0;
        table = document.getElementById("table1");
        rows = table.getElementsByTagName("tr");
        col_header  = rows[0].getElementsByTagName("th")[n];
        switching = true;
        while (switching) {
            switching = false;    
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[n];
                y = rows[i + 1].getElementsByTagName("td")[n];
                if (d=="num")
                {   a = Number(x.innerHTML);
                    b = Number(y.innerHTML);
                } else if (d=="alfa")
                {   a = x.innerHTML.toLowerCase();
                    b = y.innerHTML.toLowerCase();
                } else if (d=="date")
                {   a = Date.parse(x.innerHTML);
                    b = Date.parse(y.innerHTML);
                }
                if (dir == "asc") {
                    if (a > b) {
                    shouldSwitch = true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (a < b) {
                    shouldSwitch = true;
                    break;
                    }
                }
            }
            if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount ++;
            } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
            }   
        }
        resetHeader();
        if (dir == "asc") {col_header.textContent =  headerCol[n] + " \u2191";}
        if (dir == "desc") {col_header.textContent = headerCol[n] + " \u2193";}
        }

        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,', 
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },
            format = function(s, c) { 
                return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) 
            }
            return function(table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                    var ctx = {worksheet: name || 'Worksheet'}
                    //window.location.href = uri + base64(format(template, ctx))
                    document.getElementById("dlink").href = uri + base64(format(template, ctx));
                    document.getElementById("dlink").download = 'Data Pajak.xls';
            
            }
        })()

    </script>   

</body>

</html>