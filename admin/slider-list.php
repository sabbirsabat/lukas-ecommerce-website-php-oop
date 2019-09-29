<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Slider.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$sldr = new Slider(); 
$fm   = new Format();

if (isset($_GET['delsld'])) {
	 $id = $_GET['delsld'];
	 $delSldr = $sldr->delSliderById($id);
}
?>
  <div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Slider List</h4>
                     <?php
                    // Delete Slider Message
                        if (isset( $delSldr )) {
                            echo $delSldr;
                        }
                    ?>
                    <div class="add-product">
                        <a href="slider-add.php">Add Slider</a>
                    </div>
                    <table>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="20%">Slider Title</th>
                            <th width="20%">Short Desc</th>
                            <th width="30%">Image</th>
                            <th width="10%">Button Text</th>
                            <th width="10%">Setting</th>
                        </tr>

                        <?php 
                        /**
                         * showing slider list method call
                         */
                        $getSlider = $sldr->getAllSlider();
                        if ($getSlider) {
                            $i=0;
                            while ($result = $getSlider->fetch_assoc()) {
                            $i++;	
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['slider_title']; ?></td>
                            <td><?php echo $fm->textShorten($result['slider_body'], 60); ?></td>  
                            <td class="sider-list-image"><img src="<?php echo $result['image']; ?>" /></td>	   
                            <td><?php echo $result['button_text']; ?></td>
                            <td>
                                <a href="slider-edit.php?sliderid=<?php echo $result['sliderId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Are you sure delete this slider ?')" href="?delsld=<?php echo $result['sliderId']; ?>"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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