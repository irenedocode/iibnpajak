<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sort Search Data in Table</title>
<style>
html,body{font:12px Arial,Helvetica,sans-serif;}
.cari {padding:5px;border:1px solid #ddd;}
#table1 {border-collapse:collapse;}
#table1 th {padding:12px;text-align:center;background-color:#f0f0f0;cursor:pointer;}
#table1 th, #table1 td {border:1px solid #ddd;padding:6px;}
#table1 tr:nth-child(odd){background-color: #f1f1f1;}
#table1 tr:hover {background-color:#f8f8f8;}
</style>
</head>
<body>
<h2>Tabel Versi Android</h2>
<p><input type="text" id="1" class="cari" onkeyup="searchTable(1)" size="10" placeholder="Cari Nama...">
<input type="text" id="7" class="cari" onkeyup="searchTable(7)" size="10" placeholder="Cari Rilis..."></p>
<table id="table1">
  <tr>
    <th onclick="sortTable('num',0)">No.</th>
    <th onclick="sortTable('alfa',1)">Nama</th>
    <th onclick="sortTable('alfa',2)">Nama</th>
    <th onclick="sortTable('alfa',3)">Nama</th>
    <th onclick="sortTable('alfa',4)">Nama</th>
    <th onclick="sortTable('date',5)">Tanggal</th>
    <th onclick="sortTable('alfa',6)">Nama</th>
    <th onclick="sortTable('date',7)">Rilis</th>
  </tr>
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
</table>
<script>
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
</script>
</body>
</html>