<?php 
include '../template/header.php'; ?>
    <div class="container">
        <!-- Navbar content here -->
        <div class="row w-100">
            <?php include '../template/sidebar.php';?>
            <div class="col-lg-6 col-md-9 col-12 order-lg-2 order-md-2 order-1">
                <article>
                    <?php
                    $articles = mysqli_query($conn, "SELECT * FROM articles");
                    foreach ($articles as $art) {
                        ?>
                        <section class="row mb-4">
                            <div class="col-md-4">
                                <img src="../../public/uploads/<?php echo $art['image'];?>" alt="Gambar" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h4 class="fw-bold"><a href="article.php?slug=<?php echo $art['slug'];?>"><?php echo substr($art['title'],0,28);?></a></h4>
                                <p><?php echo substr($art['description'], 0, 300); ?>...</p>
                            </div>
                        </section>
                        <?php
                    }
                    ?>
                </article>
            </div>
            <?php include '../template/aside.php';?>
        </div>
    </div>
<?php include '../template/footer.php'; ?>