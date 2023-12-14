
<?php
include '../template/header.php'; 
//cek session
if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}
if($_GET['id']){
    $id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $article = mysqli_fetch_assoc($result);
}else{
    header("Location: dashboard.php");
    exit();
}

?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <p class="fs-5 fw-bold">Ubah Artikel</p>
                <!-- Form Tambah Artikel -->
                <form action="artikel_edit_proses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required value="<?php echo $article['title'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="article" class="form-label">Isi artikel</label>
                        <textarea class="form-control" id="article" name="article" rows="4" required><?php echo $article['description'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option selected disabled value="">Pilih kategori</option>
                            <?php $category = mysqli_query($conn, "SELECT * FROM category"); ?>
                            <?php 
                            if(mysqli_num_rows($category) > 0) {
                                $categories = mysqli_fetch_all($category, MYSQLI_ASSOC);
                            } else {
                                $categories = [];
                            }
                            foreach ($categories as $category) : 
                            ?>
                                <option value="<?php echo $category['id']; ?>" <?php if($article['category_id']==$category['id']){ echo "selected"; }?>><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <p for="image" class="form-label">Gambar</p>
                        <img src="../../public/uploads/<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>" width="100">
                        <small>Kosongkan jika tidak ingin mengubah</small>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>