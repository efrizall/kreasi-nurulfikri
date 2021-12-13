<?php
ob_start();
//cek session
session_start();

if (empty($_SESSION['admin'])) {
    $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
    header("Location: ./");
    die();
} else {
?>

    <!doctype html>
    <html lang="en">

    <!-- Include Head START -->
    <?php include('include/head.php'); ?>
    <!-- Include Head END -->

    <!-- Body START -->

    <body class="bg">

        <!-- Header START -->
        <header>

            <!-- Include Navigation START -->
            <?php include('include/menu.php'); ?>
            <!-- Include Navigation END -->

        </header>
        <!-- Header END -->

        <!-- Main START -->
        <main>

            <!-- container START -->
            <div class="container">

                <?php
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case 'maintenance':
                            include "maintenance.php";
                            break;
                        case 'transportasi':
                            include "transportasi.php";
                            break;
                        case 'security':
                            include "security.php";
                            break;
                        case 'ekspedisi':
                            include "ekspedisi.php";
                            break;
                        case 'cleaning_service':
                            include "cleaning_service.php";
                            break;
                        case 'ctk_maintenance':
                            include "cetak_maintenance.php";
                            break;
                        case 'ctk_transportasi':
                            include "cetak_transportasi.php";
                            break;
                        case 'ctk_ekspedisi':
                            include "cetak_ekspedisi.php";
                            break;
                        case 'ctk_cleaning_service':
                            include "cetak_cleaning_service.php";
                            break;
                        case 'ctk_security':
                            include "cetak_security.php";
                            break;
                        case 'ctk_invoice_maintenance':
                            include "cetak_invoice_maintenance.php";
                            break;
                        case 'ctk_invoice_transportasi':
                            include "cetak_invoice_transportasi.php";
                            break;
                        case 'ctk_invoice_ekspedisi':
                            include "cetak_invoice_ekspedisi.php";
                            break;
                        case 'rm':
                            include "report_maintenance.php";
                            break;
                        case 'rim':
                            include "report_invoice_maintenance.php";
                            break;
                        case 'rt':
                            include "report_transportasi.php";
                            break;
                        case 'rs':
                            include "report_security.php";
                            break;
                        case 'rit':
                            include "report_invoice_transportasi.php";
                            break;
                        case 're':
                            include "report_ekspedisi.php";
                            break;
                        case 'rie':
                            include "report_invoice_ekspedisi.php";
                            break;
                        case 'rcs':
                            include "report_cleaning_service.php";
                            break;
                        case 'rs':
                            include "report_security.php";
                            break;
                        case 'sett':
                            include "pengaturan.php";
                            break;
                        case 'pro':
                            include "profil.php";
                            break;
                        case 'fm':
                            include "file_m.php";
                            break;
                        case 'ft':
                            include "file_t.php";
                            break;
                        case 'fe':
                            include "file_e.php";
                            break;
                        case 'fcs':
                            include "file_cs.php";
                            break;
                        case 'fs':
                            include "file_s.php";
                            break;
                        case 'fim':
                            include "file_im.php";
                            break;
                        case 'fit':
                            include "file_it.php";
                            break;
                        case 'fie':
                            include "file_ie.php";
                            break;
                        case 'invoice_transportasi':
                            include "invoice_transportasi.php";
                            break;
                        case 'invoice_maintenance':
                            include "invoice_maintenance.php";
                            break;
                        case 'invoice_ekspedisi':
                            include "invoice_ekspedisi.php";
                            break;
                        case 'mobil':
                            include "mobil.php";
                            break;
                        case 'verificator_maintenance_user':
                            include "verificator_maintenance_user.php";
                            break;
                        case 'verificator_maintenance_avp':
                            include "verificator_maintenance_avp.php";
                            break;
                        case 'verificator_maintenance_pemeriksa':
                            include "verificator_maintenance_pemeriksa.php";
                            break;
                        case 'verificator_transportasi_user':
                            include "verificator_transportasi_user.php";
                            break;
                        case 'verificator_transportasi_pemeriksa':
                            include "verificator_transportasi_pemeriksa.php";
                            break;
                        case 'verificator_transportasi_avp':
                            include "verificator_transportasi_avp.php";
                            break;
                        case 'verificator_ekspedisi_pemeriksa':
                            include "verificator_ekspedisi_pemeriksa.php";
                            break;
                        case 'verificator_ekspedisi_avp':
                            include "verificator_ekspedisi_avp.php";
                            break;
                        case 'verificator_ekspedisi_user':
                            include "verificator_ekspedisi_user.php";
                            break;
                    }
                } else {
                ?>
                    <!-- Row START -->
                    <div class="row">

                        <!-- Include Header Instansi START -->
                        <?php include('include/header_instansi'); ?>
                        <!-- Include Header Instansi END -->

                        <!-- Welcome Message START -->
                        <div class="col s12">
                            <div class=" center card" style="height: auto;">
                                <div class="card-content">
                                    <h4>Selamat Datang <?= $_SESSION['nama']; ?></h4>
                                    <p class="description">Anda login sebagai
                                        <?php
                                        if ($_SESSION['admin'] == 1) {
                                            echo "<strong>AVP</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                                        } elseif ($_SESSION['admin'] == 2) {
                                            echo "<strong>Pemeriksa Permintaan</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                                        } elseif ($_SESSION['admin'] == 3) {
                                            echo "<strong>User</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                                        } else {
                                            echo "<strong>Staff</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                                        } ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Welcome Message END -->

                        <?php
                        //menghitung jumlah maintenance
                        $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance"));

                        //menghitung jumlah maintenance Belum di proses
                        $count10 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE status='Belum di proses' "));

                        //menghitung jumlah maintenance Sedang di proses
                        $count11 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE status='Sedang di proses' "));

                        //menghitung jumlah maintenance Selesai
                        $count12 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE status='Selesai' "));

                        //menghitung jumlah invoice maintenance
                        $count7 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM invoice_maintenance"));

                        //menghitung jumlah nominal invoice maintenance
                        $count16 = mysqli_fetch_assoc(mysqli_query($config, "SELECT SUM(nominal) AS total FROM invoice_maintenance WHERE nominal"))["total"];

                        //menghitung jumlah transportasi
                        $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM transportasi"));

                        //menampilkan transportasi Grab
                        $count18 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Grab' "));

                        //menampilkan transportasi Toyota Innova - B 2753 STM
                        $count19 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Toyota Innova - B 2753 STM' "));

                        //menampilkan transportasi Suzuki Ertiga - B 1635 SRQ
                        $count20 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Suzuki Ertiga - B 1635 SRQ' "));

                        //menampilkan transportasi Suzuki Ertiga - B 1858 SRQ
                        $count21 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Suzuki Ertiga - B 1858 SRQ' "));

                        //menampilkan transportasi Suzuki Ertiga - B 1863 SRQ
                        $count22 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Suzuki Ertiga - B 1863 SRQ' "));

                        //menampilkan transportasi Nissan Evalia - B 1148 SYG
                        $count23 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Nissan Evalia - B 1148 SYG' "));

                        //menampilkan transportasi Mazda Biante - B 1607 SYI
                        $count24 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='Mazda Biante - B 1607 SYI' "));

                        //menghitung jumlah invoice transportasi
                        $count8 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM invoice_transportasi"));

                        //menghitung jumlah nominal invoice transportasi
                        $count17 = mysqli_fetch_assoc(mysqli_query($config, "SELECT SUM(nominal) AS total FROM invoice_transportasi WHERE nominal"))["total"];

                        //menghitung jumlah ekspedisi
                        $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM ekspedisi"));

                        //menghitung jumlah invoice ekspedisi
                        $count9 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM invoice_ekspedisi"));

                        //menghitung jumlah nominal invoice ekspedisi
                        $count13 = mysqli_fetch_assoc(mysqli_query($config, "SELECT SUM(nominal) AS total FROM invoice_ekspedisi WHERE nominal"))["total"];

                        //menghitung jumlah cleaning service
                        $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM cleaning_service"));

                        //menghitung jumlah nominal invoice cleaning service
                        $count14 = mysqli_fetch_assoc(mysqli_query($config, "SELECT SUM(nominal) AS total FROM cleaning_service WHERE nominal"))["total"];

                        //menghitung jumlah security
                        $count6 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM security"));

                        //menghitung jumlah nominal invoice security
                        $count15 = mysqli_fetch_assoc(mysqli_query($config, "SELECT SUM(nominal) AS total FROM security WHERE nominal"))["total"];

                        //menghitung jumlah pengguna
                        $count5 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_user"));
                        
                        //menghitung jumlah maintenance avp Belum di setujui
                        $count25 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE ttd_avp='Belum Disetujui' "));
                            
                        //menghitung jumlah transportasi avp Belum di setujui
                        $count26 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM transportasi WHERE ttd_avp='Belum Disetujui' "));
                            
                        //menghitung jumlah ekspedisi avp Belum di setujui
                        $count27 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM ekspedisi WHERE ttd_avp='Belum Disetujui' "));
                        
                        //menghitung jumlah maintenance pemeriksa Belum di setujui
                        $count25 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE ttd_pemeriksa='Belum Disetujui' "));
                            
                        //menghitung jumlah transportasi pemeriksa Belum di setujui
                        $count26 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM transportasi WHERE ttd_pemeriksa='Belum Disetujui' "));
                            
                        //menghitung jumlah ekspedisi pemeriksa Belum di setujui
                        $count27 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM ekspedisi WHERE ttd_pemeriksa='Belum Disetujui' "));

                        if ($count18 == "0") {
                            $g = "Tidak Tersedia";
                        } elseif ($count18 == "1") {
                            $g = "Tersedia";
                        }

                        if ($count19 == "0") {
                            $ti = "Tidak Tersedia";
                        } elseif ($count19 == "1") {
                            $ti = "Tersedia";
                        }

                        if ($count20 == "0") {
                            $se = "Tidak Tersedia";
                        } elseif ($count20 == "1") {
                            $se = "Tersedia";
                        }

                        if ($count21 == "0") {
                            $se2 = "Tidak Tersedia";
                        } elseif ($count21 == "1") {
                            $se2 = "Tersedia";
                        }

                        if ($count22 == "0") {
                            $se3 = "Tidak Tersedia";
                        } elseif ($count22 == "1") {
                            $se3 = "Tersedia";
                        }

                        if ($count23 == "0") {
                            $ne = "Tidak Tersedia";
                        } elseif ($count23 == "1") {
                            $ne = "Tersedia";
                        }

                        if ($count24 == "0") {
                            $mb = "Tidak Tersedia";
                        } elseif ($count24 == "1") {
                            $mb = "Tersedia";
                        }
                        ?>

                        <!-- Info Statistic START -->

                        <div class="container">
                            <!-- First row -->
                            <div class="row">
                                <div class="col s12 m4 l4">
                                    <div class="card-dash">
                                        <div class="card cyan">
                                            <div class="card-content">
                                                <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">settings</i> Permintaan Maintanance</h5>
                                                <hr>
                                                <?php echo '<h5 class="white-text link">' . $count1 . ' Permintaan Maintenance</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count10 . ' Belum di proses</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count11 . ' Sedang di proses</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count12 . ' Selesai</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count7 . ' Invoice Maintenance</5>'; ?>
                                                <?php echo '<h5 class="white-text link">Rp. ' . number_format($count16)  . ' Nominal Invoice Maintenance</h5>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <div class="card-dash">
                                        <div class="card lime darken-1">
                                            <div class="card-content">
                                                <h5 class="center card-title white-text" style="margin-left: 0px; margin-right: 0px;"><i class="material-icons md-20 center white-text">directions_car</i> Permintaan Transportasi</h5>
                                                <hr>
                                                <?php echo '<h5 class="white-text link">' . $count2 . ' Permintaan Transportasi</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Mazda Biante - B 1607 SYI ' . $mb . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Toyota Innova - B 2753 STM ' . $ti . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Suzuki Ertiga - B 1635 SRQ ' . $se . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Suzuki Ertiga - B 1858 SRQ ' . $se2 . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Suzuki Ertiga - B 1863 SRQ ' . $se3 . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Nissan Evalia - B 1148 SYG ' . $ne . ' </h5>'; ?>
                                                <?php echo '<h5 class="white-text link">GRAB ' . $g . ' </h6>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count8 . ' Invoice Transportasi</h6>'; ?>
                                                <?php echo '<h5 class="white-text link">Rp. ' . number_format($count17) . ' Nominal Invoice Transportasi</h6>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <div class="card-dash">
                                        <div class="card yellow darken-3">
                                            <div class="card-content">
                                                <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">local_shipping</i> Pengiriman Ekspedisi</h5>
                                                <hr>
                                                <?php echo '<h5 class="white-text link">' . $count3 . ' Pengiriman Ekspedisi</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">' . $count9 . ' Invoice Ekspedisi</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Rp. ' . number_format($count13) . ' Nominal Invoice Ekspedisi</h6>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End First Row -->

                            <!-- Second Row -->
                            <div class="row">
                                <div class="col s12 m4 l4">
                                    <div class="card-dash">
                                        <div class="card deep-orange">
                                            <div class="card-content">
                                                <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">class</i> Invoice Cleaning Service</h5>
                                                <hr>
                                                <?php echo '<h5 class="white-text link">' . $count4 . ' Invoice Cleaning Service</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Rp. ' . number_format($count14) . ' Nominal Invoice Cleaning Service</h6>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <div class="card-dash">
                                        <div class="purple card">
                                            <div class="card-content">
                                                <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">featured_play_list</i> Invoice Security</h5>
                                                <hr>
                                                <?php echo '<h5 class="white-text link">' . $count6 . ' Invoice Security</h5>'; ?>
                                                <?php echo '<h5 class="white-text link">Rp. ' . number_format($count15) . ' Nominal Invoice Security</h6>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m4 l4">
                                    <?php
                                    if ($_SESSION['id_user'] == 1) { ?>
                                        <div class="card-dash">
                                            <div class="card blue accent-2">
                                                <div class="card-content">
                                                    <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">check</i> Perlu Persetujuan AVP</h5>
                                                    <hr>
                                                    <?php echo '<h5 class="white-text link">' . $count25 . ' Maintenance</h5>'; ?>
                                                    <?php echo '<h5 class="white-text link">' . $count26 . ' Transportasi</h5>'; ?>
                                                    <?php echo '<h5 class="white-text link">' . $count27 . ' Ekspedisi</h5>'; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Info Statistic START -->
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($_SESSION['admin'] == 2) { ?>
                                        <div class="card-dash">
                                            <div class="card blue accent-2">
                                                <div class="card-content">
                                                    <h5 class="center card-title white-text"><i class="material-icons md-20 center white-text">check</i> Perlu Persetujuan Pemeriksa Permintaan</h5>
                                                    <hr>
                                                    <?php echo '<h5 class="white-text link">' . $count25 . ' Maintenance</h5>'; ?>
                                                    <?php echo '<h5 class="white-text link">' . $count26 . ' Transportasi</h5>'; ?>
                                                    <?php echo '<h5 class="white-text link">' . $count27 . ' Ekspedisi</h5>'; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Info Statistic START -->
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- End Second Row -->
                        </div>

                        <!-- Row END -->
                    <?php
                }
                    ?>
                    </div>
                    <!-- container END -->

        </main>
        <!-- Main END -->

        <!-- Include Footer START -->
        <?php include('include/footer.php'); ?>
        <!-- Include Footer END -->

    </body>
    <!-- Body END -->

    </html>

<?php
}
?>