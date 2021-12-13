<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header("Location: ./");
        die();
    } else {

        echo '
        <style type="text/css">
            table {
                background: #fff;
                padding: 5px;
                width:100%;
            }
            tr, td {
                border: table-cell;
                border: 1px  solid #444;
            }
            tr,td {
                vertical-align: top!important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .permintaan {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                text-align:right; margin-right:100px;
            }
            #leadcenter {
                text-align:center; width:150px;float:left;
            }
            #leadright {
                text-align:left; width:325px;float:left;
            }
            .lead {
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                table {
                    width: 100%;
                    font-size: 12px;
                    color: #212121;
                }
                tr, td {
                    border: table-cell;
                    border: 1px  solid #444;
                    padding: 8px!important;

                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .permintaan {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }
            }
        </style>

        <body onload="window.print()">

        <!-- Container START -->
        <div class="container">
            <div id="colres">
                <div class="disp">';
                    $query2 = mysqli_query($config, "SELECT institusi, nama, alamat, logo, id_user FROM tbl_instansi");
                     list($institusi, $nama, $alamat, $logo, $id_user) = mysqli_fetch_array($query2);
                    echo '<disp class="left"> E-Task Management PT RNI</disp></br></br>';
                    echo '<img src="./asset/img/RNI120.jpg"/>';
                    echo '<h6 class="up"h6>Formulir Permintaan Layanan</h6>';
                    
                    
                $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){
                    
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
                    
                    <span id="id_user">Last Modified : '.$d." ".$nm." ".$y.'</;pan><br>';
                                        $id_user = $row['id_user'];
                                        $query3 = mysqli_query($config, "SELECT nama FROM tbl_user WHERE id_user='$id_user'");
                                        list($nama) = mysqli_fetch_array($query3);{
                                            $row['id_user'] = ''.$nama.'';
                                        }
                    echo '<span id="id_user">Print By : '.$_SESSION['nama'].'</;pan>';
                    echo '
                </div>
                <div class="separator"></div>';

                echo '
                    
                    
                    <table class="bordered" id="tbl" style="width: 80% align: center">
                        <tbody>
                            <tr>
                                <td id="right" width="18%"><strong>Nomor</strong></td>
                                <td id="left" colspan="2">: '.$row['id_surat'].'/FPL/RNI/'.$m."/".$y.'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Tanggal Permintaan</strong></td>
                                <td id="left" colspan="2">: '.$d." ".$nm." ".$y.'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Nama</strong></td>
                                <td id="left" colspan="2">: '.$row['nama'].'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Divisi</strong></td>
                                <td id="left" colspan="2">: '.$row['divisi'].'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Permintaan Layanan</strong></td>
                                <td id="left" colspan="2">: '.$row['permintaan'].'</td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Keterangan Atau Barang</strong></td>
                                <td id="left" colspan="2">: '.$row['keterangan'].'</td>
                            </tr>
                            <tr>
                            <tr>';
                        } echo '
                </tbody>
            </table>
            
            
            
            <div id="leadright">
                <p>Diajukan oleh,</p>
                <div style="height: 10px;"></div>';
                $query = mysqli_query($config, "SELECT nama FROM tbl_user WHERE id_user='$id_user'");
                list($nama) = mysqli_fetch_array($query);
                $query = mysqli_query($config, "SELECT status_ttd FROM user_maintenance WHERE id_surat='$id_surat'");
                list($status_ttd) = mysqli_fetch_array($query);
                
                
                require_once('phpqrcode/qrlib.php');
                $admin = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");
                while ($m=mysqli_fetch_array($admin)){
                $barcode_user_maintenance = "http://lura-rni.my.id/admin.php?page=verificator_maintenance_user&id_surat=".$m['id_surat']."";
                
        
                QRcode::png("$barcode_user_maintenance","barcode_user_maintenance".$id_surat.".png","M", 5,10);                
                    echo '<img src="barcode_user_maintenance'.$id_surat.'.png" alt="" style="width: 120px;height: 120px";>';
                if(!empty($nama)){
                    echo '<p class="lead">'.$nama.'</p>';
                } else {
                    echo '<p class="lead">'.$nama.'</p>';
                }
                echo '
            </div>
        </div>
                <div id="leadcenter">
                <p>Diketahui oleh,</p>
                <div style="height: 10px;"></div>';
                $query = mysqli_query($config, "SELECT pemeriksa FROM maintenance WHERE id_surat='$id_surat'");
                list($pemeriksa) = mysqli_fetch_array($query);
                $query = mysqli_query($config, "SELECT status_ttd FROM pemeriksa_maintenance WHERE id_surat='$id_surat'");
                list($status_ttd) = mysqli_fetch_array($query);
                
                
                require_once('phpqrcode/qrlib.php');
                $admin = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");
                while ($m=mysqli_fetch_array($admin)){
                $barcode_pemeriksa_maintenance = "http://lura-rni.my.id/admin.php?page=verificator_maintenance_pemeriksa&id_surat=".$m['id_surat']."";
                
        
                QRcode::png("$barcode_pemeriksa_maintenance","barcode_pemeriksa_maintenance".$id_surat.".png","M", 5,10);
                if(!empty($status_ttd)){
                    echo '<img src="'.$status_ttd.''.$id_surat.'.png" alt="" style="width: 120px;height: 120px";>';
                } else {
                    echo '<p class="lead"></p>';
                }
                if(!empty($pemeriksa)){
                    echo '<p class="lead">'.$pemeriksa.'</p>';
                } else {
                    echo '<p class="lead">'.$pemeriksa.'</p>';
                }
                echo '
            </div>
        </div>
            <div id="lead">
                <p>Disetujui oleh,</p>
                <div style="height: 10px;"></div>';
                require_once('phpqrcode/qrlib.php');
                $query = mysqli_query($config, "SELECT status_ttd FROM ttd_vp WHERE id_surat='$id_surat'");
                list($status_ttd) = mysqli_fetch_array($query);
                
                $admin = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");
                while ($m=mysqli_fetch_array($admin)){
                $barcode_avp_maintenance = "http://lura-rni.my.id/admin.php?page=verificator_maintenance_avp&id_surat=".$m['id_surat']."";
                
        
                QRcode::png("$barcode_avp_maintenance","barcode_avp_maintenance".$id_surat.".png","M", 5,10);                
                if(!empty($status_ttd)){
                    echo '<img src="'.$status_ttd.''.$id_surat.'.png" alt="" style="width: 120px;height: 120px";>';
                } else {
                    echo '<p class="lead"></p>';
                }
                if(!empty($direktorat)){
                    echo '<p class="lead">AVP '.$direktorat.'</p>';
                } else {
                    echo '<p class="lead">AVP SDM & Umum</p>';
                }
                echo '
            </div>
        </div>
        <div class="jarak2"></div>
    </div>
    <!-- Container END -->

    </body>';
                 }
            }
        }
    }
}
?>
