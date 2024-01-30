<?php

$koneksi = mysqli_connect("localhost","root","","data"); //ganti ke iibn1

//login

if(isset($_POST['Login'])) {
    $email = $_POST['email'];//"reza"
    $password = $_POST['password'];//3210

    $cekuser = mysqli_query($koneksi,"select role from login where email= '$email' and password='$password'");
    //role ==> pelanggan <> nullv

    $role = mysqli_fetch_assoc($cekuser)["role"];

    $hitung = mysqli_num_rows($cekuser);//max 1 min 0
    if($hitung == 0){
        echo "login gagal";
        header('location:login');
    }else{
        if($role == 'user'){
            header('location:user/index.php');
        }elseif($role =='admin'){
            header('location:admin/index.php');
        }else{
            echo "role tidak ditemukan";
        }
    }
    
}




?>