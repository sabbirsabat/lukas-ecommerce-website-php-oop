<?php 
 include 'inc/addjust.php';  
 include '../Classes/ThemeOption.php'; 
?>
<?php
/**
*Title Logo Insert Method call
*/
$tsl = new ThemeOption();   // tsl means : Title , Slogan, Logo.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$updateTitleLogo = $tsl->updateTitleLogo( $_POST, $_FILES);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Title Logo</a></li>
                        </ul>
                             <?php 
                            /**
                            *Title Logo Add Message
                            */
                            if (isset($updateTitleLogo)) {
                                echo $updateTitleLogo;
                            }

                            /**
                             * Show Title Slogan Logo Value
                             */
                            $getTSL = $tsl->getTitleSloganValue();
                            if ($getTSL) {
                            while ($result = $getTSL->fetch_assoc()) {

                            ?>                 
                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Site Title :</span>
                                                        <input type="text" name="title" class="form-control" value="<?php echo $result['title']; ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Site Slogan :</span>
                                                        <input type="text" name="slogan" class="form-control" value="<?php echo $result['slogan']; ?>">
                                                    </div>   
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Logo</span>
                                                         <img src="<?php echo $result['logo']; ?>">
                                                         <input type="file" name="logo" class="p-image"/>
                                                         <span>Must be file name is " logo " </span>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name ='submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>                                                       
                                                            </div>
                                                        </div>
                                                    </div>
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
