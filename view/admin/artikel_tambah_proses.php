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
    $title = $_POST['title'];
    $article = $_POST['article'];
    $category_id = $_POST['category_id'];

    // Slug dari judul
    $slug = strtolower(str_replace(' ', '-', $title)); 

    // Mengambil informasi tentang file yang diunggah
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    // Mendefinisikan lokasi folder untuk menyimpan gambar yang diunggah
    $target_directory = "../../public/uploads/"; // Sesuaikan dengan lokasi yang diinginkan
    $target_file = $target_directory . basename($file_name);
    //rename file
    $rename_file = date('YmdHis') . basename($file_name);

    // Memindahkan file yang diunggah ke lokasi yang ditentukan
    if (move_uploaded_file($file_temp, $target_directory . $rename_file)) {
        // Query untuk menyimpan informasi artikel ke dalam database, termasuk nama file gambar
        $insertQuery = "INSERT INTO articles (title, description, category_id, slug, image) VALUES ('$title', '$article', $category_id, '$slug', '$file_name')";

        if (mysqli_query($conn, $insertQuery)) {
            //message
            $_SESSION['message'] = "Artikel berhasil ditambahkan.";
            header("Location: dashboard.php"); 
            exit();
        } else {
            // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>
