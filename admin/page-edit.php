<?php 
include 'inc/addjust.php';  
include '../Classes/Page.php'; 
?>   
<?php
    if (!isset($_GET['pgid']) || $_GET['pgid'] == NULL) {
        echo "<script>window.location = 'page-list.php'; </script>"; 
    } else {
        $id = $_GET['pgid'];
    }
    $pg = new Page();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updatePage = $pg->pageUpdate( $_POST, $_FILES, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Page</a></li>
                        </ul>
                        <?php 
                            /**
                             * Message: Update Page
                             */
                            if (isset($updatePage)) {
                                echo $updatePage;
                            }
                            
                            /**
                             * Page by id for editable value showing method call
                             */
                            $getPage = $pg->getPageById($id);
                            if ($getPage) {
                                while ($value = $getPage->fetch_assoc()) {
                            
                        ?> 
                        <div class="add-product">
                          <a href="page-list.php">Page List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Page Name :</span>
                                                        <input type="text" name="name" class="form-control" value="<?php echo $value['name']; ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="body" id="texteditor"><?php echo $value['body']; ?></textarea>
                                                   </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Author :</span>
                                                        <input type="text" name="author" class="form-control" value="<?php echo $value['author']; ?>">
                                                        <input type="hidden" name="userid" value="<?php echo Session::get('adminId'); ?>" class="form-control" />
                                                    </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                                <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Discard</button>
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
