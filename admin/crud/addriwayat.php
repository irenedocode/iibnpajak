<?php

include ('../koneksi.php')

?>

<?php

if (isset($_POST['submit'])) {

$nopolisi     = $_POST['nopolisi'];
$masapajak    = $_POST['masapajak'];
$bayar        = $_POST['bayar'];
$ntpn         = $_POST['ntpn'];
    $file = $_FILES['image']['tmp_name'];
	$fileContent = file_get_contents($file);
	$escapedFileContent = mysqli_real_escape_string($con, $fileContent);


$status = "lunas";
$nopolisi = strtoupper($nopolisi);

$sql = "INSERT INTO history (nopolisi, masapajak, bayar, ntpn, status, image) VALUES ('$nopolisi', '$masapajak', '$bayar', '$ntpn', '$status', '$escapedFileContent')";
$query = mysqli_query($con, $sql);

    if( $query ) {
    
    header('Location: ../riwayat.php?status=sukses');
    } else {
    header('Location: ../riwayat.php?status=gagal');
    }


}

    else {
    die("Akses dilarang...");
}




?>