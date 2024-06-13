<?php

include_once "../../controller.php";

    if(empty($_POST["uname"]) || empty($_POST["mail"]) || empty($_POST["pass"])) {
        echo "<script>
                alert('Data tidak boleh kosong');
                    window.location.href = 'users.php';
              </script>";
        return false;
    }
        $username = strtolower(stripslashes($_POST['uname']));
        $email = strtolower(stripslashes($_POST['mail']));
        $password = mysqli_real_escape_string($koneksi, $_POST['pass']);

        if (isset($_POST['tambah'])) {
            
            $cekusername = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
            if ($cekusername->num_rows > 0) {
                echo "<script>alert('Username sudah digunakan'); window.location.href = 'users.php';</script>";
                return false;
            }

            // cek apakah email sudah digunakan atau belum
            $cekemail = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
            if ($cekemail->num_rows > 0) {
                echo "<script>alert('Email sudah digunakan'); window.location.href = 'users.php';</script>";
                return false;
            }
            
            $result = mysqli_query($koneksi,"INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', 3)");
            
            if($result) {
                echo "<script> alert('Data berhasil ditambahkan');
                       window.location.href = 'users.php';
                </script>";
                
                return true;
            }
        }
?>