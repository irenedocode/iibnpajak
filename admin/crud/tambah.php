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

    $ceknopolisi = mysqli_query($con, "SELECT nopolisi from kendaraan");


    if (mysqli_num_rows($ceknopolisi) == 0) {

    // Insert into Database
    $sql = "INSERT INTO kendaraan(nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak, image) 
            VALUES('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak', '$escapedFileContent')";

    } else {
            echo '<script language="javascript">';
            echo 'alert("No Plat sudah ada");'; // Add a semicolon here to terminate the statement
            echo 'window.location.href = "../index.php";'; // Add a semicolon here as well
            echo '</script>';
    }
    if (mysqli_query($con, $sql)) {
        header("Location: ../index.php");
    } else {
        $em = "Error";
        header("Location: ../index.php?error=$em");
    }
} else {
    $em = "Error";
    header("Location: ../index.php?error=$em");
}
?>
