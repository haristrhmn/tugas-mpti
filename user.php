<?php
session_start();
    require_once 'controller.php';

    $sql = "SELECT * FROM barang";
    $result = mysqli_query($koneksi, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <link rel="icon" type="x-icon" href="images/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <title>Rezika Motor</title>

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
            <a class="navbar-brand text-white" href="#"><strong>Rezika</strong> Motor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link mr-4 text-white" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-4 text-white" href="stok_user.php">STOK</a>
                    </li>
                    <!-- <li class="nav-item">
              <a class="nav-link mr-4 text-white" href="pembukuan.php">PEMBUKUAN</a>
            </li> -->
                    <li class="nav-link mr-4 text-white" style="font-family: 'Secular One', sans-serif;">
                        <a class="w3-hover-black w3-padding-10" href="logout.php" style="text-decoration:none"
                            onclick="return confirm('Apakah kamu yakin ingin keluar?');">
                            <i class="fa fa-power-off">
                            </i> LOGOUT (<?php echo $_SESSION['username']; ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- card body -->
    <div class="card text-center mt-5 ml-4 mr-4" style="font-family: 'Secular One', sans-serif;">
        <div class="card-header bg-dark text-white">
            <h5 class="font-weight-100 mt-2">Jalan Raya Sungai Buntu, Karang Jari, Pedes
                <br>Buka Jam <strong>08.00 - 17.00</strong>
            </h5>
        </div>

        <div class="card-body">
            <!-- Menu -->
            <div class="container" style="font-family: 'Secular One', sans-serif;">
                <div class="row mt-3">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-md-3 mb-3 mt-2">
                        <div class="card border-dark">
                            <img src="images/<?= $row['gambar'] ?>" class="card-img-top w-100 h-100" alt="image">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><?= $row['nama']?></h5>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Akhir Menu -->
        </div>
        <div class="card-footer text-white bg-dark mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center large">
                    <div class="white mt-1">Copyright &copy; 2022 - </b>IF21B</b></div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir card body -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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