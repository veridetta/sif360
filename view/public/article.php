<?php 
include '../template/header.php'; ?>

    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-6 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <?php
                //if get slug
                if(isset($_GET['slug'])){
                    $slug = $_GET['slug'];
                    $article = mysqli_query($conn, "SELECT * FROM articles WHERE slug='$slug'");
                    $art = mysqli_fetch_assoc($article);
                }else{
                    header("Location: index.php");
                    exit();
                }
                ?>
                <article>
                    <section class="row mb-4">
                        <div class="row">
                            <div class="col-lg-12 pt-4 pt-lg-0">
                                <img src="../../public/uploads/<?php echo $art['image'];?>" class="float-start imgshadow me-3" alt="">
                                <p class="text-justify"><span class="h4 fw-bold"><?php echo $art['title']; ?></span><br>
                                <?php echo $art['description']; ?></p>
                            </div>

                            <div style="text-align: left;" class="col-lg-5">

                            </div>

                        </div>
                    </section>
                </article>
            </div>
            <?php include '../template/aside.php';?>
        </div>
    </div>
<?php include '../template/footer.php'; ?>