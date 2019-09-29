<?php include 'inc/addjust.php'; ?>  
<?php include '../Classes/Color.php'; ?>
<?php
 if (!isset($_GET['clrid']) || $_GET['clrid'] == NULL) {
    echo "<script>window.location = 'color-list.php'; </script>"; 
 } else {
     $id = $_GET['clrid'];
 }
  $color = new Color();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $colorName = $_POST['colorName'];   	
    $body = $_POST['body'];   	
    $updateColor = $color->colorUpdate($colorName, $body, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Color</a></li>
                        </ul>
                        <?php
                        /**
                         * Update Color Message
                         */
                            if (isset( $updateColor )) {
                                echo $updateColor;
                            }
                            ?>
                        <?php
                        /**
                         * Show Brand Value
                         */
                            $getColor = $color->getColorById($id);
                            if ($getColor) {
                            while ($result = $getColor->fetch_assoc()) {
                        ?> 
                        <div class="add-product">
                          <a href="color-list.php">Color List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Color Name :</span>
                                                        <input type="text" class="form-control" name="colorName" value="<?php echo $result['colorName'] ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" id="texteditor" name="body"><?php echo $result['body'] ?></textarea>
                                                   </div>  
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                             <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                             <a href="color-list.php"> <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Discard</button></a>
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
