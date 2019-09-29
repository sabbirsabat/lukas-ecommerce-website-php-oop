<?php include 'inc/addjust.php'; ?>   
<?php include '../Classes/Blog.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$blog = new Blog();
$fm = new Format();

if (isset($_GET['delblg'])) {
	 $id = $_GET['delblg'];
	 $delBlog = $blog->delBlogById($id);
}
?>

  <div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Blog List</h4>
                            <?php
                            // Delete Blog Message
                                if (isset( $delBlog )) {
                                    echo $delBlog;
                                }
                            ?> 
                            <div class="add-product">
                                <a href="blog-add.php">Add Blog Post</a>
                            </div>
                            <table>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="25%">Blog Title</th>
                                    <th width="10%">Author</th>
                                    <th width="10%">Categories</th>
                                    <th width="10%">Tags</th>
                                    <th width="5%">Comments</th>                                  
                                    <th width="10%">Type</th>                                  
                                    <th width="15%">Date</th>
                                    <th width="10%">Setting</th>
                                </tr>
                                <?php 
                                // show all blog method call
                                    $getBlog = $blog->getAllBlog();
                                    if ($getBlog) {
                                        $i = 0;
                                        while ( $result = $getBlog->fetch_assoc()) {
                                            $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['title']; ?></td>
                                    <td><?php echo $result['author']; ?></td>
                                    <td><?php echo $result['blog_category_name']; ?></td>                                                                 
                                    <td><?php echo $result['tags']; ?></td>                                                                                                                                                        
                                    <td><?php echo $result['comments']; ?></td>                                                                                                                                                                                                                      
                                    <td class="center"> 
                                        <?php 
                                        if ($result['type'] == '0') {
                                        echo "General";
                                        }elseif ($result['type'] == '1') {
                                        echo "Sticky";
                                        }elseif ($result['type'] == '2') {
                                        echo "Featured";
                                        }elseif ($result['type'] == '3') {
                                        echo "Popular";
                                        } ?>
                                    </td>                                                                                                                                                                                     
                                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                                    <td>
                                        <a href="blog-edit.php?blgeditid=<?php echo $result['id']; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <a onclick="return confirm('Are you sure delete this post ?')" href="?delblg=<?php echo $result['id']; ?>"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                             <?php } } ?>
                            </table>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <?php include 'inc/footer.php'; ?>   