<?php include 'inc/addjust.php'; ?> 

<?php include '../Classes/Brand.php'; ?>
<?php
/*
*Brand & Description add
*/
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName   = $_POST['brandName'];   	
    $body        = $_POST['body'];   	
	$insertBrand = $brand->brandInsert($brandName, $body);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Create Brand</a></li>
                        </ul>
                        <div class="add-product">
                          <a href="brand-list.php">Brand List</a>
                        </div>
                          <?php
                            if (isset( $insertBrand )) {
                                echo $insertBrand;
                            }
                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Brand Name :</span>
                                                        <input type="text" class="form-control" name="brandName" placeholder="Enter Brand Name...">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea  class="tinymce" id="texteditor" name="body" ></textarea>
                                                   </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button class="btn btn-ctl-bt waves-effect waves-light m-r-10" type="submit" name="submit">Publish</button>
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
