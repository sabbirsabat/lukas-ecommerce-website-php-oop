<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Category.php'; ?>
<?php
/**
 * Delete category Method
 */
$cat = new Category();
if (isset($_GET['delcat'])) {
	 $id = $_GET['delcat'];
	 $delCat = $cat->delCatById($id);
}
?>


<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Category List</h4>
                    <div class="add-product">
                        <a href="category-add.php">Create Category</a>
                    </div>
                    <table>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Setting</th>
                        </tr>

                        <?php 
                        /** 
                         * Show Category list Method
                        */
                            $fm = new Format();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                $i = 0;
                                while ( $result = $getCat->fetch_assoc()) {
                                    $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['catName']; ?></td>
                            <td><?php echo $fm->textShorten($result['body'],100); ?></td>	
                            <td>
                               <a href="category-edit.php?catid=<?php echo $result['catId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                               <a onclick="return confirm('Are you sure Delete ?')" href="?delcat=<?php echo $result['catId']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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