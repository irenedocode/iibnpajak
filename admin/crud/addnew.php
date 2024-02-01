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

$nopolisi = strtoupper($nopolisi);

$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM kendaraan WHERE nama='$nama' && nopolisi='$nopolisi' && rangka='$rangka'"));
    if ($cek > 0){
    echo "<script>window.alert('nama atau email yang anda masukan sudah ada')
    window.location='../index.php'</script>";
}else {

$sql = "INSERT INTO kendaraan (nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak) VALUES ('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak')";
$query = mysqli_query($con, $sql);

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: ../index.php?status=sukses');
} 
}
}


    else {
    die("Akses dilarang...");
}




?>