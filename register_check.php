<?php

require_once 'controller.php';

function daftar ($data) {
  global $koneksi;

  $username = strtolower(stripslashes($data["username"]));
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($koneksi,$data["password"]);

  if( empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    echo "<script>
            alert('Data tidak boleh kosong');
          </script>";

    return false;
  }
  
  // untuk cek username apakah sudah digunakan atau belum
  $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
  if ($result->num_rows > 0) {
    echo "<script>alert('Username sudah digunakan'); 
                window.location.href = 'signup.php';
        </script>";
    return false;
  }
  
  // untuk cek email apakah sudah digunakan atau belum
  $cekemail = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
  if ($cekemail->num_rows > 0) {
    echo "<script>alert('Email sudah digunakan'); 
                window.location.href = 'signup.php';
        </script>";
    return false;
  }

  // jika ingin menggunakan enkripsi password
  // $password = password_hash($password, PASSWORD_DEFAULT);

  // menambahkan data ke database
  mysqli_query($koneksi, "INSERT INTO users (username, email, password, role) VALUE ('$username', '$email', '$password', 3)");

  return true;
}
?>