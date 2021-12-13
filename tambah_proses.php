<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            $id_surat = $_REQUEST['id_surat'];
            $query = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");
            $no = 1;
            list($id_surat) = mysqli_fetch_array($query);

                $nama_detail = $_REQUEST['nama_detail'];
                $divisi_detail = $_REQUEST['divisi_detail'];
                $status_detail = $_REQUEST['status_detail'];
                $tgl_surat_detail = $_REQUEST['tgl_surat_detail'];
                $catatan_detail = $_REQUEST['catatan_detail'];
                $id_user = $_SESSION['id_user'];

                                    $query = mysqli_query($config, "INSERT INTO tbl_proses(nama_detail,divisi_detail,status_detail,tgl_surat_detail,catatan_detail,id_surat,id_user)
                                        VALUES('$nama_detail','$divisi_detail','$status_detail',NOW(),'$catatan_detail','$id_surat','$id_user')");

                                    if($query == true){
                                        $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                        echo '<script language="javascript">
                                                window.location.href="./admin.php?page=maintenance&act=proses&id_surat='.$id_surat.'";
                                              </script>';
                                    } else {
                                        $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
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
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">settings</i> Tambah Proses</a></li>
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
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">account_box</i>
                            <input value="Awi" id="nama_detail" type="text" class="validate" name="nama_detail" required>
                            <label for="nama_detail">Nama</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input value="Staff Pelayanan Umum" id="divisi_detail" type="text" class="validate" name="divisi_detail" required>
                            <label for="divisi_detail">Divisi</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">note</i>
                            <input id="catatan_detail" type="text" class="validate" name="catatan_detail">
                            <label for="catatan_detail">Catatan (Optional)</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix active">dehaze</i><label>Status</label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="status_detail" id="status_detail" required>
                                    <option hidden>Pilih Status</option>
                                    <option value="Belum di proses">Belum di proses</option>
                                    <option value="Sedang di proses">Sedang di proses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                            </div>
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
