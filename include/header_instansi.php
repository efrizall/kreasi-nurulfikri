<?php
    //cek session
    if(!empty($_SESSION['admin'])){
        $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
        while($data = mysqli_fetch_array($query)){
            echo '
                <div class="col s12" id="header-instansi">
                    <div class="card blue-grey white-text" style="height: auto">
                        <div class="card-content">';
                            if(!empty($data['logo'])){
                                echo '<div class="circle left"><img class="logo" src="./upload/'.$data['logo'].'"/></div>';
                            } else {
                                echo '<div class="circle left"><img class="logo" src="./asset/img/logo.png"/></div>';
                            }
                            
                            if(!empty($data['nama'])){
                                echo '<br><h5 class="ins">'.$data['nama'].'</h5>';
                            } else {
                                echo '<h5 class="ins">LURA</h5>';
                            }

                            if(!empty($data['alamat'])){
                                echo '<p class="almt"></p>';
                            } else {
                                echo '<p class="almt">'.$data['alamat'].'</p>';
                            }
                            echo '
                        </div>
                    </div>
                </div>';
        }
    } else {
        header("Location: ../");
        die();
    }
