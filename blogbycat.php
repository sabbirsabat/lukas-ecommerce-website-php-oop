<?php include 'inc/header.php'; ?>

<?php
 if (!isset($_GET['blogCatId']) || $_GET['blogCatId'] == NULL) {
    echo "<script>window.location = '404.php'; </script>"; 
 } else {
     $id = $_GET['blogCatId'];
 }
 ?>

<!--== Start Page Header Area ==-->
<div class="page-header-wrap bg-img" data-bg="assets/img/bg/page-header-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <div class="page-header-content-inner">
                        <h1>Blog</h1>

                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="current"><a href="#">Blog By Category</a></li>
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
    <div class="blog-page-content-wrap">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-content-wrapper">
                        <div class="row mtn-25">

                            <?php
                            /**
                            * All Blog Method call
                            */
                                $blgByCat = $blog->blogByCat($id);
                                if ($blgByCat) {
                                    while ($result = $blgByCat->fetch_assoc()) { 
                            ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="blog-item">
                                    <figure class="blog-item__thumb">
                                        <a href="blog-details.php?blogid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" /></a>
                                    </figure>
                                    <div class="blog-item__info">
                                        <div class="post-date">
                                            <span><?php echo $fm->formatOnlyDate($result['date']); ?></span>
                                            <span><?php echo $fm->formatOnlyMonth($result['date']); ?></span>
                                        </div>
                                        <div class="post-meta">
                                            <span class="author">Author: <a href="blog-details.php" rel="author"><?php echo $result['author']; ?></a></span>
                                            <span class="comment">Comments: <a href="blog-details.php?blogid=<?php echo $result['Id']; ?>" rel="author"><?php echo $result['comments']; ?></a></span>
                                        </div>
                                        <h2 class="post-title"><a href="blog-details.php?blogid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
                                        <p class="post-excerpt"><?php echo $fm->textShorten($result['body'],100); ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php } }else {
                              echo "There are no post in this category";
                            } ?>
                        </div>
                    </div>

                    <nav class="pagination-wrap mt-70 mt-md-50 mt-sm-35">
                        <ul class="pagination pagination--2 justify-content-center">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-chevron-right"></i></a></li>
                        </ul>
                    </nav>
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
