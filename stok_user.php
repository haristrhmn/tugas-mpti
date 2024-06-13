<?php

include 'sesi.php';
require_once 'controller.php';

$sql = "SELECT * FROM barang";
$result = mysqli_query($koneksi, $sql);

$data = $result->fetch_all(MYSQLI_ASSOC);


$is_search = false;
if (isset($_GET['s'])) {
    $query = $_GET['s'];
    foreach ($data as $item) {
        if (strtolower($item['nama']) === strtolower($query)) {
            $data = $item;
            $is_search = true;
            break;
        } else {
            $is_search = true;
            $data = null;
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="icon" type="x-icon" href="images/icon.png">


    <title>Rezika Motor</title>
    <style>

    </style>
</head>

<body>
    <!-- carousel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/1880097.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banner2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Akhir carousel -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" style="font-family: 'Secular One', sans-serif;">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php"><strong>Rezika</strong> Motor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mr-4 text-white" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-4 text-white" href="stok_user.php">STOK</a>
                    </li>
                    <li class="nav-link mr-4 text-white">
                        <a class="w3-hover-black w3-padding-10" href="logout.php" style="text-decoration:none"
                            onclick="return confirm('Apakah kamu yakin ingin keluar');">
                            <i class="fa fa-power-off" style="font-size:18px">
                            </i> LOGOUT (<?php echo $_SESSION['username']; ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Menu -->
    <div class="container" style="font-family: 'Secular One', sans-serif;">
        <div class="row py-2">

        </div>

        <div class="input-group rounded col-lg-3 ml-auto py-3">
            <form method="GET" class="d-flex flex-row">
                <input type="search" class="form-control me-2 d-flex align-content-start flex-wrap" name="s"
                    placeholder="Search" aria-label="Search" aria-describedby="search-addon" autocomplete="off" />
                <span class="input-group-text" id="search-addon">
                    <button type="submit" class="btn-sm d-flex align-content-start flex-wrap"><i class='bx bx-search'
                            style="font-size: large;"></i></button>
                </span>
            </form>
        </div>


        <table class="table table-bordered" id="example">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th scope="col">ID</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Barang Tersedia</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                if ($is_search) {
                    if ($data === null) {
                        // echo "<td>Data kosong<td>";
                        echo "<script>history.back();</script>";
                        exit;
                    }

                    $tanggalMasuk = $data['tanggalMasuk'];
                    $tanggalKeluar = $data['tanggalKeluar'];

                        $tanggal;
                        $status;
                    if ($tanggalMasuk > $tanggalKeluar) {
                        $tanggal = $tanggalMasuk;
                        $status = "Masuk";
                    } else {
                        $tanggal = $tanggalKeluar;
                        $status = "Keluar";
                    }

                    echo "
                        <tr style='text-align: center;'>
                        <th scope='row'>1</th>
                        <td>$data[nama]</td>
                        <td>$data[stok]</td>
                        <td>$tanggal</td>
                        <td>$status</td>
                        <td><a class='btn btn-danger' href='delete.php?id=$data[id]'>Hapus</a></td>
                        </tr>
                    ";
                } else {
                    $i = 1;
                    foreach ($data as $row) {
                        $id = $row['id'];
                    $tanggalMasuk = $row['tanggalMasuk'];
                    $tanggalKeluar = $row['tanggalKeluar'];

                        $tanggal;
                        $status;
                    if ($tanggalMasuk > $tanggalKeluar) {
                        $tanggal = $tanggalMasuk;
                        $status = "Masuk";
                    } else {
                        $tanggal = $tanggalKeluar;
                        $status = "Keluar";
                    }
                ?>
                <tr style="text-align: center;">
                    <th scope="row"><?= $id ?></th>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td><?= $tanggal ?></td>
                    <td><?= $status ?></td>

                    </td>
                </tr>
                <?php 
                        $i++; 
                    }
                }; ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir Navbar

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>