<div class="slider-area-wrapper home-2">

    <div class="slider-content-active">
        <div class="slider-slide-item bg-img" data-bg="assets/img/slider/slider-2-bg.jpg">
            <?php 
        /**
         * showing slider list method call
         */
        $getSlider = $sldr->getFrontSlider();
        if ($getSlider) { 
            while ($result = $getSlider->fetch_assoc()) { 
        ?>
            <div class="container container-wide h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 order-1 order-lg-0">
                        <div class="slide-content">
                            <div class="slide-content-inner">
                                <h3><?php echo $result['slider_title']; ?></h3>
                                <h2><?php echo $result['slider_body']; ?></h2>
                                <a class="btn btn-white" href="<?php echo $result['button_link']; ?>"><?php echo $result['button_text']; ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-0 order-lg-1">
                        <div class="slide-img">

                            <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['slider_title']; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>

    <div class="slider-dots-arrow-area">
        <div class="container container-wide">
            <div class="slider-dots-arrow ">
            </div>
        </div>
    </div>

</div>
