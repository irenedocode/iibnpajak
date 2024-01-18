<?php

include('../koneksi.php');

$nopolisi = $_GET['nopolisi'];

$query = "DELETE FROM kendaraan WHERE nopolisi = '$nopolisi'";

if($con->query($query)) {
    header("location: ../infoadmin.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>