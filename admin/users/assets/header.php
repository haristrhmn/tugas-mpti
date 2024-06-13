<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezika Motor</title>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Rezika Motor</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class='bx bx-menu'></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <div class="input-group-append"></div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class='bx bxs-user'>
                        (<?php echo $_SESSION['username'];?>)</i> </a>
                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="userDropdown"
                    onclick="return confirm('Yakin ingin keluar?');">
                    <a class="dropdown-item bg-transparent text-white" href="../../logout.php">Logout
                        (<?php echo $_SESSION['username']; ?>)
                    </a>
                </div>
            </li>
        </ul>
    </nav>
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
                            <div class="sb-nav-link-icon"><i class='bx bxs-user-detail'></i></div>
                            Kelola Users
                        </a>
                    </div>
                </div>
        </div>
</body>

</html>