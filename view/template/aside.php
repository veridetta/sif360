<div class="col-lg-3 col-12 order-lg-3 order-3 ">
<div class="card">
<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Kategori Artikel</span>
            </a>
            <ul class="list-unstyled ps-0">
                <?php $kategori = mysqli_query($conn, "SELECT * FROM category");
                $kategori = mysqli_fetch_all($kategori, MYSQLI_ASSOC)
                ;?>
                <?php foreach($kategori as $kate) { ?>
                <li class="mb-1"><a href="../public/kategori.php?slug=<?php echo $kate['slug'];?>" class="btn btn-outline-info"><?php echo $kate['name'];?></a></li>
                <?php } ?>
            </ul>
        </div>
</div>
</div>