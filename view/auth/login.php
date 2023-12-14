
<?php
include '../template/header.php';
if (isset($_POST['username'])) {
    print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['login_failed'] = "Username dan password harus diisi.";
        header("Location: login.php");
        exit();
    }
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        $_SESSION['username'] = $username; // Menyimpan username ke dalam session
        header("Location: ../admin/dashboard.php"); // Ganti dashboard.php dengan halaman setelah login berhasil
        exit();
    } else {
        // Login gagal
        $_SESSION['message'] = "Username atau password salah.";
        header("Location: login.php"); // Ganti login.php dengan halaman login jika login gagal
        exit();
    }
}



// Pesan jika login gagal
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}
?>

<div class="container">
    <div class="row w-100 justify-content-center" style="min-height: 80vh !important;">
        <div class="col-lg-6 col-md-9 col-12 order-lg-2 order-md-2 order-1 my-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Login</h4>
                </div>
                <div class="card-body">
                    <!-- Form Login -->
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>
