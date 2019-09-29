<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Slider{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for slider insert
     */
    public function sliderInsert( $data, $file ){ 
        $slider_title = $this->fm->validation($data['slider_title']);
        $slider_body  = $this->fm->validation($data['slider_body']);
        $button_text  = $this->fm->validation($data['button_text']);
        $button_link  = $this->fm->validation($data['button_link']);
         
        $slider_title = mysqli_real_escape_string( $this->db->link, $data['slider_title']);
        $slider_body  = mysqli_real_escape_string( $this->db->link, $data['slider_body']);
        $button_text  = mysqli_real_escape_string( $this->db->link, $data['button_text']);
        $button_link  = mysqli_real_escape_string( $this->db->link, $data['button_link']);
       
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
 
         if (empty( $slider_title  || $slider_body  || $button_text  || $button_link  ||  $file_name )) {
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
            $query = "INSERT INTO tbl_slider (slider_title, slider_body, button_text, button_link, image) VALUES( '$slider_title' ,'$slider_body' ,'$button_text' ,'$button_link' ,'$uploaded_image' )";
            $inserted_rows = $this->db->insert($query);
 
            if ($inserted_rows) {
                $msg = "<span class='success'>Slider Published.</span>"; 
                return $msg; 
            } else {
                $msg = "<span class='error'>Slider Not Published !</span>";
                return $msg;
            }            
         }      
    }


    /**
     * Method for Slider list
     */
    public function getAllSlider(){ 
        $query  = "SELECT * FROM tbl_slider";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing Product Edit Value 
     */
    public function getSliderById($id){     
        $query  = "SELECT * FROM tbl_slider WHERE sliderId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for slider update
     */
    public function sliderUpdate(  $data, $file, $id){       
        $slider_title = $this->fm->validation($data['slider_title']);
        $slider_body  = $this->fm->validation($data['slider_body']);
        $button_text  = $this->fm->validation($data['button_text']);
        $button_link  = $this->fm->validation($data['button_link']);
         
        $slider_title = mysqli_real_escape_string( $this->db->link, $data['slider_title']);
        $slider_body  = mysqli_real_escape_string( $this->db->link, $data['slider_body']);
        $button_text  = mysqli_real_escape_string( $this->db->link, $data['button_text']);
        $button_link  = mysqli_real_escape_string( $this->db->link, $data['button_link']);
     
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
 
         if (empty( $slider_title  || $slider_body  || $button_text  || $button_link  ||  $file_name )) {
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
                    $query = "UPDATE tbl_slider
                                SET  
                                slider_title  = '$slider_title',
                                slider_body   = '$slider_body',
                                button_text   = '$button_text',
                                button_link   = '$button_link',
                                image         = '$uploaded_image'
                             WHERE sliderId = '$id'"; 
                    $updated_rows = $this->db->update($query);          
        
                    if ($updated_rows) {
                        $msg = "<span class='success'>Slider Updated.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Slider Not Updated !</span>";
                        return $msg;
                    }            
                }
              }  else {
                    $query = "UPDATE tbl_slider
                               SET  
                                slider_title  = '$slider_title',
                                slider_body   = '$slider_body',
                                button_text   = '$button_text',
                                button_link   = '$button_link'                             
                             WHERE sliderId = '$id'"; 
                    
                $updated_rows = $this->db->update($query);          

                if ($updated_rows) {
                    $msg = "<span class='success'>Slider Updated.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'>Slider Not Updated !</span>";
                    return $msg;
                }    
             }
         }
    }

    /**
     * Method for slider delete
     */

    public function delSliderById($id){
        $query   = "SELECT * FROM tbl_slider WHERE sliderId = '$id'";
        $getData = $this->db->select($query);
            if ($getData) {
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM tbl_slider WHERE sliderId = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Slider Deleted successfully.');</script>";
            echo "<script> window.location = 'slider-list.php'; </script>";
            } else {
            echo "<script> alert('Slider not deleted !');</script>";
            echo "<script> window.location = 'slider-list.php'; </script>";
        }
    }
    
       
    //Front View Code Start
     

    /**
     * Method for front view Slider 
     */
    public function getFrontSlider(){
        $query  = "SELECT * FROM tbl_slider ORDER BY sliderId LIMIT 5";
        $result = $this->db->select($query);
        return $result;
     }
    

   
}
