<?php 
 include 'inc/addjust.php';  
 include '../Classes/Blog.php'; 
 include '../Classes/BlogCategory.php';

?>
<?php
/**
*Blog Insert Method call
*/
$blog = new Blog();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$insertBlog = $blog->blogInsert( $_POST, $_FILES);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Blog Post</a></li>
                        </ul>
                        <?php 
                            /**
                            *Blog Add Message
                            */
                            if (isset($insertBlog)) {
                                echo $insertBlog;
                            }

                            ?>
                        <div class="add-product">
                            <a href="blog-list.php">Blog List</a>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Post Title :</span>
                                                    <input type="text" name="title" class="form-control" required="">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymce" name="body" id="texteditor"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Category :</span>
                                                    <select name="blogCatId" class="form-control pro-edt-select form-control-primary">
                                                        <option>Select Category</option>
                                                        <?php
                                                                  $blogCat = new BlogCategory();
                                                                  $getBlogCat = $blogCat->getAllBlogCat();
                                                                  if ($getBlogCat) {
                                                                      $i = 0;
                                                                      while ( $result = $getBlogCat->fetch_assoc()) {
                                                                          $i++;
                                                                ?>
                                                        <option value="<?php echo $result['blogCatId']; ?>"><?php echo $result['blog_category_name'] ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Post Type :</span>
                                                    <select id="select" name="type" class="form-control pro-edt-select form-control-primary">
                                                        <option>Select Post Type</option>
                                                        <option value="0">General</option>
                                                        <option value="1">Sticky</option>
                                                        <option value="2">Featured</option>
                                                        <option value="3">Popular</option>
                                                    </select>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Tags :</span>
                                                    <input type="text" name="tags" class="form-control">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Author :</span>
                                                    <input type="text" name="author" readonly value="<?php echo Session::get('nicename'); ?>" class="form-control rdonly" />
                                                    <input type="hidden" name="userId" value="<?php echo Session::get('userId'); ?>" class="form-control" />
                                                </div>
                                                <div class="dropzone-pro mg-tb-30">
                                                    <span class="input-group-addon">Feature Image</span>
                                                    <input type="file" name="image" class="p-image" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Publish</button>
                                                            <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Draft</button>
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
