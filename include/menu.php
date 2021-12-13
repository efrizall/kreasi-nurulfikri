<?php
//cek session
if (!empty($_SESSION['admin'])) {
?>
    <div class="navbar-fixed">

        <nav class="teal darken-1">
            <div class="nav-wrapper">
                <a href="./" class="brand-logo center hide-on-large-only"><i class="material-icons md-36"></i> LARAS</a>
                <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
                    <li class="no-padding teal">
                        <div class="logo-side center teal darken-3">
                            <?php
                            //menghitung jumlah maintenance avp Belum di setujui
                            $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE ttd_avp='Belum Disetujui' "));
                            //menghitung jumlah transportasi avp Belum di setujui
                            $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM transportasi WHERE ttd_avp='Belum Disetujui' "));
                            //menghitung jumlah ekspedisi avp Belum di setujui
                            $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM ekspedisi WHERE ttd_avp='Belum Disetujui' "));
                            //menghitung jumlah maintenance pemeriksa Belum di setujui
                            $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM maintenance WHERE ttd_pemeriksa='Belum Disetujui' "));
                            //menghitung jumlah transportasi pemeriksa Belum di setujui
                            $count5 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM transportasi WHERE ttd_pemeriksa='Belum Disetujui' "));
                            //menghitung jumlah ekspedisi pemeriksa Belum di setujui
                            $count6 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM ekspedisi WHERE ttd_pemeriksa='Belum Disetujui' "));
                            $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                            while ($data = mysqli_fetch_array($query)) {
                                if (!empty($data['logo'])) {
                                    echo '<img class="logoside" src="./upload/' . $data['logo'] . '"/>';
                                } else {
                                    echo '<img class="logoside" src="./asset/img/logo.png"/>';
                                }
                                if (!empty($data['nama'])) {
                                    echo '<h5 class="side">' . $data['nama'] . '</h5>';
                                } else {
                                    echo '<h5 class="side">LARAS</h5>';
                                }
                                if (!empty($data['alamat'])) {
                                    echo '<p class="description-side"></p>';
                                } else {
                                    echo '<p class="description-side">' . $data['alamat'] . '</p>';
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <li class="no-padding teal darken-4">
                        <ul class="collapsible collapsible-accordion">
                            <li class="no-padding teal">
                                <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li class="no-padding teal"><a href="?page=pro">Profil</a></li>
                                        <li class="no-padding teal"><a href="?page=pro&sub=pass">Ubah Password</a></li>
                                        <li class="no-padding teal"><a href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
            <li class="no-padding teal"><a class="collapsible-header" href="./"><i class="material-icons middle">dashboard</i> Dashboard</a></li>
                    <li class="no-padding teal">
                        <?php
                        if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 || $_SESSION['admin'] == 3 || $_SESSION['admin'] == 4) { ?>
                            <ul class="collapsible collapsible-accordion">
                                <li class="no-padding teal">
                                    <a class="collapsible-header"><i class="material-icons">repeat</i> Permintaan</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li class="no-padding teal"><a href="?page=maintenance">Maintenance</a></li>
                                            <li class="no-padding teal"><a href="?page=transportasi">Transportasi</a></li>
                                            <li class="no-padding teal"><a href="?page=ekspedisi">Ekspedisi</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </li>
                   <li class="no-padding teal">
                        <?php
                        if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 4) { ?>
                            <ul class="collapsible collapsible-accordion">
                                <li class="no-padding teal">
                                    <a class="collapsible-header"><i class="material-icons">assignment_turned_in</i> Invoice</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li class="no-padding teal"><a href="?page=invoice_maintenance">Maintenance</a></li>
                                            <li class="no-padding teal"><a href="?page=invoice_transportasi">Transportasi</a></li>
                                            <li class="no-padding teal"><a href="?page=invoice_ekspedisi">Ekspedisi</a></li>
                                            <li class="no-padding teal"><a href="?page=cleaning_service">Cleaning Service</a></li>
                                            <li class="no-padding teal"><a href="?page=security">Security</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="no-padding teal">
                        <?php
                        if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 4) { ?>
                        <ul class="collapsible collapsible-accordion">
                            <li class="no-padding teal">
                                <a class="collapsible-header"><i class="material-icons">assignment</i> Report</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li class="no-padding teal"><a href="?page=rm">Maintenance</a></li>
                                        <li class="no-padding teal"><a href="?page=rim">Invoice Maintenance</a></li>
                                        <li class="no-padding teal"><a href="?page=rt">Transportasi</a></li>
                                        <li class="no-padding teal"><a href="?page=rit">Invoice Transportasi</a></li>
                                        <li class="no-padding teal"><a href="?page=re">Ekspedisi</a></li>
                                        <li class="no-padding teal"><a href="?page=rie">Invoice Ekspedisi</a></li>
                                        <li class="no-padding teal"><a href="?page=rcs">Invoice Cleaning Service</a></li>
                                        <li class="no-padding teal"><a href="?page=rs">Invoice Security</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="no-padding teal">
                        <?php
                        if ($_SESSION['admin'] == 1) { ?>
                            <ul class="collapsible collapsible-accordion">
                                <li class="no-padding teal">
                                    <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li class="no-padding teal"><a href="?page=sett">Perusahaan</a></li>
                                            <li class="no-padding teal"><a href="?page=sett&sub=usr">User</a></li>
                                            <li class="no-padding teal"><a href="?page=sett&sub=mobil2">Mobil</a></li>
                                            <li class="no-padding teal"><a href="?page=sett&sub=back">Backup Database</a></li>
                                            <li class="no-padding teal"><a href="?page=sett&sub=rest">Restore Database</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION['admin'] == 2) { ?>
                            <ul class="collapsible collapsible-accordion">
                                <li class="no-padding teal">
                                    <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li class="no-padding teal"><a href="?page=sett">Perusahaan</a></li>
                                            <li class="no-padding teal"><a href="?page=sett&sub=usr">User</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="no-padding teal"><a class="collapsible-header" href="/manual/index.php"><i class="material-icons middle">description</i>User Manual</a></li>
                </ul>
                <!-- Menu on medium and small screen END -->

                <!-- Menu on large screen START -->
                <ul class="center hide-on-med-and-down" id="nv">
                    <li><a href="./" class=" hide-on-med-amsand-down"><i class="material-icons md-36"></i> <img src="./asset/img/laras50.png"/> </a></li>
                    <li>
                        <div class="grs">
                            </>
                    </li>
                    <li><a href="./"><i class="material-icons"></i>&nbsp; Dashboard</a></li>
                    <?php
                    if ($_SESSION['admin'] == 3 || $_SESSION['admin'] == 4) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="transaksi">Membuat Permintaan<i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='transaksi' class='dropdown-content'>
                        <li class="no-padding teal"><a href="?page=maintenance">Maintenance</a></li>
                        <li class="no-padding teal"><a href="?page=transportasi">Transportasi</a></li>
                        <li class="no-padding teal"><a href="?page=ekspedisi">Ekspedisi</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 1) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="transaksi">Membuat Permintaan<i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='transaksi' class='dropdown-content'>
                        <?php echo '<li class="no-padding teal"><a href="?page=maintenance">Maintenance<span class="white-text new badge red">' . $count1 . '</span></a></li>'; ?>
                        <?php echo '<li class="no-padding teal"><a href="?page=transportasi">Transportasi<span class="white-text new badge red">' . $count2 . '</span></a></li>'; ?>
                        <?php echo '<li class="no-padding teal"><a href="?page=ekspedisi">Ekspedisi<span class="white-text new badge red">' . $count3 . '</span></a></li>'; ?>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 2) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="transaksi">Membuat Permintaan<i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='transaksi' class='dropdown-content'>
                        <?php echo '<li class="no-padding teal"><a href="?page=maintenance">Maintenance<span class="white-text new badge red">' . $count4 . '</span></a></li>'; ?>
                        <?php echo '<li class="no-padding teal"><a href="?page=transportasi">Transportasi<span class="white-text new badge red">' . $count5 . '</span></a></li>'; ?>
                        <?php echo '<li class="no-padding teal"><a href="?page=ekspedisi">Ekspedisi<span class="white-text new badge red">' . $count6 . '</span></a></li>'; ?>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 4) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="transaksi">Invoice <i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='transaksi' class='dropdown-content'>
                            <li class="no-padding teal"><a href="?page=invoice_maintenance">Maintenance</a></li>
                            <li class="no-padding teal"><a href="?page=invoice_transportasi">Transportasi</a></li>
                            <li class="no-padding teal"><a href="?page=invoice_ekspedisi">Ekspedisi</a></li>
                            <li class="no-padding teal"><a href="?page=cleaning_service">Cleaning Service</a></li>
                            <li class="no-padding teal"><a href="?page=security">Security</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 4) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="transaksi">Report <i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='transaksi' class='dropdown-content'><li class="no-padding teal"><a href="?page=rm">Maintenance</a></li>
                                        <li class="no-padding teal"><a href="?page=rim">Invoice Maintenance</a></li>
                                        <li class="no-padding teal"><a href="?page=rt">Transportasi</a></li>
                                        <li class="no-padding teal"><a href="?page=rit">Invoice Transportasi</a></li>
                                        <li class="no-padding teal"><a href="?page=re">Ekspedisi</a></li>
                                        <li class="no-padding teal"><a href="?page=rie">Invoice Ekspedisi</a></li>
                                        <li class="no-padding teal"><a href="?page=rcs">Invoice Cleaning Service</a></li>
                                        <li class="no-padding teal"><a href="?page=rs">Invoice Security</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin'] == 1) { ?>
                        <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                        <ul id='pengaturan' class='dropdown-content'>
                            <li class="no-padding teal"><a href="?page=sett">Perusahaan</a></li>
                            <li class="no-padding teal"><a href="?page=sett&sub=usr">User</a></li>
                            <li class="no-padding teal"><a href="?page=sett&sub=mobil2">Mobil</a></li>
                            <li class="divider"></li>
                            <li class="no-padding teal"><a href="?page=sett&sub=back">Backup Database</a></li>
                            <li class="no-padding teal"><a href="?page=sett&sub=rest">Restore Database</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                    <li><a href="/manual/index.php">User Manual</a></li>
                    <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> Hello, <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                    <ul id='logout' class='dropdown-content'>
                        <li class="no-padding teal"><a href="?page=pro">Profil</a></li>
                        <li class="no-padding teal"><a href="?page=pro&sub=pass">Ubah Password</a></li>
                        <li class="divider"></li>
                        <li class="no-padding teal"><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
                    </ul>
                </ul>
                <!-- Menu on large screen END -->
                <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

<?php
} else {
    header("Location: ../");
    die();
}
?>