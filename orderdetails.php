<?php include 'inc/header.php'; ?>

<?php
/**
 * Product Shifted Method
 */
if (isset($_GET['customerId'])) {
	$id   	    = $_GET['customerId'];
	$time 	    = $_GET['time'];
	$sale_price = $_GET['sale_price'];
	$confirm    = $ct->productShiftConfirm($id, $time, $sale_price);
}
?>

<?php
/**
 * when login mode; then access this page.
 */
    $login =   Session::get("custLogin");
    if ($login == false) { ?>

<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--== Start Page Content Wrapper ==-->
                <div class="page-content-wrapper sp-y">
                    <div class="wishlist-page-content-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>Your Order Details</h6>
                                    <div class="shopping-cart-list-area">
                                        <div class="shopping-cart-table table-responsive">
                                            <table class="table table-bordered text-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Order Number</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                /**
                                                 * Show product or product list in Cart
                                                 */
                                                    $cmrId  = Session::get("cmrId");
                                                    $getOrder = $ct->getOrderedProduct($cmrId);
                                                    if ($getOrder) {
                                                        $i = 0;						
                                                        while ($result = $getOrder->fetch_assoc()) {
                                                            $i++;
                                                ?>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="price"><?php echo $i; ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="price"><?php echo $result['id']; ?></span>
                                                        </td>
                                                        <td class="product-list">
                                                            <div class="cart-product-item d-flex align-items-center">
                                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-thumb">
                                                                    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['productName']; ?>" />
                                                                </a>
                                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-name"><?php echo $result['product_name']; ?></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="price"><?php echo $result['quantity']; ?></span>
                                                        </td>

                                                        <td class="add-cart">
                                                            $ <?php echo $result['sale_price'];?>
                                                        </td>
                                                        <td class="add-cart">
                                                            <?php echo $fm->formatDate($result['date']); ?>
                                                        </td>
                                                        <td class="add-cart">
                                                            <?php 
                                                            if ( $result['status'] == '0') {
                                                                echo "<span class='label label-warning'>Pending</span>";
                                                            } elseif ( $result['status'] == '1') { 
                                                                echo "Shifted";
                                                            } else {
                                                                echo "Ok";
                                                            }									
                                                            ?>
                                                        </td>
                                                        <?php 
                                                                if ( $result['status'] == '1') {?>
                                                        <td><a href="?customerId=<?php echo $cmrId; ?>&sale_price=<?php echo $result['sale_price'];; ?>&time=<?php echo $result['date']; ?>"><span class="label label-success">Confirm</span></a></td>
                                                        <?php } elseif ($result['status'] == '2') { ?>
                                                        <td>OK</td>
                                                        <?php } elseif ($result['status'] == '0') { ?>
                                                        <td>N/A</td>
                                                        <?php } ?>
                                                    </tr>
                                                </tbody>
                                                <?php }  } ?>
                                            </table>
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
</section>

<?php   } else { ?>
<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <!-- Customer Account Sidebar -->
            <?php include 'inc/sidebar/customer/sidebar.php'; ?>
            <!-- /Customer Account Sidebar -->
            <div class="col-md-9">
                <!--== Start Page Content Wrapper ==-->
                <div class="page-content-wrapper sp-y">
                    <div class="wishlist-page-content-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Your Order Details</h6>
                                    <div class="shopping-cart-list-area">
                                        <div class="shopping-cart-table table-responsive">
                                            <table class="table table-bordered text-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Order Number</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                /**
                                                 * Show product or product list in Cart
                                                 */
                                                    $cmrId  = Session::get("cmrId");
                                                    $getOrder = $ct->getOrderedProduct($cmrId);
                                                    if ($getOrder) {
                                                        $i = 0;						
                                                        while ($result = $getOrder->fetch_assoc()) {
                                                            $i++;
                                                ?>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="price"><?php echo $i; ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="price"><?php echo $result['id']; ?></span>
                                                        </td>
                                                        <td class="product-list">
                                                            <div class="cart-product-item d-flex align-items-center">
                                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-thumb">
                                                                    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['productName']; ?>" />
                                                                </a>
                                                                <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="product-name"><?php echo $result['product_name']; ?></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="price"><?php echo $result['quantity']; ?></span>
                                                        </td>

                                                        <td class="add-cart">
                                                            $ <?php echo $result['sale_price'];?>
                                                        </td>
                                                        <td class="add-cart">
                                                            <?php echo $fm->formatDate($result['date']); ?>
                                                        </td>
                                                        <td class="add-cart">
                                                            <?php 
                                                            if ( $result['status'] == '0') {
                                                                echo "<span class='label label-warning'>Pending</span>";
                                                            } elseif ( $result['status'] == '1') { 
                                                                echo "Shifted";
                                                            } else {
                                                                echo "Ok";
                                                            }									
                                                            ?>


                                                        </td>
                                                        <?php 
                                                                if ( $result['status'] == '1') {?>
                                                        <td><a href="?customerId=<?php echo $cmrId; ?>&sale_price=<?php echo $result['sale_price'];; ?>&time=<?php echo $result['date']; ?>"><span class="label label-success">Confirm</span></a></td>
                                                        <?php } elseif ($result['status'] == '2') { ?>
                                                        <td>OK</td>
                                                        <?php } elseif ($result['status'] == '0') { ?>
                                                        <td>N/A</td>
                                                        <?php } ?>
                                                    </tr>
                                                </tbody>
                                                <?php }  } ?>
                                            </table>
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
</section>

<?php }?>
<!--== End Page Content Wrapper ==-->
<?php include 'inc/footer.php'; ?>
