<?php include 'inc/enqueue.php'; ?>


<?php
$login =   Session::get("custLogin");
if ($login == true) {
 header('Location:cart.php');
}

?>
<?php  
	/**
	 * Customer login Method
	 */
		$cmr = new Customer();
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {	
			$custLogin = $cmr->customerLogin( $_POST );
		} 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lukas | login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
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
                <h3>Lukus</h3>

                <?php 
                    /**
                    * Message: Customer Login
                    */
                        if (isset($custLogin)) {
                            echo $custLogin;
                        }		
                    ?>

                <div class="form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="form-control">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <div class="forgetpass">
                    <a href="#" style="color:">Forgot your password?</a>
                </div>
                <button name="login" type="submit">Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>

                <div class="legal">
                    By continuing, you agree to Lukus's <a href="#">Conditions of Use</a> and <a href="#">Privacy Notice</a>.
                </div>

                <div class="keepSign">
                    <input type="radio">Keep me signed in.
                </div>

                <div class="newlukus">
                    <p class="ntl">New to Lukus?</p>
                    <button class="createAcc"><a href="registration.php" style="color:#fff; text-decoration:none"> Create Account</a> <i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>



	<!-- ===================== CSS ======================= -->  

<!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>



	<!-- ===================== JS ======================= -->  
<!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>