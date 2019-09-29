<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Payment.php'; ?>

<?php
  $payment = new Payment();
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['directBankTransfer'])) {	
    $updateDBT   = $payment->directBankTransfer($_POST);
} 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkPayment'])) {	
    $updateCP   = $payment->checkPayment($_POST);
}  
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cashOnDelivery'])) {	
    $updateCOD   = $payment->cashOnDelivery($_POST);
} 

?>

<div class="single-pro-review-area mt-t-30 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTab4" class="tab-review-design">
                        <li class="active"><a href="#DirectBankTransfer">Direct Bank Transfer</a></li>
                        <li><a href="#checkPayment">Check payments</a></li>
                        <li><a href="#cashOnDelivery">Cash on delivery</a></li>
                        <li><a href="#paypal">Paypal</a></li>
                        <li><a href="#bkash">Bkash</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="DirectBankTransfer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper"></div>
                                                  <?php 
                                                    /**
                                                    *DBT Update Message
                                                    */
                                                    if (isset($updateDBT)) {
                                                        echo $updateDBT;
                                                    }

                                                    ?>
                                                    <?php
                                                    /**
                                                     * Show DBT Value
                                                     */
                                                        $getDBT = $payment->getDBTValue();
                                                        if ($getDBT) {
                                                        while ($result = $getDBT->fetch_assoc()) {
                                                    ?> 
                                            <form class="payment-form mg-t-30" method="post">
                                                <p>Take payments in person via BACS. More commonly known as direct bank/wire transfer</p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Description :</span>
                                                    <textarea class="form-control" name="description"><?php echo $result['description']; ?></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Instructions :</span>
                                                    <textarea class="form-control" name="instructions"><?php echo $result['instructions']; ?></textarea>
                                                </div>
                                                <h4 style="color:#fff">Account details:</h4>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Account Name :</span>
                                                    <input type="text" name="account_name" class="form-control" value="<?php echo $result['account_name']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Account Number :</span>
                                                    <input type="text" name="account_number" class="form-control" value="<?php echo $result['account_number']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Bank Name :</span>
                                                    <input type="text" name="bank_name" class="form-control" value="<?php echo $result['bank_name']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Short Code :</span>
                                                    <input type="text" name="short_code" class="form-control" value="<?php echo $result['short_code']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">IBAN :</span>
                                                    <input type="text" name="iban" class="form-control" value="<?php echo $result['iban']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">BIC / Swift :</span>
                                                    <input type="text" name="bic_swift" class="form-control" value="<?php echo $result['bic_swift']; ?>">
                                                </div>
                                                <div class="text-center credit-card-custom">                                                  
                                                     <button type="submit" name="directBankTransfer" class="btn bg-btn-cl waves-effect waves-light">Update</button>
                                                </div>
                                            </form>
                                            <?php } }  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade active in" id="checkPayment">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper"></div>
                                               <?php 
                                                    /**
                                                    *Check Payment Update Message
                                                    */
                                                    if (isset($updateCP)) {
                                                        echo $updateCP;
                                                    }

                                                    ?>
                                                    <?php
                                                    /**
                                                     * Show Check Payment Value
                                                     */
                                                        $getCKP = $payment->getCKPaymentValue();
                                                        if ($getCKP) {
                                                        while ($result = $getCKP->fetch_assoc()) {
                                                    ?> 
                                            <form class="payment-form mg-t-30" method="post">
                                                <p>Take payments in person via checks. This offline gateway can also be useful to test purchases.</p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Description :</span>
                                                    <textarea class="form-control" name="description" ><?php echo $result['description']; ?></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Instructions :</span>
                                                    <textarea class="form-control" name="instructions"><?php echo $result['instructions']; ?></textarea>
                                                </div>
                                                <div class="text-center credit-card-custom">
                                                    <button type="submit" name="checkPayment" class="btn bg-btn-cl waves-effect waves-light">Update</button>
                                                </div>
                                            </form>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade active in" id="cashOnDelivery">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper"></div>
                                               <?php 
                                                    /**
                                                    *Cash On delivery Update Message
                                                    */
                                                    if (isset($updateCOD)) {
                                                        echo $updateCOD;
                                                    }

                                                    ?>
                                                    <?php
                                                    /**
                                                     * Show Cash On delivery Value
                                                     */
                                                        $getCOD = $payment->getCODValue();
                                                        if ($getCOD) {
                                                        while ($result = $getCOD->fetch_assoc()) {
                                                    ?> 
                                            <form class="payment-form mg-t-30" action="" method="post">
                                                <p>Have your customers pay with cash (or by other means) upon delivery.</p>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Description :</span>
                                                    <textarea class="form-control" name="description"><?php echo $result['description']; ?></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon" >Instructions :</span>
                                                    <textarea class="form-control" name="instructions"><?php echo $result['instructions']; ?></textarea>
                                                </div>
                                                <div class="text-center credit-card-custom">
                                                      <button type="submit" name="cashOnDelivery" class="btn bg-btn-cl waves-effect waves-light">Update</button>
                                                </div>
                                            </form>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade active in" id="paypal">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper"></div>
                                            <form class="payment-form mg-t-30" action="" method="post">
                                                <p>Have your customers pay with Paypal (or by other means) upon delivery.</p>
                                                <div class="text-center credit-card-custom">
                                                    <a href="#!" class="btn bg-btn-cl waves-effect waves-light">Setup</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade active in" id="bkash">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="demo-container">
                                            <div class="card-wrapper"></div>
                                            <form class="payment-form mg-t-30" action="" method="post">
                                                <p>Have your customers pay with Bkash (or by other means) upon delivery.</p>
                                                <div class="text-center credit-card-custom">
                                                    <a href="#!" class="btn bg-btn-cl waves-effect waves-light">Setup</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
