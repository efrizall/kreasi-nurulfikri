<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <?php
        $query = mysqli_query($config, "SELECT logo from tbl_instansi");
        list($logo) = mysqli_fetch_array($query);
        if(!empty($logo)){
            echo '<link rel="icon" href="./asset/img/logo.png" type="image/x-icon">';
        } else {
            echo '<link rel="icon" href="./upload/'.$logo.'" type="image/x-icon">';
        }
    ?>

    <title>User Manual LURA</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        img {
            border: 2px solid grey;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #00897b;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand toggled d-flex align-items-center justify-content-center" href="http://lura-rni.my.id">
                <div class="sidebar-brand-icon">
                    <i class="far fa-file"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LURA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Menu Active -->
            <?php

            if (isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            }
            if ($_SESSION['admin'] == 1) { ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    AVP
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if ($page == 'dashboard') {
                                        echo 'active';
                                    } ?> ">
                    <a class="nav-link" href="?page=dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-maintenance') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-maintenance">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Membuat Permintaan Maintenance</span>
                    </a>
                </li>
                
               <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-transportasi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-transportasi">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Membuat Permintaan Transportasi</span>
                    </a>
                </li>
                
              <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-ekspedisi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-ekspedisi">
                        <i class="fas fa-fw fa-shipping-fast"></i>
                        <span>Membuat Permintaan Ekspedisi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-invoice') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-invoice">
                        <i class="fas fa-fw fa-file-invoice"></i>
                        <span>Membuat Invoice</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'mobil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=mobil">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Pengembalian Mobil</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'pencarian') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pencarian">
                        <i class="fas fa-fw fa-search"></i>
                        <span>Mencari Data</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'edit') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=edit">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Merubah Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'print') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=print">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Mencetak Hasil Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'hapus') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=hapus">
                        <i class="fas fa-fw fa-trash"></i>
                        <span>Menghapus Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'proses') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=proses">
                        <i class="fas fa-fw fa-sync"></i>
                        <span>Detail Proses</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'setuju') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=setuju">
                        <i class="fas fa-fw fa-check-double"></i>
                        <span>Setujui Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'tolak') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=tolak">
                        <i class="fas fa-fw fa-times"></i>
                        <span>Menolak Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'report') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=report">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Report</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'pengaturan-perusahaan') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pengaturan-perusahaan">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pengaturan Data Perusahaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'pengaturan-user') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pengaturan-user">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Manajemen Data User</span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($page == 'pengaturan-mobil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pengaturan-mobil">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Manajemen Mobil</span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($page == 'pengaturan-backup-database') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pengaturan-backup-database">
                        <i class="fas fa-fw fa-database"></i>
                        <span>Backup Database</span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($page == 'pengaturan-restore-database') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pengaturan-restore-database">
                        <i class="fas fa-fw fa-database"></i>
                        <span>Restore Database</span>
                    </a>
                </li>
                
            <li class="nav-item <?php if ($page == 'profil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=profil">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            
            <li class="nav-item <?php if ($page == 'ubah-password') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=ubah-password">
                        <i class="fas fa-fw fa-lock"></i>
                        <span>Ubah Password</span>
                    </a>
                </li>
                
             <li class="nav-item <?php if ($page == 'logout') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=logout">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            <?php
            } elseif ($_SESSION['admin'] == 2) { ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Pemeriksa
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if ($page == 'dashboard-pemeriksa') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=dashboard-pemeriksa">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-maintenance') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-maintenance">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Membuat Permintaan Maintenance</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-transportasi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-transportasi">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Membuat Permintaan Transportasi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-ekspedisi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-ekspedisi">
                        <i class="fas fa-fw fa-shipping-fast"></i>
                        <span>Membuat Permintaan Ekspedisi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'mobil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=mobil">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Pengembalian Mobil</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'pencarian') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pencarian">
                        <i class="fas fa-fw fa-search"></i>
                        <span>Mencari Data</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'edit') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=edit">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Merubah Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'print') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=print">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Mencetak Hasil Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'hapus') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=hapus">
                        <i class="fas fa-fw fa-trash"></i>
                        <span>Menghapus Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'setuju') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=setuju">
                        <i class="fas fa-fw fa-check-double"></i>
                        <span>Setujui Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'tolak') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=tolak">
                        <i class="fas fa-fw fa-times"></i>
                        <span>Menolak Permintaan</span>
                    </a>
                </li>
                
                            <li class="nav-item <?php if ($page == 'profil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=profil">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            
                <li class="nav-item <?php if ($page == 'ubah-password') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=ubah-password">
                        <i class="fas fa-fw fa-lock"></i>
                        <span>Ubah Password</span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($page == 'logout') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=logout">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            <?php
            } elseif ($_SESSION['admin'] == 3) { ?>
                <div class="sidebar-heading">
                    User
                </div>

                <li class="nav-item <?php if ($page == 'dashboard-user') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=dashboard-user">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-maintenance') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-maintenance">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Membuat Permintaan Maintenance</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-transportasi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-transportasi">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Membuat Permintaan Transportasi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-ekspedisi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-ekspedisi">
                        <i class="fas fa-fw fa-shipping-fast"></i>
                        <span>Membuat Permintaan Ekspedisi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'mobil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=mobil">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Pengembalian Mobil</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'pencarian') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pencarian">
                        <i class="fas fa-fw fa-search"></i>
                        <span>Mencari Data</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'edit') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=edit">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Merubah Data</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'print') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=print">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Mencetak Hasil Permintaan</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'hapus') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=hapus">
                        <i class="fas fa-fw fa-trash"></i>
                        <span>Menghapus Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'profil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=profil">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            
                <li class="nav-item <?php if ($page == 'ubah-password') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=ubah-password">
                        <i class="fas fa-fw fa-lock"></i>
                        <span>Ubah Password</span>
                    </a>
                </li>
                
                <li class="nav-item <?php if ($page == 'logout') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=logout">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            <?php
            } else { ?>

                <div class="sidebar-heading">
                    Staff
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if ($page == 'dashboard-staff') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=dashboard-staff">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-maintenance') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-maintenance">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Membuat Permintaan Maintenance</span>
                    </a>
                </li>
                
               <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-transportasi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-transportasi">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Membuat Permintaan Transportasi</span>
                    </a>
                </li>
                
              <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-permintaan-ekspedisi') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-permintaan-ekspedisi">
                        <i class="fas fa-fw fa-shipping-fast"></i>
                        <span>Membuat Permintaan Ekspedisi</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'membuat-invoice') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=membuat-invoice">
                        <i class="fas fa-fw fa-file-invoice"></i>
                        <span>Membuat Invoice</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'mobil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=mobil">
                        <i class="fas fa-fw fa-car"></i>
                        <span>Pengembalian Mobil</span>
                    </a>
                </li>
                
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'pencarian') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=pencarian">
                        <i class="fas fa-fw fa-search"></i>
                        <span>Mencari Data</span>
                    </a>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?php if ($page == 'edit') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=edit">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Merubah Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'print') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=print">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Mencetak Hasil Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'hapus') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=hapus">
                        <i class="fas fa-fw fa-trash"></i>
                        <span>Menghapus Data</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'proses-staff') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=proses-staff">
                        <i class="fas fa-fw fa-sync"></i>
                        <span>Proses Permintaan</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($page == 'report') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=report">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Report</span>
                    </a>
                </li>
                
            <li class="nav-item <?php if ($page == 'profil') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=profil">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            
            <li class="nav-item <?php if ($page == 'ubah-password') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=ubah-password">
                        <i class="fas fa-fw fa-lock"></i>
                        <span>Ubah Password</span>
                    </a>
                </li>
                
             <li class="nav-item <?php if ($page == 'logout') {
                                        echo 'active';
                                    } ?>">
                    <a class="nav-link" href="?page=logout">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

            <?php
            }
            ?>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->