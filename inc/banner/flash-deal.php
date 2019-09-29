<div class="flash-deals-area home-2 bg-img" data-bg="assets/img/bg/deal-bg-2.jpg">
    <div class="container">
        <?php
       /**
        *  Call To Action (CTA) Banner Method call
        */
            $getFlsDealBnnr = $bnnr->getFlashDealsBanner();
            if ($getFlsDealBnnr) {
                while ($result = $getFlsDealBnnr->fetch_assoc()) { 
    ?>
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6">
                <div class="flash-deals-thumb text-center text-md-left">
                    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['banner_title']; ?>" />
                </div>
            </div>

            <div class="col-md-7 col-lg-6 text-center">
                <div class="flash-deals-content">
                    <h2><?php echo $result['banner_title']; ?></h2>
                    <h3><?php echo $result['banner_body']; ?></h3>
                    <a href="<?php echo $result['button_link']; ?>" class="btn btn-brand"><?php echo $result['button_text']; ?></a>

                    <div class="deals-countdown-area">
                        <div class="ht-countdown" data-date="9/20/2019"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }?>
    </div>
</div>
