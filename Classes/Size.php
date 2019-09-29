<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>


<?php

class Size{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for size insert
     */
    public function sizeInsert($sizeName, $body){
        $sizeName = $this->fm->validation($sizeName);
        $body = $this->fm->validation($body);
        $sizeName =mysqli_real_escape_string( $this->db->link, $sizeName);
        $body =mysqli_real_escape_string( $this->db->link, $body);

        if (empty($sizeName || $body)) {
            $msg = "<span class='error'>size & Description field must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_size(sizeName, body) VALUES('$sizeName','$body')";
            $sizeinsert = $this->db->insert($query);
            if ( $sizeinsert) {
                $msg = "<span class='success'>Size Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Size Not Inserted!</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for show size list
     */
    public function getAllSize(){
        $query  = "SELECT * FROM tbl_size ORDER BY sizeId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing edit size value
     */
    public function getSizeById($id){
        $query  = "SELECT * FROM tbl_size WHERE sizeId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for size update
     */
    public function sizeUpdate($sizeName,$body, $id){
        $sizeName = $this->fm->validation($sizeName);
        $body      = $this->fm->validation($body);
        $sizeName = mysqli_real_escape_string( $this->db->link, $sizeName);
        $body      = mysqli_real_escape_string( $this->db->link, $body);
        $id        = mysqli_real_escape_string( $this->db->link, $id);
    
        if (empty($sizeName || $body)) {
            $msg = "<span class='error'>Size field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_size SET 
                sizeName = '$sizeName',
                body      = '$body'
                WHERE  sizeId = '$id'";              
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Size Updated Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Size Not Updated !</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for size delete
     */
    public function delSizeById($id){
        $query   = "DELETE  FROM tbl_size WHERE sizeId = '$id' ";
        $delSize = $this->db->delete($query);
        if ($delSize) {
            $msg = "<span class='success'>Size Deleted.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>Size Not Deleted !</span>";
            return $msg;
        }
    }

}

?>