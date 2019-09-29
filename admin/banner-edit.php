<?php 
include 'inc/addjust.php';
include '../Classes/Banner.php'; 
?>   
<?php
    if (!isset($_GET['bnnrid']) || $_GET['bnnrid'] == NULL) {
        echo "<script>window.location = 'banner-list.php'; </script>"; 
    } else {
        $id = $_GET['bnnrid'];
    }
    $bnnr = new Banner(); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateBanner = $bnnr->bannerUpdate( $_POST, $_FILES, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Banner</a></li>
                        </ul>
                         <?php 
                            /**
                             * Message: Update Banner
                             */
                            if (isset($updateBanner)) {
                                echo $updateBanner;
                            }
                            
                            /**
                             * Banner by id for editable value showing method call
                             */
                            $getBanner = $bnnr->getBannerById($id);
                            if ($getBanner) {
                                while ($value = $getBanner->fetch_assoc()) {
                            
                        ?> 
                         <div class="add-product">
                          <a href="banner-list.php">Banner List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Banner Title :</span>
                                                        <input type="text" name="banner_title" class="form-control" value="<?php echo $value['banner_title']; ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="banner_body" id="texteditor"><?php echo $value['banner_body']; ?></textarea>
                                                   </div>      
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                     <span class="input-group-addon">Type :</span>
                                                        <select id="select" name="banner_type" class="form-control pro-edt-select form-control-primary">
                                                            <option>Select Banner Type</option>
                                                            <?php if ($value['banner_type'] == 0) { ?>
                                                            <option selected = "selected" value="0">Product Categories</option>    
                                                            <option value="1">Promotion</option>
                                                            <option value="2">Call to action</option>                                                    
                                                            <option value="3">Flash Deals</option>                                                    
                                                            <?php  } elseif ($value['banner_type'] == 1){ ?>
                                                            <option selected = "selected" value="1">Promotion</option>  
                                                            <option value="0">Product Categories</option>
                                                            <option value="2">Call to action</option>      
                                                            <option value="3">Flash Deals</option>                                                   
                                                            <?php  } elseif ($value['banner_type'] == 2) { ?>
                                                            <option selected = "selected" value="2">Call to action</option>  
                                                            <option value="0">Product Categories</option>
                                                            <option value="1">Promotion</option>      
                                                            <option value="3">Flash Deals</option>                                                         
                                                            <?php  } elseif ($value['banner_type'] == 3) { ?>
                                                            <option selected = "selected" value="3">Flash Deals</option>  
                                                            <option value="0">Product Categories</option>
                                                            <option value="1">Promotion</option>                                                         
                                                            <option value="2">Call to action</option>                                                         
                                                            <?php } ?>
                                                    </select>
                                                   </div>  
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Text :</span>
                                                         <input type="text" name="button_text" class="form-control" value="<?php echo $value['button_text']; ?>">
                                                   </div>  
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Buttion Link :</span>
                                                         <input type="text" name="button_link" class="form-control" value="<?php echo $value['button_link']; ?>">
                                                   </div>

                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Banner Image</span>
                                                         <img src="<?php echo $value['image']; ?>" height="300px" width="600px"/><br/>
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                               <a href="banner-list.php"> <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard</button></a>
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
