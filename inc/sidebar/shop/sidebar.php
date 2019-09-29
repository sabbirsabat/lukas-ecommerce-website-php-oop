<div class="col-lg-3 order-1 order-lg-0">
    <div class="sidebar-area">
        <div class="sidebar-item">
            <h4 class="sidebar-title">Categories</h4>
            <div class="sidebar-body">
                <ul class="sidebar-list">
                    <li><a href="shop.php">All Product</a></li>
                    <?php 
                    /**
                     * show all product category
                     */
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) { 
                    ?>
                    <li><a href="shopbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <h4 class="sidebar-title">Brand</h4>
            <div class="sidebar-body">
                <ul class="sidebar-list">
                    <li><a href="shop.php">All Product</a></li>
                    <?php 
                    /**
                     * show all product brand
                     */
                    $getBrand = $brand->getAllBrand();
                    if ($getBrand) {
                        while ($result = $getBrand->fetch_assoc()) { 
                    ?>
                    <li><a href="shopbybrand.php?brandId=<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <h4 class="sidebar-title">Filter By Color</h4>
            <div class="sidebar-body">
                <ul class="sidebar-list">
                    <li><a href="shop.php">All Product <span>(50)</span></a></li>

                    <?php 
                    /**
                     * show all product color
                     */
                    $getColor = $color->getAllColor();
                    if ($getColor) {
                        while ($result = $getColor->fetch_assoc()) { 
                    ?>
                    <li><a href="shopbycolor.php?colorId=<?php echo $result['colorId']; ?>"><?php echo $result['colorName']; ?><span>(2)</span></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>

        <div class="sidebar-item">
            <h4 class="sidebar-title">Recent Products</h4>
            <div class="sidebar-body">
                <?php
                /**
                * All Product Method call
                */
                    $geFpd = $pd->getSomeShopProduct();
                    if ($geFpd) {
                        while ($result = $geFpd->fetch_assoc()) { 
                ?>
                <div class="sidebar-product">
                    <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="image"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>" /></a>
                    <div class="content">
                        <a href="single-product.php?proid=<?php echo $result['productId']; ?>" class="title"><?php echo $result['product_name']; ?></a>
                        <span class="price">$ <?php echo $result['sale_price']; ?></span>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>

        <div class="sidebar-item">
            <h4 class="sidebar-title">Product tags</h4>
            <div class="sidebar-body">
                <ul class="tags">
                    <li><a href="#">Car</a></li>
                    <li><a href="#">Parts</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Tayer</a></li>
                    <li><a href="#">Seat</a></li>
                    <li><a href="#">Engine</a></li>
                    <li><a href="#">Parts</a></li>
                    <li><a href="#">Fuel</a></li>
                    <li><a href="#">Modern</a></li>
                    <li><a href="#">Brake</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
