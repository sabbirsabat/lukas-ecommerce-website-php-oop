<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class BlogCategory{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for blog category insert
     */
    public function blogCatInsert( $blog_category_name, $body){
        $blog_category_name = $this->fm->validation($blog_category_name);
        $body               = $this->fm->validation($body);

        $blog_category_name = mysqli_real_escape_string( $this->db->link, $blog_category_name);
        $body               = mysqli_real_escape_string( $this->db->link, $body);

        if (empty($blog_category_name || $body)) {
            $msg = "<span class='error'>Category field must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_blog_category(blog_category_name, body) VALUES('$blog_category_name', '$body')";
            $catinsert = $this->db->insert($query);
            if ( $catinsert) {
                $msg = "<span class='success'>Category Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Inserted!</span>";
                return $msg;
            } 
        }
        
    }

    /**
     * Method for showing blog category list
     */
    public function getAllBlogCat(){
        $query  = "SELECT * FROM tbl_blog_category ORDER BY blogCatId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for edit category value
     */
    public function getBlogCatById($id){
        $query  = "SELECT * FROM tbl_blog_category WHERE blogCatId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for blog category update
     */
    public function blogCatUpdate($blog_category_name, $body, $id){
        $blog_category_name = $this->fm->validation($blog_category_name);
        $body    = $this->fm->validation($body);
        
        $blog_category_name = mysqli_real_escape_string( $this->db->link, $blog_category_name);
        $body    = mysqli_real_escape_string( $this->db->link, $body);

        $id      = mysqli_real_escape_string( $this->db->link, $id);
    
        if (empty($blog_category_name || $body)) {
            $msg = "<span class='error'>Category field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_blog_category 
                    SET 
                    blog_category_name = '$blog_category_name',
                    body               = '$body'
                    WHERE blogCatId    = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'>Category Updated Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Updated !</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for blog category delete
     */
    public function delBlogCatById($id){
        $query   = "DELETE  FROM tbl_blog_category WHERE blogCatId = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Category Deleted.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>Category Not Deleted !</span>";
            return $msg;
        }
    }

}

?>