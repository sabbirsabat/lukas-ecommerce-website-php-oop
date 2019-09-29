<?php include 'inc/header.php'; ?>

<?php
/**
 * when login mode; then access this page.
 */
    $login =   Session::get("custLogin");
    if ($login == false) {
    header('Location:login.php');
    }
?>


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
                                <div class="col-lg-12">
                                     <h6>Compare</h6>
                                    <div class="shopping-cart-list-area">
                                        <div class="shopping-cart-table table-responsive">
                                            <table class="table table-bordered text-center mb-0">

                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Products</th>
                                                        <th>Price</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                /**
                                                 * Show product or product list in Cart
                                                 */
                                                    $cmrId = Session::get("cmrId");
                                                    $getPd = $pd->getComparedData($cmrId);
                                                    if ($getPd) {
                                                        $i = 0;								
                                                        while ($result = $getPd->fetch_assoc()) {
                                                            $i++;
                                                ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span class="price"><?php echo $i; ?></span>
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
                                                            <span class="price">$ <?php echo $result['sale_price']; ?></span>
                                                        </td>

                                                        <td class="add-cart">
                                                            <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="btn btn-brand">View Details</a>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                                <?php } }else {                                                
                                                    echo "There are no product in compare list. <a href='shop.php'>Compare Now</a>";
                                                } ?>
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
<!--== End Page Content Wrapper ==-->

<?php include 'inc/footer.php'; ?>
