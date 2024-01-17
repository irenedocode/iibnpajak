<?php

include ('../koneksi.php')

?>

<?php

if (isset($_POST['submit'])) {
    

$nama               = $_POST['nama'];
$jeniskendaraan     = $_POST['jeniskendaraan'];
$jenismobilmotor    = $_POST['jenismobilmotor'];
$nopolisi           = $_POST['nopolisi'];
$pembuatan          = $_POST['pembuatan'];
$rangka             = $_POST['rangka'];
$masapajak          = $_POST['masapajak'];


$sql = "INSERT INTO kendaraan (nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak) VALUES ('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak')";
$query = mysqli_query($con, $sql);

    if( $query ) {
    
    header('Location: infoadmin.php?status=sukses');
    } else {

    header('Location: infoadmin.php?status=gagal');
    }


} 

    else {
    die("Akses dilarang...");
}




?>