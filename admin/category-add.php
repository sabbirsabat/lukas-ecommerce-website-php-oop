<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Category.php'; ?>

<?php
/**
 * Category Add
 */
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName   = $_POST['catName'];   	
    $body      = $_POST['body'];     	
	$insertCat = $cat->catInsert( $catName, $body);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Create Category</a></li>
                        </ul>
                        <div class="add-product">
                          <a href="category-list.php">Category List</a>
                       </div>
                       <?php
                       /**
                        * Category Inserted Message
                        */
                            if (isset( $insertCat )) {
                                echo $insertCat ;
                            }
                        ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Category Name :</span>
                                                        <input type="text" class="form-control" name="catName" placeholder="Enter Category Name...">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea  class="tinymce" id="texteditor" name="body" ></textarea>
                                                   </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button class="btn btn-ctl-bt waves-effect waves-light m-r-10" type="submit" name="submit">Publish
                                                                    </button>
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
