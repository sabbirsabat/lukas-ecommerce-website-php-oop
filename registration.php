<?php include 'inc/enqueue.php'; ?>
<?php  
/**
 * Customer Registeration Method
 */
    $cmr = new Customer();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {	
        $customerReg = $cmr->customerRegistration( $_POST );
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lukus | Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="login-reg/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="login-reg/css/style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('login-reg/images/bg-registration-form-1.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="login-reg/images/registration-form-1.jpg" alt="">
            </div>
            <form action="" method="post">
                <h3>Registration</h3>
                <?php 
                       /**
                        * Message: Customer Registration
                        */
                         if (isset($customerReg)) {
                             echo $customerReg;
                         }
                        ?>
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required="">
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" required="">
                </div>
                <div class="form-wrapper">
                    <input type="text" name="username" placeholder="Username" class="form-control" required="">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control" required="">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <select name="gender" id="" class="form-control">
                        <option value="" selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="femal">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="phone" placeholder="Phone" class="form-control" required="">
                    <i class="zmdi zmdi-phone"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" required="">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button name="register" type="submit">Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</body>

</html>
