<?php 
 include 'inc/addjust.php';  
 include '../Classes/Product.php'; 
 include '../Classes/Brand.php'; 
 include '../Classes/Category.php';
 include '../Classes/Color.php'; 
 include '../Classes/Size.php'; 
 include '../Classes/Media.php';
?>
<?php
/**
*Product Insert Method call
*/
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertProduct = $pd->productInsert( $_POST, $_FILES);
} 
?>

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Product</a></li>
                        </ul>
                        <?php 
                            /**
                            *Product Add Message
                            */
                            if (isset($insertProduct)) {
                                echo $insertProduct;
                            }

                            ?>
                        <div class="add-product">
                            <a href="product-list.php">Product List</a>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Product Name :</span>
                                                    <input type="text" name="product_name" class="form-control">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymce" name="body" id="texteditor"></textarea>
                                                </div>
                                                <!-- tabs Start: Product Data-->
                                                <div class="admintab-area mg-tb-15 tab-style">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="admintab-wrap mg-t-30">
                                                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 custom-nav">
                                                                        <li class="active"><a data-toggle="tab" href="#General"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>General</a>
                                                                        </li>
                                                                        <li><a data-toggle="tab" href="#Shipping"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>Shipping</a>
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
                                                                                <span class="input-group-addon">Sale Price :</span>
                                                                                <input type="text" name="sale_price" class="form-control">
                                                                            </div>
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Regular Price :</span>
                                                                                <input type="text" name="regular_price" class="form-control">
                                                                            </div>
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Tax :</span>
                                                                                <input type="text" name="tax" class="form-control">
                                                                            </div>
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Tags :</span>
                                                                                <input type="text" name="tag" class="form-control">
                                                                            </div>
                                                                            <note class="note-tags">Separate tags with commas</note>
                                                                        </div>
                                                                        <div id="Shipping" class="tab-pane flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Weight (kg):</span>
                                                                                <input type="text" name="weight" class="form-control">
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
                                                                                    <div class="input-group mg-b-pro-edt dimensions">
                                                                                        <span class="dimensions">Dimensions (cm):</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
                                                                                    <div class="input-group mg-b-pro-edt">
                                                                                        <span class="input-group-addon"></span>
                                                                                        <input type="text" name="length" class="form-control" placeholder="Length">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
                                                                                    <div class="input-group mg-b-pro-edt">
                                                                                        <span class="input-group-addon"></span>
                                                                                        <input type="text" name="width" class="form-control" placeholder="Width">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-9">
                                                                                    <div class="input-group mg-b-pro-edt">
                                                                                        <span class="input-group-addon"></span>
                                                                                        <input type="text" name="height" class="form-control" placeholder="Height">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="Linked-product" class="tab-pane flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Upsells :</span>
                                                                                <select id="select" name="upsell" class="form-control pro-edt-select form-control-primary">
                                                                                    <option>Sellect Upsell Product</option>
                                                                                    <?php 
                                                                                            // show all product method call
                                                                                                $getPd = $pd->getAllProduct();
                                                                                                if ($getPd) {
                                                                                                    $i = 0;
                                                                                                    while ( $result = $getPd->fetch_assoc()) {
                                                                                                        $i++;
                                                                                            ?>
                                                                                    <option value="<?php echo $result['productId']; ?>"><?php echo $result['product_name'] ?></option>
                                                                                    <?php } } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Cross-sells:</span>
                                                                                <select id="select" name="cross_sells" class="form-control pro-edt-select form-control-primary">
                                                                                    <option>Sellect Cross-sells Product</option>
                                                                                    <?php 
                                                                                            // show all product method call
                                                                                                $getPd = $pd->getAllProduct();
                                                                                                if ($getPd) {
                                                                                                    $i = 0;
                                                                                                    while ( $result = $getPd->fetch_assoc()) {
                                                                                                        $i++;
                                                                                            ?>
                                                                                    <option value="<?php echo $result['productId']; ?>"><?php echo $result['product_name'] ?></option>
                                                                                    <?php } } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div id="Attributes" class="tab-pane flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Color :</span>
                                                                                <select name="colorId" class="form-control pro-edt-select form-control-primary">
                                                                                    <option value="opt1">Select Color</option>
                                                                                    <?php
                                                                                                $color = new Color();
                                                                                                $getColor = $color->getAllColor();
                                                                                                if ($getColor) {                              
                                                                                                    while ( $result = $getColor->fetch_assoc()) {                               
                                                                                                ?>
                                                                                    <option value="<?php echo $result['colorId']; ?>"><?php echo $result['colorName'] ?></option>
                                                                                    <?php } } ?>
                                                                                </select>
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon">Size :</span>
                                                                                <select name="sizeId" class="form-control pro-edt-select form-control-primary">
                                                                                    <option value="opt1">Select Size</option>
                                                                                    <?php
                                                                                                $size = new Size();
                                                                                                $getSize = $size->getAllSize();
                                                                                                if ($getSize) {                              
                                                                                                    while ( $result = $getSize->fetch_assoc()) {                               
                                                                                                ?>
                                                                                    <option value="<?php echo $result['sizeId']; ?>"><?php echo $result['sizeName'] ?></option>
                                                                                    <?php } } ?>
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

                                                <!-- tabs start: Description -->
                                                <div class="admintab-area mg-tb-15 tab-style">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="admintab-wrap mg-t-30">
                                                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 custom-nav">
                                                                        <li class="active"><a data-toggle="tab" href="#shortDescription"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>Short Description</a>
                                                                        </li>
                                                                        <li><a data-toggle="tab" href="#sizeGuide"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>Size Guide</a>
                                                                        </li>
                                                                        <li><a data-toggle="tab" href="#extraInformation"><span class="adminpro-icon adminpro-analytics-bridge tab-custon-ic"></span>Extra Information</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content tab-padding">
                                                                        <div id="shortDescription" class="tab-pane in active flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon"></span>
                                                                                <textarea class="tinymceShort" name="short_body" id="texteditor"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div id="sizeGuide" class="tab-pane flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon"></span>
                                                                                <textarea class="tinymceShort" name="size_guide" id="texteditor"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div id="extraInformation" class="tab-pane flipInX custon-tab-style1">
                                                                            <div class="input-group mg-b-pro-edt">
                                                                                <span class="input-group-addon"></span>
                                                                                <textarea class="tinymceShort" name="extra_info" id="texteditor"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- tabs End : Description-->
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Brand :</span>
                                                    <select name="brandId" class="form-control pro-edt-select form-control-primary">
                                                        <option>Select Brand</option>
                                                        <?php 
                                                                $brand = new Brand();
                                                                $getBrand = $brand->getAllBrand();
                                                                if ($getBrand) {
                                                                    $i = 0;
                                                                    while ( $result = $getBrand->fetch_assoc()) {
                                                                        $i++;
                                                                ?>
                                                        <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Category :</span>
                                                    <select name="catId" class="form-control pro-edt-select form-control-primary">
                                                        <option>Select Category</option>
                                                        <?php
                                                                $cat = new Category();
                                                                $getCat = $cat->getAllCat();
                                                                if ($getCat) {                              
                                                                    while ( $result = $getCat->fetch_assoc()) {                               
                                                                ?>
                                                        <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Type :</span>
                                                    <select id="select" name="product_type" class="form-control pro-edt-select form-control-primary">
                                                        <option>Product Type</option>
                                                        <option value="0">New Arival</option>
                                                        <option value="1">Featured</option>s
                                                        <option value="2">Popular</option>
                                                        <option value="3">Top Rated</option>
                                                        <option value="4">Best Seller</option>
                                                    </select>
                                                </div>

                                                <div class="dropzone-pro mg-tb-30">
                                                    <span class="input-group-addon">Product Image</span>
                                                    <input type="file" name="image" class="p-image" />
                                                </div>

                                                <div class="dropzone-pro mg-tb-30">
                                                    <span class="input-group-addon">Product Gallary</span>
                                                    <input type="file" name="product_gallary" class="p-image" />
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button type='submit' name='submit' value="0" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
                                                            <button type="button" value="1" class="btn btn-ctl-bt waves-effect waves-light">Draft</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

<?php include 'inc/footer.php'; ?>
