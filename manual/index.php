<?php
session_start();
require('views/template/head.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h2 mb-0 text-gray-800">User Manual</h1>
    </div> -->

    <!-- Section dashboard -->
    <?php

    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        switch ($page) {
            case 'dashboard':
                include "views/avp/dashboard.php";
                break;
            case 'membuat-permintaan-maintenance':
                include "views/avp/membuat-permintaan-maintenance.php";
                break;
            case 'membuat-permintaan-transportasi':
                include "views/avp/membuat-permintaan-transportasi.php";
                break;
            case 'membuat-permintaan-ekspedisi':
                include "views/avp/membuat-permintaan-ekspedisi.php";
                break;
            case 'membuat-invoice':
                include "views/avp/membuat-invoice.php";
                break;
            case 'pencarian':
                include "views/avp/pencarian.php";
                break;
            case 'edit':
                include "views/avp/edit.php";
                break;
            case 'proses':
                include "views/avp/proses.php";
                break;
            case 'proses-staff':
                include "views/staff/proses.php";
                break;
            case 'print':
                include "views/avp/print.php";
                break;
            case 'hapus':
                include "views/avp/hapus.php";
                break;
            case 'setuju':
                include "views/avp/setuju.php";
                break;
            case 'tolak':
                include "views/avp/tolak.php";
                break;
            case 'report':
                include "views/avp/report.php";
                break;
            case 'pengaturan-perusahaan':
                include "views/avp/pengaturan-perusahaan.php";
                break;
            case 'pengaturan-user':
                include "views/avp/pengaturan-user.php";
                break;
            case 'pengaturan-mobil':
                include "views/avp/pengaturan-mobil.php";
                break;
            case 'pengaturan-backup-database':
                include "views/avp/pengaturan-backup-database.php";
                break;
            case 'pengaturan-restore-database':
                include "views/avp/pengaturan-restore-database.php";
                break;
            case 'profil':
                include "views/avp/profil.php";
                break;
            case 'ubah-password':
                include "views/avp/ubah-password.php";
                break;
            case 'logout':
                include "views/avp/logout.php";
                break;
            case 'dashboard-pemeriksa':
                include "views/pemeriksa/dashboard-pemeriksa.php";
                break;
            case 'dashboard-user':
                include "views/user/dashboard-user.php";
                break;
            case 'dashboard-staff':
                include "views/staff/dashboard-staff.php";
                break;
            case 'mobil':
                include "views/staff/mobil.php";
                break;
        }
    } elseif ($_SESSION['admin'] == 2) {
        include "views/pemeriksa/dashboard-pemeriksa.php";
    } elseif ($_SESSION['admin'] == 3) {
        include "views/user/dashboard-user.php";
    } elseif ($_SESSION['admin'] == 4) {
        include "views/staff/dashboard-staff.php";
    } else {
        include "views/avp/dashboard.php";
    }
    ?>



</div>
<!-- /.container-fluid -->

<?php require('views/template/foot.php') ?>