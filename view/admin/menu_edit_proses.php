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
    $url = $_POST['url'];
    // Mengambil data submenu
    $submenus = isset($_POST['submenu']) ? $_POST['submenu'] : [];
    $submenu_urls = isset($_POST['submenu_url']) ? $_POST['submenu_url'] : [];
    $deleted_submenus = isset($_POST['deleted_submenu']) ? $_POST['deleted_submenu'] : [];
    $query = "UPDATE menu SET name='$name', slug='$slug', url='$url' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!empty($submenus)) {
        foreach ($submenus as $index => $submenu) {
            $submenu_name = $submenu;
            $submenu_url = $submenu_urls[$index];
            $submenu_slug = strtolower(str_replace(' ', '-', $submenu_name));
            //isset submenu_id
            if (isset($_POST['submenu_id'][$index])) {
                $submenu_id = $_POST['submenu_id'][$index];
                $query = "UPDATE submenu SET name='$submenu_name', slug='$submenu_slug', url='$submenu_url' WHERE id = $submenu_id";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "INSERT INTO submenu (name, slug, url, parent_id) VALUES ('$submenu_name', '$submenu_slug', '$submenu_url', $id)";
                $result = mysqli_query($conn, $query);
            }
        }
    }
    if (!empty($deleted_submenus)) {
        foreach ($deleted_submenus as $deleted_submenu) {
             $query = "DELETE FROM submenu WHERE id = $deleted_submenu";
             $result = mysqli_query($conn, $query);
        }
    }
    if ($result) {
        $_SESSION['message'] = "Menu berhasil diubah.";
        header("Location: menu.php");
        exit();
    } else {
        $_SESSION['message'] = "Menu gagal diubah.";
        header("Location: menu_tambah.php");
        exit();
    }

}
?>
