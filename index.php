<?php 
 include 'inc/header.php'; 
 include 'inc/slider.php';
 include 'inc/cta.php';
 include 'inc/banner/banner-product-cat.php'; 
?>

<!--== Start Best Seller Products Area ==-->
<div class="best-seller-products-area sm-top">
    <div class="container container-wide">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="section-title">
                    <h2 class="h3">Best Seller</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-wrapper">
                    <div class="product-carousel">
                        <?php
                            /**
                            * Best Seller Product Method call
                            */
                                $geFpd = $pd->getBestSellProduct();
                                if ($geFpd) {
                                    while ($result = $geFpd->fetch_assoc()) { 
                            ?>
                        <!-- Start Product Item -->
                        <div class="product-item">
                            <div class="product-item__thumb">
                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>">
                                    <img class="thumb-primary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                    <img class="thumb-secondary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                </a>
                            </div>

                            <div class="product-item__content">
                                <div class="ratting">
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star-half"></i></span>
                                </div>
                                <h4 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                <span class="price"><strong>Price:</strong> $<?php echo $result['sale_price']; ?></span>
                            </div>

                            <div class="product-item__action">
                                <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                            </div>

                            <div class="product-item__sale">
                                <span class="sale-txt"><?php echo $result['tax']; ?>%</span>
                            </div>
                        </div>
                        <!-- End Product Item -->
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Best Seller Products Area ==-->

<!--== Start Best Feature Products Area ==-->
<div class="best-seller-products-area sm-top">
    <div class="container container-wide">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="section-title">
                    <h2 class="h3">Feature Product</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-wrapper">
                    <div class="product-carousel">
                        <?php
                            /**
                            * Featured Product Method call
                            */
                                $geFpd = $pd->getFeturedProduct();
                                if ($geFpd) {
                                    while ($result = $geFpd->fetch_assoc()) { 
                            ?>
                        <!-- Start Product Item -->
                        <div class="product-item">
                            <div class="product-item__thumb">
                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>">
                                    <img class="thumb-primary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                    <img class="thumb-secondary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                </a>
                            </div>

                            <div class="product-item__content">
                                <div class="ratting">
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star-half"></i></span>
                                </div>
                                <h4 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                <span class="price"><strong>Price:</strong> $<?php echo $result['sale_price']; ?></span>
                            </div>

                            <div class="product-item__action">
                                <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                            </div>

                            <div class="product-item__sale">
                                <span class="sale-txt"><?php echo $result['tax']; ?>%</span>
                            </div>
                        </div>
                        <!-- End Product Item -->
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Best Feature Products Area ==-->

<?php include 'inc/banner/flash-deal.php'; ?>

<!--== Start Popular Products Area ==-->
<div class="best-seller-products-area sm-top">
    <div class="container container-wide">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="section-title">
                    <h2 class="h3">Popular</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-wrapper">
                    <div class="product-carousel">
                        <?php
                            /**
                            * Popular Product Method call
                            */
                                $geFpd = $pd->getPopularProduct();
                                if ($geFpd) {
                                    while ($result = $geFpd->fetch_assoc()) { 
                            ?>
                        <!-- Start Product Item -->
                        <div class="product-item">
                            <div class="product-item__thumb">
                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>">
                                    <img class="thumb-primary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                    <img class="thumb-secondary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                </a>
                            </div>

                            <div class="product-item__content">
                                <div class="ratting">
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star-half"></i></span>
                                </div>
                                <h4 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                <span class="price"><strong>Price:</strong> $<?php echo $result['sale_price']; ?></span>
                            </div>

                            <div class="product-item__action">
                                <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                            </div>

                            <div class="product-item__sale">
                                <span class="sale-txt"><?php echo $result['tax']; ?>%</span>
                            </div>
                        </div>
                        <!-- End Product Item -->
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Best popular Products Area ==-->

<?php include 'inc/banner/banner-promotion.php'; ?>

<?php include 'inc/banner/banner-cta.php'; ?>

<!--== Start Top Rated Products Area ==-->
<div class="best-seller-products-area sm-top">
    <div class="container container-wide">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="section-title">
                    <h2 class="h3">Top Rated</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-wrapper">
                    <div class="product-carousel">
                        <?php
                            /**
                            * Top Ratrd Product Method call
                            */
                                $geFpd = $pd->getTopRatedProduct();
                                if ($geFpd) {
                                    while ($result = $geFpd->fetch_assoc()) { 
                            ?>
                        <!-- Start Product Item -->
                        <div class="product-item">
                            <div class="product-item__thumb">
                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>">
                                    <img class="thumb-primary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                    <img class="thumb-secondary" src="admin/<?php echo $result['image']; ?>" alt="" />
                                </a>
                            </div>

                            <div class="product-item__content">
                                <div class="ratting">
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star"></i></span>
                                    <span><i class="ion-android-star-half"></i></span>
                                </div>
                                <h4 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                <span class="price"><strong>Price:</strong> $<?php echo $result['sale_price']; ?></span>
                            </div>

                            <div class="product-item__action">
                                <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                            </div>

                            <div class="product-item__sale">
                                <span class="sale-txt"><?php echo $result['tax']; ?>%</span>
                            </div>
                        </div>
                        <!-- End Product Item -->
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Rated Products Area -->

<!--Start Newsletter Area -->
<?php include 'inc/subscribe.php'; ?>
<!--End Newsletter Area -->
<?php include 'inc/brand-logo.php'; ?>
<?php include 'inc/footer.php'; ?>
