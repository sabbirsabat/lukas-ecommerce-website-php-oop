<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Brand.php'; ?>
<?php include_once '../helpers/Format.php'; ?>
<?php
/**
* Delete Brand  method
*/
$brand = new Brand();
if (isset($_GET['delbrand'])) {
	 $id       = $_GET['delbrand'];
	 $delbrand = $brand->delBrandById($id);
}
?>

<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Brand List</h4>
                    <?php
                    /**
                     * Brand: Delete Message
                     */
                        if (isset( $delbrand )) {
                            echo $delbrand;
                        }
                        ?>  
                    <div class="add-product">
                        <a href="brand-add.php">Create Brand</a>
                    </div>
                    <table>
                        <tr>
                            <th width="10%">SL</th>
                            <th width="20%">Brand Name</th>
                            <th width="55%">Description</th>
                            <th width="15%">Setting</th>
                        </tr>
                            <?php 
                            /**
                             * Show Brand List
                             */
                                $fm = new Format();
                                $getBrand = $brand->getAllBrand();
                                if ($getBrand) {
                                    $i = 0;
                                    while ( $result = $getBrand->fetch_assoc()) {
                                        $i++;
                            ?>	
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td><?php echo $fm->textShorten($result['body'],100); ?></td>	
                            <td>
                               <a href="brand-edit.php?brndid=<?php echo $result['brandId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                               <a onclick="return confirm('Are you sure Delete ?')" href="?delbrand=<?php echo $result['brandId']; ?>"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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