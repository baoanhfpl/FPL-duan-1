<!-- Shop Detail Start -->
<div class="container-fluid py-5 product-box">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php 
                        $product_images = query_many("product_images", "status=1 and product_id="
                            .$variant_res['product_id']." and color_id=".$variant_res['color_id']);
                        foreach($product_images as $image) {
                    ?>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="../../../uploads/<?=$image['image']?>" alt="Image">
                        </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
            <script>
                document.querySelector("#product-carousel").children[0].children[0].classList.add('active')
            </script>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?=$product['name']?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4"><?=number_format($product['price'])?>đ</h3>
            <div class="d-flex mb-4 align-items-center">
                <p class="text-dark font-weight-medium mb-0 mr-3">Màu:</p>
                <form class="js-style">
                    <?php 
                        $variants = query_many("variants", "product_id=".$variant_res['product_id']." and status=1 group by color_id");
                        foreach($variants as $variant) {
                            $color = query_one("colors", $variant['color_id']);
                    ?>
                        <div class="d-inline-flex p-2">
                            <a href="" 
                            class="badge badge-<?=$variant_res['color_id'] == $variant['color_id'] ? 'primary' : 'secondary'?>"
                            ><?php
                                $color = query_one("colors", $variant['color_id']);
                                echo $color['name'];
                            ?></a>
                        </div>
                    <?php } ?>
                </form>
            </div>
            <div class="d-flex mb-3 align-items-center">
                <p class="text-dark font-weight-medium mb-0 mr-3">Size:</p>
                <form class="js-style">
                    <?php 
                        $variants = query_many("variants", "product_id=".$variant_res['product_id']." and color_id=".$variant_res['color_id']." and status=1");
                        foreach($variants as $variant) {
                            $size = query_one("sizes", $variant['size_id']);
                    ?>
                        <div class="d-inline-flex p-2">
                            <a href="" 
                            class="badge badge-<?=$variant_res['size_id'] == $variant['size_id'] ? 'primary' : 'secondary'?>"
                            ><?php
                                $size = query_one("sizes", $variant['size_id']);
                                echo $size['name'];
                            ?></a>
                        </div>
                    <?php } ?>
                </form>
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus" >
                        <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="number" class="form-control bg-secondary text-center js-quantity" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <script>
                    function handleAddToCart() {
                        const quantity = +document.querySelector(".js-quantity").value
                        const variantId = <?=$variant_id?>;
                        if(cart.length > 0) {
                            let flag = true
                            cart.forEach(item => {
                                if(item.variantId == variantId) {
                                    item.quantity += quantity
                                    flag = false
                                }
                            })
                            if(flag) {
                                cart = [...cart, {quantity, variantId}]
                            }
                        }else {
                            cart = [...cart, {quantity, variantId}]
                        }
                        localStorage.setItem("cart", JSON.stringify(cart))
                        document.querySelector(".custom-cart").innerText = cart.length
                    }
                </script>
                <button class="btn btn-primary px-3" 
                    onclick="handleAddToCart()">
                    <i class="fa fa-shopping-cart mr-1"></i>
                     Add To Cart
                </button>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p><?=$product['description']?></p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->