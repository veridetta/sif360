<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "db_sif360"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
