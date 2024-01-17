<?php

include('../koneksi.php');


$nama               = $_POST['nama'];
$jeniskendaraan     = $_POST['jeniskendaraan'];
$jenismobilmotor    = $_POST['jenismobilmotor'];
$nopolisi           = $_POST['nopolisi'];
$pembuatan          = $_POST['pembuatan'];
$rangka             = $_POST['rangka'];
$masapajak          = $_POST['masapajak'];


$query = "UPDATE kendaraan SET nama = '$nama', jeniskendaraan = '$jeniskendaraan', jenismobilmotor = '$jenismobilmotor', nopolisi = '$nopolisi', 
pembuatan = '$pembuatan', rangka = '$rangka' ,masapajak = '$masapajak' WHERE nopolisi = '$nopolisi'";


if($con->query($query)) {
  
    header("location: ../infoadmin.php");
} else {
   
    echo "Data Gagal Diupate!";
}

?>