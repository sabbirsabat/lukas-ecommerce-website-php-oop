<?php 
 include 'inc/addjust.php';  
 include '../Classes/Slider.php'; 
?>
<?php
/**
*Slider Insert Method call
*/
$sldr = new Slider();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertSlider = $sldr->sliderInsert( $_POST, $_FILES);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Upload Brand Logo</a></li>
                        </ul>
                             <?php 
                            /**
                            *Slider Add Message
                            */
                            if (isset($insertSlider)) {
                                echo $insertSlider;
                            }

                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Logo Name :</span>
                                                        <input type="text" name="logo_name" class="form-control">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"> Alt Tag :</span>
                                                         <input type="text" name="logo_tag" class="form-control">
                                                   </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Logo Link :</span>
                                                         <input type="text" name="logo_link" class="form-control">
                                                   </div> 
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="review-content-section">                          
                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Logo Image</span>
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name ='submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
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

<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"> Brand Gallery</a></li>
                        </ul>
                            <div class="brand-logo-area sm-top sm-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="brand-logo-content">
                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-1.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-2.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-3.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-4.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-5.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-3.png" alt="Logo" /></a>
                                            </div>

                                            <div class="brand-logo-item">
                                                <a href="#"><img src="img/brand-logo/brand-1.png" alt="Logo" /></a>
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
    </div>
</div>

<style>
.brand-logo-item {
	text-align: center;
	display: table !important;
	height: 85px;
	float: left;
	background: #fff;
	border: 1px solid #1b2a47;
	margin-left: 5px;
}
.brand-logo-item a {
    display: table-cell;
    vertical-align: middle;
}

.brand-logo-item img {
    margin: auto;
}


</style>

<?php include 'inc/footer.php'; ?>
