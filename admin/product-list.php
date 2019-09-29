<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$pd = new Product();
$fm = new Format();

if (isset($_GET['delpro'])) {
	 $id = $_GET['delpro'];
	 $delPro = $pd->delProById($id);
}
?>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Products List</h4>
                    <?php
                    // Delete Product Message
                        if (isset( $delPro )) {
                            echo $delPro;
                        }
                    ?>
                    <div class="add-product">
                        <a href="product-add.php">Add Product</a>
                    </div>
                    <table>
                        <tr>
                            <th width="4%">SL</th>
                            <th width="10%">Image</th>
                            <th width="10%">Name</th>
                            <th width="8%">Category</th>
                            <th width="7%">Brand</th>
                            <th width="6%">Color</th>
                            <th width="5%">Size</th>
                            <th width="7%">Sale Price</th>
                            <th width="7%">Reg. Price</th>
                            <th width="5%">SKU</th>
                            <th width="5%">Stock</th>
                            <th width="7%">Type</th>
                            <th width="10%">Date & Time</th>
                            <th width="10%">Setting</th>
                        </tr>
                        <?php 
                        // show all product method call
                            $getPd = $pd->getAllProduct();
                            if ($getPd) {
                                $i = 0;
                                while ( $result = $getPd->fetch_assoc()) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src="<?php echo $result['image']; ?>" height="100px" width="100px" /></td>
                            <td><?php echo $result['product_name']; ?></td>
                            <td><?php echo $result['catName']; ?></td>
                            <td><?php echo $result['brandName']; ?></td>
                            <td><?php echo $result['colorName']; ?></td>
                            <td><?php echo $result['sizeName']; ?></td>
                            <td>$<?php echo $result['sale_price']; ?></td>
                            <td>$<?php echo $result['regular_price']; ?></td>
                            <td><?php echo $result['sku']; ?></td>
                            <td><?php echo $result['stock']; ?></td>
                            <td class="center">
                                <?php 
                                if ($result['product_type'] == '0') {
                                   echo "New Arival";
                                }elseif ($result['product_type'] == '1') {
                                   echo "Featured";
                                }elseif ($result['product_type'] == '2') {
                                   echo "Popular";
                                }elseif ($result['product_type'] == '3') {
                                   echo "Top Rated";
                                }elseif ($result['product_type'] == '4') {
                                   echo "Best Seller";
                                } ?>
                            </td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td>
                                <a href="product-edit.php?proid=<?php echo $result['productId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                <a onclick="return confirm('Are you sure Delete ?')" href="?delpro=<?php echo $result['productId']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
