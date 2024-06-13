<?php
 define('BASEPATH', 'public');

 require_once 'register_check.php';
 
 if (isset($_POST["daftar"]) ) {
   if (daftar($_POST)) {
    echo "<script>
             alert('Selamat! Akun anda berhasil dibuat'); 
             window.location.href = 'signin.php';
          </script>";
   } else {
     echo mysqli_error($koneksi);
   }
 }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icon.png" type="x-icon">
</head>

<body>
    <div class="form-daftar">
        <img src="images/icon.png" class="logo">
        <h1>Daftar</h1>
        <form action="#" method="post" autocomplete="off">
            <input type="text" name="username" class="form-input" placeholder="Username">
            <input type="email" name="email" class="form-input" placeholder="Email">
            <input type="password" name="password" class="form-input" placeholder="Password">
            <input type="submit" name="daftar" class="btn" value="Daftar">
            <p class="txt">Sudah punya akun?</p>
            <a href="signin.php" class="link">Login</a>
        </form>
    </div>
</body>

</html>