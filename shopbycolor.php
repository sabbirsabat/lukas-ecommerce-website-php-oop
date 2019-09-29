<?php include 'inc/header.php'; ?>

<?php
 if (!isset($_GET['colorId']) || $_GET['colorId'] == NULL) {
    echo "<script>window.location = '404.php'; </script>"; 
 } else {
     $id = $_GET['colorId'];
 }
 ?>

<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Shop By Color</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="current"><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Header Area ==-->

<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="container container-wide">
        <div class="row">

            <!--== start shop sidebar Area ==-->
            <?php include 'inc/sidebar/shop/sidebar.php'; ?>
            <!--== End shop sidebar Area ==-->

            <div class="col-lg-9 order-0 order-lg-1">
                <div class="action-bar-inner mb-30">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="shop-layout-switcher mb-15 mb-sm-0">
                                <ul class="layout-switcher nav">
                                    <li data-layout="grid" class="active"><i class="fa fa-th"></i></li>
                                    <li data-layout="list"><i class="fa fa-th-list"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="sort-by-wrapper">
                                <label for="sort" class="sr-only">Sort By</label>
                                <select name="sort" id="sort">
                                    <option value="sbp">Sort By Popularity</option>
                                    <option value="sbn">Sort By Newest</option>
                                    <option value="sbt">Sort By Trending</option>
                                    <option value="sbr">Sort By Rating</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-wrapper product-layout layout-grid">
                    <div class="row mtn-30">

                        <!-- Start Product Item -->
                        <?php 
                        /**
                        * Product listing by color Method call
                        */
                           $productbycolor = $pd->productByColor($id);
                           if ($productbycolor) {
                              while ($result = $productbycolor->fetch_assoc()) {				  
                         ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.php?proid=<?php echo $result['productId']; ?>">
                                        <img class="thumb-primary" src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" />
                                        <img class="thumb-secondary" src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" />
                                    </a>

                                    <div class="ratting">
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star"></i></span>
                                        <span><i class="ion-android-star-half"></i></span>
                                    </div>
                                </div>

                                <div class="product-item__content">
                                    <div class="product-item__info">
                                        <h4 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                        <span class="price"><strong>Price:</strong>$ <?php echo $result['sale_price']; ?></span>
                                    </div>

                                    <div class="product-item__action">
                                        <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                        <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                    </div>

                                    <div class="product-item__desc">
                                        <p>Pursue pleasure rationally encounter consequences that are extremely painful.
                                            Nor
                                            again is there anyone who loves or pursues or desires to obtain pain of
                                            itself,
                                            because it is pain, but because occasionally circles</p>
                                    </div>
                                </div>

                                <div class="product-item__sale">
                                    <span class="sale-txt"><?php echo $result['tax']; ?>%</span>
                                </div>
                            </div>
                        </div>
                        <?php } }else {
                            //echo "<p>Product of this category are not available.</p>";
                            echo "There are no product in this color";
                        } ?>
                        <!-- End Product Item -->

                    </div>
                </div>

                <div class="action-bar-inner mt-30">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <nav class="pagination-wrap mb-10 mb-sm-0">
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-sm-6 text-center text-sm-right">
                            <p>Showing 1–12 of 26 results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<?php include 'inc/footer.php'; ?>
