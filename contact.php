<?php include 'inc/header.php'; ?>

<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Contact</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="current"><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Header Area ==-->
<?php
/**
*Contact data Insert Method call
*/
$cntct = new Contact();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertmessage = $cntct->messageInsert( $_POST );
} 
?>
<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sm-top">
    <div class="contact-page-content">
        <div class="contact-info-wrapper">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-4">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-ios-location-outline"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Our Location</h4>
                                <p>(800) 123 456 789 / (800) 123 456 789
                                    info@example.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-iphone"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Contact us Anytime</h4>
                                <p>Mobile: 012 345 678 <br>
                                    Fax: 123 456 789</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="contact-info-item">
                            <div class="con-info-icon">
                                <i class="ion-ios-email-outline"></i>
                            </div>
                            <div class="con-info-txt">
                                <h4>Write Some Words</h4>
                                <p>Support24/7@example.com
                                    info@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form-wrapper sm-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-form-content">
                            <h2>Get In Touch</h2>
                            <?php 
                            /**
                            * Message : Add Message send or fail
                            */
                            if (isset($insertmessage)) {
                                echo $insertmessage;
                            }
                            ?>
                            <div class="contact-form-wrap">
                                <form action="" method="post">
                                    <div class="contact-form-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <label class="sr-only">name</label>
                                                    <input type="text" name="name" placeholder="Name" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <label class="sr-only">email</label>
                                                    <input type="email" name="email" placeholder="Email"/>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-item">
                                                    <label class="sr-only">subject</label>
                                                    <input type="text" name="subject" placeholder="Subject" required />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-item">
                                                    <label class="sr-only">message</label>
                                                    <textarea name="message" cols="30" rows="8" placeholder="Write Message" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-item">
                                                    <button type="submit" name="submit" class="btn btn-brand">Send a Message</button>
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
        <div class="contact-map-wrapper sm-top">
            <div id="map_content" class="h-100" data-lat="23.7639212" data-lng="90.429871" data-zoom="7"></div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<?php include 'inc/footer.php'; ?>
