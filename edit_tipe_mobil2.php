<?php

    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

                if(isset($_REQUEST['submit'])){

                    $id_surat = $_REQUEST['id_surat'];
                    $jenis_mobil = $_REQUEST['jenis_mobil'];

                            $query = mysqli_query($config, "UPDATE stock SET jenis_mobil='$jenis_mobil' WHERE id_surat='$id_surat'");

                            if($query == true){
                                $_SESSION['succEdit'] = 'SUKSES! Mobil berhasil diupdate';
                                header("Location: ./admin.php?page=sett&sub=mobil2");
                                die();
                            } else {
                                $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                echo '<script language="javascript">
                                        window.location.href="./admin.php?page=sett&sub=mobil2&act=edit&id_surat='.$id_surat.'";
                                      </script>';
                            }
                } else {

                    $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                    $query = mysqli_query($config, "SELECT * FROM stock WHERE id_surat='$id_surat'");
                    if(mysqli_num_rows($query) > 0){
                        $no = 1;
                        while($row = mysqli_fetch_array($query)){?>

                        <!-- Row Start -->
                        <div class="row">
                            <!-- Secondary Nav START -->
                            <div class="col s12">
                                <nav class="secondary-nav">
                                    <div class="nav-wrapper teal darken-1">
                                        <ul class="left">
                                            <li class="waves-effect waves-light  tooltipped" data-position="right" data-tooltip="Menu ini untuk mengedit tipe mobil."><a href="#" class="judul"><i class="material-icons">mode_edit</i> Edit Tipe Mobil</a></li>
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
                        ?>

                        <!-- Row form Start -->
                        <div class="row jarak-form">

                            <!-- Form START -->
                            <form class="col s12" method="post" action="?page=sett&sub=mobil2&act=edit">

                                <!-- Row in form START -->
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="hidden" value="<?php echo $row['id_surat'] ;?>" name="id_surat">
                                        <i class="material-icons prefix md-prefix">directions_car</i>
                                        <input id="jenis_mobil" type="text" name="jenis_mobil" value="<?php echo $row['jenis_mobil'] ;?>">
                                        <label  for="jenis_mobil">Jenis Mobil</label>
                                    </div>
                                    </div>
                                </div>
                                <!-- Row in form END -->
                                <br/>
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
                }
            }
?>
