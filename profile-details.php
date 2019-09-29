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
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <?php 
                              $id = Session::get('cmrId');
                              $getdata = $cmr->getCustomerData($id);
                              if ($getdata) {
                                 while ($result = $getdata->fetch_assoc()) {
                            ?>
                        <div class="pull-left text-center" href="#">
                            <img src="<?php echo $result['image']; ?>" alt="Image" class="media-object user-img"><br />
                        </div>
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <li><span>First Name:</span><?php echo $result['first_name']; ?></li>
                                <li><span>Last Name:</span><?php echo $result['last_name']; ?></li>
                                <li><span>Username:</span><?php echo $result['username']; ?></li>
                                <li><span>Email:</span><?php echo $result['email']; ?></li>
                                <li><span>Gender:</span><?php echo $result['gender']; ?></li>
                                <li><span>Phone:</span><?php echo $result['phone']; ?></li>
                                <li><span>Bio:</span><?php echo $result['bio']; ?></li>
                            </ul>
                        </div>
                        <div class="media-edit">
                            <button class="prof-edit"><a href="edit-profile.php">Edit Profile</a></button>
                        </div>
                    </div>  
                </div>
                        
                        
   <!--********************************************* Billing Address *************************************-->
                    <div class="col-md-12">
                        <!-- Checkout Form Area Start -->
                        <div class="checkout-billing-details-wrap">
                            <h2>Billing Address</h2>
                            <div class="billing-form-wrap">
                     
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item mt-0">
                                            <label for="f_name" class="sr-only required"></label>First Name:
                                            <input type="text" name="b_first_name" id="f_name" value="<?php echo $result['b_first_name']; ?>" readonly />
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

                            </div>
                        </div>
                    </div>

                    <!--********************************************* Shipping Address *************************************-->
                    <div class="col-md-12">
                        <!-- Checkout Form Area Start -->
                        <div class="checkout-billing-details-wrap">
                            <h2>Shipping Address</h2>
                            <div class="billing-form-wrap">

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
                                    <input type="text" name="s_country" id="country" value="<?php echo $result['s_country']; ?>" />                               
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
                                <div class="input-item">
                                    <label for="ordernote" class="sr-only"></label>Order Note:
                                    <textarea name="note" id="ordernote" cols="30" rows="3"><?php echo $result['note']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prof-update">                    
                        <button class="prof-edit"><a href="edit-profile.php">Edit Profile</a></button>
                    </div>
              
                <?php } } ?>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
