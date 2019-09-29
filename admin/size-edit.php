<?php include 'inc/addjust.php'; ?>  
<?php include '../Classes/Size.php'; ?>
<?php
 if (!isset($_GET['sizid']) || $_GET['sizid'] == NULL) {
    echo "<script>window.location = 'size-list.php'; </script>"; 
 } else {
     $id = $_GET['sizid'];
 }
  $size = new Size();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sizeName = $_POST['sizeName'];   	
    $body = $_POST['body'];   	
    $updateSize = $size->sizeUpdate($sizeName, $body, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Size</a></li>
                        </ul>
                        <?php
                        /**
                         * Update Size Message
                         */
                            if (isset( $updateSize )) {
                                echo $updateSize;
                            }
                            ?>
                        <?php
                        /**
                         * Show Size Value
                         */
                            $getSize = $size->getSizeById($id);
                            if ($getSize) {
                            while ($result = $getSize->fetch_assoc()) {
                        ?> 
                        <div class="add-product">
                          <a href="size-list.php">Size List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Size Name :</span>
                                                        <input type="text" class="form-control" name="sizeName" value="<?php echo $result['sizeName'] ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" id="texteditor" name="body"><?php echo $result['body'] ?></textarea>
                                                   </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                             <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                             <a href="size-list.php"> <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Discard</button></a>
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
