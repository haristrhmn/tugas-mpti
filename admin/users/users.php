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
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">

    <?php include_once "assets/header.php"; ?>

    <div id="layoutSidenav_content">
        <main>
                <div class="container-fluid">
                    <h1 class="mt-4 ml-3">Data Users</h1>
                </div>
            <div class="card mb-4 ml-3 mr-3">
                    <div class="card-header bg-dark text-white">
                        <i class='bx bxs-data'></i>
                        Data Users
                    </div>
                <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#modaltambah">
                            Tambah Users
                        </button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                                $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                                $limit = 50; // Batasi jumlah data per halaman
                                $start = ($page - 1) * $limit;

                                // Hitung total data untuk pagination
                                $result_total = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users");
                                $total_data = mysqli_fetch_assoc($result_total)['total'];
                                $jumlahHalaman = ceil($total_data / $limit);

                                $sql = "SELECT * FROM users LIMIT $start, $limit";
                                $result = mysqli_query($koneksi, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $i = $start + 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $password = $row['password'];
                            ?>
                            <tr>
                                <td><?=$i++;?></td>
                                <!-- Ini untuk looping Id -->
                                <td><?= $row['username'];?></td>
                                <!-- Ini untuk looping Username -->
                                <td><?= $row['email'];?></td>
                                <!-- Ini untuk looping Email -->
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modallihat<?= $id ?>">Lihat</button>
                                    <a href="#" class="btn btn-warning btn-sm mr-1" data-bs-toggle="modal"
                                        data-bs-target="#modalubah<?= $id ?>">Ubah</a>
                                    <a class="btn btn-danger btn-sm"
                                        href="delete.php?id=<?=$id?>&type=delete"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus <?= $username;?>?');">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                                                                        <!-- Awal Modal Ubah -->
                                <div class="modal fade" id="modalubah<?= $id ?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 align-items-center"
                                                    id="staticBackdropLabel">Ubah Data Users</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="update.php">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" name="id"
                                                        value="<?=$row['id']?>" id="id" placeholder="id">
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="uname" class="form-label">Username :</label>
                                                        <input type="text" class="form-control" name="usn"
                                                            value="<?=$row['username']?>" id="username"
                                                            placeholder="username" disabled>
                                                        <input type="hidden" class="form-control" name="usname"
                                                            value="<?=$row['username']?>" id="username"
                                                            placeholder="username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mail" class="form-label">Email :</label>
                                                        <input type="email" class="form-control" name="em"
                                                            value="<?=$row['email']?>" id="mail"
                                                            placeholder="email"></input>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pass" class="form-label">Password :</label>
                                                        <input type="text" class="form-control" name="pw"
                                                            value="<?=$row['password']?>" id="pass"
                                                            placeholder="password"></input>
                                                    </div>
                                                </div>
                                                <div class=" modal-footer justify-content-center">
                                                    <button type="submit" class="btn btn-primary"
                                                        name="ubah">Ubah</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Ubah -->
                                 
                                <!-- Awal Modal Lihat -->
                                <div class="modal fade" id="modallihat<?= $id ?>" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 align-items-center"
                                                    id="staticBackdropLabel">Lihat Data Users</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="#">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="uname" class="form-label">Username :</label>
                                                        <input type="text" class="form-control" name="uname"
                                                            value="<?=$row['username']?>" id="uname"
                                                            placeholder="username" disabled>
                                                        <input type="hidden" class="form-control" name="uname"
                                                            value="<?=$row['username']?>" id="uname"
                                                            placeholder="username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mail" class="form-label">Email :</label>
                                                        <input type="email" class="form-control" name="mail"
                                                            value="<?=$row['email']?>" id="mail" placeholder="email"
                                                            disabled></input>
                                                        <input type="hidden" class="form-control" name="mail"
                                                            value="<?=$row['email']?>" id="mail" placeholder="email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pass" class="form-label">Password :</label>
                                                        <input type="text" class="form-control" name="pass"
                                                            value="<?=$row['password']?>" id="pass"
                                                            placeholder="password" disabled></input>
                                                        <input type="hidden" class="form-control" name="pass"
                                                            value="<?=$row['password']?>" id="pass"
                                                            placeholder="password">
                                                    </div>
                                                </div>
                                                <div class=" modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Lihat -->
                            
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="pagination-wrap">
                                        <ul class="pagination justify-content-end">
                                            <?php if($page > 1) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?= $page - 1; ?>" tabindex="-1">Previous</a>
                                            </li>
                                            <?php endif; ?>

                                            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                            <?php if($i == $page) : ?>
                                            <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                                            <?php else : ?>
                                            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                                            <?php endif; ?>
                                            <?php endfor; ?>

                                            <?php if($page < $jumlahHalaman) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?= $page + 1; ?>">Next</a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- </div> -->

    <?php include_once 'assets/footer.php'; ?>

    <!-- </div> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>




                                <!-- Awal Modal Tambah -->
                                <div class="modal fade" style="font-family: 'Secular One', sans-serif;" id="modaltambah" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 align-items-center" id="staticBackdropLabel">Tambah Data Users</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="insert.php">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="uname" class="form-label">Username :</label>
                                                        <input type="text" class="form-control" name="uname" id="uname" placeholder="username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mail" class="form-label">Email :</label>
                                                        <input type="email" class="form-control" name="mail" id="mail" placeholder="email"></input>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pass" class="form-label">Password :</label>
                                                        <input type="password" class="form-control" name="pass" id="pass"
                                                            placeholder="password"></input>
                                                    </div>
                                                </div>
                                                <div class=" modal-footer justify-content-center">
                                                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Tambah -->


</html>