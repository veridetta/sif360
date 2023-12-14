
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
    $query = "SELECT * FROM category WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $category = mysqli_fetch_assoc($result);
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
                <p class="fs-5 fw-bold">Ubah Kategori</p>
                <form action="kategori_edit_proses.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $category['id'];?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $category['name'];?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>


            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>