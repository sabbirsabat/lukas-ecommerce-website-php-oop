<?php 
 include 'inc/addjust.php';  
 include '../Classes/Blog.php'; 
 include '../Classes/BlogCategory.php';
?>
<?php
    if (!isset($_GET['blgeditid']) || $_GET['blgeditid'] == NULL) {
        echo "<script>window.location = 'blog-list.php'; </script>"; 
    } else {
        $id = $_GET['blgeditid'];
    }
    $blog = new Blog();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateBlog = $blog->blogUpdate( $_POST, $_FILES, $id);
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Edit Blog Post</a></li>
                        </ul>
                        <?php 
                            /**
                             * Message: Update Blog
                             */
                            if (isset($updateBlog)) {
                                echo $updateBlog;
                            }
                            
                            /**
                             * Blog by id for value showing method call
                             */
                            $getPro = $blog->getBlogById($id);
                            if ($getPro) {
                                while ($value = $getPro->fetch_assoc()) {
                            
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
                                                    <input type="text" name="title" class="form-control" value="<?php echo $value['title']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <textarea class="tinymce" name="body" id="texteditor"><?php echo $value['body']; ?></textarea>
                                                </div>      
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="review-content-section">
                                                 <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Category :</span>
                                                    <select name="blogCatId" class="form-control pro-edt-select form-control-primary">
                                                    <?php 
                                                        $blogCat = new BlogCategory();
                                                        $getBlogCat = $blogCat->getAllBlogCat();
                                                        if ($getBlogCat) {
                                                            $i = 0;
                                                            while ( $result = $getBlogCat->fetch_assoc()) {
                                                                $i++;
                                                    ?>	
                                                    <option <?php if ($value['blogCatId'] == $result['blogCatId'] ) { ?>  selected = "selected" <?php } ?>  value="<?php echo $result['blogCatId']; ?>"><?php echo $result['blog_category_name'] ?></option>
                                                    <?php } } ?>
                                                    </select>
                                                </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Post Type :</span>
                                                            <select id="select" name="type" class="form-control pro-edt-select form-control-primary">
                                                                <option>Post Type</option>
                                                                <?php if ($value['type'] == 0) { ?>
                                                                <option selected = "selected" value="0">General</option>    
                                                                <option value="1">Sticky</option>
                                                                <option value="2">Featured</option>
                                                                <option value="3">Popular</option>
                                                                <?php  } elseif ($value['type'] == 1){ ?>
                                                                <option selected = "selected" value="1">Sticky</option>  
                                                                <option value="0">General</option>
                                                                <option value="2">Featured</option>
                                                                <option value="3">Popular</option>
                                                                <?php  } elseif ($value['type'] == 2){ ?>
                                                                <option selected = "selected" value="2">Featured</option>  
                                                                <option value="0">General</option>
                                                                <option value="1">Sticky</option>
                                                                <option value="3">Popular</option> 
                                                                <?php  } elseif ($value['type'] == 2){ ?>
                                                                <option selected = "selected" value="3">Popular</option>  
                                                                <option value="0">General</option>
                                                                <option value="1">Sticky</option>
                                                                <option value="2">Featured</option>
                                                                <?php  } ?>
                                                           </select>
                                                   </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">Tags :</span>
                                                      <input type="text" name="tags" class="form-control" value="<?php echo $value['tags']; ?>">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon">Author :</span>                                                       
                                                        <input type="text" name="author" readonly value="<?php echo Session::get('nicename'); ?>" class="form-control rdonly" />
                                                        <input type="hidden" name="userId" value="<?php echo Session::get('userId'); ?>" class="form-control" />
                                                </div>
                                                <div class="dropzone-pro mg-tb-30">
                                                    <span class="input-group-addon">Feature Image</span>
                                                      <img src="<?php echo $value['image']; ?>" height="200px" width="200px"/><br/>
                                                      <input type="file" name="image" class="p-image"/>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="text-center custom-pro-edt-ds">
                                                            <button type="submit" name="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update</button>
                                                            <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard</button>
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
