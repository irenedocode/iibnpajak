<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="sb-admin-2.min.css">
    
</head>
<body>
    

<?php
include('koneksi.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the license plate number (nopolisi) from the query string
$nopolisi = $_GET['nopolisi'];

// Prepare the SQL statement
$query = "SELECT * FROM kendaraan WHERE nopolisi = ?";
$stmt = $con->prepare($query);

// Bind parameters
$stmt->bind_param('s', $nopolisi);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the row
$row = $result->fetch_array();

// Check if the row is not empty
if ($row) {
    // Output the image data as an image
    
    ?>
            <button onclick="location.href='info.php'" class="btn-primary" type="button" style="width: 100px; margin-left: 1500px">
                        <span aria-hidden="true">×</span>
            </button>
            <div class="container" style="margin-left: 500px; width: 100px">
            <div class="card" style="width: 737px;">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'; ?>
            <table class="table1 table-bordered" id="table1" style="width: 500px">
                <tr class="text-center">
                    <th class="text-center" onclick="sortTable('alfa',1)">Nama Pemilik</th>
                    <th class="text-center" onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                    <th class="text-center" onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                    <th class="text-center" onclick="sortTable('alfa',4)">No Plat</th>
                    <th class="text-center" onclick="sortTable('date',5)">Tahun Pembuatan</th>
                    <th class="text-center" onclick="sortTable('alfa',6)">Nomor Rangka</th>
                    <th class="text-center" onclick="sortTable('date',7)">Masa Pajak</th>
                                      
                </tr>
                <tr class="text-center">
                    <?php
                    
                    echo "<td>".$row["nama"]."</td>"; 
                    echo "<td>".$row["jeniskendaraan"]."</td>";
                    echo "<td>".$row["jenismobilmotor"]."</td>";
                    echo "<td>".$row["nopolisi"]."</td>";
                    echo "<td>".date("Y", strtotime($row["pembuatan"]))."</td>";
                    echo "<td>".$row["rangka"]."</td>";
                    echo "<td>".date("Y-M-d", strtotime($row["masapajak"]))."</td>";
                    echo "</tr>";
                } else {
                    echo "Image not found.";
                }
                    ?>
            </tr>
            </table>      
    </div>
    </div>
                    <?php

// Close statement
$stmt->close();

// Close connection
$con->close();
?>

</body>
</html>
