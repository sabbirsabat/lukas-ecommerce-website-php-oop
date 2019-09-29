<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/BlogCategory.php'; ?>
<?php
 if (!isset($_GET['catblgid']) || $_GET['catblgid'] == NULL) {
    echo "<script>window.location = 'blog-category.php'; </script>"; 
 } else {
     $id = $_GET['catblgid'];
 }
 $blogCat = new BlogCategory();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_category_name = $_POST['blog_category_name'];   	
    $body               = $_POST['body'];   	
    $updateBlogCat      = $blogCat->blogCatUpdate($blog_category_name, $body, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Blog  Category</a></li>
                        </ul>
                        <?php
                        /**
                         * Update Blog Category Message
                         */
                            if (isset( $updateBlogCat )) {
                                echo $updateBlogCat;
                            }
                        ?>
                        <?php
                        /**
                         * Show Blog Category Value
                         */
                            $getBlogCat = $blogCat->getBlogCatById($id);
                            if ($getBlogCat) {
                            while ($result = $getBlogCat->fetch_assoc()) {
                        ?>
                        <div class="add-product">
                          <a href="blog-category.php">Blog Category List</a>
                       </div>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Category Name :</span>
                                                        <input type="text" name="blog_category_name" class="form-control" value="<?php echo $result['blog_category_name'] ?>">
                                                    </div>
                                                   <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <textarea class="tinymce" name="body" id="texteditor"><?php echo $result['body'] ?></textarea>
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

<?php include 'inc/footer.php'; ?>
