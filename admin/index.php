<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Informasi Pajak</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,800;0,900;1,500;1,600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

    


</head>

<body id="page-top">

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Masa Pajak Sudah Hampir Habis / Telah Habis!</h2>
        <p>Berikut datanya..</p>
    <table>
        <thead>
                <tr class="text-center">
                    <th class="text-center" onclick="sortTable('alfa',1)">Nama Pemilik</th>
                    <th class="text-center" onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                    <th class="text-center" onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                    <th class="text-center" onclick="sortTable('alfa',4)">No Plat</th>
                    <th class="text-center" onclick="sortTable('date',5)">Tahun Pembuatan</th>
                    <th class="text-center" onclick="sortTable('alfa',6)">Nomor Rangka</th>
                    <th class="text-center" onclick="sortTable('date',7)">Masa Pajak</th>           
                </tr>
        </thead>
       <tbody>

       <?php
    // Connect to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "data");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the products table
    $sql = "SELECT * FROM kendaraan order by masapajak asc";
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($data = $result->fetch_assoc()) {
            // Check if the expiration date is close
            $expire_date = strtotime($data["masapajak"]);
            $current_date = time();
            $days_until_expire = ($expire_date - $current_date) / (60 * 60 * 24);
            $class = $days_until_expire < 30 ? 'class="closest-expire"' : '';

      
        ?>
        <tr class="text-center">
            <?php
            echo "<tr $class>";
            echo "<td>".$data["nama"]."</td>";
            echo "<td>".$data["jeniskendaraan"]."</td>";
            echo "<td>".$data["jenismobilmotor"]."</td>";
            echo "<td>".$data["nopolisi"]."</td>";
            echo "<td>".date("Y", strtotime($data["pembuatan"]))."</td>";
            echo "<td>".$data["rangka"]."</td>";
            echo "<td>".date("Y-M-d", strtotime($data["masapajak"]))."</td>";
            echo "</tr>";
       
        
        ?>
        </tr>
       </tbody>
       <?php
    }
    } else {
        echo "0 results";
    }
    // Close connection
    $conn->close();
    ?>
    </table>
    </div>
</div>


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
                                        <input type="text" id="1" onkeyup="searchNama(1)" size="20" placeholder="Cari Nama" 
                                        style="
                                        width: 15%; 
                                        border-radius: 10px; 
                                        border-color: aliceblue;
                                        margin-top:2%;
                                        height: 41px;
                                        position: relative;
                                        margin-left: 90px;
                                        ">
                                
                                    <input type="text" id="4" onkeyup="searchNoplat(4)" size="20" placeholder="Cari No Plat Cth: XX XXXX" 
                                        style=" 
                                        width: 15%; 
                                        border-radius: 10px; 
                                        border-color: aliceblue;
                                        margin-top:2%;
                                        height: 41px;
                                        position: relative;
                                        margin-left: 20px;
                                        ">       
                                
                                <div class="dropdown">
                                <button class="btn btn-primary" style="text-align: left; width: 100%; position: relative; margin-left: 50px; margin-top: 16%"  
                                id="selectedCategory">Daerah Yang Dipilih:</button>
                                <div class="dropdown-content" id="myDropdown" style=" left: 50px">
                                    <a href="#" onclick="filterData('All')">All</a>
                                    <a href="#" onclick="filterData('Batam')">Batam</a>
                                    <a href="#" onclick="filterData('Sumatera Utara')">Sumatera Utara</a>
                                    <a href="#" onclick="filterData('Jakarta')">Jakarta</a>
                                    <a href="#" onclick="filterData('Bandung')">Bandung</a>
                                    <a href="#" onclick="filterData('Surabaya')">Surabaya</a>
                                </div>
                                </div>
                                <div class="button" style="position: absolute; margin-top: 37px; margin-left: 80%;">
                                        <a href="tambah.php" class="btn btn-primary" style="height: 40px">Tambah Data</a>
                                        <a href="export.php" class="btn btn-success" style="height: 40px">Export Tabel</a>
                                </div>
                        </div>
                        
                    <div class="table-responsive">
                        <table class="table1 table-bordered" id="table1" name="#htmltable" 
                            style="
                            width: 100%; 
                            margin-left: 50px; 
                            margin-right: 50px; 
                            margin-top: 2%;">
                                <thead>
                                    <tr>
                                        <th class="text-center" onclick="sortTable('num',0)">No</th>
                                        <th class="text-center" onclick="sortTable('alfa',1)">Nama Pemilik</th>
                                        <th class="text-center" onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                                        <th class="text-center" onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                                        <th class="text-center" onclick="sortTable('alfa',4)">No Plat</th>
                                        <th class="text-center" onclick="sortTable('alfa',5)">Wilayah</th>
                                        <th class="text-center" onclick="sortTable('date',6)">Tahun Pembuatan</th>
                                        <th class="text-center" onclick="sortTable('alfa',7)">Nomor Rangka</th>
                                        <th class="text-center" onclick="sortTable('date',8)">Masa Pajak</th>  
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php

