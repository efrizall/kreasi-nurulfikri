<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

 {

                $nama = $_REQUEST['nama'];
                $jenis_mobil = $_REQUEST['jenis_mobil'];
                $tujuan = $_REQUEST['tujuan'];
                $keperluan = $_REQUEST['keperluan'];
                $divisi = $_REQUEST['divisi'];
                $pemeriksa = $_REQUEST['pemeriksa'];
                $tgl_kembali = $_REQUEST['tgl_kembali'];
                $tgl_surat = $_REQUEST['tgl_surat'];
                $tgl_diterima = $_REQUEST['tgl_diterima'];
                $jam_pakai = $_REQUEST['jam_pakai'];
                $id_user = $_SESSION['id_user'];
                $status = $_REQUEST['status'];
                $ttd_avp = $_SESSION['ttd_avp'];
                $ttd_pemeriksa = $_SESSION['ttd_pemeriksa'];
                


                                                    $ekstensi = array('jpg','png','jpeg','doc','docx','pdf');
                                                    $file = $_FILES['file']['name'];
                                                    $x = explode('.', $file);
                                                    $eks = strtolower(end($x));
                                                    $ukuran = $_FILES['file']['size'];
                                                    $target_dir = "upload/surat_masuk/";

                                                    //jika form file tidak kosong akan mengeksekusi script dibawah ini
                                                    if($file != ""){

                                                        $rand = rand(1,10000);
                                                        $nfile = $rand."-".$file;

                                                        //validasi file
                                                        if(in_array($eks, $ekstensi) == true){
                                                            if($ukuran < 2500000){

                                                                move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);

                                                                $query = mysqli_query($config, "INSERT INTO transportasi(nama,jenis_mobil,tujuan,keperluan,divisi,pemeriksa,tgl_kembali,tgl_surat,
                                                                    tgl_diterima,file,jam_pakai,id_user,status,ttd_avp,ttd_pemeriksa)
                                                                        VALUES('$nama','$jenis_mobil','$tujuan','$keperluan','$divisi','$pemeriksa','$tgl_kembali','$tgl_surat',NOW(),'$nfile','$jam_pakai','$id_user','Belum Kembali','Belum Disetujui','Belum Disetujui')");

                                                                if($query == true){
                                                                    $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                                    header("Location: ./admin.php?page=transportasi");
                                                                    die();
                                                                } else {
                                                                    $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                                    echo '<script language="javascript">window.history.back();</script>';
                                                                }
                                                            } else {
                                                                $_SESSION['errSize'] = 'Ukuran file yang diupload terlalu besar!';
                                                                echo '<script language="javascript">window.history.back();</script>';
                                                            }
                                                        } else {
                                                            $_SESSION['errFormat'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        }
                                                    } else {

                                                        //jika form file kosong akan mengeksekusi script dibawah ini
                                                        $query = mysqli_query($config, "INSERT INTO transportasi(nama,jenis_mobil,tujuan,keperluan,divisi,pemeriksa,tgl_kembali,tgl_surat,tgl_diterima,file,jam_pakai,id_user,status,ttd_avp,ttd_pemeriksa)
                                                            VALUES('$nama','$jenis_mobil','$tujuan','$keperluan','$divisi','$pemeriksa','$tgl_kembali','$tgl_surat',NOW(),'','$jam_pakai','$id_user','Belum Kembali','Belum Disetujui','Belum Disetujui')");

                                                        if($query == true){
                                                            $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                                            header("Location: ./admin.php?page=transportasi");
                                                            die();
                                                        } else {
                                                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                                            echo '<script language="javascript">window.history.back();</script>';
                                                        }
                                                    }
                                                }
                                            }
         {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper teal darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="?page=transportasi&act=add" class="judul"><i class="material-icons">directions_car</i> Tambah Permintaan Transportasi</a></li>
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
                <form class="col s12" method="POST" action="?page=transportasi&act=add" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Nama">
                            <i class="material-icons prefix md-prefix">account_box</i>
                            <input id="nama" type="text" class="validate" name="nama" required>
                            <label for="nama">Nama</label>
                        </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Tanggal Pakai">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_surat" type="text" name="tgl_surat" class="datepicker" required>
                            <label for="tgl_surat">Tanggal Pakai</label>
                        </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Divisi">
                            <i class="material-icons prefix md-prefix">bookmark</i>
                            <input id="divisi" type="text" class="validate" name="divisi" required>
                            <label for="divisi">Divisi</label>
                            </div>
                            <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Jam">
                            <i class="material-icons prefix md-prefix">access_time</i>
                            <input id="jam_pakai" type="text" class="validate" name="jam_pakai" required>
                            <label for="jam_pakai">Jam Pakai</label>
                            </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Tujuan">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="tujuan" type="text" class="validate" name="tujuan" required>
                            <label for="tujuan">Tujuan</label>
                        </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Tanggal Kembali">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_kembali" type="text" name="tgl_kembali" class="datepicker">
                            <label for="tgl_kembali">Tanggal Kembali</label>
                        </div>
                            <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Isi Keperluan">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="keperluan" type="text" class="validate" name="keperluan" required>
                            <label for="keperluan">Keperluan</label>
                            </div>
                        <div class="input-field col s6 tooltipped" data-position="top" data-tooltip="Pilih Jenis Mobil">
                            <i class="material-icons prefix md-prefix active">directions_car</i><label>Jenis Mobil</label><br/>
                            <div class="input-field col s11 right">
                            <select name="jenis_mobil" class="browser-default validate">
                            <option hidden>Pilih Mobil</option>
                                <?php
                                    $ambilsemuadata = mysqli_query($config,"select * from stock");
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
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix active">person_outline</i><label>Pemeriksa Permintaan</label><br/>
                            <div class="input-field col s11 right">
                                <select class="browser-default validate" name="pemeriksa" id="pemeriksa" required>
                                                            <option hidden>Pilih Jabatan</option>
                                                                                                                         <option value="Direktur Utama" >
                                                              <b>Direktur Utama
                                                            </option>
                                                                                                                        <option value="Direktur Keuangan dan Manajemen Risiko" >
                                                              <b>Direktur Keuangan dan Manajemen Risiko</b>
                                                            </option>
                                                                                                                        <option value="Direktur Komersial" >
                                                              <b>Direktur Komersial</b>
                                                            </option>
                                                                                                                        <option value="Direktur Supply Chain Management & Teknologi Informasi" >
                                                              <b>Direktur Supply Chain Management & Teknologi Informasi</b>
                                                            </option>
                                                                                                                        <option value="Direktur Pengembangan & Pengendalian Usaha" >
                                                              <b>Direktur Pengembangan & Pengendalian Usaha</b>
                                                            </option>
                                                                                                                        <option value="Direktur Manajemen Aset dan SDM" >
                                                              <b>Direktur Manajemen Aset dan SDM</b>
                                                            </option>
                                                                                                                        <option value="EVP Sekretaris Korporasi" >
                                                              <b>EVP Sekretaris Korporasi</b>
                                                            </option>
                                                                                                                        <option value="EVP Audit Internal" >
                                                              <b>EVP Audit Internal</b>
                                                            </option>
                                                                                                                        <option value="VP Komunikasi Korporasi" >
                                                              <b>VP Komunikasi Korporasi</b>
                                                            </option>
                                                                                                                        <option value="VP Akuntansi" >
                                                              <b>VP Akuntansi</b>
                                                            </option>
                                                                                                                        <option value="VP Audit Keuangan" >
                                                              <b>VP Audit Keuangan</b>
                                                            </option>
                                                                                                                        <option value="VP Audit Operasional" >
                                                              <b>VP Audit Operasional</b>
                                                            </option>
                                                                                                                        <option value="VP Legal & Kepatuhan" >
                                                              <b>VP Legal & Kepatuhan</b>
                                                            </option>
                                                                                                                        <option value="VP Transformasi Organisasi & Pengendalian Kinerja Korporasi" >
                                                              <b>VP Transformasi Organisasi & Pengendalian Kinerja Korporasi</b>
                                                            </option>
                                                                                                                        <option value="VP Riset & Pengembangan Usaha" >
                                                              <b>VP Riset & Pengembangan Usaha</b>
                                                            </option>
                                                                                                                        <option value="VP Keuangan Korporasi" >
                                                              <b>VP Keuangan Korporasi</b>
                                                            </option>
                                                                                                                        <option value="VP Pengelolaan Aset" >
                                                              <b>VP Pengelolaan Aset</b>
                                                            </option>
                                                                                                                        <option value="VP Pengembangan Aset" >
                                                              <b>VP Pengembangan Aset</b>
                                                            </option>
                                                                                                                        <option value="VP SDM & Umum" >
                                                              <b>VP SDM & Umum</b>
                                                            </option>
                                                                                                                        <option value="VP Agro & Tanaman Pangan" >
                                                              <b>VP Agro & Tanaman Pangan</b>
                                                            </option>
                                                                                                                        <option value="VP Non Agro" >
                                                              <b>VP Non Agro</b>
                                                            </option>
                                                                                                                        <option value="VP Perdagangan & Manufaktur" >
                                                              <b>VP Perdagangan & Manufaktur</b>
                                                            </option>
                                                                                                                        <option value="VP Manajemen Rantai Pasok" >
                                                              <b>VP Manajemen Rantai Pasok</b>
                                                            </option>
                                                                                                                        <option value="VP Digital & Teknologi Informasi" >
                                                              <b>VP Digital & Teknologi Informasi</b>
                                                            </option>
                                                                                                                        <option value="VP Manajemen Risiko" >
                                                              <b>VP Manajemen Risiko</b>
                                                            </option>
                                                                                                                        <option value="AVP Pendukung Direksi & Kesekretariatan" >
                                                              <b>AVP Pendukung Direksi & Kesekretariatan</b>
                                                            </option>
                                                                                                                        <option value="AVP Komunikasi & Relasi Korporasi" >
                                                              <b>AVP Komunikasi & Relasi Korporasi</b>
                                                            </option>
                                                                                                                        <option value="AVP TJSL & CSR" >
                                                              <b>AVP TJSL & CSR</b>
                                                            </option>
                                                                                                                        <option value="AVP Hukum Bisnis & Kepatuhan" >
                                                              <b>AVP Hukum Bisnis & Kepatuhan</b>
                                                            </option>
                                                                                                                        <option value="AVP Penasihat Hukum & Litigasi" >
                                                              <b>AVP Penasihat Hukum & Litigasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Strategi Korporasi & Transformasi Organisasi" >
                                                              <b>AVP Strategi Korporasi & Transformasi Organisasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengendalian Kinerja Korporasi" >
                                                              <b>AVP Pengendalian Kinerja Korporasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengembangan Usaha & Portofolio" >
                                                              <b>AVP Pengembangan Usaha & Portofolio</b>
                                                            </option>
                                                                                                                        <option value="AVP Riset & Inovasi" >
                                                              <b>AVP Riset & Inovasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Keuangan" >
                                                              <b>AVP Keuangan</b>
                                                            </option>
                                                                                                                        <option value="AVP Tresuri" >
                                                              <b>AVP Tresuri</b>
                                                            </option>
                                                                                                                        <option value="AVP Akuntansi" >
                                                              <b>AVP Akuntansi</b>
                                                            </option>
                                                                                                                        <option value="AVP Anggaran" >
                                                              <b>AVP Anggaran</b>
                                                            </option>
                                                                                                                        <option value="AVP Operasional & Pengelolaan Informasi Aset" >
                                                              <b>AVP Operasional & Pengelolaan Informasi Aset</b>
                                                            </option>
                                                                                                                        <option value="AVP Strategi & Sinergi Aset" >
                                                              <b>AVP Strategi & Sinergi Aset</b>
                                                            </option>
                                                                                                                        <option value="AVP Optimalisasi & Komersialisasi Aset" >
                                                              <b>AVP Optimalisasi & Komersialisasi Aset</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengembangan Organisasi" >
                                                              <b>AVP Pengembangan Organisasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengembangan SDM" >
                                                              <b>AVP Pengembangan SDM</b>
                                                            </option>
                                                                                                                        <option value="AVP Agro I" >
                                                              <b>AVP Agro I</b>
                                                            </option>
                                                                                                                        <option value="AVP Agro II" >
                                                              <b>AVP Agro II</b>
                                                            </option>
                                                                                                                        <option value="AVP Tanaman Pangan" >
                                                              <b>AVP Tanaman Pangan</b>
                                                            </option>
                                                                                                                        <option value="AVP Non Agro I" >
                                                              <b>AVP Non Agro I</b>
                                                            </option>
                                                                                                                        <option value="AVP Non Agro II" >
                                                              <b>AVP Non Agro II</b>
                                                            </option>
                                                                                                                        <option value="AVP QA/QC" >
                                                              <b>AVP QA/QC</b>
                                                            </option>
                                                                                                                        <option value="AVP Analis Bisnis & Intelijen Pemasaran" >
                                                              <b>AVP Analis Bisnis & Intelijen Pemasaran</b>
                                                            </option>
                                                                                                                        <option value="AVP Perdagangan & Manufaktur" >
                                                              <b>AVP Perdagangan & Manufaktur</b>
                                                            </option>
                                                                                                                        <option value="AVP Perdagangan & Pengembangan Produk" >
                                                              <b>AVP Perdagangan & Pengembangan Produk</b>
                                                            </option>
                                                                                                                        <option value="AVP Integrasi Manajemen Rantai Pasok" >
                                                              <b>AVP Integrasi Manajemen Rantai Pasok</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengembangan ICT" >
                                                              <b>AVP Pengembangan ICT</b>
                                                            </option>
                                                                                                                        <option value="AVP Pelayanan Strategis & Sistem Pendukung" >
                                                              <b>AVP Pelayanan Strategis & Sistem Pendukung</b>
                                                            </option>
                                                                                                                        <option value="AVP Manajemen Perubahan Digital & Teknologi Informasi" >
                                                              <b>AVP Manajemen Perubahan Digital & Teknologi Informasi</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengamanan & Legal Aset" >
                                                              <b>AVP Pengamanan & Legal Aset</b>
                                                            </option>
                                                                                                                        <option value="AVP Pengadaan" >
                                                              <b>AVP Pengadaan</b>
                                                            </option>
                                                                                                                        <option value="Sekretaris Dewan Komisaris" >
                                                              <b>Sekretaris Dewan Komisaris</b>
                                                            </option>
                                                                                                                        <option value="AVP Pajak" >
                                                              <b>AVP Pajak</b>
                                                            </option>
                                                                                                                        <option value="AVP Risiko Keuangan & Bisnis" >
                                                              <b>AVP Risiko Keuangan & Bisnis</b>
                                                            </option>
                                                                                                                        <option value="AVP Risiko Strategis & Kepatuhan Hukum" >
                                                              <b>AVP Risiko Strategis & Kepatuhan Hukum</b>
                                                            </option>
                                                                                                                        <option value="AVP Pelayanan Strategis SDM & Umum" >
                                                              <b>AVP Pelayanan Strategis SDM & Umum</b>
                                                            </option>
                                                                                                                        <option value="AVP Pendukung Strategik" >
                                                              <b>AVP Pendukung Strategik</b>
                                                            </option>
                                                                                                                        <option value="Sekretariat" >
                                                              <b>Sekretariat</b>
                                                            </option>
                                                                                                                        <option value="Sekretariat 2" >
                                                              <b>Sekretariat 2</b>
                                                            </option>
                                                                                                                        <option value="Sekretariat 3" >
                                                              <b>Sekretariat 3</b>
                                                            </option>
                                                                                                                        <option value="Sekretariat Dewan Komisaris" >
                                                              <b>Sekretariat Dewan Komisaris</b>
                                                            </option>
                                                                                                                        <option value="Komisaris Utama" >
                                                              <b>Komisaris Utama</b>
                                                            </option>
                                                                                                                        <option value="Komite Audit" >
                                                              <b>Komite Audit</b>
                                                            </option>
                                                                                                                    </select>                            </div>
             
                        </div>
                        <div class="input-field col s6">
                            <div class="file-field input-field tooltipped" data-position="top" data-tooltip="Jika tidak ada file/scan gambar transportasi, biarkan kosong">
                                <div class="btn light-green darken-1">
                                    <span>File</span>
                                    <input type="file" id="file" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload file/scan gambar transportasi">
                                        <?php
                                            if(isset($_SESSION['errSize'])){
                                                $errSize = $_SESSION['errSize'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errSize.'</div>';
                                                unset($_SESSION['errSize']);
                                            }
                                            if(isset($_SESSION['errFormat'])){
                                                $errFormat = $_SESSION['errFormat'];
                                                echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errFormat.'</div>';
                                                unset($_SESSION['errFormat']);
                                            }
                                        ?>
                                    <small class="red-text">*Format file yang diperbolehkan *.JPG, *.PNG, *.DOC, *.DOCX, *.PDF dan ukuran maksimal file 2 MB!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <a href="?page=transportasi" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
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
