<?php
require_once 'controller.php';
session_start(); // Memulai Session
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			echo "<script> alert('Username atau password tidak valid');
			window.location.href = 'signin.php';
			</script>";
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		// Mencegah MySQL injection 
		$username = strtolower(stripslashes($username));
		// $password = strtolower(stripslashes($password));
		
		$username = mysqli_real_escape_string($koneksi, $username);
		$password = mysqli_real_escape_string($koneksi, $password);
		
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$a = mysqli_fetch_assoc($query);
			
			// untuk cek password jika menggunakan enkripsi password
			// if (!password_verify($password, $a['password'])) {
			// 	die("<script> alert('Username atau password salah');
			// 	window.location.href = 'signin.php';
			// 	</script>");
			// }

			// untuk cek password jika tidak menggunakan enkripsi password
			if ($password !== $a['password']) {
				die("<script> alert('Username atau password salah');
				window.location.href = 'signin.php';
				</script>");
			}

			$_SESSION['username'] = $username; // Membuat Sesi/session
			$_SESSION['id'] = $a['id'];
			$_SESSION['role'] = $a['role'];
			setcookie("id", $_SESSION['id']);
			
			if ($a['role'] == "1") {
				echo "<script> alert('Selamat datang $a[username]');
							window.location.href = 'index.php';
					</script>";
				exit;
			}else if ($a['role'] == "2") {
				echo "<script> alert('Selamat datang $a[username]');
							window.location.href = 'admin/users/index.php';
					</script>";
				exit;
				
			} else {
				echo "<script> alert('Selamat datang $a[username]');
							window.location.href = 'user.php';
					</script>";
				exit;
			}
		}
		mysqli_close($koneksi); // Menutup koneksi
	}
}
?>