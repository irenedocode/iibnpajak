<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "data";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $nopolisi = $_POST["nopolisi"];
    $bayar = $_POST["bayar"];
    $ntpn = $_POST["ntpn"];
    $status = "lunas"; // Ensure this is the correct status

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image']['tmp_name'];
        $fileContent = file_get_contents($file);
        $escapedFileContent = mysqli_real_escape_string($conn, $fileContent);
    } else {
        echo "Error: No file uploaded or file upload error.";
        // Handle the case where no file is uploaded or there's an error
    }
    

// Check if the payment was successful
$pembayaran_sukses = true; // You need to implement the logic for this

if ($pembayaran_sukses) {
    // Simpan informasi pembayaran ke tabel pembayaran_pajak
    $sql_pembayaran = "INSERT INTO history (nopolisi, masapajak, bayar, ntpn, status, image) 
                       VALUES ('$nopolisi', '$masapajak', '$bayar', '$ntpn', '$status', '$escapedFileContent')";
    $result_pembayaran = $conn->query($sql_pembayaran);

    // Perpanjang masa pajak selama 1 tahun setelah pembayaran sukses
    $sql_perpanjangan = "UPDATE kendaraan SET masapajak = DATE_ADD(masapajak, INTERVAL 1 YEAR) 
                         WHERE nopolisi = '$nopolisi'";
    $result_perpanjangan = $conn->query($sql_perpanjangan);

    if ($result_pembayaran === TRUE && $result_perpanjangan === TRUE) {
        echo "Pembayaran berhasil. Masa pajak diperpanjang hingga 1 tahun.";
        header('Location: riwayat.php?status=sukses');
        exit; // It's a good practice to exit after a header redirect
    } else {
        echo "Error: " . $sql_pembayaran . "<br>" . $conn->error;
    }
} else {
    echo "Pembayaran gagal. Silakan coba lagi.";
}

}

// Tutup koneksi ke database
$conn->close();
?>
