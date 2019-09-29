<?php  include 'inc/addjust.php';  ?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../Classes/Customer.php'); 
?>
<?php
 if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
    echo "<script>window.location = 'order.php'; </script>"; 
 } else {
     $id = $_GET['custId'];
 }
 //Request Method
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location = 'order.php'; </script>"; 
} 
?>

<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap customer-status">
                    <h4>Customer Profile</h4>
                    <section class="customer-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <?php
                                        $cus = new Customer();
                                        $getCust = $cus->getCustomerData($id);
                                        if ($getCust) {
                                           while ($result = $getCust->fetch_assoc()) {
                                    ?>
                                    <form action="" method="post">
                                          <!--********************************************* General Information *************************************-->
                                         <div class="col-md-12">
                                            <!-- Checkout Form Area Start -->
                                            <div class="customer-address">
                                                <h2>General Information</h2>
                                                <div class="billing-form-wrap">

                                                    <div class="input-item">
                                                         <img src="<?php echo $result['image']; ?>" alt="Image" class="media-object user-img"><br />
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="f_name" class="sr-only required"></label>First Name: <?php echo $result['first_name']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="l_name" class="sr-only required"></label>Last Name: <?php echo $result['last_name']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="email" class="sr-only required"></label>Email Address: <?php echo $result['username']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="com-name" class="sr-only"></label>Company Name: <?php echo $result['email']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="country" class="sr-only required"></label>Country: <?php echo $result['gender']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="street-address" class="sr-only required"></label>Street address: <?php echo $result['phone']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="town" class="sr-only required"></label>Town / City: <?php echo $result['bio']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--********************************************* Billing Address *************************************-->
                                        <div class="col-md-12">
                                            <!-- Checkout Form Area Start -->
                                            <div class="customer-address">
                                                <h2>Billing Address</h2>
                                                <div class="billing-form-wrap">

                                                    <div class="input-item">
                                                        <label for="f_name" class="sr-only required"></label>First Name: <?php echo $result['b_first_name']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="l_name" class="sr-only required"></label>Last Name: <?php echo $result['b_last_name']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="email" class="sr-only required"></label>Email Address: <?php echo $result['b_email']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="com-name" class="sr-only"></label>Company Name: <?php echo $result['b_company_name']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="country" class="sr-only required"></label>Country: <?php echo $result['b_country']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="street-address" class="sr-only required"></label>Street address: <?php echo $result['b_st_address_line_one']; ?>
                                                    </div>

                                                    <div class="input-item">Street address 2(Optional): <?php echo $result['b_st_address_line_two']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="town" class="sr-only required"></label>Town / City: <?php echo $result['b_town_city']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="state" class="sr-only"></label>State / Divition: <?php echo $result['b_state_division']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="postcode" class="sr-only required"></label>Postcode / ZIP: <?php echo $result['b_postcode_zip']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="phone" class="sr-only"></label>Phone: <?php echo $result['b_phone']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--********************************************* Shipping Address *************************************-->
                                        <div class="col-md-12">
                                            <!-- Checkout Form Area Start -->
                                            <div class="customer-address">
                                                <h2>Shipping Address</h2>
                                                <div class="billing-form-wrap">

                                                    <div class="input-item">
                                                        <label for="f_name" class="sr-only required"></label>First Name: <?php echo $result['s_first_name']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="l_name" class="sr-only required"></label>Last Name: <?php echo $result['s_last_name']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="email" class="sr-only required"></label>Email Address: <?php echo $result['s_email']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="com-name" class="sr-only"></label>Company Name: <?php echo $result['s_company_name']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="country" class="sr-only required"></label>Country: <?php echo $result['s_country']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="street-address" class="sr-only required"></label>Street address: <?php echo $result['s_st_address_line_one']; ?>
                                                    </div>

                                                    <div class="input-item">Street address 2(Optional): <?php echo $result['s_st_address_line_two']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="town" class="sr-only required"></label>Town / City: <?php echo $result['s_town_city']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="state" class="sr-only"></label>State / Divition: <?php echo $result['s_state_division']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="postcode" class="sr-only required"></label>Postcode / ZIP: <?php echo $result['s_postcode_zip']; ?>
                                                    </div>

                                                    <div class="input-item">
                                                        <label for="phone" class="sr-only"></label>Phone: <?php echo $result['s_phone']; ?>
                                                    </div>
                                                    <div class="input-item">
                                                        <label for="ordernote" class="sr-only"></label>Order Note:
                                                        <?php echo $result['note']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="prof-ok">                                          
                                              <button type="submit" name="submit" class="btn-cudtomer-ok">Ok</button>
                                        </div>
                                    </form>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include 'inc/footer.php';  ?>
