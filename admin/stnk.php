<?php
// Connect to your MySQL database
$conn = new mysqli("localhost", "root", "", "data");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$nopolisi = $_GET['nopolisi'];
    $query = "SELECT image_data FROM kendaraan WHERE nopolisi = '$nopolisi'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

?>


<?php
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' /></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
$conn->close();
?>
