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
    .closest-expire {
        background-color: #ffcccc; /* Red background color */
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
                <a class="navbar-brand" href="info.php"> <img src="../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="info.php">Info</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="riwayat/riwayat.php">Riwayat</a>
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
                        <table style="position: sticky; width: 30%;">
                                <form class="form">
                                        <input type="text" id="1" onkeyup="searchNama(1)" size="20" placeholder="Cari Nama" 
                                        style="
                                        width: 13%; 
                                        margin-left: 5%; 
                                        border-radius: 10px; 
                                        border-color: aliceblue;
                                        margin-right: 2%; 
                                        margin-top:2%
                                        ">
                                </form>    
                                <form class="form">
                                    <input type="text" id="4" onkeyup="searchNoplat(4)" size="20" placeholder="Cari No Plat Cth: XX XXXX" 
                                        style="
                                        width: 13%; 
                                        border-radius: 10px; 
                                        border-color: aliceblue;
                                        margin-right: 2%; 
                                        margin-top:2%
                                        ">
                                </form>         
                                
                                <div class="dropdown">
                                <button class="btn btn-primary" style="margin-top: 18%" id="selectedCategory">Daerah yang Dipilih</button>
                                <div class="dropdown-content" id="myDropdown">
                                    <a href="#" onclick="filterData('All')">All</a>
                                    <a href="#" onclick="filterData('B')">B</a>
                                    <a href="#" onclick="filterData('L')">L</a>
                                    <a href="#" onclick="filterData('C')">C</a>
                                    <a href="#" onclick="filterData('D')">D</a>
                                </div>
                                </div>
                                    <a href="tambah.php" class="btn btn-primary" 
                                    style="
                                    height: 40px; 
                                    margin-left: 36%;
                                    margin-top: 2%;
                                    ">Tambah Data</a>
                                    
                                    <a href="export.php" class="btn btn-primary" 
                                    style="
                                    height: 40px; 
                                    margin-top: 2%;
                                    margin-left: 10px;  
                                    ">Export Tabel</a>   
                                    
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table1 table-bordered" id="table1" name="#htmltable" 
                            style="
                            width: 100%; 
                            margin-left: 50px; 
                            margin-right: 50px; 
                            margin-top: 2%;" 
                            cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center" onclick="sortTable('num',0)">No</th>
                                        <th class="text-center" onclick="sortTable('alfa',1)">Nama Pemilik</th>
                                        <th class="text-center" onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                                        <th class="text-center" onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                                        <th class="text-center" onclick="sortTable('alfa',4)">No Plat</th>
                                        <th class="text-center" onclick="sortTable('date',5)">Tahun Pembuatan</th>
                                        <th class="text-center" onclick="sortTable('alfa',6)">Nomor Rangka</th>
                                        <th class="text-center" onclick="sortTable('date',7)">Masa Pajak</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
$con = mysqli_connect("localhost", "root", "", "data");
if (isset($_POST['nama'])) {
    $nama = trim($_POST['nama']);
    $sql = "select * from kendaraan where nama = '$nama' order by nama asc";
} else {
    $sql = "select * from kendaraan order by nama asc";
}
$hasil = mysqli_query($con, $sql);
$no = 0;
while($data = $hasil->fetch_assoc()) {
    $no++;
?>  
<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $data["nama"]; ?></td>
    <td><?php echo $data["jeniskendaraan"]; ?></td>
    <td><?php echo $data["jenismobilmotor"]; ?></td>
    <td><?php echo $data["nopolisi"]; ?></td>
    <td><?php echo date("Y", strtotime($data["pembuatan"])); ?></td>
    <td><?php echo $data["rangka"]; ?></td>
    <td><?php echo date("d-M-y", strtotime($data["masapajak"])); ?></td>
    <td class="text-center">
        <a href="stnk.php?nopolisi=<?php echo $data['nopolisi'] ?>">Lihat STNK</a>
        <a href="edit.php?nopolisi=<?php echo $data['nopolisi'] ?>" class="btn btn-sm btn-primary alert_notif">Edit</a>
        <button class="btn btn-sm btn-danger delete-btn" data-nopolisi="<?php echo $data['nopolisi']; ?>">Hapus</button>
    </td>
</tr>





                        <!-- Konfirmasi Hapus -->
                        <div class="modal fade" id="hapusModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">Hapus Data<br>
                                                <?php echo $data['nama']; ?> <br>
                                                <?php echo $data['nopolisi']; ?>
                                               ?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
                                        <a class="btn btn-danger" href="crud/hapus.php?nopolisi=<?php echo $data['nopolisi']; ?>">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="lihatModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">Hapus Data<br>
                                                <?php echo $data['nama']; ?> <br>
                                                <?php echo $data['nopolisi']; ?>
                                               ?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
                                        <a class="btn btn-danger" href="crud/hapus.php?nopolisi=<?php echo $data['nopolisi']; ?>">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
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
            
        function searchNama(col) {
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

        function searchNoplat(col) {
        var input, filter, table, tr, td, i;
        input = document.getElementById(col);
        filter = input.value.toUpperCase();
        table = document.getElementById("table1");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            if(col=='4') td = tr[i].getElementsByTagName("td")[4];
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

        function filterData(category) {
    var rows = document.querySelectorAll('table tr');
    var selectedCategoryElement = document.getElementById('selectedCategory');

    if (!selectedCategoryElement) {
      console.error('Element with ID "selectedCategory" not found.');
      return;
    }

    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var cells = row.getElementsByTagName('td');
      var cellCategory = cells[4];

      if (category === 'All' || 
    (cellCategory.innerText.charAt(0, 1).toUpperCase() === category.toUpperCase()) ||
    (cellCategory.innerText.charAt(2, 3).toUpperCase() === category.toUpperCase())
    ) {
    row.style.display = '';
} else {
    row.style.display = 'none';
}



    selectedCategoryElement.innerText = 'Selected category: ' + category;
  }
}


  document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
         
            const nopolisi = this.getAttribute('data-nopolisi');
            
            openModal('hapusModal' + nopolisi);
        });
    });

    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            $(modal).modal('show'); 
        }
    }



    </script>   

</body>

</html>