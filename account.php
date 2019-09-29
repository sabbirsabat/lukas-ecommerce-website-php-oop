<?php include 'inc/header.php'; ?>
<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <!-- Customer Account Sidebar -->
            <?php include 'inc/sidebar/customer/sidebar.php'; ?>
            <!-- /Customer Account Sidebar -->

            <div class="col-md-9">
                <div class="dashboard-wrapper user-dashboard">
                    <?php 
                          $id = Session::get('cmrId');
                          $getdata = $cmr->getCustomerData($id);
                          if ($getdata) {
                             while ($result = $getdata->fetch_assoc()) {
                        ?>
                    <div class="media">
                        <div class="pull-left">
                            <img class="media-object user-img" src="<?php echo $result['image']; ?>" alt="<?php echo $result['username']; ?>">
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading">Welcome <?php echo $result['first_name']; ?></h2>
                            <p><?php echo $result['bio']; ?></p>
                        </div>
                    </div>
                    <?php } }?>
                    <div class="total-order mt-20">
                        <h4>Total Orders</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                    /**
                                     * Show product or product list in Cart
                                     */
                                        $cmrId  = Session::get("cmrId");
                                        $getOrder = $ct->getOrderedProduct($cmrId);
                                        if ($getOrder) {
                                            $i = 0;						
                                            while ($result = $getOrder->fetch_assoc()) {
                                                $i++;
                                    ?>
                                <tbody>
                                    <tr> 
                                        <td><a href="#"><?php echo $result['id']; ?></a></td>
                                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                                        <td><?php echo $result['quantity']; ?></td>
                                        <td>$ <?php echo $result['sale_price'];?></td>
                                    </tr>
                                </tbody>
                                <?php } } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
