<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>


<?php

class Brand{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for brand insert
     */
    public function brandInsert($brandName, $body){
        $brandName = $this->fm->validation($brandName);
        $body = $this->fm->validation($body);
        $brandName =mysqli_real_escape_string( $this->db->link, $brandName);
        $body =mysqli_real_escape_string( $this->db->link, $body);

        if (empty($brandName || $body)) {
            $msg = "<span class='error'>Brand & Description field must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_brand(brandName, body) VALUES('$brandName','$body')";
            $brandinsert = $this->db->insert($query);
            if ( $brandinsert) {
                $msg = "<span class='success'>Brand Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Brand Not Inserted!</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for show brand list
     */
    public function getAllBrand(){
        $query  = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing edit brand value
     */
    public function getBrandById($id){
        $query  = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for brand update
     */
    public function brandUpdate($brandName,$body, $id){
        $brandName = $this->fm->validation($brandName);
        $body      = $this->fm->validation($body);
        $brandName = mysqli_real_escape_string( $this->db->link, $brandName);
        $body      = mysqli_real_escape_string( $this->db->link, $body);
        $id        = mysqli_real_escape_string( $this->db->link, $id);
    
        if (empty($brandName || $body)) {
            $msg = "<span class='error'>Brand field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_brand SET 
                brandName = '$brandName',
                body      = '$body'
                WHERE  brandId = '$id'";              
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Brand Updated Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Brand Not Updated !</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for brand delete
     */
    public function delBrandById($id){
        $query   = "DELETE  FROM tbl_brand WHERE brandId = '$id' ";
        $delBrand = $this->db->delete($query);
        if ($delBrand) {
            $msg = "<span class='success'>Brand Deleted.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>Brand Not Deleted !</span>";
            return $msg;
        }
    }

}

?>