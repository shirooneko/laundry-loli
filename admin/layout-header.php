<?php 
$nama_user = $_SESSION['nama_user'];
 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Aplikasi Pengelola Laundry</title>

    <meta name="description" content="" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/outlite.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- css untuk sidebar -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- chartist CSS -->
    <link href="../assets/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/styles.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>

    <script src="../assets/vendor/js/helpers.js"></script>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../assets/images/nilou.png" width="40">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">laundry loli</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li <?php if($halaman == "Dashboard") echo "class='menu-item active'"; ?> class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li <?php if($halaman == "Outlet") echo "class='menu-item active'"; ?> class="menu-item">
              <a href="outlet.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-store"></i>
                <div data-i18n="Analytics">Outlet</div>
              </a>
            </li>

            <li <?php if($halaman == "Paket") echo "class='menu-item active'"; ?> class="menu-item ">
              <a href="paket.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Analytics">Paket</div>
              </a>
            </li>

            <li <?php if($halaman == "Pengguna") echo "class='menu-item active'"; ?> class="menu-item ">
              <a href="pengguna.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-circle"></i>
                <div data-i18n="Analytics">Pengguna</div>
              </a>
            </li>

            <l <?php if($halaman == "Member") echo "class='menu-item active'"; ?> class="menu-item ">
              <a href="member.php" class="menu-link">
                <i class="menu-icon tf-icons  bx bxs-user"></i>
                <div data-i18n="Analytics">Member</div>
              </a>
            </l>

            <li <?php if($halaman == "Transaksi") echo "class='menu-item active'"; ?> class="menu-item ">
              <a href="transaksi.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cart"></i>
                <div data-i18n="Analytics">Transaksi</div>
              </a>
            </li>

            <li <?php if($halaman == "Laporan") echo "class='menu-item active'"; ?> class="menu-item ">
              <a href="laporan.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-notepad"></i>
                <div data-i18n="Analytics">Laporan</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="logout.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-log-out"></i>
                <div data-i18n="Analytics">Logout</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <h1></h1>
                </div>
              </div>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <div>
                  <span style="margin-right: 10px; font-size: 15px; text-transform: UPPERCASE; color: #000000 ;"><b>@<?= $nama_user ?></b></span>
                </div>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="d-inline">
                    <div class="avatar avatar-online">
                      <img src="../assets/images/nilou.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-fluid">