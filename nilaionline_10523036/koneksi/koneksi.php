<?php
$host = 'localhost'; 
$user = 'root';      
$password = '';      
$database = 'nilaionline'; 

$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}
?>
