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
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-2">
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>
                <p class="fs-5 fw-bold">Kategori</p>
                <!-- Tombol Tambah -->
                <a href="kategori_tambah.php" class="btn btn-primary mb-3">Tambah Kategori</a>
                <!-- Table List Kategori -->
                <?php 
                $queryCategory = mysqli_query($conn, "SELECT * FROM category"); 
                $categories = mysqli_fetch_all($queryCategory, MYSQLI_ASSOC);
                ?>
                <?php if (!empty($categories)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?php echo $category['id']; ?></td>
                                    <td><?php echo $category['name']; ?></td>
                                    <td><?php echo $category['slug']; ?></td>
                                    <td>
                                        <a href="kategori_edit.php?id=<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="kategori_hapus.php?action=delete&id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Belum ada kategori yang tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>
