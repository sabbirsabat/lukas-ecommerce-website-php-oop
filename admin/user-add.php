<?php 
include 'inc/addjust.php'; 
include '../Classes/User.php'; 
?>   
<!--User Role : permission Control-->
<?php
 if (!Session::get('userRole') == '0' ) { 
   echo "<script> window.location = 'dashboard.php'; </script>";
  }     
?>
<!--/User Role-->
<?php
/**
*User Insert Method call
*/
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertUser = $user->userInsert( $_POST );
} 
?>

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add User</a></li>
                        </ul>
                        <?php 
                            /**
                            * User Add Message
                            */
                            if (isset($insertUser)) {
                                echo $insertUser;
                            }
                         ?>
                        <p style="color: white;">Create a new user and add them to this site.</p>
                         <div class="add-product">
                          <a href="user-list.php">User List</a>
                        </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Username (required):</span>
                                                        <input type="text" name="username" class="form-control" required="">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Email (required):</span>
                                                        <input type="text" name="email" class="form-control" required="">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">First Name :</span>
                                                        <input type="text" name="first_name" class="form-control">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Last Name :</span>
                                                        <input type="text" name="last_name" class="form-control">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Website :</span>
                                                        <input type="text" name="website" class="form-control">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Password :</span>
                                                        <input type="password" name="password" id="viewPwdLogin" class="form-control" required=""> 
                                                        <span class="input-group-addon"><button onclick="changePwdView()" type="button" class="fa fa-user adminpro-avatar passShowHide"
                                                        style="background: #1b2a47;"></button></span>
                                                    </div>   
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Role :</span>
                                                        <select name="role" class="form-control pro-edt-select form-control-primary">
                                                            <option>Select Role</option>
                                                            <option value="0">Admin</option>
                                                            <option value="1">Editor</option>
                                                            <option value="2">Author</option>
                                                            <option value="3">Contributor</option>      
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add User</button>
                                                              <a href="user-list.php"><button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                  </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Start View / Hide Password-->
<script>
    let viewLoginPwd = false;
    function changePwdView()
    {
        let getPwdView = $("#viewPwdLogin");

        if (viewLoginPwd === false) 
        {
            getPwdView.attr("type","text");
            viewLoginPwd = true;
        } 
        else if (viewLoginPwd === true) {
            getPwdView.attr("type","password");
            viewLoginPwd = false;
        }
    }
</script>
<!--End View / Hide Password-->

 <?php include 'inc/footer.php'; ?>
