<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "data";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nopolisi = $_POST["nopolisi"];
    $masapajak = $_POST["masapajak"];
    $bayar = $_POST["bayar"];
    $ntpn = $_POST["ntpn"];
    $status = "lunas";
   
    $pembayaran_sukses = true;

    if ($pembayaran_sukses) {
        // Simpan informasi pembayaran ke tabel pembayaran_pajak
        $sql_pembayaran = "INSERT INTO history (nopolisi, masapajak, bayar, ntpn, status) 
                           VALUES ('$nopolisi', '$masapajak', '$bayar', '$ntpn', '$status')";
        $result_pembayaran = $conn->query($sql_pembayaran);

        // Perpanjang masa pajak selama 1 tahun setelah pembayaran sukses
        $sql_perpanjangan = "UPDATE kendaraan SET masapajak = DATE_ADD(masapajak, INTERVAL 1 YEAR) 
                             WHERE nopolisi = '$nopolisi'";
        $result_perpanjangan = $conn->query($sql_perpanjangan);

        if ($result_pembayaran === TRUE && $result_perpanjangan === TRUE) {
            echo "Pembayaran berhasil. Masa pajak diperpanjang hingga 1 tahun.";
            header('Location: riwayat.php?status=sukses');
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
