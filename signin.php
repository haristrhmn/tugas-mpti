<?php
  require_once 'login_check.php';

  // if(isset($_SESSION['username'])){
  //   header("location: index.php");
  // }
  
  // if(!empty($error)) :
  // endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/icon.png" type="x-icon">
</head>

<body>
    <div class="form-login">
        <img src="images/icon.png" class="icon">
        <h1 class="judul">Login</h1>
        <form action="#" method="post" autocomplete="off">
            <input type="text" name="username" class="form-section" placeholder="Username">
            <input type="password" name="password" class="form-section" placeholder="Password">
            <input type="submit" class="btn-login" name="submit" value="Login">
            <p class="notif">Belum punya akun?</p>
            <a href="signup.php" class="link">Daftar</a>
        </form>
    </div>
</body>

</html>