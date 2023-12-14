
<?php
include '../template/header.php'; 
//cek session
if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}
?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <p class="fs-5 fw-bold">Tambah Menu Navigasi</p>
                <form action="menu_tambah_proses.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Url Tujuan</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="kosongkan jika memuat submenu">
                    </div>
                    <div id="subMenuContainer">
                        <!-- Kontainer Submenu -->
                    </div>
                    <a href="#" id="tambah_sub_menu">Tambah Submenu</a>
                    <div class="clearfix"></div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Menu Navigasi</button>
                </form>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>