<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Category{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for category insert
     */
    public function catInsert( $catName, $body){
        $catName = $this->fm->validation($catName);
        $catName =mysqli_real_escape_string( $this->db->link, $catName);

        if (empty($catName || $body)) {
            $msg = "<span class='error'>Category field must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_category(catName, body) VALUES('$catName', '$body')";
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
     * Method for showing category list
     */
    public function getAllCat(){
        $query  = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for edit category value
     */
    public function getCatById($id){
        $query  = "SELECT * FROM tbl_category WHERE catId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for  category update
     */
    public function catUpdate($catName, $body, $id){
        $catName = $this->fm->validation($catName);
        $body    = $this->fm->validation($body);
        
        $catName = mysqli_real_escape_string( $this->db->link, $catName);
        $body    = mysqli_real_escape_string( $this->db->link, $body);
        $id      = mysqli_real_escape_string( $this->db->link, $id);
    
        if (empty($catName || $body)) {
            $msg = "<span class='error'>Category field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_category 
                    SET 
                    catName = '$catName',
                    body    = '$body'
                    WHERE catId = '$id'";
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
     * Method for  category delete
     */
    public function delCatById($id){
        $query   = "DELETE  FROM tbl_category WHERE catId = '$id'";
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