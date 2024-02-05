<?php

include('../koneksi.php');

if (isset($_POST['submit'])) {
$nopolisi = $_POST['nopolisi'];
  
$query = "SELECT * FROM history WHERE nopolisi = '$nopolisi'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);

$nopolisi     = $_POST['nopolisi'];
$masapajak    = $_POST['masapajak'];
$bayar        = $_POST['bayar'];
$ntpn         = $_POST['ntpn'];

$status = "lunas";
$nopolisi = strtoupper($nopolisi);

$query = "UPDATE history SET nopolisi = '$nopolisi', masapajak = '$masapajak', bayar = '$bayar', ntpn = '$ntpn' WHERE nopolisi = '$nopolisi'";


if($con->query($query)) {
  
    header("location: ../riwayat.php");
} else {
   
    echo "Data Gagal Di Update!";
}
}

?>