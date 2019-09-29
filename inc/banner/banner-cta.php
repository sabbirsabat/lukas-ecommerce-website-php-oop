<div class="call-to-action-area">
    <?php
    /**
        *  Call To Action (CTA) Banner Method call
        */
            $getCtaBnnr = $bnnr->getCtaBanner();
            if ($getCtaBnnr) {
                while ($result = $getCtaBnnr->fetch_assoc()) { 
    ?>
    <div class="call-to-action-content-area bg-img" data-bg="assets/img/bg/bg-1.jpg">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <div class="call-to-action-txt">
                        <h2><?php echo $result['banner_body']; ?></h2>
                        <a href="<?php echo $result['button_link']; ?>" class="btn btn-brand"><?php echo $result['button_text']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="call-to-action-image-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['banner_title']; ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php } } ?>
</div>
