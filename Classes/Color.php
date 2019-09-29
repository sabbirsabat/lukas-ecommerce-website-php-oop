<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>


<?php

class Color{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for color insert
     */
    public function colorInsert($colorName, $body){
        $colorName = $this->fm->validation($colorName);
        $body = $this->fm->validation($body);
        $colorName =mysqli_real_escape_string( $this->db->link, $colorName);
        $body =mysqli_real_escape_string( $this->db->link, $body);

        if (empty($colorName || $body)) {
            $msg = "<span class='error'>Color & Description field must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_color(colorName, body) VALUES('$colorName','$body')";
            $colorinsert = $this->db->insert($query);
            if ( $colorinsert) {
                $msg = "<span class='success'>Color Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Color Not Inserted!</span>";
                return $msg;
            } 
        }
    }

    /**
     * Method for show color list
     */
    public function getAllColor(){
        $query  = "SELECT * FROM tbl_color ORDER BY colorId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing edit color value
     */
    public function getColorById($id){
        $query  = "SELECT * FROM tbl_color WHERE colorId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for color update
     */
    public function colorUpdate($colorName,$body, $id){
        $colorName = $this->fm->validation($colorName);
        $body      = $this->fm->validation($body);
        $colorName = mysqli_real_escape_string( $this->db->link, $colorName);
        $body      = mysqli_real_escape_string( $this->db->link, $body);
        $id        = mysqli_real_escape_string( $this->db->link, $id);
    
        if (empty($colorName || $body)) {
            $msg = "<span class='error'>Color field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_color SET 
                colorName = '$colorName',
                body      = '$body'
                WHERE  colorId = '$id'";              
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Color Updated Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Color Not Updated !</span>";
                return $msg;
            } 
        }
    }

  
      /**
     * Method for Color delete
     */
    public function delColorById($id){
        $query   = "DELETE  FROM tbl_color WHERE colorId = '$id' ";
        $delColor = $this->db->delete($query);
        if ($delColor) {
            $msg = "<span class='success'>Color Deleted.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>Color Not Deleted !</span>";
            return $msg;
        }
    } 

}

?>