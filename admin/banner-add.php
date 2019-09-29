<?php 
 include 'inc/addjust.php';  
 include '../Classes/Banner.php'; 
?>
<?php
/**
*Banner Insert Method call
*/
$bnnr = new Banner(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertBanner = $bnnr->bannerInsert( $_POST, $_FILES);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Banner</a></li>
                        </ul>
                        <?php 
                            /**
                            *Banner Add Message
                            */
                            if (isset($insertBanner)) {
                                echo $insertBanner;
                            }

                            ?>
                        <div class="add-product">
                            <a href="banner-list.php">Banner List</a>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Banner Title :</span>
                                                    <input type="text" name="banner_title" class="form-control">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymce" name="banner_body" id="texteditor"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Type :</span>
                                                    <select id="select" name="banner_type" class="form-control pro-edt-select form-control-primary">
                                                        <option>Select Banner Type</option>
                                                        <option value="0">Product Categories</option>
                                                        <option value="1">Promotion</option>
                                                        <option value="2">Call to action</option>
                                                        <option value="3">Flash Deals</option>
                                                    </select>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Button Text :</span>
                                                    <input type="text" name="button_text" class="form-control">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Button Link :</span>
                                                    <input type="text" name="button_link" class="form-control">
                                                </div>

                                                <div class="dropzone-pro mg-tb-30">
                                                    <span class="input-group-addon">Banner Image</span>
                                                    <input type="file" name="image" class="p-image" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button type="submit" name='submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
                                                            <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Draft</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
