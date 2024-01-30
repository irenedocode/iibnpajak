<?php
require ('koneksi.php');
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Export Data</title>

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

    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <a class="navbar-brand" href="index.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"  id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Tambah Data <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="datatable.php">Export</a>
                    </li>
                </ul>
            </div>
    </nav>
        <div class="table-responsive">
            <table class="table table-bordered" id="customers" name="#htmltable" style="width: 100%; margin-left: 50px; margin-right: 50px; margin-top: 70px;" cellspacing="0">
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
                </tr>
            </tbody>
            <?php
            }
            ?>          
            </tbody>
            </table>
        </div>
        <button class="btn btn-primary btn-user btn-block" style="margin-left: 70px; width: 150px; color: white"> <a onclick="tableToExcel('htmltable', 'W3C Example Table')" id="dlink">Export</button>

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
                    var ctx = {worksheet: name || 'Worksheet'}
                    //window.location.href = uri + base64(format(template, ctx))
                    document.getElementById("dlink").href = uri + base64(format(template, ctx));
                    document.getElementById("dlink").download = 'Data Pajak.xls';
            
            }
        })()
    </script>

<?php
                require "../footer.php"
            ?>