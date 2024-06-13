<?php
	
	// Include file koneksi
	require_once 'controller.php';
	
	session_start();// Memulai Session
	// Menyimpan Session
	$user_check = $_SESSION['username'];
	$role = $_SESSION['role'];
	// Ambil nama karyawan berdasarkan username karyawan dengan mysqli_fetch_assoc
	$ses_sql=mysqli_query($koneksi, "select * from users where username = '$user_check' and role = '$role'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['role'];

	if(!isset($login_session)){
		mysqli_close($koneksi); // Menutup koneksi
		header('location: signin.php'); // Mengarahkan ke Home Page
	}

?>