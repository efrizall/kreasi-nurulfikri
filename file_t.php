<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
        $query = mysqli_query($config, "SELECT * FROM transportasi WHERE id_surat='$id_surat'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                echo '
                    <div class="row jarak-form">
                        <ul class="collapsible white" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header white"><i class="material-icons md-prefix md-36">expand_more</i><span class="add">Data Transportasi</span></div>
                                    <div class="collapsible-body white">
                                        <div class="col m12 white">
                                            <table>
                                                <tbody>';
                                                                                                            
                                                        $y = substr($row['tgl_surat'],0,4);
                                                        $m = substr($row['tgl_surat'],5,2);
                                                        $d = substr($row['tgl_surat'],8,2);

                                                        if($m == "01"){
                                                            $nm = "Januari";
                                                        } elseif($m == "02"){
                                                            $nm = "Februari";
                                                        } elseif($m == "03"){
                                                            $nm = "Maret";
                                                        } elseif($m == "04"){
                                                            $nm = "April";
                                                        } elseif($m == "05"){
                                                            $nm = "Mei";
                                                        } elseif($m == "06"){
                                                            $nm = "Juni";
                                                        } elseif($m == "07"){
                                                            $nm = "Juli";
                                                        } elseif($m == "08"){
                                                            $nm = "Agustus";
                                                        } elseif($m == "09"){
                                                            $nm = "September";
                                                        } elseif($m == "10"){
                                                            $nm = "Oktober";
                                                        } elseif($m == "11"){
                                                            $nm = "November";
                                                        } elseif($m == "12"){
                                                            $nm = "Desember";
                                                        }
                                                        
                                                        echo '
                                                    <tr>
                                                        <td width="13%">Nomor</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['id_surat'].'/FPK/RNI/'.$m."/".$y.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Nama</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['nama'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Divisi</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['divisi'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Jenis Mobil</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['jenis_mobil'].'</td>
                                                    </tr>
                                                    <tr>
                                                    <td width="13%">Tujuan</td>
                                                    <td width="1%">:</td>
                                                    <td width="86%">'.$row['tujuan'].'</td>
                                                    </tr>
                                                    <tr>
                                                    <td width="13%">Keperluan</td>
                                                    <td width="1%">:</td>
                                                    <td width="86%">'.$row['keperluan'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Tanggal Pakai</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$d." ".$nm." ".$y.'</td>                                                    
                                                        </tr>
                                                    <tr>
                                                        <td width="13%">Tanggal Kembali</td>
                                                        <td width="1%">:</td>';
                                                        
                                                        $yy = substr($row['tgl_kembali'],0,4);
                                                        $mm = substr($row['tgl_kembali'],5,2);
                                                        $dd = substr($row['tgl_kembali'],8,2);

                                          if($mm == "01"){
                                            $n = "Januari";
                                        } elseif($mm == "02"){
                                            $n = "Februari";
                                        } elseif($mm == "03"){
                                            $n = "Maret";
                                        } elseif($mm == "04"){
                                            $n = "April";
                                        } elseif($mm == "05"){
                                            $n = "Mei";
                                        } elseif($mm == "06"){
                                            $n = "Juni";
                                        } elseif($mm == "07"){
                                            $n = "Juli";
                                        } elseif($mm == "08"){
                                            $n = "Agustus";
                                        } elseif($mm == "09"){
                                            $n = "September";
                                        } elseif($mm == "10"){
                                            $n = "Oktober";
                                        } elseif($mm == "11"){
                                            $n = "November";
                                        } elseif($mm == "12"){
                                            $n = "Desember";
                                        }

                                                        echo '

                                                        <td width="86%">'.$dd." ".$n." ".$yy.'</td>                                                    </tr>

                                                    <tr>
                                                    <td width="13%">Jam Pakai</td>
                                                    <td width="1%">:</td>
                                                    <td width="86%">'.$row['jam_pakai'].'</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <button onclick="window.history.back()" class="btn-large blue waves-effect waves-light left"><i class="material-icons">arrow_back</i> KEMBALI</button>';

                        if(empty($row['file'])){
                            echo '';
                        } else {

                            $ekstensi = array('jpg','png','jpeg');
                            $ekstensi2 = array('doc','docx');
                            $file = $row['file'];
                            $x = explode('.', $file);
                            $eks = strtolower(end($x));

                            if(in_array($eks, $ekstensi) == true){
                                echo '<img class="gbr" data-caption="'.date('d M Y', strtotime($row['tgl_diterima'])).'" src="./upload/surat_masuk/'.$row['file'].'"/>';
                            } else {

                                if(in_array($eks, $ekstensi2) == true){
                                    echo '
                                    <div class="gbr">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="col s9 left">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <p>File lampiran transportasi ini bertipe <strong>document</strong>, silakan klik link dibawah ini untuk melihat file lampiran tersebut.</p>
                                                        </div>
                                                        <div class="card-action">
                                                            <strong>Lihat file :</strong> <a class="blue-text" href="./upload/surat_masuk/'.$row['file'].'" target="_blank">'.$row['file'].'</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col s3 right">
                                                    <img class="file" src="./asset/img/word.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                } else {
                                    echo '
                                    <div class="gbr">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="col s9 left">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <p>File lampiran transportasi ini bertipe <strong>PDF</strong>, silakan klik link dibawah ini untuk melihat file lampiran tersebut.</p>
                                                        </div>
                                                        <div class="card-action">
                                                            <strong>Lihat file :</strong> <a class="blue-text" href="./upload/surat_masuk/'.$row['file'].'" target="_blank">'.$row['file'].'</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col s3 right">
                                                    <img class="file" src="./asset/img/pdf.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                        } echo '
                    </div>';
            }
        }
    }
?>
