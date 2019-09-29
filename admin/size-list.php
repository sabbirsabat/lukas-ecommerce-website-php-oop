<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Size.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
/**
* Delete Size  method
*/
$size = new Size();
if (isset($_GET['delsize'])) {
	 $id       = $_GET['delsize'];
	 $delsize = $size->delSizeById($id);
}
?>

<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Size List</h4>
                    <?php
                    /**
                     * Size: Delete Message
                     */
                        if (isset( $delsize )) {
                            echo $delsize;
                        }
                        ?>  
                    <div class="add-product">
                        <a href="size-add.php">Create Size</a>
                    </div>
                    <table>
                        <tr>
                            <th width="10%">SL</th>
                            <th width="20%">Size Name</th>
                            <th width="55%">Description</th>
                            <th width="15%">Setting</th>
                        </tr>
                            <?php 
                            /**
                             * Show Size List
                             */
                                $fm = new Format();
                                $getSize = $size->getAllSize();
                                if ($getSize) {
                                    $i = 0;
                                    while ( $result = $getSize->fetch_assoc()) {
                                        $i++;
                            ?>	
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['sizeName']; ?></td>
                            <td><?php echo $fm->textShorten($result['body'],100); ?></td>	
                            <td>
                               <a href="size-edit.php?sizid=<?php echo $result['sizeId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                               <a onclick="return confirm('Are you sure Delete ?')" href="?delsize=<?php echo $result['sizeId']; ?>"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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