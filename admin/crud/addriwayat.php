<?php

include ('../koneksi.php')

?>

<?php

if (isset($_POST['submitriwayat'])) {

$nopolisi           = $_POST['nopolisi'];
$masapajak          = $_POST['masapajak'];
$bayar              = $_POST['bayar'];
$ntpn               = $_POST['ntpn'];
$status             = $_POST['status'];

$nopolisi = strtoupper($nopolisi);

$sql = "INSERT INTO history (nopolisi, masapajak, bayar, ntpn, status) VALUES ('$nopolisi', '$masapajak', '$bayar', '$ntpn', '$status')";
$query = mysqli_query($con, $sql);

    if( $query ) {
    
    header('Location: ../index.php?status=sukses');
    } else {
    header('Location: ../index.php?status=gagal');
    }


}

    else {
    die("Akses dilarang...");
}




?>