<?php
include '../template/header.php'; 
//cek session
if(!isset($_SESSION['username'])){
    header("Location: ../auth/login.php");
    exit();
}
?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
                <p class="fs-5 fw-bold">Menu Navigasi</p>
                <!-- Tombol Tambah -->
                <a href="menu_tambah.php" class="btn btn-primary mb-3">Tambah Menu Navigasi</a>
                <!-- Table List Kategori -->
                <?php 
                $queryCategory = mysqli_query($conn, "SELECT * FROM menu"); 
                $categories = mysqli_fetch_all($queryCategory, MYSQLI_ASSOC);
                ?>
                <?php if (!empty($categories)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Slug</th>
                                <th>Submenu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?php echo $category['id']; ?></td>
                                    <td><?php echo $category['name']; ?></td>
                                    <td><?php echo $category['slug']; ?></td>
                                    <?php $submenu = mysqli_query($conn, "SELECT * FROM submenu WHERE parent_id = $category[id]");
                                    $submenus = mysqli_fetch_all($submenu, MYSQLI_ASSOC);
                                    ?>
                                    <td>
                                        <?php foreach ($submenus as $submenu) : ?>
                                            <a href="<?php echo $submenu['url']; ?>"><?php echo $submenu['name']; ?></a>,
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <a href="menu_edit.php?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="menu_hapus.php?action=delete&id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Belum ada menu naigasi yang tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>
