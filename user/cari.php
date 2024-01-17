<?php

$con = mysqli_connect("localhost","root","","data"); //ganti ke iibn1 ntar

if(isset($_GET['cari'])){
    $nama = $_GET['cari'];
    $query = mysqli_query($con,"SELECT * FROM kendaraan WHERE nama = '$nama'");		

    $hitung = mysqli_num_rows($query);//max 1 min 0
    if($hitung == 0){
        echo "data tidak ditemukan";
        header('location:infokendaraan');
    } else {
            header('location:infokendaraan');
    }

}

?>