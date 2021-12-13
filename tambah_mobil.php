<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            $id_surat = $_REQUEST['id_surat'];
            $query = mysqli_query($config, "SELECT * FROM transportasi WHERE id_surat='$id_surat'");
            $no = 1;
            list($id_surat) = mysqli_fetch_array($query);

                $nama_detail = $_REQUEST['nama_detail'];
                $divisi_detail = $_REQUEST['divisi_detail'];
                $jenis_mobil_detail = $_REQUEST['jenis_mobil_detail'];
                $tgl_surat_detail = $_REQUEST['tgl_surat_detail'];
                $deskripsi_detail = $_REQUEST['deskripsi_detail'];
                $id_user = $_SESSION['id_user'];
                $status_detail = $_REQUEST['status_detail'];

                                    $query = mysqli_query($config, "INSERT INTO mobil(nama_detail,divisi_detail,jenis_mobil_detail,tgl_surat_detail,deskripsi_detail,id_surat,id_user,status_detail)
                                        VALUES('$nama_detail','$divisi_detail','$jenis_mobil_detail',NOW(),'$deskripsi_detail','$id_surat','$id_user','$status_detail')");

                                    if($query == true){
                                        $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                        echo '<script language="javascript">
                                                window.location.href="./admin.php?page=transportasi&act=mob&id_surat='.$id_surat.'";
                                              </script>';
                                    } else {
                                        $_SESSION['errQ'] = 'MOBIL SUDAH TERSEDIA';
                                        echo '<script language="javascript">window.history.back();</script>';
                                    }
        } else {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper teal darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">directions_car</i> Pengembalian Mobil</a></li>
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
                <form class="col s12" method="post" action="">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi nama">
                            <i class="material-icons prefix md-prefix">account_box</i>
                            <input id="nama_detail" type="text" class="validate" name="nama_detail" required>
                            <label for="nama_detail">nama</label>
                        </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Divisi">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="divisi_detail" type="text" class="validate" name="divisi_detail" required>
                            <label for="divisi_detail">Divisi</label>
                            </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Pilih Jenis Mobil">
                            <i class="material-icons prefix md-prefix active">directions_car</i><label>Jenis Mobil</label><br/>
                            <div class="input-field col s11 right">
                            <select name="jenis_mobil_detail" class="browser-default validate">
                                <?php
                                    $id_surat = $_REQUEST['id_surat'];
                                    $ambilsemuadata = mysqli_query($config,"select jenis_mobil from transportasi WHERE id_surat='$id_surat'");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadata)){
                                        $namamobil = $fetcharray['jenis_mobil'];
                                    ?>
                                    
                                <option value="<?=$namamobil;?>"><?=$namamobil;?></option>
                                
                                <?php
                                    }
                                ?>
                                </select>
                        </div>
                        </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Deskripsi">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="deskripsi_detail" type="text" class="validate" name="deskripsi_detail">
                            <label for="deskripsi_detail">Catatan (Optional)</label>
                        </div>
                        </div>
                        <hr>
                        <input type="hidden" value="Sudah kembali" id="status_detail" name="status_detail" required>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name ="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <button type="reset" onclick="window.history.back();" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></button>
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
