<?php

include('include/config.php');

$avp = "SELECT * FROM `maintenance` WHERE `status_avp` LIKE 'unread' ";
$pemeriksa = "SELECT * FROM `maintenance` WHERE `status_pemeriksa` LIKE 'unread' ";
$dataAvp = mysqli_query($config, $avp);
$dataPemeriksa = mysqli_query($config, $pemeriksa);
$resultAvp = mysqli_num_rows($dataAvp); //jumlah pesan yg belum dibaca
$resultPemeriksa = mysqli_num_rows($dataPemeriksa); //jumlah pesan yg belum dibaca

function countNotif()
{
    global $result;
    return $result;
}

// function cekUser()
// {
//     if ($_SESSION['user'] == 1) {
//         return true;
//     } else {
//         return false;
//     }
// }

function fetchData($id)
{
    global $conn;
    $query = "SELECT * FROM `maintenance` WHERE `id` = $id";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);
    return $result;
}

function allData()
{
    global $conn;
    $query = "SELECT * FROM `maintenace` WHERE `status_avp` LIKE 'unread' ";
    $data = mysqli_query($conn, $query);
    return $row = mysqli_fetch_assoc($data);
}

function updateDataAvp($id)
{
    global $config;
    $query = "UPDATE `maintenance` SET `status_avp` = 'read' WHERE `maintenance`.`id_surat` = $id";
    return mysqli_query($config, $query);
}

function updateDataPemeriksa($id)
{
    global $config;
    $query = "UPDATE `maintenance` SET `status_pemeriksa` = 'read' WHERE `maintenance`.`id_surat` = $id";
    return mysqli_query($config, $query);
}

function readData($id)
{
    global $conn;
    $query = "UPDATE `pesan` SET `statusAVP` = 'read' WHERE `pesan`.`id` LIKE $id";
    return mysqli_query($conn, $query);
}

function isReadAvp($id)
{
    global $config;
    $query = "SELECT `status_avp` FROM `maintenance` WHERE `id` = $id";
    $data = mysqli_query($config, $query);
    $result = mysqli_fetch_assoc($data);
    return $result['status_avp'];
}

function isReadPemeriksa($id)
{
    global $config;
    $query = "SELECT `status_pemeriksa` FROM `maintenance` WHERE `id` = $id";
    $data = mysqli_query($config, $query);
    $result = mysqli_fetch_assoc($data);
    return $result['status_pemeriksa'];
}

function changeButton($id)
{

    if (isReadAvp($id) == 'read') {
        echo '#000000';
    } else {
        echo 'black';
    }
}

function isClick($id_surat)
{
    if (isset($_POST['action'])) {
        // updateDataAvp($row['id_surat']);
        $surat = $id_surat;
        // $query = "UPDATE `maintenance` SET `status_avp` = 'read' WHERE `maintenance`.`id_surat` = $surat";
        // mysqli_query($config, $query);
        updateDataAvp($surat);
    }
}
