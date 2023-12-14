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
    $name = $_POST['name'];
    // Membuat slug dari nama kategori
    $slug = strtolower(str_replace(' ', '-', $name));
    $url = $_POST['url'];
    // Mengambil data submenu
    $submenus = $_POST['submenu'];
    $submenu_urls = $_POST['submenu_url'];
    $query = "INSERT INTO menu (name, slug, url) VALUES ('$name', '$slug', '$url')";
    $result = mysqli_query($conn, $query);
    $id = mysqli_insert_id($conn);
    if (!empty($submenus)) {
        foreach ($submenus as $index => $submenu) {
            $submenu_name = $submenu;
            $submenu_url = $submenu_urls[$index];
            $submenu_slug = strtolower(str_replace(' ', '-', $submenu_name));
            $submenu_query = "INSERT INTO submenu (name, slug, url, parent_id) VALUES ('$submenu_name', '$submenu_slug', '$submenu_url', '$id')";
            $submenu_result = mysqli_query($conn, $submenu_query);

        }
    }
    if ($result) {
        $_SESSION['message'] = "Menu berhasil ditambahkan.";
        header("Location: menu.php");
        exit();
    } else {
        $_SESSION['message'] = "Menu gagal ditambahkan.";
        header("Location: menu_tambah.php");
        exit();
    }

}
?>
