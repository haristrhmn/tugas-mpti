<?php
    require_once 'controller.php';
    $id_barang;
    $stok;
    $namafoto = $_FILES['gambar_ubah']['name'];
    $ukuranfoto = $_FILES['gambar_ubah']['size'];
    $tmpName = $_FILES['gambar_ubah']['tmp_name'];

    if (isset($_POST['add'])) {
        $id_barang = $_POST['id_barang'];
        $stok = $_POST['jumlah_barang'];
        
        // var_dump($_FILES);
        
        // cek apakah yang diupload gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafoto);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('Silahkan upload gambar dengan format jpg, jpeg, atau png');
                    history.back();
                </script>";
                return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranfoto > 5000000) {
            echo "<script>
                        alert('Ukuran gambar terlalu besar');
                        history.back();
                </script>";
            return false;
        }
        
        // upload gambar dan generate nama file baru
        $namaFiles = uniqid();
        $namaFiles .= '.';
        $namaFiles .= $ekstensiGambar;
        
        move_uploaded_file($tmpName, 'images/' . $namafoto);
        
        $sql = "SELECT * FROM barang WHERE id = $id_barang";
        $result = mysqli_query($koneksi, $sql);
        $data = $result->fetch_assoc();

        $stok = $data['stok'] + $stok;
        $sql = "UPDATE barang SET stok = '$stok', tanggalMasuk = NOW(), gambar = '$namafoto' WHERE id = '$id_barang'";
        $result = mysqli_query($koneksi, $sql);

        echo "<script>alert('Barang telah berhasil diperbarui');history.back();</script>";
    } else if (isset($_POST['remove'])) {
        $id_barang = $_POST['id_barang'];
        $stok = $_POST['jumlah_barang'];

        // var_dump($_FILES);
        
        // cek apakah yang diupload gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafoto);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('Silahkan upload gambar dengan format jpg, jpeg, atau png');
                    history.back();
                </script>";
                return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranfoto > 5000000) {
            echo "<script>
                        alert('Ukuran gambar terlalu besar');
                        history.back();
                </script>";
            return false;
        }
        
        // upload gambar dan generate nama file baru
        $namaFiles = uniqid();
        $namaFiles .= '.';
        $namaFiles .= $ekstensiGambar;
        
        move_uploaded_file($tmpName, 'images/' . $namafoto);
        
        $sql = "SELECT * FROM barang WHERE id = $id_barang";
        $result = mysqli_query($koneksi, $sql);
        $data = $result->fetch_assoc();

        $stok = $data['stok'] - $stok;
        $sql = "UPDATE barang SET stok = '$stok', tanggalKeluar = NOW(), gambar = '$namafoto' WHERE id = '$id_barang'";
        $result = mysqli_query($koneksi, $sql);

        echo "<script>alert('Barang telah berhasil diperbarui');history.back();</script>";
    } else {
        // echo "<script>alert('Invalid Request'); history.back();</script>";
    }
?>