<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan email dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");

$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role']=="user"){

		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "user";
		// alihkan ke halaman dashboard admin
		header("location:user/index.php");

	// cek jika user login sebagai pegawai
	}else if($data['role']=="pegawai"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_pegawai.php");

	// cek jika user login sebagai pengurus
	}else if($data['role']=="pengurus"){
		// buat session login dan email
		$_SESSION['email'] = $email;
		$_SESSION['role'] = "pengurus";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_pengurus.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}

      unset($_SESSION['logged_in']);  
      session_destroy();  



?>