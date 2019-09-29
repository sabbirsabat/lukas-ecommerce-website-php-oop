<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Subscribe.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$subc = new Subscribe(); 
$fm   = new Format();

if (isset($_GET['delsubs'])) {
    $id = $_GET['delsubs'];
    $delSubs = $subc->delSubscribeById($id);
}

?>
  <div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Subscriber List</h4>
                    <?php
                    // Delete Subscriber Message
                        if (isset( $delSubs )) {
                            echo $delSubs;
                        }
                    ?>
                   
                    <div class="add-product">
                        <a href="subscribe-form.php">Subscribe Form</a>
                    </div>
                    <table>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="60%">Email Address</th>
                            <th width="30%">Date</th>
                            <th width="5%">Setting</th>
                        </tr>

                        <?php 
                        /**
                         * showing subscriber list method call
                         */
                        $getSubs = $subc->getAllSubscriber();
                        if ($getSubs) {
                            $i=0;
                            while ($result = $getSubs->fetch_assoc()) {
                            $i++;	
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td>                             
                                <a onclick="return confirm('Are you sure delete this Subscriber ?')" href="?delsubs=<?php echo $result['id']; ?>"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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