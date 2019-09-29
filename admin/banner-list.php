<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Banner.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$bnnr = new Banner(); 
$fm   = new Format();

if (isset($_GET['delbnr'])) {
	 $id = $_GET['delbnr'];
	 $delBnnr = $bnnr->delBannerById($id);
}
?>
  <div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Banner List</h4>
                     <?php
                    // Delete Banner Message
                        if (isset( $delBnnr )) {
                            echo $delBnnr;
                        }
                    ?>
                    <div class="add-product">
                        <a href="banner-add.php">Add Banner</a>
                    </div>
                    <table>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="15%">Banner Title</th>
                            <th width="15%">Short Desc</th>
                            <th width="25%">Image</th>
                            <th width="10%">Button Text</th>
                            <th width="15%">Banner Type</th>
                            <th width="10%">Setting</th>
                        </tr>

                        <?php 
                        /**
                         * showing slider list method call
                         */
                        $getBanner = $bnnr->getAllBanner();
                        if ($getBanner) {
                            $i=0;
                            while ($result = $getBanner->fetch_assoc()) {
                            $i++;	
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['banner_title']; ?></td>
                            <td><?php echo $fm->textShorten($result['banner_body'], 60); ?></td>  
                            <td class="sider-list-image"><img src="<?php echo $result['image']; ?>" /></td>	   
                            <td><?php echo $result['button_text']; ?></td>
                            <td class="center"> 
                                <?php 
                                if ($result['banner_type'] == '0') {
                                   echo "Product Categories";
                                }elseif ($result['banner_type'] == '1') {
                                   echo "Promotion";
                                }elseif ($result['banner_type'] == '2') {
                                   echo "Call to action";
                                }elseif ($result['banner_type'] == '3') {
                                   echo "Flash Deals";
                                } ?>
                            </td>
                            <td>
                                <a href="banner-edit.php?bnnrid=<?php echo $result['bannerId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Are you sure delete this banner ?')" href="?delbnr=<?php echo $result['bannerId']; ?>"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                            </td>
                        </tr>
                      <?php } } ?>

                    </table>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>   