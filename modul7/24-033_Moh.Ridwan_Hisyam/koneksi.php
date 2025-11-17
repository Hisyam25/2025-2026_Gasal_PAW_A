<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reporting_modul7";

$koneksi = mysqli_connect($servername, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
mysqli_set_charset($koneksi, 'utf8');
?>