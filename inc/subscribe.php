<?php
/**
*Product Insert Method call
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {		
    $email       = $_POST['email'];   
	$insertEmail = $subc->insertEmailFromSubscriber( $email );
} 
?>

<div class="newsletter-area-wrapper home--2 mt-0">
    <?php
      /**
        *  Subscribers Form Data Method call
        */
            $getSubsForm = $subc->getFormSubscribeData();
            if ($getSubsForm) {
                while ($result = $getSubsForm->fetch_assoc()) { 
    ?>
    <div class="container container-wide">
        <div class="newsletter-area-inner bg-img" data-bg="admin/<?php echo $result['image'] ?>">
            <div class="row">
                <div class="col-lg-8 m-lg-auto col-xl-5 offset-xl-6">
                    <div class="newsletter-content text-center">
                        <h4><?php echo $result['subs_title'] ?></h4>
                        <p><?php echo $result['subs_body'] ?></p>

                        <div class="newsletter-form-wrap">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-content">
                                    <input type="email" name="email" placeholder="Enter your email here" />
                                    <button class="btn-newsletter" type="submit" name="submit">Submit</button>
                                </div>
                            </form>
                            <?php
                                if (isset( $insertEmail )) {
                                    echo $insertEmail;
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } }?>
</div>
