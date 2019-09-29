<?php include 'inc/header.php'; ?>

<?php
	if (isset($_GET['proid'])) {		
		$id = $_GET['proid'];
	}
/**
 * Add to Cart
 */
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$quantity = $_POST['quantity'];   	
		$addCart  = $ct->addToCart($quantity, $id); 
	}	 
?>
<?php
/**
 * Product Compare
 */ 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {	
		$productId = $_POST['productId'];   	
        $insertCom = $pd->insertCompareData($productId, $cmrId);
    } 
?>

<?php
/**
 * Product Wishlist
 */
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {				   	
        $saveWlist = $pd->saveWishListData($id, $cmrId);
    } 
?>
<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Product Details</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li class="current"><a href="#">Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--== End Page Header Area ==-->

<?php  
/**
 *Show Single Details product
 */
  $getPd = $pd->getSingleProduct($id);
  if ($getPd) {
    while ($result = $getPd->fetch_assoc()) { ?>

<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="product-details-page-content">
        <div class="container container-wide">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- Start Product Thumbnail Area -->
                        <div class="col-md-5">
                            <div class="product-thumb-area">
                                <div class="product-details-thumbnail">
                                    <div class="product-thumbnail-slider" id="thumb-gallery">
                                        <figure class="pro-thumb-item" data-mfp-src="admin/<?php echo $result['image']; ?>">
                                            <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" />
                                        </figure>
                                    </div>
                                    <a href="#thumb-gallery" class="btn-large-view btn-gallery-popup">View Larger <i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Thumbnail Area -->

                        <!-- Start Product Info Area -->
                        <div class="col-md-7">
                            <div class="product-details-info-content-wrap">
                                <div class="prod-details-info-content">
                                    <h2><?php echo $result['product_name']; ?></h2>
                                    <p class="price"><strong>Sale Price:</strong> <span class="price-amount">$<?php echo $result['sale_price']; ?></span></p>
                                    <h5 class="regularPrice">Regular Price: <span class="price-amount">$<?php echo $result['regular_price']; ?></span></h5>
                                    <p><?php echo $result['short_body']; ?></p>
                                    <div class="product-config">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="config-label">Color</th>
                                                    <td class="config-option">
                                                        <div class="config-color">
                                                            <a href="#"><?php echo $result['colorName']; ?></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="config-label">Size</th>
                                                    <td class="config-option">
                                                        <div class="config-color">
                                                            <a href="#"><?php echo $result['sizeName']; ?></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="product-action">
                                        <form action="" method="post">
                                            <div class="action-top d-sm-flex">
                                                <div class="pro-qty mr-3 mb-4 mb-sm-0">
                                                    <label for="quantity" class="sr-only">Quantity</label>
                                                    <input type="text" id="quantity" name="quantity" title="Quantity" value="1" />
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-bordered">Add to Cart</button>

                                                <?php
                                                        /**
                                                         * when login mode :
                                                         * (1) show compare button.
                                                         * (2) show wishlist button.
                                                         */
                                                            $login = Session::get("custLogin");
                                                            if ($login == true) {?>

                                                <form action="" method="post">
                                                    <input type="hidden" class="btn-cart" name="productId" value="<?php echo $result['productId']; ?>" />
                                                    <button type="submit" name="compare" title="Compare" class="btn-cart"><i class="ion-ios-loop-strong"></i></button>

                                                </form>
                                                <form action="" method="post">
                                                    <input type="hidden" class="btn-cart" name="productId" value="<?php echo $result['productId']; ?>" />
                                                    <button type="submit" name="wlist" title="wishlist" class="btn-cart"><i class="ion-ios-heart-outline"></i></button>
                                                </form>
                                                <?php } ?>

                                            </div>
                                        </form>
                                    </div>
                                    <span style="color:red; font-size:18px;">
                                        <?php 
                                            /**
                                             * Avoid Added Same Product message.
                                             */
                                                if (isset($addCart)) {
                                                    echo $addCart;
                                                }
                                            ?>
                                    </span>
                                    <?php 
                                            /**
                                             * Product Compare message.
                                             */
                                                if (isset($insertCom)) {
                                                    echo $insertCom;
                                                }
                                            ?>

                                    <?php 
                                            /**
                                             * Product Wish List message.
                                             */
                                                if (isset($saveWlist)) {
                                                    echo $saveWlist;
                                                }
                                            ?>

                                    <div class="product-meta">
                                        <span class="sku_wrapper">SKU: <span class="sku"><?php echo $result['sku']; ?></span></span>

                                        <span class="posted_in">Categories:
                                            <?php echo $result['catName']; ?>
                                        </span>

                                        <span class="posted_in">Brand:
                                            <?php echo $result['brandName']; ?>
                                        </span>

                                        <span class="tagged_as">Tags:
                                            <?php echo $result['tag']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Info Area -->
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="product-description-review">
                                <!-- Product Description Tab Menu -->
                                <ul class="nav nav-tabs desc-review-tab-menu" id="desc-review-tab" role="tablist">
                                    <li>
                                        <a class="active" id="desc-tab" data-toggle="tab" href="#descriptionContent" role="tab">Description</a>
                                    </li>
                                    <li>
                                        <a class="profile-tab" id="desc-tab" data-toggle="tab" href="#sizeGuide" role="tab">Size Guide</a>
                                    </li>
                                    <li>
                                        <a class="profile-tab" id="desc-tab" data-toggle="tab" href="#additionalInfo" role="tab">Additional Info</a>
                                    </li>
                                    <li>
                                        <a id="profile-tab" data-toggle="tab" href="#reviewContent">Review (3)</a>
                                    </li>
                                </ul>

                                <!-- Product Description Tab Content -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="descriptionContent">
                                        <div class="description-content">
                                            <p><?php echo $result['body']; ?></p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sizeGuide">
                                        <div class="description-content">
                                            <p><?php echo $result['size_guide']; ?></p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="additionalInfo">
                                        <div class="description-content">
                                            <p><?php echo $result['extra_info']; ?></p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="reviewContent">
                                        <div class="product-rating-wrap">
                                            <div class="average-rating">
                                                <h4>4.8 <span>(Overall)</span></h4>
                                                <span>Based on 2 Comments</span>
                                            </div>

                                            <div class="display-ratings">
                                                <div class="rating-item">
                                                    <div class="rating-author-pic">
                                                        <img src="assets/img/extra/author-1.jpg" alt="author" />
                                                    </div>

                                                    <div class="rating-author-txt">
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>

                                                        <div class="rating-meta">
                                                            <h3>Cristopher Lee</h3>
                                                            <span class="time">- 07, Jun</span>
                                                        </div>

                                                        <p>Wonderful collection of WooThemes classics! A must buy for
                                                            all
                                                            Woo fans.</p>
                                                    </div>
                                                </div>

                                                <div class="rating-item">
                                                    <div class="rating-author-pic">
                                                        <img src="assets/img/extra/author-2.jpg" alt="author" />
                                                    </div>

                                                    <div class="rating-author-txt">
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-empty"></i>
                                                        </div>

                                                        <div class="rating-meta">
                                                            <h3>Raju Ahammad</h3>
                                                            <span class="time">- 02, Jun</span>
                                                        </div>

                                                        <p>Voluptatem quia voluptas sit aspernat uptatem sequi Neque
                                                            porro.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rating-form-wrapper">
                                                <h3>Add your Reviews</h3>
                                                <form action="#" method="post">
                                                    <div class="rating-form row">
                                                        <div class="col-12">
                                                            <h5>Your Rating:</h5>
                                                            <div class="rating-star fix mb-20">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-input-item mt-30 mt-md-0">
                                                                <label for="name" class="sr-only">Name</label>
                                                                <input type="text" id="name" placeholder="Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-input-item mt-30 mt-md-0">
                                                                <label for="email" class="sr-only">Email</label>
                                                                <input type="email" id="email" placeholder="Email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-input-item mt-30 mb-40">
                                                                <label for="your-review" class="sr-only">review</label>
                                                                <textarea rows="4" name="review" id="your-review" placeholder="Write a review"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-22">
                                                            <button class="btn btn-brand">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--== End Page Content Wrapper ==-->

<!--== Start Best Feature Products Area ==-->
<div class="best-seller-products-area sm-top">
    <div class="container container-wide">
        <div class="row">
            <div class="col-lg-5 m-auto text-center">
                <div class="section-title">
                    <h2 class="h3">Maybe You are interest in</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product-wrapper">
                    <div class="product-carousel">
                        <!-- Start Product Item -->
                        <div class="product-item">
                            <div class="product-item__thumb">
                                <a href="single-product.php">
                                    <img class="thumb-primary" src="assets/img/product/product-1.png" alt="Product" />
                                    <img class="thumb-secondary" src="assets/img/product/product-2.png" alt="Product" />
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
                                <h4 class="title"><a href="<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h4>
                                <span class="price"><strong>Price:</strong> $165.00</span>
                            </div>

                            <div class="product-item__action">
                                <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button>
                                <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                            </div>

                            <div class="product-item__sale">
                                <span class="sale-txt">25%</span>
                            </div>
                        </div>
                        <!-- End Product Item -->   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } } ?>

<!--== End Best Feature Products Area ==-->

<?php include 'inc/footer.php'; ?>