$con = mysqli_connect("localhost", "root", "", "data");
$sql = "SELECT * FROM kendaraan";
$hasil = mysqli_query($con, $sql);
$no = 0;

while ($data = $hasil->fetch_assoc()) {
    $no++;
    // Extracting the nopolisi value directly from the database result
    $nopolisi = $data['nopolisi'];

    // Determine the wilayah based on the $nopolisi value
    if (substr($nopolisi, 0, 2) === "BP") {
        $wilayah = "Batam";
    } elseif (substr($nopolisi, 0, 2) === "BB") {
        $wilayah = "Sumatera Utara";          
    } elseif (substr($nopolisi, 0, 1) === "B") {
        $wilayah = "Jakarta";
    } elseif (substr($nopolisi, 0, 1) === "D") {
        $wilayah = "Bandung";
    } elseif (substr($nopolisi, 0, 1) === "L") {
        $wilayah = "Surabaya";      
    } else {
        $wilayah = "Unknown";
    }

    // Output the table row with the determined wilayah
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $data["nama"] . "</td>";
    echo "<td>" . $data["jeniskendaraan"] . "</td>";
    echo "<td>" . $data["jenismobilmotor"] . "</td>";
    echo "<td>" . $data["nopolisi"] . "</td>";
    echo "<td>" . $wilayah . "</td>";
    echo "<td class='text-center'>" . date("Y", strtotime($data["pembuatan"])) . "</td>";
    echo "<td>" . $data["rangka"] . "</td>";
    echo "<td class='text-center'>" . date("d-M-y", strtotime($data["masapajak"])) . "</td>";
    echo "<td class='text-center'>";
    echo "<button class='btn btn-sm show-btn' data-nopolisi='" . $data['nopolisi'] . "' style='background-color: gray; color: white; margin-right:10px;'>Lihat STNK</button>";
    echo "<a href='edit.php?nopolisi=" . $data['nopolisi'] . "' class='btn btn-sm btn-primary alert_notif' style='margin-right:10px'>Edit</a>";
    echo "<button class='btn btn-sm btn-danger delete-btn' data-nopolisi='" . $data['nopolisi'] . "'>Hapus</button>";
    echo "</td>";
    echo "</tr>";

?>

                        <!-- Konfirmasi Hapus -->
                        <div class="modal fade" id="hapusModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
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

                        <!-- Modal Foto -->
                        <div class="modal fade" id="showfotoModal<?php echo $data['nopolisi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php
                                    include('koneksi.php');
                                    // Check connection
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    }
                                    // Prepare the SQL statement
                                    $query = "SELECT * FROM kendaraan WHERE nopolisi = ?";
                                    $stmt = $con->prepare($query);

                                    // Bind parameters
                                    $stmt->bind_param('s', $nopolisi);

                                    // Execute the statement
                                    $stmt->execute();
                                    // Get the result
                                    $result = $stmt->get_result();
                                    // Fetch the row
                                    $row = $result->fetch_array();

                                    // Check if the row is not empty
                                    if ($row) {
                                        // Output the image data as an image
                                        
                                        ?>
                                               
                                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'; ?>    
                                    
                                        
                                        <?php }

                                    // Close statement
                                    $stmt->close();

                                    // Close connection
                                    $con->close();
                                    ?>
                                    
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
    </div>
    <!-- End of Page Wrapper -->
    </div>

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

function filterData(category) {
    var rows = document.querySelectorAll('table tr');

    if (!category) {
        console.error('Category is undefined or null.');
        return;
    }

    console.log("Filtering category: ", category);

    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName('td');
        var cellCategory = cells[5]; // Assuming the category is in the 6th column (index 5)

        console.log("Row ", i, " Cells: ", cells); // Debugging: Log cells array
        console.log("Row ", i, " Cell category: ", cellCategory); // Debugging: Log cellCategory

        if (cellCategory) {
            console.log("Row ", i, " Category: ", cellCategory.innerText); // Debugging: Log innerText
            if (category === 'All' || (cellCategory.innerText.trim().toUpperCase() === category.toUpperCase())) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        } else {
            console.error('Cell category is undefined or null.');
        }
    }

    updateSelectedCategoryText(category);
}


function updateSelectedCategoryText(category) {
    var selectedCategoryElement = document.getElementById('selectedCategory');

    if (!selectedCategoryElement) {
        console.error('Element with ID "selectedCategory" not found.');
        return;
    }

    selectedCategoryElement.innerText = 'Daerah: ' + category;
}



var modal = document.getElementById("myModal");

var span = document.getElementsByClassName("close")[0];

window.onload = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

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

</html>