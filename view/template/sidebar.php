<div class="col-lg-3 col-md-3 col-12 order-lg-1 order-md-1 order-1 pr-1">
    <div class="sidebar card w-100">
        <div class="flex-shrink-0 p-3 bg-white">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Menu Navigasi</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Home
                    </button>
                    <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="../../" class="link-dark rounded">Dashboard</a></li>
                    </ul>
                    </div>
                </li>
                <?php $sidebar = mysqli_query($conn, "SELECT * FROM menu");
                $sidebar = mysqli_fetch_all($sidebar, MYSQLI_ASSOC)
                ?>
                <?php foreach($sidebar as $side) { 
                    $submenu = mysqli_query($conn, "SELECT * FROM submenu WHERE parent_id='$side[id]'");
                    $count = mysqli_num_rows($submenu);
                    $submenu = mysqli_fetch_all($submenu, MYSQLI_ASSOC);
                    if($count > 0){
                        ?>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#<?php echo $side['id'];?>-collapse" aria-expanded="false">
                            <?php echo $side['name'];?>
                            </button>
                            <div class="collapse" id="<?php echo $side['id'];?>-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <?php foreach($submenu as $sid) { ?>
                                <li><a href="<?php echo $sid['url'];?>" class="link-dark rounded"><?php echo $sid['name'];?></a></li>
                                <?php } ?>
                            </ul>
                            </div>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="mb-1 ps-3">
                            <a href="<?php echo $side['url'];?>" class="link-dark rounded"><?php echo $sid['name'];?></a>
                        </li>
                        <?php
                    }
                }
                    ?>
                <?php
                if(ISSET($_SESSION['username'])){
                ?>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#artikel-collapse" aria-expanded="false">
                    Artikel
                    </button>
                    <div class="collapse" id="artikel-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="../admin/dashboard.php" class="link-dark rounded">Artikel</a></li>
                        <li><a href="../admin/artikel_tambah.php" class="link-dark rounded">Tambah Artikel</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#kategori-collapse" aria-expanded="false">
                    Kategori
                    </button>
                    <div class="collapse" id="kategori-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="../admin/kategori.php" class="link-dark rounded">Kategori</a></li>
                        <li><a href="../admin/kategori_tambah.php" class="link-dark rounded">Tambah Kategori</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#menu-collapse" aria-expanded="false">
                    Menu Navigasi
                    </button>
                    <div class="collapse" id="menu-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="../admin/menu.php" class="link-dark rounded">Menu Navigasi</a></li>
                        <li><a href="../admin/menu_tambah.php" class="link-dark rounded">Tambah Menu</a></li>
                    </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#menu-collapse" aria-expanded="false">
                    Tentang
                    </button>
                    <div class="collapse" id="menu-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="../admin/tentang.php" class="link-dark rounded">Tentang Website</a></li>
                    </ul>
                    </div>
                </li>
                <?php
                }
                ?>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#akun-collapse" aria-expanded="false">
                    Akun
                    </button>
                    <div class="collapse" id="akun-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <?php
                        if (isset($_SESSION['username'])) { // Check if a session exists
                            // If a session exists, display a logout link
                            echo '<li class="mb-1"><a href="../auth/logout.php" class="link-dark rounded">Logout</a></li>';
                        } else {
                            // If no session exists, display a login link
                            echo '<li class="mb-1"><a href="../auth/login.php" class="link-dark rounded">Login</a></li>';
                        }
                        ?>
                    </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
