</div>
    <footer class=" bg-info mt-4  justify-content-center">
        <div class="col-12 row p-3 justify-content-center">
            <div class="col-12 col-lg-4 p-1">
                <p class="fw-bold">Follow Us</p>
                <ul class="list-unstyled ps-0">
                    <li class="me-3">
                    <i class="fa fa-instagram"></i> @<?php echo $about['instagram'];?>
                    </li>
                    <li class="me-3">
                    <i class="fa fa-facebook-square"></i> @<?php echo $about['facebook'];?>
                    </li>
                    <li class="me-3">
                    <i class="fa fa-twitter"></i> @<?php echo $about['twitter'];?>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-4 p-1 mt-lg-0 mt-md-0 mt-1 ">
                <p class="text-center">Coppyright &copy; <?php echo date('Y');?> <?php echo $about['name'];?></p>
            </div>
            <div class="col-12 col-lg-4 p-1 mt-lg-0 mt-md-0 mt-1 ">
                <p class="h4 f-wbold text-end m-0"><?php echo $about['name'];?></p>
                <p class="text-end m-0"><?php echo $about['address'];?></p>
            </div>
        </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/sidebar.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>
</html>
