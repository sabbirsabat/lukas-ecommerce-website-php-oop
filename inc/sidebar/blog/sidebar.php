<div class="col-lg-3">
    <div class="sidebar-area">
        <div class="sidebar-item">
            <h4 class="sidebar-title">Search</h4>
            <div class="sidebar-body">
                <div class="sidebar-search">
                    <form action="" method="post">
                        <input type="text" placeholder="search Here" />
                        <button class="btn-src"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="sidebar-item">
            <h4 class="sidebar-title">Categories</h4>
            <div class="sidebar-body">
                <ul class="sidebar-list">
                    <li><a href="blog.php">All Post <span>(50)</span></a></li>
                    <?php 
                    /**
                     * show all blog category
                     */
                    $getBlogCat = $blogCat->getAllBlogCat();
                    if ($getBlogCat) {
                        while ($result = $getBlogCat->fetch_assoc()) { 
                    ?>
                    <li><a href="blogbycat.php?blogCatId=<?php echo $result['blogCatId']; ?>"><?php echo $result['blog_category_name']; ?></a></li>
                    <?php } } ?>
                </ul>
            </div>
        </div>

        <div class="sidebar-item">
            <h4 class="sidebar-title">Recent Post</h4>
            <div class="sidebar-body">
                <?php
                /**
                * All Product Method call
                */
                    $geBlogPost = $blog->getSomeBlogPost();
                    if ($geBlogPost) {
                        while ($result = $geBlogPost->fetch_assoc()) { 
                ?>
                <div class="sidebar-product">
                    <a href="blog-details.php?blogid=<?php echo $result['id']; ?>" class="image"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" /></a>
                    <div class="content">
                        <a href="blog-details.php?blogid=<?php echo $result['id']; ?>" class="title"><?php echo $result['title']; ?></a>
                        <p><?php echo $fm->textShorten($result['body'],80); ?></p>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>

        <div class="sidebar-item">
            <h4 class="sidebar-title">Tags</h4>
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
