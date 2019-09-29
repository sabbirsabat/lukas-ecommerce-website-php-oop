<?php include 'inc/header.php'; ?>

<?php
/**
 * Delete Product from Selected Cart
 */
if (isset($_GET['delProdCart'])) {
	 $delProdCart    = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['delProdCart']);
	 $delCartProduct = $ct->delProductByCart($delProdCart);
}

/**
 * Quantity Update Cart Page
 */
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cartId  	= $_POST['cartId'];   	
		$quantity 	= $_POST['quantity'];   	
		$updateCart = $ct->updateCartQuantity($cartId, $quantity); 
		if ( $quantity <= 0 ) {
			$delCartProduct = $ct->delProductByCart($cartId);
		}
 } 
?>
<?php
/**
 * Meta Refresh for showing live update price cart // like as AJAX  useing as cart.
 */
	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>

<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Shopping Cart</h1>

                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li class="current"><a href="#">Cart</a></li>
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
    <div class="cart-page-content-wrap">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping-cart-list-area">
                        <div class="shopping-cart-table table-responsive">
                            <table class="table table-bordered text-center mb-0">
                                <?php
                                /**
                                 * Update message show
                                 */
                                if (isset($updateCart)) {
                                    echo $updateCart;
                                }
                                /**
                                 * Delete message show
                                 */
                                if (isset($delCartProduct)) {
                                    echo $delCartProduct;
                                }
                                ?>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                    <tr>
                                        <td>
                                            <span class="price"><?php echo $i; ?></span>
                                        </td>
                                        <td class="product-list">
                                            <div class="cart-product-item d-flex align-items-center">
                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-thumb">
                                                    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" />
                                                </a>
                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-name"><?php echo $result['product_name']; ?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="price">$ <?php echo $result['sale_price']; ?></span>
                                        </td>
                                        <td>
                                            <div class="pro-qty">
                                                <form action="" method="post">
                                                    <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>" />
                                                    <input type="text" name="quantity" class="quantity" title="Quantity" value="<?php echo $result['quantity']; ?>" />
                                                    <br />
                                                    <button type="submit" name="submit" class="update-cart">Update Cart</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="price">
                                                $ <?php 
                                                /**
                                                 * Subtotal calculation "total * quantity"
                                                 */
                                                $total = $result['sale_price'] * $result['quantity'];
                                                echo $total; 
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="price"><a onclick="return confirm('Are you sure to delete cart product ?');" href="?delProdCart=<?php echo $result['cartId']; ?>"><i class="ion-trash-b"></i></a></span>
                                        </td>
                                    </tr>
                                    <?php 
                                    /**
                                     * Subtotal calculation
                                     */
                                    $qty = $qty + $result['quantity'];
                                    $sum = $sum + $total;
                                    Session::set("qty", $qty);
                                    Session::set("sum", $sum);
                                    ?>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center">
                            <div class="coupon-form-wrap">
                                <form action="#" method="post">
                                    <label for="coupon" class="sr-only">Coupon Code</label>
                                    <input type="text" id="coupon" placeholder="Coupon Code" />
                                    <button class="btn-apply">Apply Button</button>
                                </form>
                            </div>
                            <div class="cart-update-buttons mt-15 mt-sm-0">
                                <button class="btn-update-cart"><a href="shop.php">Continue Shoping</a></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Cart Calculate Area -->
                    <div class="cart-calculate-area mt-sm-40 mt-md-60">
                        <h5 class="cal-title">Cart Totals</h5>


                        <div class="cart-cal-table table-responsive">
                            <?php
                                $getData = $ct->checkCartTable();
                                if ($getData) {
                            ?>
                            <table class="table table-borderless">
                                <tr class="cart-sub-total">
                                    <th>Subtotal</th>
                                    <td>$ <?php echo $sum; ?></td>
                                </tr>
                                <tr class="cart-sub-total">
                                    <th>Vat</th>
                                    <td>10%</td>
                                </tr>

                                <tr class="order-total">
                                    <th>Grand Total</th>
                                    <td><b>$
                                            <?php  
                                        /**
                                         * Grand total calculation
                                         */
                                            $vat    = $sum * 0.1;   // subtotal * vat 10% 
                                            $gtotal = $vat + $sum;  // total vat + subtotal
                                            echo $gtotal;
                                        ?></b>
                                    </td>
                                </tr>
                              </table>
                               <div class="proceed-checkout-btn">
                                <a href="checkout.php" class="btn btn-brand d-block">Proceed to Checkout</a>
                             </div>
                            <?php } else {
                                 echo "Cart Empty ! Please <a href='shop.php'>Shop now</a>";
                             } ?>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<?php include 'inc/footer.php'; ?>
