<?php

require_once 'controller.php';

$nama = $_POST['nama_barang'];
$namafoto = $_FILES['gambar']['name'];
$ukuranfoto = $_FILES['gambar']['size'];
$tmpName = $_FILES['gambar']['tmp_name'];
$error = $_FILES['gambar']['error'];

// var_dump($_FILES);
if(empty($_POST['nama_barang']) || empty($_FILES['gambar']['name'])) {
   $nama = $_POST['nama_barang'];
   $namafoto = $_FILES['gambar']['name'];
   echo "<script>
           alert('Data tidak boleh kosong');
               window.location.href = 'stok.php';
         </script>";
   return false;
}

if($error === 4){
   return false;
}
   // cek apakah yang diupload gambar
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namafoto);
   $ekstensiGambar = strtolower(end($ekstensiGambar));
   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
   echo "<script>
               alert('Silahkan upload gambar dengan format jpg, jpeg, atau png');
               window.location.href = 'stok.php';
         </script>";
         return false;
   }
         

   // cek jika ukurannya terlalu besar
   if ($ukuranfoto > 5000000) {
      echo "<script>
                  alert('Ukuran gambar terlalu besar');
                  window.location.href = 'stok.php';
            </script>";
         return false;
   }
   
   // upload gambar dan generate nama file baru
   $namafoto = uniqid();
   $namafoto .= '.';
   $namafoto .= $ekstensiGambar;
   
   move_uploaded_file($tmpName, 'images/' . $namafoto);
  
$sql = "INSERT INTO barang (nama, gambar) VALUES (?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ss", $nama, $namafoto);
$stmt->execute();

echo "<script>
             alert('Barang berhasil ditambahkan'); 
             window.location.href = 'stok.php';
          </script>";
?>