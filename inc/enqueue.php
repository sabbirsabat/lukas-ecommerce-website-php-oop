<?php 
	include 'lib/Session.php'; 
	Session::init();
	include 'lib/Database.php'; 
	include 'helpers/Format.php'; 

	spl_autoload_register(function($class){
		include_once "Classes/".$class.".php";
	});

	$db       = new Database(); 
	$fm       = new Format();
	$ct       = new Cart();
    $cmr      = new Customer();
	$pd       = new Product();
	$cat      = new Category();
	$brand    = new Brand();
	$color    = new Color();
	$size     = new Size();
    $sldr     = new Slider(); 
    $bnnr     = new Banner(); 
    $blog     = new Blog();
    $blogCat  = new BlogCategory();
    $tmOption = new ThemeOption();
    $subc     = new Subscribe();
    $pmnt     = new Payment();
    $cntct    = new Contact();

?>

<!--======================= CSS ============================-->
<!--== Favicon ==-->
<!--== Favicon ==-->
<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

<!--== Google Fonts ==-->
<link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&display=swap" rel="stylesheet">

<!-- build:css assets/css/app.min.css -->
<!--== Leaflet Min CSS ==-->
<link href="assets/css/leaflet.min.css" rel="stylesheet" />
<!--== Nice Select Min CSS ==-->
<link href="assets/css/nice-select.min.css" rel="stylesheet" />
<!--== Slick Slider Min CSS ==-->
<link href="assets/css/slick.min.css" rel="stylesheet" />
<!--== Magnific Popup Min CSS ==-->
<link href="assets/css/magnific-popup.min.css" rel="stylesheet" />
<!--== Slicknav Min CSS ==-->
<link href="assets/css/slicknav.min.css" rel="stylesheet" />
<!--== Animate Min CSS ==-->
<link href="assets/css/animate.min.css" rel="stylesheet" />
<!--== Ionicons Min CSS ==-->
<link href="assets/css/ionicons.min.css" rel="stylesheet" />
<!--== Font-Awesome Min CSS ==-->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
<!--== Bootstrap Min CSS ==-->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

<!--== Main Style CSS ==-->
<link href="assets/css/style.css" rel="stylesheet" />
<!--== Helper Min CSS ==-->
<link href="assets/css/helper.min.css" rel="stylesheet" />

<!--=======================Javascript============================-->
<!-- build:js assets/js/app.min.js -->
<!--=== Modernizr Min Js ===-->
<script src="assets/js/modernizr-3.6.0.min.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<!--=== Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== Slicknav Min Js ===-->
<script src="assets/js/jquery.slicknav.min.js"></script>
<!--=== Magnific Popup Min Js ===-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--=== Slick Slider Min Js ===-->
<script src="assets/js/slick.min.js"></script>
<!--=== Nice Select Min Js ===-->
<script src="assets/js/jquery.nice-select.min.js"></script>
<!--=== Leaflet Min Js ===-->
<script src="assets/js/leaflet.min.js"></script>
<!--=== Countdown Js ===-->
<script src="assets/js/countdown.js"></script>

<!--=== Active Js ===-->
<script src="assets/js/active.js"></script>
<!-- endbuild -->
