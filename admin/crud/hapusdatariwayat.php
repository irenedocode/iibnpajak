<?php
include('../koneksi.php');

$nopolisi = $_GET['nopolisi'];


$query = "DELETE FROM history WHERE nopolisi = '$nopolisi'";

if($con->query($query)) {
    header("location: ../riwayat.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>