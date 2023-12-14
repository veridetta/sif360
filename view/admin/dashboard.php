<?php
include '../template/header.php'; 
// Cek session
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
                <p class="fs-5 fw-bold">Dashboard</p>
                <!-- Tombol Tambah -->
                <a href="artikel_tambah.php" class="btn btn-primary mb-3">Tambah Artikel</a>
                <!-- Table List Artikel -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Artikel</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $queryArticles = mysqli_query($conn, "SELECT * FROM articles"); 
                        $articles = mysqli_fetch_all($queryArticles, MYSQLI_ASSOC);
                        ?>
                        <?php foreach ($articles as $article) : ?>
                            <tr>
                                <td><?php echo $article['id']; ?></td>
                                <td><?php echo $article['title']; ?></td>
                                <?php $description = substr($article['description'], 0, 100); ?>
                                <td><?php echo $description; ?> ...</td>
                                <td><img src="../../public/uploads/<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" width="100"></td>
                                <td>
                                    <a href="artikel_edit.php?id=<?php echo $article['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="artikel_hapus.php?action=delete&id=<?php echo $article['id']; ?>" class="mt-2 btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>
