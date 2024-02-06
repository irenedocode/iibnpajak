<?php
include('../koneksi.php');

if (isset($_POST['submit'])) {
    $nama               = $_POST['nama'];
    $jeniskendaraan     = $_POST['jeniskendaraan'];
    $jenismobilmotor    = $_POST['jenismobilmotor'];
    $nopolisi           = $_POST['nopolisi'];
    $pembuatan          = $_POST['pembuatan'];
    $rangka             = $_POST['rangka'];
    $masapajak          = $_POST['masapajak'];

  

		$file = $_FILES['image']['tmp_name'];
		$fileContent = file_get_contents($file);
		$escapedFileContent = mysqli_real_escape_string($con, $fileContent);

    $nopolisi = strtoupper($nopolisi);

    // Insert into Database
    $sql = "INSERT INTO kendaraan(nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak, image) 
            VALUES('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak', '$escapedFileContent')";

    if (mysqli_query($con, $sql)) {
        header("Location: ../info.php");
    } else {
        $em = "Error";
        header("Location: ../info.php?error=$em");
    }
} else {
    $em = "Error";
    header("Location: ../info.php?error=$em");
}
?>
