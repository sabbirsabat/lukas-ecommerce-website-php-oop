<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Blog{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for blog insert
     */
    public function blogInsert( $data, $file){ 
        $blogCatId = $this->fm->validation($data['blogCatId']);
        $title     = $this->fm->validation($data['title']);
        $body      = $this->fm->validation($data['body']);
        $author    = $this->fm->validation($data['author']);
        $tags      = $this->fm->validation($data['tags']);
        $type      = $this->fm->validation($data['type']);  
        $userId    = $this->fm->validation($data['userId']);       
   
        $blogCatId = mysqli_real_escape_string( $this->db->link, $data['blogCatId']);
        $title     = mysqli_real_escape_string( $this->db->link, $data['title']);
        $body      = mysqli_real_escape_string( $this->db->link, $data['body']);
        $author    = mysqli_real_escape_string( $this->db->link, $data['author']);
        $tags      = mysqli_real_escape_string( $this->db->link, $data['tags']);
        $type      = mysqli_real_escape_string( $this->db->link, $data['type']);          
        $userId    = mysqli_real_escape_string( $this->db->link, $data['userId']);
    
         //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name = $file['image']['name'];
         $file_size = $file['image']['size'];
         $file_temp = $file['image']['tmp_name'];
 
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "upload/".$unique_image;
         //  < /image upload >   
 
         if (empty( $blogCatId || $title || $body || $author || $tags || $type || $file_name || $userId )) {
             $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
 
         } elseif ($file_size >1048567) {
            $msg = "<span class='error'>Image size should be less than 1 MB!</span>";
            return $msg;
         
         } elseif (in_array($file_ext, $permited) === false) {        
             $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
             return $msg;
 
         } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_blog ( blogCatId, title, body, author, tags, type, image, userId ) VALUES( '$blogCatId' ,'$title' ,'$body' ,'$author' ,'$tags' ,'$type' ,'$uploaded_image', '$userId' )";
            $inserted_rows = $this->db->insert($query);
 
            if ($inserted_rows) {
                $msg = "<span class='success'>Blog Published.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'>Blog Not Published !</span>";
                return $msg;
            }            
         }      
    }


    /**
     * Method for Join Query showing blog list
     */
    public function getAllBlog(){ 
        $query  = "SELECT tbl_blog.*,
                    tbl_blog_category.blog_category_name
                    FROM tbl_blog
                    INNER JOIN tbl_blog_category
                    ON tbl_blog.blogCatId = tbl_blog_category.blogCatId                 
                    ORDER BY tbl_blog.id ASC"; 
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing blog Edit Value 
     */
    public function getBlogById($id){     
        $query  = "SELECT * FROM tbl_blog WHERE id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for blog update
     */
    public function blogUpdate(  $data, $file, $id){       
        $blogCatId = $this->fm->validation($data['blogCatId']);
        $title     = $this->fm->validation($data['title']);
        $body      = $this->fm->validation($data['body']);
        $author    = $this->fm->validation($data['author']);
        $tags      = $this->fm->validation($data['tags']);
        $type      = $this->fm->validation($data['type']);  
        $userId    = $this->fm->validation($data['userId']);       
   
        $blogCatId = mysqli_real_escape_string( $this->db->link, $data['blogCatId']);
        $title     = mysqli_real_escape_string( $this->db->link, $data['title']);
        $body      = mysqli_real_escape_string( $this->db->link, $data['body']);
        $author    = mysqli_real_escape_string( $this->db->link, $data['author']);
        $tags      = mysqli_real_escape_string( $this->db->link, $data['tags']);
        $type      = mysqli_real_escape_string( $this->db->link, $data['type']);          
        $userId    = mysqli_real_escape_string( $this->db->link, $data['userId']);

         //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name = $file['image']['name'];
         $file_size = $file['image']['size'];
         $file_temp = $file['image']['tmp_name'];
 
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "upload/".$unique_image;
         //  < /image upload >   
 
         if (empty( $blogCatId || $title || $body || $author || $tags || $type || $file_name || $userId )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
           return $msg;
 
         } else {         
             if (!empty($file_name) ) {

                if ($file_size >1048567) {
                    $msg = "<span class='error'>Image size should be less than 1 MB!</span>";
                    return $msg;
                
                } elseif (in_array($file_ext, $permited) === false) {        
                    $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $msg;
        
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);        
                    $query = "UPDATE tbl_blog
                                SET  
                                blogCatId = '$blogCatId',
                                title     = '$title',
                                body      = '$body',
                                author    = '$author',
                                tags      = '$tags',
                                type      = '$type',
                                image     = '$uploaded_image',
                                userId    = '$userId'
                              WHERE id = '$id'"; 
                    $updated_rows = $this->db->update($query);          
        
                    if ($updated_rows) {
                        $msg = "<span class='success'>Blog Updated.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Blog Not Updated !</span>";
                        return $msg;
                    }            
                }
              }  else {
                    $query = "UPDATE tbl_blog
                                SET  
                                blogCatId = '$blogCatId',
                                title     = '$title',
                                body      = '$body',
                                author    = '$author',
                                tags      = '$tags',
                                type      = '$type',
                                userId    = '$userId'
                              WHERE id = '$id'"; 
                $updated_rows = $this->db->update($query);          

                if ($updated_rows) {
                    $msg = "<span class='success'>Blog Updated.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'>Blog Not Updated !</span>";
                    return $msg;
                }    
             }
         }
    }

    /**
     * Method for blog delete
     */

    public function delBlogById($id){
        $delquery = "DELETE FROM tbl_blog WHERE id = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Blog Deleted successfully.');</script>";
            echo "<script> window.location = 'blog-list.php'; </script>";
            } else {
            echo "<script> alert('Blog not deleted !');</script>";
            echo "<script> window.location = 'blog-list.php'; </script>";
        }
    }

   
    //Front View Code Start ===========================================================================//
     

    
    /**
     * Method for front view All Blog Post for BLOG.PHP
     */
    public function getAllBlogPost(){
        $query  = "SELECT * FROM tbl_blog ORDER BY id";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view Recent Post for blog SIDEBAR.PHP
     */
    public function getSomeBlogPost(){
        $query  = "SELECT * FROM tbl_blog ORDER BY id ASC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view feature blog
     */
    public function getFeturedBlog(){
        $query  = "SELECT * FROM tbl_blog WHERE type='0' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view single/details blog
     */
    public function getSingleBlog($id){        
        $query = "SELECT b.*, c.blog_category_name, u.role
                  FROM tbl_blog as b, tbl_blog_category as c, tbl_admin as u
                  WHERE b.blogCatId = c.blogCatId AND b.userId = u.role AND b.id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Blog by Category
     */
    public function blogByCat($id){
        $blogCatId  = mysqli_real_escape_string( $this->db->link, $id);
        $query  = "SELECT * FROM tbl_blog WHERE blogCatId = '$blogCatId'";
        $result = $this->db->select($query);
        return $result;
    }

}