<?php
include 'koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Expiration Reminder</title>
    <link rel="stylesheet" href="sb-admin-2.min.css">
<style>
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Masa Pajak Sudah Hampir Habis!</h2>
        <p>Berikut datanya..</p>
    <table>
        <thead>
                <tr class="text-center">
                    <th class="text-center" onclick="sortTable('alfa',1)">Nama Pemilik</th>
                    <th class="text-center" onclick="sortTable('alfa',2)">Jenis Kendaraan</th>
                    <th class="text-center" onclick="sortTable('alfa',3)">Jenis Mobil/Motor</th>
                    <th class="text-center" onclick="sortTable('alfa',4)">No Plat</th>
                    <th class="text-center" onclick="sortTable('alfa',5)">Wilayah</th>
                    <th class="text-center" onclick="sortTable('date',6)">Tahun Pembuatan</th>
                    <th class="text-center" onclick="sortTable('alfa',7)">Nomor Rangka</th>
                    <th class="text-center" onclick="sortTable('date',8)">Masa Pajak</th>           
                </tr>
        </thead>
       <tbody>

       <?php
    // Connect to the MySQL database
    $conn = mysqli_connect("localhost", "root", "", "data");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the products table
    $sql = "SELECT * FROM kendaraan order by masapajak asc";
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($data = $result->fetch_assoc()) {
            // Check if the expiration date is close
            $expire_date = strtotime($data["masapajak"]);
            $current_date = time();
            $days_until_expire = ($expire_date - $current_date) / (60 * 60 * 24);
            $class = $days_until_expire < 30 ? 'class="closest-expire"' : '';

      
        ?>
        <tr class="text-center">
            <?php
            echo "<tr $class>";
            echo "<td>".$data["nama"]."</td>";
            echo "<td>".$data["jeniskendaraan"]."</td>";
            echo "<td>".$data["jenismobilmotor"]."</td>";
            echo "<td>".$data["nopolisi"]."</td>";
            echo "<td>".date("Y", strtotime($data["pembuatan"]))."</td>";
            echo "<td>".$data["rangka"]."</td>";
            echo "<td>".date("Y-M-d", strtotime($data["masapajak"]))."</td>";
            echo "</tr>";
       
        
        ?>
        </tr>
       </tbody>
       <?php
    }
    } else {
        echo "0 results";
    }
    // Close connection
    $conn->close();
    ?>
    </table>
    </div>
</div>

<script src="script.js"></script>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("modal");
        var closeButton = document.querySelector(".close");

        // Show modal when the page loads
        modal.style.display = "block";

        // Close the modal when the user clicks on the close button or anywhere outside the modal
        closeButton.addEventListener("click", function () {
            redirectToAnotherPage();
        });

        window.addEventListener("click", function (event) {
            if (event.target == modal) {
                redirectToAnotherPage();
            }
        });
    });

    function redirectToAnotherPage() {
        window.location.href = "info.php"; // Replace "another_page.php" with the URL of the page you want to redirect to
    }
</script>

</html>
