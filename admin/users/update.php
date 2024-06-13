<?php 

    include_once "../../controller.php";

    $id;
    $email;
    $password;

    if (isset($_POST['ubah'])) {
        $id = $_POST['id'];
        $email = $_POST['em'];
        $password = $_POST['pw'];

        $sql = "UPDATE users SET email = '$email', password = '$password' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $sql);
        
        echo "<script>alert('Data berhasil diubah'); window.location='users.php';</script>";
    } else {
        // echo "<script>alert('Invalid Request'); history.back();</script>";
    }

?>