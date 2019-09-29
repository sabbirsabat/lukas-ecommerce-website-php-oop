<?php 
 include 'inc/addjust.php'; 
 include '../Classes/ThemeOption.php'; 
?>
<?php
/**
* CTA Insert Method call
*/
$cta = new ThemeOption();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$updateCta = $cta->ctaUpdate( $_POST, $_FILES);
} 
?>

 <div class="admintab-area mg-tb-15 tab-style tab-padd">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-status mg-b-30">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-status-wrap">
                                <h4>Call To Action</h4>
                                  <?php 
                                    /**
                                    *CTA Update Message
                                    */
                                    if (isset($updateCta)) {
                                        echo $updateCta;
                                    }

                                    ?>
                                    <?php
                                    /**
                                     * Show CTA Value
                                     */
                                        $getCta = $cta->getCtaValue();
                                        if ($getCta) {
                                        while ($result = $getCta->fetch_assoc()) {
                                    ?> 
                                
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="admintab-wrap mg-t-30">
                                        <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 custom-nav">
                                            <li class="active"><a data-toggle="tab" href="#cta1"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>CTA 1</a>
                                            </li>
                                            <li><a data-toggle="tab" href="#cta2"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>CTA 2</a>
                                            </li>
                                            <li><a data-toggle="tab" href="#cta3"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>CTA 3</a>
                                            </li> 
                                        </ul>
                                        <div class="tab-content tab-padding">
                                            <div id="cta1" class="tab-pane in active flipInX custon-tab-style1">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="ctaTitleOne" class="form-control" value="<?php echo $result['ctaTitleOne']; ?>">
                                                </div>
                                                <div class="cta-img cti">
                                                     <span class="input-group-addon">CTA Image</span>                                            
                                                    <img src="<?php echo $result['ctaImageOne']; ?>" alt="logo"/>         
                                                     <input type="file" name="ctaImageOne" class="cta-image"/>
                                                </div>
                                                 <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymceShort" name="ctaBodyOne" id="texteditor"><?php echo $result['ctaBodyOne']; ?></textarea>
                                                </div>  
                                            </div>
                                            <div id="cta2" class="tab-pane flipInX custon-tab-style1">
                                                 <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="ctaTitleTwo" class="form-control" value="<?php echo $result['ctaTitleTwo']; ?>">
                                                </div>
                                                <div class="cta-img cti">
                                                     <span class="input-group-addon">CTA Image</span>                                            
                                                    <img src="<?php echo $result['ctaImageTwo']; ?>" alt="logo"/>        
                                                     <input type="file" name="ctaImageTwo" class="cta-image"/>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymceShort" name="ctaBodyTwo" id="texteditor"><?php echo $result['ctaBodyTwo']; ?></textarea>
                                               </div> 
                                            </div>
                                              <div id="cta3" class="tab-pane flipInX custon-tab-style1">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Title :</span>
                                                    <input type="text" name="ctaTitleThree" class="form-control" value="<?php echo $result['ctaTitleThree']; ?>">
                                                </div>
                                                  <div class="cta-img cti">
                                                     <span class="input-group-addon">CTA Image</span>                                           
                                                      <img src="<?php echo $result['ctaImageThree']; ?>" alt="logo"/>        
                                                     <input type="file" name="ctaImageThree" class="cta-image"/>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymceShort" name="ctaBodyThree" id="texteditor"><?php echo $result['ctaBodyThree']; ?></textarea>
                                               </div> 
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
                                                    <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Discard</button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </form>
                                <?php } } ?>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
          </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?> 