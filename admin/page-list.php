<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Page.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$pg = new Page(); 
$fm = new Format();

if (isset($_GET['delpage'])) {
	 $id = $_GET['delpage'];
	 $delPage = $pg->delPageById($id);
}
?>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Page List</h4>
                    <?php
                    // Delete Slider Message
                        if (isset( $delPage )) {
                            echo $delPage;
                        }
                    ?>
                    <div class="add-product">
                        <a href="page-add.php">Create Page</a>
                    </div>
                    <table>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="25%">Page Name</th>                  
                            <th width="30%">Author</th>                  
                            <th width="30%">Date</th>
                            <th width="10%">Setting</th>
                        </tr>
                        <?php 
                        /**
                         * showing page list method call
                         */
                        $getPg = $pg->getAllPage();
                        if ($getPg) {
                            $i=0;
                            while ($result = $getPg->fetch_assoc()) {
                            $i++;	
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['name']; ?></td>                       
                            <td><?php echo $result['author']; ?></td>                       
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td>
                            <a href="page-edit.php?pgid=<?php echo $result['pageId']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                            <a onclick="return confirm('Are you sure Delete ?')" href="?delpage=<?php echo $result['pageId']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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