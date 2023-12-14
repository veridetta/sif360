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
    //cek submenu dan hapus
    $submenu = mysqli_query($conn, "SELECT * FROM submenu WHERE parent_id = $id");
    $submenus = mysqli_fetch_all($submenu, MYSQLI_ASSOC);
    if(!empty($submenus)){
        foreach($submenus as $submenu){
            $query = "DELETE FROM submenu WHERE id = $submenu[id]";
            $result = mysqli_query($conn, $query);
        }
    }
    $deleteQuery = "DELETE FROM menu WHERE id=$id";
    if(mysqli_query($conn, $deleteQuery)){
        // Jika berhasil dihapus, redirect ke halaman artikel atau halaman yang diinginkan
        $_SESSION['message'] = "Menu Navigasi berhasil dihapus.";
        header("Location: kategori.php"); // Ganti dashboard.php dengan halaman yang sesuai
        exit();
    }else{
        // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
        echo "Error: " . mysqli_error($conn);
    }
}else{
    header("Location: dashboard.php");
    exit();
}

