<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lukas | Mordern Car </title>
    <?php include 'enqueue.php'; ?>
</head>

<body>
    <div class="header-area">
        <div class="container container-wide">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-2">
                    <?php
                    /**
                    * logo method call from theme option
                    */
                        $getlogo = $tmOption->getTitleSloganValue();
                        if ($getlogo) {
                            while ($result = $getlogo->fetch_assoc()) { 
                    ?>
                    <div class="site-logo text-center text-sm-left">
                        <a href="index.php"><img src="admin/<?php echo $result['logo']; ?>" alt="<?php echo $result['title']; ?>" /></a>
                    </div>
                     <?php } } ?>
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <div class="site-navigation">
                        <ul class="main-menu nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li class="has-submenu"><a href="shop.php">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.php">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.php">Shop Right Sidebar</a></li>
                                    <li><a href="shop-single.php">Shop Single</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu"><a href="blog.php">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                                    <li><a href="blog.php">Blog Right Sidebar</a></li>
                                </ul>
                            </li>

                            <?php
                        /**
                         * when have product in cart, show Check Order page.
                         */
                          $cmrId = Session::get("cmrId");
                            $chkOrder = $ct->checkOrder($cmrId);
                            if ($chkOrder) { ?>
                            <li><a href="orderdetails.php">Order</a></li>
                            <?php	} ?>            
                            <?php
                        /**
                         * when have product in cart, show cart page.
                         */
                            $chkCart = $ct->checkCartTable();
                            if ($chkCart) { ?>
                            <li><a href="cart.php">cart</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <?php	} ?>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-8 col-lg-3">
                    <div class="site-action d-flex justify-content-center justify-content-sm-end align-items-center">
                        <?php
                    /**
                     * when click logout button: 
                     */
                        if (isset($_GET['cid'])) {
                            $cmrId   = Session::get("cmrId");
                            $delData = $ct->delCustomerCart(); //delete cart product.
                            $delComp = $pd->delCompareData($cmrId);  // delete compare product.
                            Session::destroy();
                     }
                    ?>
                        <ul class="login-reg-nav nav">
                            <?php 	
                        /**
                         * when login mode, show customer profile page.
                         */
                            $login = Session::get("custLogin");
                            if ($login == true) {?>
                            <div class="col-lg-7 d-none d-lg-block">
                                <div class="site-navigation">
                                    <ul class="main-menu nav">
                                        <li><a href="account.php"><?php echo Session::get('cmrName'); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                            <?php
                       $login = Session::get("custLogin"); // when logout mode, show login option
                        if ($login == false) { ?>
                            <li><a href="login.php">Login</a></li>
                            <?php	} else{   // when login mode, show logout option ?>
                            <div class="col-lg-7 d-none d-lg-block">
                                <div class="site-navigation">
                                    <ul class="main-menu nav">
                                        <li><a href="?cid=<?php Session::get('cmrId') ?>">Logout</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>

                        </ul>
                        <div class="mini-cart-wrap">
                            <a href="cart.php" class="btn-mini-cart">
                                <i class="ion-bag"></i>
                                <span class="cart-total">
                                    <?php 
										$getData = $ct->checkCartTable();
										if ($getData) {
												$sum = Session::get("sum");
												$qty = Session::get("qty");
												echo $qty;
										} else {
												echo "0";
										}									
									?>
                                </span>
                            </a>

                            <div class="mini-cart-content">
                                <div class="mini-cart-product">
                                    <?php
                                    /**
                                     * Delete Product from Selected Cart
                                     */
                                        if (isset($_GET['delProdCart'])) {
                                             $delProdCart    = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['delProdCart']);
                                             $delCartProduct = $ct->delProductByCart($delProdCart);
                                        }
                                     /**
                                     * Show product or product list in Cart
                                     */
                                        $getPro = $ct->getCartProduct();
                                        if ($getPro) {
                                            $i = 0;
                                            $sum = 0;
                                            $qty = 0;
                                            while ($result = $getPro->fetch_assoc()) {
                                                $i++;
                                    ?>
                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.php?proid=<?php echo $result['productId']; ?>"><?php echo $result['product_name']; ?></a></h2>

                                            <div class="mini-calculation">
                                                <p class="price"><?php echo $result['quantity']; ?> x <span>$ <?php echo $result['sale_price']; ?></span></p>
                                                <button class="remove-pro"><a onclick="return confirm('Are you sure to delete cart product ?');" href="?delProdCart=<?php echo $result['cartId']; ?>"><i class="ion-trash-b"></i></a></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } ?>

                                    <div class="subtotal-mini-cart">
                                        <div class="ps-cart__total">
                                            <p>Number of items:<span class="mini-left">
                                                    <?php 
                                            $getData = $ct->checkCartTable();
                                            if ($getData) {
                                                $sum = Session::get("sum");
                                                $qty = Session::get("qty");
                                                echo $qty;
                                            } else {
                                                echo "0";
                                            }									
                                          ?>
                                                </span></p>

                                            <p>Sub Total:<span class="mini-left">
                                                    <?php 
                                            $getData = $ct->checkCartTable();
                                            if ($getData) {
                                                $sum = Session::get("sum");
                                                $qty = Session::get("qty");
                                                echo "$ ".$sum;
                                            } else {
                                                echo "0";
                                            }									
                                        ?>
                                                </span></p>
                                        </div>
                                        <div class="ps-cart__footer"><a class="ps-btn" href="cart.php">CHECK OUT<i class="ps-icon-arrow-left"></i></a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="responsive-menu d-lg-none">
                            <button class="btn-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
