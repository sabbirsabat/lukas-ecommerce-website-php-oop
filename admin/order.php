<?php include 'inc/addjust.php'; ?>
<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../Classes/Cart.php'); 
	$ct = new Cart();
	$fm = new Format();
?>
<?php
/**
 * Product Shifted Method
 */
	if (isset($_GET['shiftedid'])) {
		$id    = $_GET['shiftedid'];
		$time  = $_GET['time'];
		$sale_price = $_GET['sale_price'];
		$shift = $ct->productShifted($id, $time, $sale_price);
	}
/**
 * Shifted After Remove
 */
	if (isset($_GET['delproid'])) {
		$id         = $_GET['delproid'];
		$time       = $_GET['time'];
		$sale_price = $_GET['sale_price'];
		$delOrder = $ct->delProductShifted($id, $time, $sale_price);
	}
?>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Order List</h4>
                    <?php
                        /**
                         * Shifted Message
                         */
                            if (isset($shift)) {
                                echo $shift;
                            }
                        ?>
                    <?php
                        /**
                         * Remove Message
                         */
                            if (isset($delOrder)) {
                                echo $delOrder;
                            }
                        ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Sale Price</th>
                            <th>Cust ID</th>
                            <th>Cust Details</th>
                            <th>Order Time</th>
                            <th>Action</th>
                        </tr>
                        <?php					
						$getOrder = $ct->getAllOrderProduct();
						if ($getOrder) {						  
							while ($result = $getOrder->fetch_assoc()) {
						?>
                        <tr>

                            <td><?php echo $result['id']; ?></td>
                            <td><img src="<?php echo $result['image']; ?>" alt="" /></td>
                            <td><?php echo $result['product_name']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td>$ <?php echo $result['sale_price']; ?></td>
                            <td><?php echo $result['cmrId']; ?></td>
                            <td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>"><button class="pd-setting">View Details</button></a></td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            
                            	<?php
								if ($result['status'] == '0') {?>
								<td><a href="?shiftedid=<?php echo $result['cmrId']; ?>&sale_price=<?php echo $result['sale_price']; ?>&time=<?php echo $result['date']; ?>"> <button class="ps-setting">Shifted</button> </a></td>
							<?php } elseif($result['status'] == '1') {?>
								<td><button class="pd-setting">Pending</button></td>
					    	<?php } else{?>
								<td><a href="?delproid=<?php echo $result['cmrId']; ?>&sale_price=<?php echo $result['sale_price']; ?>&time=<?php echo $result['date']; ?>"><button class="ds-setting">Remove</button></a></td>
							<?php  } ?>

                            <!--
                            <td> <button class="ps-setting">Paused</button> </td>
                            <td> <button class="ds-setting">Disabled</button> </td>
                            <td> <button class="pd-setting">Active</button> </td>
                            -->
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