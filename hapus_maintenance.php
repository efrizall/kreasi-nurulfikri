<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_SESSION['errQ'])){
            $errQ = $_SESSION['errQ'];
            echo '<div id="alert-message" class="row jarak-card">
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

    	$id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
    	$query = mysqli_query($config, "SELECT * FROM maintenance WHERE id_surat='$id_surat'");

    	if(mysqli_num_rows($query) > 0){
            $no = 1;
            while($row = mysqli_fetch_array($query)){

            if($_SESSION['id_user'] != $row['id_user'] AND $_SESSION['id_user'] != 1){
                echo '<script language="javascript">
                        window.alert("ERROR! Anda tidak memiliki hak akses untuk menghapus data ini");
                        window.location.href="./admin.php?page=maintenance";
                      </script>';
            } else {

    		  echo '
                <!-- Row form Start -->
				<div class="row jarak-card">
				    <div class="col m12">
                    <div class="card">
                        <div class="card-content">
				        <table>
				            <thead class="red lighten-5 red-text">
				                <div class="confir red-text"><i class="material-icons md-36">error_outline</i>
				                Apakah Anda yakin akan menghapus data ini?</div>
				            </thead>

				            <tbody>
				                <tr>
                                <td width="13%">Nomor</td>
                                <td width="1%">:</td>
                                <td width="86%">'.$row['id_surat'].'/FPL/RNI/'.$tgl = date('m/Y ', strtotime($row['tgl_surat'])).'</td>
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
    			                    <td width="13%">File</td>
    			                    <td width="1%">:</td>
    			                    <td width="86%">';
                                    if(!empty($row['file'])){
                                        echo ' <a class="blue-text" href="?page=gm&act=fm&id_surat='.$row['id_surat'].'">'.$row['file'].'</a>';
                                    } else {
                                        echo ' Tidak ada file yang diupload';
                                    } echo '</td>
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
    			                    <td width="13%">Tanggal Permintaan</td>
    			                    <td width="1%">:</td>
    			                    <td width="86%">'.$tgl = date('d M Y ', strtotime($row['tgl_surat'])).'</td>
    			                </tr>
    			            </tbody>
    			   		</table>
                        </div>
                        <div class="card-action">
        	                <a href="?page=maintenance&act=del&submit=yes&id_surat='.$row['id_surat'].'" class="btn-large deep-orange waves-effect waves-light white-text">HAPUS <i class="material-icons">delete</i></a>
        	                <a href="?page=maintenance" class="btn-large blue waves-effect waves-light white-text">BATAL <i class="material-icons">clear</i></a>
    	                </div>
    	            </div>
                </div>
            </div>
            <!-- Row form END -->';

            	if(isset($_REQUEST['submit'])){
            		$id_surat = $_REQUEST['id_surat'];

                    //jika ada file akan mengekseskusi script dibawah ini
                    if(!empty($row['file'])){
                        unlink("upload/surat_masuk/".$row['file']);
                        $query = mysqli_query($config, "DELETE FROM maintenance WHERE id_surat='$id_surat'");

                		if($query == true){
                            $_SESSION['succDel'] = 'SUKSES! Data berhasil dihapus<br/>';
                            header("Location: ./admin.php?page=maintenance");
                            die();
                		} else {
                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                            echo '<script language="javascript">
                                    window.location.href="./admin.php?page=maintenance&act=del&id_surat='.$id_surat.'";
                                  </script>';
                		}
                	} else {

                        //jika tidak ada file akan mengekseskusi script dibawah ini
                        $query = mysqli_query($config, "DELETE FROM maintenance WHERE id_surat='$id_surat'");

                        if($query == true){
                            $_SESSION['succDel'] = 'SUKSES! Data berhasil dihapus<br/>';
                            header("Location: ./admin.php?page=maintenance");
                            die();
                        } else {
                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                            echo '<script language="javascript">
                                    window.location.href="./admin.php?page=maintenance&act=del&id_surat='.$id_surat.'";
                                  </script>';
                        }
                    }
                }
    	    }
        }
    }
}
?>
