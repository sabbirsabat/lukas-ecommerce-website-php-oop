<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Banner{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for banner insert
     */
    public function bannerInsert( $data, $file ){ 
        $banner_title  = $this->fm->validation($data['banner_title']);
        $banner_body   = $this->fm->validation($data['banner_body']);
        $banner_type = $this->fm->validation($data['banner_type']);
        $button_text   = $this->fm->validation($data['button_text']);
        $button_link   = $this->fm->validation($data['button_link']);
         
        $banner_title  = mysqli_real_escape_string( $this->db->link, $data['banner_title']);
        $banner_body   = mysqli_real_escape_string( $this->db->link, $data['banner_body']);
        $banner_type = mysqli_real_escape_string( $this->db->link, $data['banner_type']);
        $button_text   = mysqli_real_escape_string( $this->db->link, $data['button_text']);
        $button_link   = mysqli_real_escape_string( $this->db->link, $data['button_link']);
       
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
 
         if (empty( $banner_title  || $banner_body || $banner_type  || $button_text  || $button_link  ||  $file_name )) {
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
            $query = "INSERT INTO tbl_banner (banner_title, banner_body, banner_type, button_text, button_link, image) VALUES( '$banner_title', '$banner_body', '$banner_type', '$button_text', '$button_link', '$uploaded_image' )";
            $inserted_rows = $this->db->insert($query);
 
            if ($inserted_rows) {
                $msg = "<span class='success'>Banner Published.</span>"; 
                return $msg; 
            } else {
                $msg = "<span class='error'>Banner Not Published !</span>";
                return $msg;
            }            
         }      
    }


    /**
     * Method for Banner list
     */
    public function getAllBanner(){ 
        $query  = "SELECT * FROM tbl_banner";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing Banner Edit Value 
     */
    public function getBannerById($id){     
        $query  = "SELECT * FROM tbl_banner WHERE bannerId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for banner update
     */
    public function bannerUpdate(  $data, $file, $id){       
        $banner_title  = $this->fm->validation($data['banner_title']);
        $banner_body   = $this->fm->validation($data['banner_body']);
        $banner_type = $this->fm->validation($data['banner_type']);
        $button_text   = $this->fm->validation($data['button_text']);
        $button_link   = $this->fm->validation($data['button_link']);
         
        $banner_title  = mysqli_real_escape_string( $this->db->link, $data['banner_title']);
        $banner_body   = mysqli_real_escape_string( $this->db->link, $data['banner_body']);
        $banner_type = mysqli_real_escape_string( $this->db->link, $data['banner_type']);
        $button_text   = mysqli_real_escape_string( $this->db->link, $data['button_text']);
        $button_link   = mysqli_real_escape_string( $this->db->link, $data['button_link']);
     
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
 
         if (empty( $banner_title  || $banner_body || $banner_type  || $button_text  || $button_link  ||  $file_name )) {
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
                    $query = "UPDATE tbl_banner
                                SET  
                                banner_title  = '$banner_title',
                                banner_body   = '$banner_body',
                                banner_type = '$banner_type',
                                button_text   = '$button_text',
                                button_link   = '$button_link',
                                image         = '$uploaded_image'
                             WHERE bannerId = '$id'"; 
                    $updated_rows = $this->db->update($query);          
        
                    if ($updated_rows) {
                        $msg = "<span class='success'>Banner Updated.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Banner Not Updated !</span>";
                        return $msg;
                    }            
                }
              }  else {
                    $query = "UPDATE tbl_banner
                               SET  
                                banner_title  = '$banner_title',
                                banner_body   = '$banner_body',
                                banner_type = '$banner_type',
                                button_text   = '$button_text',
                                button_link   = '$button_link'                             
                             WHERE bannerId = '$id'"; 
                    
                $updated_rows = $this->db->update($query);          

                if ($updated_rows) {
                    $msg = "<span class='success'>Banner Updated.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'>Banner Not Updated !</span>";
                    return $msg;
                }    
             }
         }
    }

    /**
     * Method for banner delete
     */

    public function delBannerById($id){
        $query   = "SELECT * FROM tbl_banner WHERE bannerId = '$id'";
        $getData = $this->db->select($query);
            if ($getData) {
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM tbl_banner WHERE bannerId = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Banner Deleted successfully.');</script>";
            echo "<script> window.location = 'banner-list.php'; </script>";
            } else {
            echo "<script> alert('Banner not deleted !');</script>";
            echo "<script> window.location = 'banner-list.php'; </script>";
        }
    }
    
       
    //Front View Code Start ======================================================================//
     

    /**
     * Method for Category Banner 
     */
    public function getCategoryBanner(){
        $query  = "SELECT * FROM tbl_banner WHERE banner_type='0' ORDER BY bannerId ASC LIMIT 6";
        $result = $this->db->select($query);
        return $result;
     }


    /**
     * Method for Promotion Banner 
     */
    public function getPromotionBanner(){
        $query  = "SELECT * FROM tbl_banner WHERE banner_type='1' ORDER BY bannerId ASC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
     }


    /**
     * Method for Call To Action (CTA) Banner 
     */
    public function getCtaBanner(){
        $query  = "SELECT * FROM tbl_banner WHERE banner_type='2' ORDER BY bannerId ASC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
     }


    /**
     * Method for Flash Deals Banner 
     */
    public function getFlashDealsBanner(){
        $query  = "SELECT * FROM tbl_banner WHERE banner_type='3' ORDER BY bannerId ASC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
     }
    

   
}
