<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Page{
    
    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for page insert
     */
    public function pageInsert( $data, $file ){ 
        $name = $this->fm->validation($data['name']);
        $body  = $this->fm->validation($data['body']);
        $author  = $this->fm->validation($data['author']);

        $name = mysqli_real_escape_string( $this->db->link, $data['name']);
        $body  = mysqli_real_escape_string( $this->db->link, $data['body']);
        $author  = mysqli_real_escape_string( $this->db->link, $data['author']);

         if (empty( $name  || $body || $author )) {
             $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
 
         } else {
            $query = "INSERT INTO tbl_page (name, body, author) VALUES( '$name', '$body', '$author' )";
            $inserted_rows = $this->db->insert($query);
 
            if ($inserted_rows) {
                $msg = "<span class='success'>Page Published.</span>"; 
                return $msg; 
            } else {
                $msg = "<span class='error'>Page Not Published !</span>";
                return $msg;
            }            
         }      
    }


    /**
     * Method for page list
     */
    public function getAllPage(){ 
        $query  = "SELECT * FROM tbl_page";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing page Edit Value 
     */
    public function getPageById($id){     
        $query  = "SELECT * FROM tbl_page WHERE pageId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for page update
     */
    public function pageUpdate(  $data, $file, $id){       
        $name = $this->fm->validation($data['name']);
        $body  = $this->fm->validation($data['body']);
        $author  = $this->fm->validation($data['author']);
         
        $name = mysqli_real_escape_string( $this->db->link, $data['name']);
        $body  = mysqli_real_escape_string( $this->db->link, $data['body']);
        $author  = mysqli_real_escape_string( $this->db->link, $data['author']);
     
         if (empty( $name  || $body || $author )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
           return $msg;

         } else {      

            $query = "UPDATE tbl_page
                        SET  
                        name    = '$name',
                        body    = '$body',                     
                        author  = '$author'               
                        WHERE pageId = '$id'"; 
            $updated_rows = $this->db->update($query);          

            if ($updated_rows) {
                $msg = "<span class='success'>Page Updated.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'>Page Not Updated !</span>";
                return $msg;
            }            
        }
    }
         
   

    /**
     * Method for page delete
     */

    public function delPageById($id){
        $delquery = "DELETE FROM tbl_page WHERE pageId = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Page Deleted successfully.');</script>";
            echo "<script> window.location = 'page-list.php'; </script>";
            } else {
            echo "<script> alert('Page not deleted !');</script>";
            echo "<script> window.location = 'page-list.php'; </script>";
        }
    }

   
}
