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
    $id = $_POST['id'];
    // Mengambil data dari formulir
    $title = $_POST['title'];
    $article = $_POST['article'];
    $category_id = $_POST['category_id'];

    // Slug dari judul
    $slug = strtolower(str_replace(' ', '-', $title)); 

    //cek apakah user mengupload gambar
    if($_FILES['image']['name']!==""){
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
            $updateQuery = "UPDATE articles SET title='$title', description='$article', category_id=$category_id, slug='$slug', image='$rename_file' WHERE id=$id";

            if (mysqli_query($conn, $updateQuery)) {
                //message
                $_SESSION['message'] = "Artikel berhasil diubah.";
                header("Location: dashboard.php"); 
                exit();
            } else {
                // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal mengunggah file.";
        }
    }else{
        //update artikel tanpa gambar
        $updateQuery = "UPDATE articles SET title='$title', description='$article', category_id=$category_id, slug='$slug' WHERE id=$id";
        if(mysqli_query($conn, $updateQuery)){
            //message
            $_SESSION['message'] = "Artikel berhasil diubah.";
            header("Location: dashboard.php"); 
            exit();
        }else{
            // Jika terjadi kesalahan, tampilkan pesan error atau lakukan hal lain sesuai kebutuhan
            echo "Error: " . mysqli_error($conn);
        }
    }

}else{
    header("Location: dashboard.php");
    exit();
}
?>
