<?php
session_start();

// Fungsi logout
function logout() {
    // Menghapus semua variabel session
    $_SESSION = array();

    // Jika ada session cookie, hapus juga cookie-nya
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Hapus session
    session_destroy();
}

// Panggil fungsi logout jika ada permintaan untuk logout
if (isset($_GET['logout'])) {
    logout();
    //tambahkan pesan
    $_SESSION['message'] = "Anda telah berhasil logout.";
    header("Location: login.php");
    exit();
}
?>
