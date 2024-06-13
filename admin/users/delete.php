<?php


include "../../controller.php";
class hapus {
    function hapususers($id)
    {
        $con = new controller();
        if (!isset($id)) return false;
      $query = "DELETE FROM users WHERE id=$id";
      $result = mysqli_query($con->koneksi, $query);

      return true;
    }

}

$hapus = new hapus();

$aksi = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

switch ($aksi) {
    case "delete":
        $hapus->hapususers($id);
        echo "<script>alert('Data berhasil dihapus');history.back();</script>";
        break;
}

?>