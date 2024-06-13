<?php

include_once "../../login_check.php";
include_once '../../controller.php';

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rezika Motor</title>
    <link href="css/style.css" rel="stylesheet" />
    <link rel="icon" type="x-icon" href="assets/img/icon.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">

    <?php include_once 'assets/headers.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class='bx bxs-dashboard'></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="users.php">
                            <div class=" sb-nav-link-icon"><i class='bx bxs-user-detail'></i>
                            </div>
                            Kelola Users
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h4 class="mt-4 ml-3 text-center">Jalan Raya Sungai Buntu, Karang Jari, Pedes</h4>
                    <div class="card mb-4 ml-3">
                        <div class="card-header py-3">
                            <i class='bx bxs-wrench'></i>
                            Rezika Motor
                        </div>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/banner1.jpg" class="d-block w-100" alt="background-1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/banner2.jpg" class="d-block w-100" alt="background-2">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="card-footer d-flex py-3 align-items-center justify-content-center">Selamat Datang
                        </div>
                    </div>
                </div>
            </main>

            <?php include_once 'assets/footers.php'; ?>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                crossorigin="anonymous">
            </script>
            <script src="js/scripts.js"></script>
            <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous">
            </script>
</body>

</html>