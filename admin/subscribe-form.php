<?php 
 include 'inc/addjust.php';  
 include '../Classes/Subscribe.php'; 
?>
<?php
/**
*Subscribe Insert Method call
*/
$subc = new Subscribe();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$updateSubs = $subc->subsFormUpdate( $_POST, $_FILES);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Subscriber Form</a></li>
                        </ul>
                             <?php 
                            /**
                            *Subscribe Add Message
                            */
                            if (isset($updateSubs)) {
                                echo $updateSubs;
                            }

                            /**
                            *Subscribe Form Value Data
                            */
                            $getSubFromData = $subc->getSubcribeFromData();
                            if ($getSubFromData) {
                                $i=0;
                                while ($result = $getSubFromData->fetch_assoc()) {
                                $i++;	

                            ?>
                         <div class="add-product">
                          <a href="subscriber.php">Subscriber List</a>
                        </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Title :</span>
                                                        <input type="text" name="subs_title" class="form-control" value="<?php echo $result['subs_title'] ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="subs_body" id="texteditor"><?php echo $result['subs_body'] ?></textarea>
                                                   </div>      
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">Background Image</span>
                                                         <img src="<?php echo $result['image'] ?>">
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name = 'submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                              <a href="subscriber.php"> <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard</button></a>
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
