
<?php
include '../template/header.php'; 
//cek session
if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM menu WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $menu = mysqli_fetch_assoc($result);
    if(!$menu){
        $_SESSION['message'] = "Menu tidak ditemukan.";
        header("Location: menu.php");
        exit();
    }
}
?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <p class="fs-5 fw-bold">Ubah Menu Navigasi</p>
                <form action="menu_edit_proses.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $menu['id'];?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $menu['name'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Url Tujuan</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="kosongkan jika memuat submenu">
                    </div>
                    <div id="subMenuContainer">
                        <?php $submenu = mysqli_query($conn, "SELECT * FROM submenu WHERE parent_id = $menu[id]");
                        $submenus = mysqli_fetch_all($submenu, MYSQLI_ASSOC);
                        ?>
                            <?php foreach ($submenus as $submenu) : ?>
                                <input type="hidden" name="submenu_id[]" value="<?php echo $submenu['id'];?>">
                                <div class="submenu mb-3">
                                    <label for="<?php echo $submenu['name'];?>" class="form-label">Submenu</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="<?php echo $submenu['name'];?>" name="submenu[]" value="<?php echo $submenu['name'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="<?php echo $submenu['name'];?>-url" class="form-label">Url Tujuan</label>
                                        <div class="input-group">
                                            <input type="text" id="<?php echo $submenu['name'];?>-url" class="form-control" name="submenu_url[]" required value="<?php echo $submenu['url'];?>">
                                            <button class="btn btn-danger hapus-submenu" idsubmenu="<?php echo $submenu['id'];?>">Hapus Submenu</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>
                    <div id="deletedSubmenu">
                    </div>
                    <a href="#" id="tambah_sub_menu">Tambah Submenu</a>
                    <div class="clearfix"></div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>