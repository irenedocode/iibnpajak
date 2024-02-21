<?php 
  
  include('../koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Riwayat Pembayaran</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sb-admin-2.min.css" rel="stylesheet">


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
               <a class="navbar-brand" href="../index.php"> <img src="../../img/72ppi/Artboard 1.png" alt="" style="width: 180px"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"  id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                            <a class="nav-link" href="../index.php">Info Kendaraan</a>
                            </li>
                            <li class="nav-item active">
                            <a class="nav-link" href="riwayat.php">Riwayat Pajak</a>
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
                
                            <table style="position: sticky; width: 30%; ">
                                <form class="form">
                                        <input type="text" id="1" onkeyup="searchTable(1)" size="20" placeholder="Cari No Plat" 
                                        style="
                                        margin-left: 4%; 
                                        border-radius: 10px; 
                                        border-color: aliceblue;
                                        right: 57%;
                                        margin-top: 2%;
                                        height: 41px;
                                        ">
                                </form>                                                                     
                                <a style="position: relative; margin-left: 70%" href="tambah.php" class="btn btn-primary" 
                                    style="
                                    margin-left: 77%;
                                    ">Tambah Data</a>  
                                
                            </table>
                        <div class="row">
                            <div class="table-responsive"  
                            style="
                            margin-top: 2%;
                            margin-left: 82px; 
                            margin-right: 42px">
                        <table width="100%" id="table1" cellspacing="0" class="table1 table-bordered">      
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th class="text-center" onclick="sortTable('alfa',1)">No Plat</th>
                                        <th class="text-center" onclick="sortTable('date',2)">Masa Pajak</th>
                                        <th class="text-center" onclick="sortTable('date',3)">Tanggal Bayar</th>
                                        <th class="text-center" onclick="sortTable('num',4)">NTPN</th>
                                        <th class="text-center" onclick="sortTable('alfa',5)">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                <tbody>
                                <?php
                   
                                    $query = ("SELECT * FROM history WHERE status = 'lunas'");

                                    $hasil=mysqli_query($con, $query);
                                        $no=1;
                                        while ($data = mysqli_fetch_array($hasil)) {
                    
                                    ?>
                                    <tr>        
                                        <td><?php echo $no++;   ?></td>
                                        <td><?php echo $data["nopolisi"];   ?></td>
                                        <td class="text-center"><?php echo date("d-M-Y", strtotime($data["masapajak"]));   ?></td>
                                        <td class="text-center"><?php echo date("d-M-Y", strtotime($data["bayar"]));   ?></td>
                                        <td><?php echo $data["ntpn"];   ?></td>
                                        <td class="text-center"><?php echo $data["status"];   ?></td>
                                        <td class="text-center">
                                        <button class='btn btn-sm show-btn' data-nopolisi="<?php echo $data['nopolisi']; ?>" style='background-color: gray; color: white; margin-right:10px;'>Bukti Pembayaran</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-nopolisi="<?php echo $data['nopolisi']; ?>">Hapus</button> </td>
                                        </td>
                                    </tr>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapusModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="font-size: 20px">Hapus Data<br>
                                                <?php echo $data['nopolisi']; ?>
                                               ?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
                                        <a class="btn btn-danger" href="../crud/hapusdatariwayat.php?nopolisi=<?php echo $data['nopolisi']; ?>">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- modal foto -->
                        <div class="modal fade" id="showfotoModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $imageData = $data['image'];
                                        echo '<img src="data:image/jpeg;base64,'.base64_encode($imageData).'" class="img-fluid" alt="Bukti Pembayaran">';
                                        ?>
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
            require "../../footer.php"
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

   
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
                    <a class="btn btn-primary" href="../../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

        document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
         
            const nopolisi = this.getAttribute('data-nopolisi');
            
            openModal('hapusModal' + nopolisi);
        });
    });

    document.querySelectorAll('.show-btn').forEach(button => {
        button.addEventListener('click', function() {
         
            const nopolisi = this.getAttribute('data-nopolisi');
            
            openModal('showfotoModal' + nopolisi);
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

</html