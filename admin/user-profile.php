<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/User.php'; ?>
<?php
    $userid   = Session::get('userId');
    $userrole = Session::get('userRole');
?>
<?php

    $user = new User(); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateUser = $user->userUpdate( $_POST, $_FILES, $userid );
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Profile</a></li>
                        </ul>
                        <?php 
                            /**
                             * Message: Update User
                             */
                            if (isset($updateUser)) {
                                echo $updateUser;
                            }
                            
                            /**
                             * User profile & editable value showing method call
                             */
                            $getUser = $user->getUserProfile($userid, $userrole);
                            if ($getUser) {
                                while ($value = $getUser->fetch_assoc()) {
                            
                        ?> 
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
                                                        <span class="input-group-addon">User Name :</span>
                                                        <input type="text" name="username" class="form-control" value="<?php echo $value['username']; ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Email :</span>
                                                        <input type="text" name="email" class="form-control" value="<?php echo $value['email']; ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">First Name :</span>
                                                        <input type="text" name="first_name" class="form-control" value="<?php echo $value['first_name']; ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Last Name :</span>
                                                        <input type="text" name="last_name" class="form-control" value="<?php echo $value['last_name']; ?>">
                                                    </div>  
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Address :</span>
                                                        <input type="text" name="address" class="form-control" value="<?php echo $value['address']; ?>">
                                                    </div>  
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Zip :</span>
                                                        <input type="text" name="zip" class="form-control" value="<?php echo $value['zip']; ?>">
                                                    </div>  
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Website :</span>
                                                        <input type="text" name="website" class="form-control" value="<?php echo $value['website']; ?>">
                                                    </div>                                                  
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymceShort" name="body" id="texteditor"><?php echo $value['body']; ?></textarea>
                                                   </div>      
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="dropzone-pro mg-tb-30">
                                                         <span class="input-group-addon">User Image</span>
                                                         <img src="<?php echo $value['image']; ?>" height="300px" width="600px"/><br/>
                                                         <input type="file" name="image" class="p-image"/>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">User Role :</span>
                                                        <select name="role" class="form-control pro-edt-select form-control-primary">
                                                            <?php if ($value['role'] == 0) { ?>
                                                            <option selected = "selected" value="0">Admin</option>    
                                                            <?php  } elseif ($value['role'] == 1){ ?>
                                                            <option selected = "selected" value="1">Editor</option>    
                                                            <?php  } elseif ($value['role'] == 2){ ?>
                                                            <option selected = "selected" value="2">Author</option>    
                                                            <?php  } elseif ($value['role'] == 3){ ?>
                                                            <option selected = "selected" value="3">Contributor</option>    
                                                            <?php } ?>
                                                       </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update Profile</button>
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
                      <?php } } ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php include 'inc/footer.php'; ?>
