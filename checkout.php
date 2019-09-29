<?php include 'inc/header.php'; ?>

<?php
/**
 * Order Now option
 */
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $cmrId =   Session::get("cmrId");
    $insertOrder = $ct->orderProduct($cmrId); // query into Classes directory 'Cart.php' class.
    $delData = $ct->delCustomerCart();        // when order completed, delete cart product list data.
    echo "<script>window.location = 'order-complete.php'; </script>"; 
}
?>

<?php
    $cmrId = Session::get("cmrId");  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateCmr = $cmr->customerUpdateCheckout( $_POST, $cmrId);
    } 
?>

<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Checkout</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li class="current"><a href="#">Checkout</a></li>
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
                <div class="col-12">
                    <div class="checkout-page-coupon-area">
                        <!-- Checkout Coupon Accordion Start -->
                        <div class="checkoutAccordion" id="checkOutAccordion">
                            <div class="card">
                                <h3><i class="fa fa-info-circle"></i> Have a Coupon? <span data-toggle="collapse" data-target="#couponaccordion">
                                        Click here to Enter your Code</span>
                                </h3>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="apply-coupon-wrapper">
                                                    <p>If you have a coupon code, please apply it below.</p>
                                                    <form action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="input-item mt-0">
                                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mt-20 mt-md-0">
                                                                <button class="btn btn-bordered">Apply Coupon</button>
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
                        <!-- Checkout Coupon Accordion End -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php 
                        if (isset($updateCmr)) {
                            echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
                        }
                    ?>
                    <!-- Checkout Form Area Start -->
                    <?php
                    /**
                     * when customer login mode, then show this page, otherways redirect login page
                     */
                    $login =   Session::get("custLogin");
                    if ($login == false) {?>

                    <div class="checkout-billing-details-wrap">
                        <h2>Billing Details</h2>
                        <div class="billing-form-wrap">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item mt-0">
                                            <label for="f_name" class="sr-only required">First Name</label>
                                            <input type="text" name="b_first_name" value="" id="f_name" placeholder="First Name" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-item mt-md-0">
                                            <label for="l_name" class="sr-only required">Last Name</label>
                                            <input type="text" name="b_last_name" id="l_name" placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <label for="email" class="sr-only required">Email Address</label>
                                    <input type="email" name="b_email" id="email" placeholder="Email Address" required />
                                </div>

                                <div class="input-item">
                                    <label for="com-name" class="sr-only">Company Name</label>
                                    <input type="text" name="b_company_name" id="com-name" placeholder="Company Name" />
                                </div>

                                <div class="input-item">
                                    <label for="country" class="sr-only required">Country</label>
                                    <select name="b_country" id="country">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">India</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="England">England</option>
                                        <option value="London">London</option>
                                        <option value="London">London</option>
                                        <option value="Chaina">China</option>
                                    </select>
                                </div>

                                <div class="input-item">
                                    <label for="street-address" class="sr-only required">Street address</label>
                                    <input type="text" name="b_st_address_line_one" id="street-address" placeholder="Street address Line 1" required />
                                </div>

                                <div class="input-item">
                                    <input type="text" name="b_st_address_line_two" placeholder="Street address Line 2 (Optional)" />
                                </div>

                                <div class="input-item">
                                    <label for="town" class="sr-only required">Town / City</label>
                                    <input type="text" name="b_town_city" id="town" placeholder="Town / City" required />
                                </div>

                                <div class="input-item">
                                    <label for="state" class="sr-only">State / Divition</label>
                                    <input type="text" name="b_state_division" id="state" placeholder="State / Divition" />
                                </div>

                                <div class="input-item">
                                    <label for="postcode" class="sr-only required">Postcode / ZIP</label>
                                    <input type="text" name="b_postcode_zip" id="postcode" placeholder="Postcode / ZIP" required />
                                </div>

                                <div class="input-item">
                                    <label for="phone" class="sr-only">Phone</label>
                                    <input type="text" name="b_phone" id="phone" placeholder="Phone" />
                                </div>

                                <div class="checkout-box-wrap">
                                    <div class="input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="create_pwd">
                                            <label class="custom-control-label" for="create_pwd">Create an
                                                account?</label>
                                        </div>
                                    </div>
                                    <div class="account-create single-form-row">
                                        <p>Create an account by entering the information below. If you are a returning
                                            customer please login at the top of the page.</p>
                                        <div class="input-item">
                                            <label for="pwd" class="sr-only required">Account Password</label>
                                            <input type="password" id="pwd" placeholder="Account Password" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-box-wrap">
                                    <div class="input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                            <label class="custom-control-label" for="ship_to_different">Ship to a
                                                different
                                                address?</label>
                                        </div>
                                    </div>
                                    <div class="ship-to-different single-form-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <label for="f_name_2" class="sr-only required">First Name</label>
                                                    <input type="text" name="s_first_name" id="f_name_2" placeholder="First Name" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <label for="l_name_2" class="sr-only required">Last Name</label>
                                                    <input type="text" name="s_last_name" id="l_name_2" placeholder="Last Name" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-item">
                                            <label for="email_2" class="sr-only required">Email Address</label>
                                            <input type="email" name="s_email" id="email_2" placeholder="Email Address" required />
                                        </div>

                                        <div class="input-item">
                                            <label for="com-name_2" class="sr-only">Company Name</label>
                                            <input type="text" name="s_company_name" id="com-name_2" placeholder="Company Name" />
                                        </div>

                                        <div class="input-item">
                                            <label for="country_2" class="sr-only required">Country</label>
                                            <select name="s_country" id="country_2">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="England">England</option>
                                                <option value="London">London</option>
                                                <option value="London">London</option>
                                                <option value="Chaina">Chaina</option>
                                            </select>
                                        </div>

                                        <div class="input-item">
                                            <label for="street-address_2" class="sr-only required">Street address</label>
                                            <input type="text" name="s_st_address_line_one" id="street-address_2" placeholder="Street address Line 1" required />
                                        </div>

                                        <div class="input-item">
                                            <input type="text" name="s_st_address_line_two" placeholder="Street address Line 2 (Optional)" />
                                        </div>

                                        <div class="input-item">
                                            <label for="town_2" class="sr-only required">Town / City</label>
                                            <input type="text" name="s_town_city" id="town_2" placeholder="Town / City" required />
                                        </div>

                                        <div class="input-item">
                                            <label for="state_2" class="sr-only">State / Divition</label>
                                            <input type="text" name="s_state_division" id="state_2" placeholder="State / Divition" />
                                        </div>

                                        <div class="input-item">
                                            <label for="postcode_2" class="sr-only required">Postcode / ZIP</label>
                                            <input type="text" name="s_postcode_zip" id="postcode_2" placeholder="Postcode / ZIP" required />
                                        </div>

                                        <div class="input-item">
                                            <label for="phone" class="sr-only">Phone</label>
                                            <input type="text" name="s_phone" id="phone" placeholder="Phone" />
                                        </div>

                                    </div>
                                </div>

                                <div class="input-item">
                                    <label for="ordernote" class="sr-only">Order Note</label>
                                    <textarea name="note" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php  }  else { ?>

                    <?php 
                  $id = Session::get('cmrId');
                  $getdata = $cmr->getCustomerData($id);
                  if ($getdata) {
                     while ($result = $getdata->fetch_assoc()) {
                ?>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-12">
                            <!-- Checkout Form Area Start -->
                            <div class="checkout-billing-details-wrap">
                                <p>You can change your previous billing and shipping address.</p>
                                <h2>Billing Address</h2>
                                <div class="billing-form-wrap">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item mt-0">
                                                <label for="f_name" class="sr-only required"></label>First Name:
                                                <input type="text" name="b_first_name" id="f_name" value="<?php echo $result['b_first_name']; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item mt-md-0">
                                                <label for="l_name" class="sr-only required"></label>Last Name:
                                                <input type="text" name="b_last_name" id="l_name" value="<?php echo $result['b_last_name']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-item">
                                        <label for="email" class="sr-only required"></label>Email Address:
                                        <input type="email" name="b_email" id="email" value="<?php echo $result['b_email']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="com-name" class="sr-only"></label>Company Name:
                                        <input type="text" name="b_company_name" id="com-name" value="<?php echo $result['b_company_name']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="country" class="sr-only required"></label>Country:
                                        <input type="text" name="b_country" id="country" value="<?php echo $result['b_country']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="street-address" class="sr-only required"></label>Street address:
                                        <input type="text" name="b_st_address_line_one" id="street-address" value="<?php echo $result['b_st_address_line_one']; ?>" />
                                    </div>

                                    <div class="input-item">Street address 2(Optional):
                                        <input type="text" name="b_st_address_line_two" value="<?php echo $result['b_st_address_line_two']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="town" class="sr-only required"></label>Town / City:
                                        <input type="text" name="b_town_city" id="town" value="<?php echo $result['b_town_city']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="state" class="sr-only"></label>State / Divition:
                                        <input type="text" name="b_state_division" id="state" value="<?php echo $result['b_state_division']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="postcode" class="sr-only required"></label>Postcode / ZIP:
                                        <input type="text" name="b_postcode_zip" id="postcode" value="<?php echo $result['b_postcode_zip']; ?>" />
                                    </div>

                                    <div class="input-item">
                                        <label for="phone" class="sr-only"></label>Phone:
                                        <input type="text" name="b_phone" id="phone" value="<?php echo $result['b_phone']; ?>" />
                                    </div>


                                    <!--********************************************* Shipping Address *************************************-->
                                    <div class="checkout-box-wrap">
                                        <div class="input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different
                                                    address?</label>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="ship-to-different single-form-row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item mt-0">
                                                        <label for="f_name" class="sr-only required"></label>First Name:
                                                        <input type="text" name="s_first_name" id="f_name" value="<?php echo $result['s_first_name']; ?>" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-item mt-md-0">
                                                        <label for="l_name" class="sr-only required"></label>Last Name:
                                                        <input type="text" name="s_last_name" id="l_name" value="<?php echo $result['s_last_name']; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-item">
                                                <label for="email" class="sr-only required"></label>Email Address:
                                                <input type="email" name="s_email" id="email" value="<?php echo $result['s_email']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="com-name" class="sr-only"></label>Company Name:
                                                <input type="text" name="s_company_name" id="com-name" value="<?php echo $result['s_company_name']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="country" class="sr-only required"></label>Country:
                                                <input type="text" name="s_country" id="country" value="<?php echo $result['b_country']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="street-address" class="sr-only required"></label>Street address:
                                                <input type="text" name="s_st_address_line_one" id="street-address" value="<?php echo $result['s_st_address_line_one']; ?>" />
                                            </div>

                                            <div class="input-item">Street address 2(Optional):
                                                <input type="text" name="s_st_address_line_two" value="<?php echo $result['s_st_address_line_two']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="town" class="sr-only required"></label>Town / City:
                                                <input type="text" name="s_town_city" id="town" value="<?php echo $result['s_town_city']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="state" class="sr-only"></label>State / Divition:
                                                <input type="text" name="s_state_division" id="state" value="<?php echo $result['s_state_division']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="postcode" class="sr-only required"></label>Postcode / ZIP:
                                                <input type="text" name="s_postcode_zip" id="postcode" value="<?php echo $result['s_postcode_zip']; ?>" />
                                            </div>

                                            <div class="input-item">
                                                <label for="phone" class="sr-only"></label>Phone:
                                                <input type="text" name="s_phone" id="phone" value="<?php echo $result['s_phone']; ?>" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item">
                                <label for="ordernote" class="sr-only"></label>Order Note:
                                <textarea name="note" id="ordernote" cols="30" rows="3"><?php echo $result['note']; ?></textarea>
                            </div>
                        </div>

                        <div class="prof-update">
                            <button class="prof-edit" type="submit" name="submit">Update Profile</button>
                        </div>
                    </form>
                    <?php } }  ?>
                    <?php  } ?>
                </div>

                <?php
                /**
                *Payment Type Insert Method call
                */   
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
                     $payment_method = $_POST['payment_method'];   	
                     $insertPayment  = $ct->paymentInsert( $payment_method );
                } 
                ?>
                <div class="col-lg-6 col-xl-5 ml-auto">
                    <!-- Checkout Page Order Details -->
                    <form action="" method="post">
                        <div class="order-details-area-wrap">
                            <h2>Your Order</h2>

                            <div class="order-details-table table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
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
                                    <tbody>
                                        <tr class="cart-item">
                                            <td><span class="product-title"><?php echo $result['product_name']; ?></span> <span class="product-quantity"> = <?php echo $result['quantity']; ?> &#215; $ <?php echo $result['sale_price']; ?></span></td>
                                            <td><?php 
                                            /**
                                             * Subtotal calculation "total * quantity"
                                             */
                                            $total = $result['sale_price'] * $result['quantity'];
                                            echo '$ '. $total; 
                                            ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <?php 
                                        /**
                                         * Subtotal calculation
                                         */
                                        $qty = $qty + $result['quantity'];
                                        $sum = $sum + $total;               
                                        ?>
                                        <?php } } ?>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>$ <?php echo $sum; ?> </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Vat : 10%</th>
                                            <td>$ <?php echo $vat = $sum * 0.1; ?></td>
                                        </tr>

                                        <tr class="shipping">
                                            <td>
                                                <ul class="shipping-method">
                                                    <li>
                                                        <div class="payment-method">
                                                            Shipping :
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="flat_shipping" name="shipping_method" class="custom-control-input" checked value="0" />
                                                            <label class="custom-control-label" for="flat_shipping">Flat Rate : $10</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="free_shipping" name="shipping_method" class="custom-control-input" value="1" />
                                                            <label class="custom-control-label" for="free_shipping">Free Shipping</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="loc_shipping" name="shipping_method" class="custom-control-input" value="2" />
                                                            <label class="custom-control-label" for="loc_shipping">Local Delivery</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <th></th>
                                        </tr>

                                        <tr class="shipping">
                                            <td>
                                                <ul class="shipping-method">
                                                    <li>
                                                        <div class="payment-method">
                                                            Payment Method :
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                        /**
                                                         * Show direct bank transfer Data
                                                         */                                                     
                                                            $getCOD = $pmnt->getDBTPaymentData();
                                                            if ($getCOD) {                                                           
                                                                while ( $result = $getCOD->fetch_assoc()) {                                                               
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="dbd_shipping" name="payment_method" class="custom-control-input" value="0" />
                                                            <label class="custom-control-label" for="dbd_shipping" data-toggle="collapse" data-target="#directbanktransfer"><?php echo $result['title']; ?></label>
                                                            <p id="directbanktransfer" class="collapse" data-parent="#checkOutAccordion"><?php echo $result['description']; ?></p>
                                                        </div>
                                                        <?php } } ?>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                        /**
                                                         * Show Check payment Data
                                                         */                                                     
                                                            $getCOD = $pmnt->getCKPaymentData();
                                                            if ($getCOD) {                                                           
                                                                while ( $result = $getCOD->fetch_assoc()) {                                                               
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="ck_shipping" name="payment_method" class="custom-control-input" value="1" />
                                                            <label class="custom-control-label" for="ck_shipping" data-toggle="collapse" data-target="#checkdelivery"><?php echo $result['title']; ?></label>
                                                            <p id="checkdelivery" class="collapse" data-parent="#checkOutAccordion"><?php echo $result['description']; ?></p>
                                                        </div>
                                                        <?php } } ?>
                                                    </li>
                                                    <li>
                                                        <?php 
                                                        /**
                                                         * Show Cash on delivery Data
                                                         */                                                     
                                                            $getCOD = $pmnt->getCODPaymentData();
                                                            if ($getCOD) {                                                           
                                                                while ( $result = $getCOD->fetch_assoc()) {                                                               
                                                        ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="cod_shipping" name="payment_method" class="custom-control-input" value="2" />
                                                            <label class="custom-control-label" for="cod_shipping" data-toggle="collapse" data-target="#cashondelivery"><?php echo $result['title']; ?></label>
                                                            <p id="cashondelivery" class="collapse" data-parent="#checkOutAccordion"><?php echo $result['description']; ?></p>
                                                        </div>
                                                        <?php } } ?>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="paypal_shipping" name="payment_method" class="custom-control-input" value="3" />
                                                            <label class="custom-control-label" for="paypal_shipping" data-toggle="collapse" data-target="#paypal">Paypal</label>
                                                            <p id="paypal" class="collapse" data-parent="#checkOutAccordion">Make your payment directly into our bank account.<br /> Please use your Order ID as the payment<br /> reference. Your order won’t be shipped until the funds <br /> have cleared in our account.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="bkash_shipping" name="payment_method" class="custom-control-input" value="4" />
                                                            <label class="custom-control-label" for="bkash_shipping" data-toggle="collapse" data-target="#bkash">Bkash</label>
                                                            <p id="bkash" class="collapse" data-parent="#checkOutAccordion">Make your payment directly into our bank account.<br /> Please use your Order ID as the payment<br /> reference. Your order won’t be shipped until the funds <br /> have cleared in our account.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <th></th>
                                        </tr>

                                        <tr class="final-total">
                                            <th>Grand Total</th>
                                            <td><span class="total-amount">$
                                                    <?php  
                                                /**
                                                 * Grand total calculation
                                                 */
                                                    $vat    = $sum * 0.1;   // subtotal * vat 10% 
                                                    $gtotal = $vat + $sum;  // total vat + subtotal
                                                    echo $gtotal;
                                                ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="order-details-footer">
                                <p>Your personal data will be used to process your order, support your experience throughout
                                    this website, and for other purposes described in our
                                    <a href="#" class="text-warning">privacy policy</a>.</p>
                                <div class="custom-control custom-checkbox mt-10">
                                    <input type="checkbox" id="privacy" class="custom-control-input" required />
                                    <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions</label>
                                </div>
                                <a href="?orderid=order"><button type="submit" name="submit" class="btn btn-bordered mt-40">Place Order</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->
<?php include 'inc/footer.php'; ?>
