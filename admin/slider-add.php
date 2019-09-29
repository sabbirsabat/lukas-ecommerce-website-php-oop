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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Slider</a></li>
                        </ul>
                             <?php 
                            /**
                            *Slider Add Message
                            */
                            if (isset($insertSlider)) {
                                echo $insertSlider;
                            }

                            ?>
                         <div class="add-product">
                          <a href="slider-list.php">Slider List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Slider Title :</span>
                                                        <input type="text" name="slider_title" class="form-control">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="slider_body" id="texteditor"></textarea>
                                                   </div>      
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="review-content-section">
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Text :</span>
                                                         <input type="text" name="button_text" class="form-control">
                                                   </div>  
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Link :</span>
                                                         <input type="text" name="button_link" class="form-control">
                                                   </div>

                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Slider Image</span>
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name = 'submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
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
