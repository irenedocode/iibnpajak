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

				// Insert into Database
				$sql = "INSERT INTO kendaraan(nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak, image_data) 
				        VALUES('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak','$new_img_name')";
				mysqli_query($con, $sql);
				header("Location: ../info.php");
			}else {
				$em = "Error";
		        header("Location: ../info.php?error=$em");
			}


?>