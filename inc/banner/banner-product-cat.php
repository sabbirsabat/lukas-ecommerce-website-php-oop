<div class="banner-area-wrapper sm-top">
    <div class="container container-wide">
        <div class="row mtn-30">
            <?php
            /**
                * Category Banner Method call
                */
                    $getCatBnnr = $bnnr->getCategoryBanner();
                    if ($getCatBnnr) {
                        while ($result = $getCatBnnr->fetch_assoc()) { 
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="banner-item">
                    <div class="banner-item__img">
                        <a href="<?php echo $result['button_link']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['banner_title']; ?>" /></a>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</div>
