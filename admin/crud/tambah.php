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

    echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";
    
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

    if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: ../index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO kendaraan(nama, jeniskendaraan, jenismobilmotor, nopolisi, pembuatan, rangka, masapajak, image_data) 
				        VALUES('$nama', '$jeniskendaraan', '$jenismobilmotor', '$nopolisi', '$pembuatan', '$rangka', '$masapajak','$new_img_name')";
				mysqli_query($con, $sql);
				header("Location: ../index.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ../index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ../index.php?error=$em");
	}

}

?>