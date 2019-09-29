<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/User.php'; ?>
<?php 
$user = new User(); 
$fm = new Format();

if (isset($_GET['deluser'])) {
	 $id = $_GET['deluser'];
	 $delUser = $user->delUserById($id);
}
?>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>User List</h4>
                    <?php
                    // Delete User Message
                        if (isset( $delUser )) {
                            echo $delUser;
                        }
                    ?>
                    <div class="add-product">
                        <a href="user-add.php">Add User</a>
                    </div>
                    <table>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="20%">Username</th>
                            <th width="20%">Name</th>
                            <th width="25%">Email</th>                         
                            <th width="20%">Role</th>                                     
                            <th width="10%">Action</th>
                        </tr>
                        <?php 
                        /**
                         * showing user list method call
                         */
                        $getUser = $user->getAllUser();
                        if ($getUser) {
                            $i=0;
                            while ($result = $getUser->fetch_assoc()) {
                            $i++;	
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['first_name']; ?> <?php echo $result['last_name']; ?></td>           
                            <td><?php echo $result['email']; ?></td>
                            <td>
                                <?php 
                                    if      ($result['role'] == '0') {
                                     echo "Admin";
                                    }elseif ($result['role'] == '1') {
                                     echo "Editor";
                                    }elseif ($result['role'] == '2') {
                                     echo "author";                                               
                                    }elseif ($result['role'] == '3') {
                                     echo "Contributor";
                                    }                 
                                ?>
                            </td>
                            <td>
                                <a href="user-view.php?usrprfle=<?php echo $result['userId']; ?>"><button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                <a onclick="return confirm('Are you sure Delete ?');" href="?deluser=<?php echo $result['userId']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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