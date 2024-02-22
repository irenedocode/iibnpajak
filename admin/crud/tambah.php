<?php
include('../koneksi.php');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jeniskendaraan = $_POST['jeniskendaraan'];
    $jenismobilmotor = $_POST['jenismobilmotor'];
    $nopolisi = strtoupper($_POST['nopolisi']);
    
    $pembuatan = $_POST['pembuatan'];
    $rangka = $_POST['rangka'];
    $masapajak = $_POST['masapajak'];

    $cekNopolisi = mysqli_query($con, "SELECT nopolisi FROM kendaraan WHERE nopolisi = '$nopolisi'");
    if (mysqli_num_rows($cekNopolisi) > 0) {
        echo '<script language="javascript">';
        echo 'alert("No Plat sudah ada");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
        exit();
    }

    
    $file = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $fileError = $_FILES['image']['error'];

   
    if ($fileError === UPLOAD_ERR_OK) {
        $fileContent = file_get_contents($file);
        $escapedFileContent = mysqli_real_escape_string($con, $fileContent);
    } else {
        $em = "Error uploading file: $fileError";
        header("Location: ../index.php?error=$em");
        exit();
    }

    // Insert into Database using prepared statement
    $stmt = $con->prepare("INSERT INTO kendaraan(nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak, image) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nama, $jeniskendaraan, $jenismobilmotor, $nopolisi, $pembuatan, $rangka, $masapajak, $escapedFileContent);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        $em = "Error: " . $stmt->error;
        header("Location: ../index.php?error=$em");
        exit();
    }
} else {
    $em = "Error: Submit not work";
    header("Location: ../index.php?error=$em");
    exit();
}

mysqli_close($con);
?>
