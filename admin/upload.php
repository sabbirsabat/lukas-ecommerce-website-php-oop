<?php 
 include 'inc/addjust.php';   
 include '../Classes/Media.php'; 

/**
*Product Insert Method call
*/
$md = new Media();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertMedia = $md->mediaInsert( $_POST, $_FILES );
} 
?>

       <?php 
        /**
        *Media Add Message
        */
        if (isset($insertMedia)) {
            echo $insertMedia;
        }

        ?>
          <?php 
				$getmd = $md->getMedia();
				if ($getmd) {
					
					while ( $result = $getmd->fetch_assoc()) {
						?>
<td><img src="<?php echo $result['image']; ?>" height="80px" width="80px"/></td>

<?php } } ?>
			
                <!-- Multi Upload Start-->
                <div class="multi-uploaded-area mg-tb-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="dropzone-pro mg-tb-30">
                                    <div id="dropzone1">
                                       <form action="upload.php" method="post" class="dropzone dropzone-custom needsclick" id="demo1-upload" enctype="multipart/form-data">

                                            <div class="dz-message needsclick download-custom">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                <h2>Drop files here or click to upload.</h2>
                                                <input type="file" name="image" class="u-image"/>
                                            </div>
                                            <button type = 'submit' name ='submit' class="btn btn-ctl-bt waves-effect waves-light m-r-10  bttn-color">Publish</button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                          </div>
                    </div>
                </div>
    
<?php include 'inc/footer.php'; ?>   
