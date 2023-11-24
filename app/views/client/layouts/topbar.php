<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="index.php" class="text-decoration-none">
                <img src="../../../uploads/logo.png" alt="">
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">

        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="index.php?act=cart" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge custom-cart">0</span>
                <script>
                    document.querySelector(".custom-cart").innerText = cart.length
                </script>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->