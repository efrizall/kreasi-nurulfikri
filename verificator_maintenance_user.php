<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {
                    echo '<img src="./asset/img/RNI120.jpg" style="margin-bottom: 20px; margin-left: auto; margin-right: auto; display: block"/>';
                    echo '<h5 class="up" style="text-align:center; color:green; margin-bottom:20px">Pemeriksa berhasil teridentifikasi!</h5>';

        $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
        $query = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                echo '
                    <div class="row jarak-form">
                        <ul class="collapsible white" data-collapsible="accordion">
                            <li>
                                <div class="collapsible-header white"><i class="material-icons md-prefix md-36">expand_more</i><span class="add">Informasi Maintenance</span></div>
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
                                                        <td width="86%">' . $row['id_surat'] . '/FPL/RNI/' . $m . "/" . $y . '</td>
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
                                                    <td width="13%">Permintaan Layanan</td>
                                                    <td width="1%">:</td>
                                                    <td width="86%">'.$row['permintaan'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Keterangan Atau Barang</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['keterangan'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Status</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$row['status'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="13%">Tanggal</td>
                                                        <td width="1%">:</td>
                                                        <td width="86%">'.$d." ".$nm." ".$y.'</td> 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>';

                        
                                }
                            }
                        } echo '
                    </div>';
        
?>
