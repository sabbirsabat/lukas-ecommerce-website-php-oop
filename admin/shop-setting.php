<?php include 'inc/addjust.php'; ?> 
<!-- tabs Start: Product Data-->
  <div class="admintab-area mg-tb-15 tab-style tab-margin">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="admintab-wrap mg-t-30">
                      <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 custom-nav">
                          <li class="active"><a data-toggle="tab" href="#General"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>General</a>
                          </li>
                          <li><a data-toggle="tab" href="#Payments"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>Payments</a>
                          </li>
                          <li><a data-toggle="tab" href="#Linked-product"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>Linked Product</a>
                          </li>
                          <li><a data-toggle="tab" href="#Attributes"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>Attributes</a>
                          </li>
                          <li><a data-toggle="tab" href="#Inventory"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>Inventory</a>
                          </li>
                      </ul>
                      <div class="tab-content tab-padding">
                          <div id="General" class="tab-pane in active flipInX custon-tab-style1">
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Address line 1  :</span>
                                  <input type="text" name="sale_price" class="form-control">
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Address line 2 :</span>
                                  <input type="text" name="regular_price" class="form-control">
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">City :</span>
                                  <input type="text" name="tax" class="form-control">
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Country / State  :</span>
                                  <input type="text" name="tag" class="form-control">
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Postcode / ZIP   :</span>
                                  <input type="text" name="tag" class="form-control">
                              </div>
                          </div>
                          <div id="Payments" class="tab-pane flipInX custon-tab-style1">
                              <div class="row">
                                 <tr>
                                    <td>Paypal</td>
                                    <td>f</td>	
                                    <td>f</td>
                                    <td>f</td>
                                 
                                 
                                    <td></td>
                                    <td>
                                        <a href="">  <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                        <a onclick="return confirm('Are you sure Delete ?')" href=""><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                    </td>
                                 </tr>
                              </div>
                          </div>

                          <div id="Linked-product" class="tab-pane flipInX custon-tab-style1">
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Upsells :</span>
                                  <select id="select" name="upsell" class="form-control pro-edt-select form-control-primary">
                                      <option>Sellect Upsell Product</option>
                                      <option>Sellect Upsell Product</option>
                                      <option>Sellect Upsell Product</option>  
                                  </select>
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Cross-sells:</span>
                                  <select id="select" name="cross_sells" class="form-control pro-edt-select form-control-primary">
                                      <option>Sellect Cross-sells Product</option>
                                      <option>Sellect Cross-sells Product</option>
                                      <option>Sellect Cross-sells Product</option>
                                    
                                  </select>
                              </div>
                          </div>

                          <div id="Attributes" class="tab-pane flipInX custon-tab-style1">
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Color :</span>
                                  <select name="colorId" class="form-control pro-edt-select form-control-primary">
                                      <option value="opt1">Select Color</option>
                                      <option value="opt1">Select Color</option>
                                      <option value="opt1">Select Color</option>
                                      <option value="opt1">Select Color</option>
                                    
                                  </select>
                              </div>

                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Size :</span>
                                  <select name="sizeId" class="form-control pro-edt-select form-control-primary">
                                      <option value="opt1">Select Size</option>
                                      <option value="opt1">Select Size</option>
                                      <option value="opt1">Select Size</option>
                                      <option value="opt1">Select Size</option>
                                      
                                  </select>
                              </div>
                          </div>
                          <div id="Inventory" class="tab-pane flipInX custon-tab-style1">
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">SKU :</span>
                                  <input type="text" name="sku" class="form-control">
                              </div>
                              <div class="input-group mg-b-pro-edt">
                                  <span class="input-group-addon">Stock :</span>
                                  <input type="text" name="stock" class="form-control">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- tabs End: Product Data-->
<?php include 'inc/footer.php'; ?> 