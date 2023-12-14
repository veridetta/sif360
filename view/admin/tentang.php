
<?php
include '../template/header.php'; 
//cek session
if(!isset($_SESSION['username'])){
    $_SESSION['message'] = "Anda harus login terlebih dahulu.";
    header("Location: ../auth/login.php");
    exit();
}
$tentang = mysqli_query($conn, "SELECT * FROM about Limit 1");
$tentang = mysqli_fetch_assoc($tentang);
?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-9 col-md-9 col-12 order-lg-2 order-md-2 order-2">
                <p class="fs-5 fw-bold">Tentang Website</p>
                <form action="tentang_edit_proses.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $tentang['id'];?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Website</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $tentang['name'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="slogan" class="form-label">Slogan</label>
                        <input type="text" class="form-control" id="slogan" name="slogan" required value="<?php echo $tentang['slogan'];?>">
                    </div>
                 
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" required value="<?php echo $tentang['address'];?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" required value="<?php echo $tentang['twitter'];?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" required value="<?php echo $tentang['facebook'];?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" required value="<?php echo $tentang['instagram'];?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
<?php include '../template/footer.php'; ?>