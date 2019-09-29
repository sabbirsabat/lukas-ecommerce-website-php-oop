<?php 
 include 'inc/addjust.php';  
 include '../Classes/ThemeOption.php'; 
?>
<?php
/**
*Copyright Method call
*/
$copyright = new ThemeOption();   // tsl means : Title , Slogan, Logo.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$updateCopyRight = $copyright->updateCopyright( $_POST );
} 
?>

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Copyright</a></li>
                        </ul>
                        <?php 
                            /**
                            *copyright update Message
                            */
                            if (isset($updateCopyRight)) {
                                echo $updateCopyRight;
                            }

                            /**
                             * Show Previous copyright Value
                             */
                            $getCR = $copyright->getCopyRightValue();
                            if ($getCR) {
                            while ($result = $getCR->fetch_assoc()) {

                            ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Copyright :</span>
                                                    <textarea class="form-control" name="copyright"><?php echo $result['copyright']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button type="submit" name='submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
