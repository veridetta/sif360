<?php
include '../../config/database.php';
session_start();

// Cek session
if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}

// Pastikan parameter 'id' dari GET sudah tersedia dan valid
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM articles WHERE id=$id";
    if(mysqli_query($conn, $deleteQuery)){
        // Jika berhasil dihapus, redirect ke halaman artikel atau halaman yang diinginkan
        $_SESSION['message'] = "Artikel berhasil dihapus.";
        header("Location: dashboard.php"); // Ganti dashboard.php dengan halaman yang sesuai
        exit();
    }else{
        // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
        echo "Error: " . mysqli_error($conn);
    }
}else{
    header("Location: dashboard.php");
    exit();
}

