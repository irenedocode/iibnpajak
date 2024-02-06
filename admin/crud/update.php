<?php

include('../koneksi.php');

if (isset($_POST['submit'])) {
    $nopolisi = $_POST['nopolisi'];

    $query = "SELECT * FROM kendaraan WHERE nopolisi = '$nopolisi'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    $nama = $_POST['nama'];
    $jeniskendaraan = $_POST['jeniskendaraan'];
    $jenismobilmotor = $_POST['jenismobilmotor'];
    $pembuatan = $_POST['pembuatan'];
    $rangka = $_POST['rangka'];
    $masapajak = $_POST['masapajak'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image']['tmp_name'];
        $fileContent = file_get_contents($file);
        $escapedFileContent = mysqli_real_escape_string($con, $fileContent);

        $query = "UPDATE kendaraan SET nama = '$nama', jeniskendaraan = '$jeniskendaraan', jenismobilmotor = '$jenismobilmotor', pembuatan = '$pembuatan', rangka = '$rangka' ,masapajak = '$masapajak', image = '$escapedFileContent' WHERE nopolisi = '$nopolisi'";

        if ($con->query($query)) {
            header("location: ../info.php");
            exit(); // Terminate script after redirect
        } else {
            echo "Data Gagal Di Update!";
        }
    } else {
        echo "File upload gagal atau tidak ada file yang diunggah.";
    }
}

?>
