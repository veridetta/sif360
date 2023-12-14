<?php
include '../../config/database.php';

session_start();

// Cek session, diarahkan ke login dengan pesan
if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $id = $_POST['id'];
    $name = $_POST['name'];
    //slogan, address, twitter, facebook, instagram
    $slogan = $_POST['slogan'];
    $address = $_POST['address'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    //update 
    $query = "UPDATE about SET name='$name', slogan='$slogan', address='$address', twitter='$twitter', facebook='$facebook', instagram='$instagram' WHERE id = $id";
    // Melakukan eksekusi query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil ditambahkan, redirect ke halaman kategori atau halaman yang diinginkan
        $_SESSION['message'] = "Data berhasil diubah.";
        header("Location: tentang.php"); // Ganti kategori.php dengan halaman yang sesuai
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
        echo "Error: " . mysqli_error($conn);
    }
}
?>
