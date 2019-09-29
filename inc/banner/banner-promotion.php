<div class="promotion-code-area-wrapper sm-top">
    <div class="container container-wide">
        <div class="row">
            <?php
            /**
                * Promotion Banner Method call
                */
                    $getPromBnnr = $bnnr->getPromotionBanner();
                    if ($getPromBnnr) {
                        while ($result = $getPromBnnr->fetch_assoc()) { 
            ?>
            <div class="col-md-6">
                <div class="promotion-code-banner-item mb-sm-30">
                    <a href="<?php echo $result['button_link']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['banner_title']; ?>" /> </a>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>
