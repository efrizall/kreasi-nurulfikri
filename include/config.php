<?php
    $host = "localhost";
    $username = "lurarnim_lura";
    $password = "Prilambang123";
    $database = "lurarnim_lura";
    $config = mysqli_connect($host, $username, $password, $database);

    if(!$config){
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
?>
