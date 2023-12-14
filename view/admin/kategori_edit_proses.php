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

    // Membuat slug dari nama kategori
    $slug = strtolower(str_replace(' ', '-', $name)); 

    // Query SQL untuk menambahkan kategori ke database
    $insertQuery = "UPDATE category SET name='$name', slug='$slug' WHERE id=$id";
    
    // Melakukan eksekusi query
    if (mysqli_query($conn, $insertQuery)) {
        // Jika berhasil ditambahkan, redirect ke halaman kategori atau halaman yang diinginkan
        $_SESSION['message'] = "Kategori berhasil diubah.";
        header("Location: kategori.php"); // Ganti kategori.php dengan halaman yang sesuai
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
        echo "Error: " . mysqli_error($conn);
    }
}
?>
