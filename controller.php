<?php 

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";

$koneksi =mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);


// Check connection
if (!$koneksi) {
  echo "Tidak terhubung ke database";
}

class controller{
  private $dbservername = "localhost";
  private $dbusername = "root";
  private $dbpassword = "";
  private $dbname = "test";
  public $koneksi;
  
  public function __construct()
  {
       $koneksi = mysqli_connect($this->dbservername,$this->dbusername, $this->dbpassword, $this->dbname);
         global $koneksi;
         $this->koneksi = $koneksi;
     }
 }

?>