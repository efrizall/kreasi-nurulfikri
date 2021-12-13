<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['jenis_mobil'] == ""){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi!';
                header("Location: ./admin.php?page=sett&sub=mobil2&act=add");
                die();
            } else {

                $jenis_mobil = $_REQUEST['jenis_mobil'];

                //validasi input data

                                $cek = mysqli_query($config, "SELECT * FROM stock WHERE jenis_mobil='$jenis_mobil'");
                                $result = mysqli_num_rows($cek);

                                if($result > 0){
                                    $_SESSION['errjenis_mobil'] = 'Jenis Mobil sudah ada, gunakan yang lain!';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {

                                            $query = mysqli_query($config, "INSERT INTO stock(jenis_mobil) VALUES('$jenis_mobil')");

                                            if($query != false){
                                                $_SESSION['succAdd'] = 'SUKSES! Mobil baru berhasil ditambahkan';
                                                header("Location: ./admin.php?page=sett&sub=mobil2");
                                                die();
                                            } else {
                                                $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                echo '<script language="javascript">window.history.back();</script>';
                                            }
                                        }
                                    }
        } else {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper teal darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="?page=sett&sub=mobil2&act=add" class="judul"><i class="material-icons">directions_car</i> Tambah Mobil</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Secondary Nav END -->
            </div>
            <!-- Row END -->

            <?php
                if(isset($_SESSION['errQ'])){
                    $errQ = $_SESSION['errQ'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errQ.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errQ']);
                }
                if(isset($_SESSION['errEmpty'])){
                    $errEmpty = $_SESSION['errEmpty'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card red lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errEmpty.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['errEmpty']);
                }
            ?>

            <!-- Row form Start -->
            <div class="row jarak-form">

                <!-- Form START -->
                <form class="col s12" method="post" action="?page=sett&sub=mobil2&act=add">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Masukkan jenis mobil dan plat nomor, contoh : Toyota Avanza - B 3214 STJ">
                            <i class="material-icons prefix md-prefix">directions_car</i>
                            <input id="jenis_mobil" type="text" class="validate" name="jenis_mobil" required>
                                <?php
                                    if(isset($_SESSION['errjenis_mobil'])){
                                        $errUsername = $_SESSION['errjenis_mobil'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errjenis_mobil.'</div>';
                                        unset($_SESSION['errjenis_mobil']);
                                    }
                                ?>
                            <label for="jenis_mobil">Jenis Mobil</label>
                    </div>
                    <br/>
                    <!-- Row in form END -->
                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <a href="?page=sett&sub=mobil2" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
                        </div>
                    </div>

                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->

<?php
        }
    }
?>
