<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Customer.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$cmr = new Customer();
$fm = new Format();

if (isset($_GET['delcus'])) {
	 $id = $_GET['delcus'];
	 $delCus = $cmr->delCustomerById($id);
}
?>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Customer List</h4>
                    <?php
                    // Delete Product Message
                        if (isset( $delCus )) {
                            echo $delCus;
                        }
                    ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Cust Name</th>
                            <th>Zip</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>View Profile</th>
                            <th>Setting</th>
                        </tr>
                        <?php 
                        // show all Customer method call
                            $getCmr = $cmr->getAllCustomer();
                            if ($getCmr) {
                                $i = 0;
                                while ( $result = $getCmr->fetch_assoc()) {
                                    $i++;
                          ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><img src="<?php echo $result['image']; ?>" height="100px" width="100px" /></td>            
                            <td><?php echo $result['first_name']; ?> <?php echo $result['last_name']; ?></td>
                            <td><?php echo $result['b_postcode_zip']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['b_st_address_line_one']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['b_country']; ?></td>                           
                            <td><a href="customer-profile.php?custId=<?php echo $result['id']; ?>"><button class="pd-setting">View Details</button></a></td>                     
                            <td>
                                  <a onclick="return confirm('Are you sure Delete ?')" href="?delcus=<?php echo $result['id']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
