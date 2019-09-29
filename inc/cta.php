 <?php
    /**
    * CTA Showing Method call
    */
        $getCta = $tmOption->getCtaValue();
            if ($getCta) {
             while ($result = $getCta->fetch_assoc()) {
    ?>


 <div class="call-to-action-area sm-top">
     <div class="container">
         <div class="row">
             <div class="col-md-4 col-lg-4">
                 <div class="call-to-action-item mt-0">
                     <div class="call-to-action-item__icon">
                         <img src="admin/<?php echo $result['ctaImageOne']; ?>" alt="<?php echo $result['ctaTitleOne']; ?>" />
                     </div>
                     <div class="call-to-action-item__info">
                         <h3><?php echo $result['ctaTitleOne']; ?></h3>
                         <p><?php echo $result['ctaBodyOne']; ?></p>
                     </div>
                 </div>
             </div>

             <div class="col-md-4 col-lg-4">
                 <div class="call-to-action-item">
                     <div class="call-to-action-item__icon">
                         <img src="admin/<?php echo $result['ctaImageTwo']; ?>" alt="<?php echo $result['ctaTitleTwo']; ?>" />
                     </div>
                     <div class="call-to-action-item__info">
                         <h3><?php echo $result['ctaTitleTwo']; ?></h3>
                         <p><?php echo $result['ctaBodyTwo']; ?></p>
                     </div>
                 </div>
             </div>

             <div class="col-md-4 col-lg-4">
                 <div class="call-to-action-item">
                     <div class="call-to-action-item__icon">
                         <img src="admin/<?php echo $result['ctaImageThree']; ?>" alt="<?php echo $result['ctaTitleThree']; ?>" />
                     </div>
                     <div class="call-to-action-item__info">
                         <h3><?php echo $result['ctaTitleThree']; ?></h3>
                         <p><?php echo $result['ctaBodyThree']; ?></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php } } ?>
