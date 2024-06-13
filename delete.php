<?php
include_once "controller.php";
$id = $_GET['id'];
// var_dump($id);
$query= "DELETE FROM barang WHERE id = '$id' ";
$result = mysqli_query($koneksi, $query);
echo "<script>confirm('Apakah kamu yakin ingin menghapus barang ini?');history.back();</script>";
?>