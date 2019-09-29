<?php include 'inc/header.php'; ?>

<?php
	if (isset($_GET['blogid'])) {		
		$id = $_GET['blogid'];
	}
?>
<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Blog Details With Sidebar</h1>

                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li class="current"><a href="#">Blog Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Header Area ==-->

<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="blog-details-page-wrapper">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-9">
                    <?php  
                        /**
                         *Show Single Blog Post
                         */
                          $getSinglBlog = $blog->getSingleBlog($id);
                          if ($getSinglBlog) {
                            while ($result = $getSinglBlog->fetch_assoc()) { 
                      ?>
                    <article class="blog-post-details">
                        <figure class="blog-post-thumb">
                            <img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" />
                        </figure>

                        <section class="blog-post-txt-wrap">
                            <div class="blog-post-txt">
                                <h2><?php echo $result['title']; ?></h2>
                                <p><?php echo $result['body']; ?></p>

                            </div>

                            <div class="share-article text-center">
                                <h6>Share this article</h6>
                                <div class="share-icons nav justify-content-center">
                                    <a class="facebook" href="#"><i class="ion-social-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="ion-social-twitter"></i></a>
                                    <a class="reddit" href="#"><i class="ion-social-reddit"></i></a>
                                    <a class="pinterest" href="#"><i class="ion-social-pinterest"></i></a>
                                </div>
                            </div>

                            <!-- Start Comment Area Wrapper -->
                            <div class="comment-area-wrapper">
                                <div class="comments-view-area">
                                    <h3>Comments (5)</h3>
                                    <div class="single-comment-wrap d-flex">
                                        <figure class="author-thumb">
                                            <a href="#"><img src="assets/img/extra/author-1.jpg" alt="Author"></a>
                                        </figure>
                                        <div class="comments-info">
                                            <p class="m-0">Praesent bibendum risus pellentesque faucibus
                                                rhoncus.
                                                Etiam a mollis
                                                odio. Integer urna nisl, fermentum eu mollis et, gravida eu
                                                elit.</p>
                                            <div class="comment-footer mt-8 d-flex justify-content-between">
                                                <a href="#" class="author"><strong>Duy</strong> - July 30, 2018</a>
                                                <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-comment-wrap comment-reply d-flex">
                                        <figure class="author-thumb">
                                            <a href="#"><img src="assets/img/extra/author-2.jpg" alt="Author"></a>
                                        </figure>
                                        <div class="comments-info">
                                            <p class="m-0">Praesent bibendum risus pellentesque faucibus
                                                rhoncus.
                                                Etiam a mollis
                                                odio. Integer urna nisl, fermentum eu mollis et, gravida eu
                                                elit.</p>
                                            <div class="comment-footer d-flex justify-content-between">
                                                <a href="#" class="author"><strong>Deo</strong> - July 30, 2018</a>
                                                <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-comment-wrap d-flex">
                                        <figure class="author-thumb">
                                            <a href="#"><img src="assets/img/extra/author-1.jpg" alt="Author"></a>
                                        </figure>
                                        <div class="comments-info">
                                            <p class="m-0">Praesent bibendum risus pellentesque faucibus
                                                rhoncus.
                                                Etiam a mollis
                                                odio. Integer urna nisl, fermentum eu mollis et, gravida eu
                                                elit.</p>
                                            <div class="comment-footer d-flex justify-content-between">
                                                <a href="#" class="author"><strong>Alex</strong> - July 30, 2018</a>
                                                <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-comment-wrap d-flex">
                                        <figure class="author-thumb">
                                            <a href="#"><img src="assets/img/extra/author-2.jpg" alt="Author"></a>
                                        </figure>
                                        <div class="comments-info">
                                            <p class="m-0">Praesent bibendum risus pellentesque faucibus
                                                rhoncus.
                                                Etiam a mollis
                                                odio. Integer urna nisl, fermentum eu mollis et, gravida eu
                                                elit.</p>
                                            <div class="comment-footer d-flex justify-content-between">
                                                <a href="#" class="author"><strong>Afex</strong> - July 30, 2018</a>
                                                <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-comment-wrap comment-reply d-flex">
                                        <figure class="author-thumb">
                                            <a href="#"><img src="assets/img/extra/author-1.jpg" alt="Author"></a>
                                        </figure>
                                        <div class="comments-info">
                                            <p class="m-0">Praesent bibendum risus pellentesque faucibus
                                                rhoncus.
                                                Etiam a mollis
                                                odio. Integer urna nisl, fermentum eu mollis et, gravida eu
                                                elit.</p>
                                            <div class="comment-footer d-flex justify-content-between">
                                                <a href="#" class="author"><strong>Tuntuni</strong> - July 30,
                                                    2018</a>
                                                <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-box-form mt-50 mt-sm-35">
                                    <h3>Leave your thought</h3>
                                    <form action="#">
                                        <div class="row mtn-30">
                                            <div class="col-12">
                                                <div class="input-item">
                                                    <label for="comments" class="sr-only">comments</label>
                                                    <textarea name="comments" id="comments" cols="30" rows="5" placeholder="Write your Comment*" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-item">
                                                    <label for="name" class="sr-only">name</label>
                                                    <input type="text" id="name" placeholder="Name*" required />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-item">
                                                    <label for="email" class="sr-only">Email</label>
                                                    <input type="email" id="email" placeholder="Email*" required />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-item ">
                                                    <label for="url" class="sr-only">Website Url</label>
                                                    <input type="url" id="url" placeholder="Website" />
                                                </div>
                                            </div>

                                            <div class="col-12 mt-40">
                                                <button class="btn btn-brand w-100">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </article>
                    <?php } }  ?>
                </div>

                <!--== start blog sidebar Area ==-->
                <?php include 'inc/sidebar/blog/sidebar.php'; ?>
                <!--== End blog sidebar Area ==-->
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<?php include 'inc/footer.php'; ?>
