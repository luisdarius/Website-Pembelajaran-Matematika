<?php

/* 
    KONEKSI KE DATABASE
 */

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'matematika';

$koneksi = mysqli_connect($host, $username, $password, $dbname);

// if (!$koneksi) {
//     echo 'Koneksi gagal!';
// }
// else{
//     echo "Koneksi Berhasil";
// }