<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Media{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for media insert
     */
    public function mediaInsert( $data, $file){ 
//        $mediaTitle = $this->fm->validation($data['mediaTitle']);
//        $image      = $this->fm->validation($data['image']);
//        
//        $mediaTitle = mysqli_real_escape_string( $this->db->link, $data['mediaTitle']);
//        $image      = mysqli_real_escape_string( $this->db->link, $data['image']);
    
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
 
         if ($file_size >1048567) {
            $msg = "<span class='error'>Image size should be less than 1 MB!</span>";
            return $msg;
         
         } elseif (in_array($file_ext, $permited) === false) {        
             $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
             return $msg;
 
         } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_media ( image ) VALUES( '$uploaded_image' )";
            $inserted_rows = $this->db->insert($query);
         }      
    }


    /**
     * Method for showing product list
     */
    public function getMedia(){   
        $query  = "SELECT * FROM tbl_media ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing Edit Value 
     */
    public function getProById($id){     
        $query  = "SELECT * FROM tbl_product WHERE productId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }



    /**
     * Method for product delete
     */

    public function delProById($id){
        $query   = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $getData = $this->db->select($query);
            if ($getData) {
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Product Deleted successfully.');</script>";
            echo "<script> window.location = 'productlist.php'; </script>";
            } else {
            echo "<script> alert('Product not deleted !');</script>";
            echo "<script> window.location = 'productlist.php'; </script>";
        }
    }

   
}
