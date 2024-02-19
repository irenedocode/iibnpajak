<?php
include('../koneksi.php');

$nopolisi = $_GET['nopolisi'];
$bayar = $_GET['bayar'];


$query = "DELETE FROM history WHERE nopolisi = '$nopolisi' && bayar = '$bayar'";

if($con->query($query)) {
    header("location: ../riwayat/riwayat.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>