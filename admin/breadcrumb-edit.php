<?php 
include 'inc/addjust.php';
include '../Classes/Slider.php'; 
?>   
<?php
    if (!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL) {
        echo "<script>window.location = 'slider-list.php'; </script>"; 
    } else {
        $id = $_GET['sliderid'];
    }
    $sldr = new Slider();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateSlider = $sldr->sliderUpdate( $_POST, $_FILES, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Breadcrumb</a></li>
                        </ul>
                         <?php 
                            /**
                             * Message: Update Slider
                             */
                            if (isset($updateSlider)) {
                                echo $updateSlider;
                            }
                            
                            /**
                             * Slider by id for editable value showing method call
                             */
                            $getSldr = $sldr->getSliderById($id);
                            if ($getSldr) {
                                while ($value = $getSldr->fetch_assoc()) {
                            
                        ?> 
                         <div class="add-product">
                          <a href="slider-list.php">Slider List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Slider Title :</span>
                                                        <input type="text" name="slider_title" class="form-control" value="<?php echo $value['slider_title']; ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="slider_body" id="texteditor"><?php echo $value['slider_body']; ?></textarea>
                                                   </div>      
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Text :</span>
                                                         <input type="text" name="button_text" class="form-control" value="<?php echo $value['button_text']; ?>">
                                                   </div>  
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Link :</span>
                                                         <input type="text" name="button_link" class="form-control" value="<?php echo $value['button_link']; ?>">
                                                   </div>

                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Slider Image</span>
                                                         <img src="<?php echo $value['image']; ?>" height="300px" width="600px"/><br/>
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                               <a href="slider-list.php"> <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard</button></a>
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
