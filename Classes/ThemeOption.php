<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class ThemeOption{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for title slug logo update
     */
    public function updateTitleLogo( $data, $file ){ 
        $title  = $this->fm->validation($data['title']); 
        $slogan = $this->fm->validation($data['slogan']);

        $title  = mysqli_real_escape_string( $this->db->link, $data['title']);
        $slogan = mysqli_real_escape_string( $this->db->link, $data['slogan']);
       
          //  < image upload >
          $permited  = array('png');
          $file_name = $_FILES['logo']['name'];
          $file_size = $_FILES['logo']['size'];
          $file_temp = $_FILES['logo']['tmp_name'];
  
          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $same_image = 'logo'.'.'.$file_ext;
          $uploaded_image = "upload/".$same_image;
          //  < /image upload >  
  
         if (empty( $title  || $slogan  )) {
             $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
 
         } else {         
            if (!empty($file_name) ) {

               if ($file_size >1048567) {
                   $msg = "<span class='error'>Logo size should be less than 1 MB!</span>";
                   return $msg;
               
               } elseif (in_array($file_ext, $permited) === false) {        
                   $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                   return $msg;
       
               } else {
                   move_uploaded_file($file_temp, $uploaded_image);        
                   $query = "UPDATE title_slogan
                               SET                       
                               title  = '$title',   
                               slogan = '$slogan',  
                               logo   = '$uploaded_image'                        
                               WHERE id  = '1'";   

                   $updated_rows = $this->db->update($query);                
                   if ($updated_rows) {
                       $msg = "<span class='success'>Info Updated.</span>"; 
                       return $msg;
                   } else {
                       $msg = "<span class='error'>Info Not Updated !</span>";
                       return $msg;
                   }            
               }
             }  else {
                $query = "UPDATE title_slogan
                            SET
                            title  = '$title',   
                            slogan = '$slogan'  
                            WHERE id = '1'";
                   
               $updated_rows = $this->db->update($query);          
               if ($updated_rows) {
                   $msg = "<span class='success'>Info Updated.</span>"; 
                   return $msg;
               } else {
                   $msg = "<span class='error'>Info Updated !</span>";
                   return $msg;
               }    
            }
        }    
    }

     /**
     * Method for showing Title Slogan Edit Value & Front View
     */
    public function getTitleSloganValue(){     
        $query = "SELECT * FROM title_slogan WHERE id ='1'";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for CTA insert
     */
    public function ctaUpdate( $data, $file ){ 
        $ctaTitleOne = $this->fm->validation($data['ctaTitleOne']); 
        $ctaBodyOne  = $this->fm->validation($data['ctaBodyOne']);

        $ctaTitleTwo = $this->fm->validation($data['ctaTitleTwo']); 
        $ctaBodyTwo  = $this->fm->validation($data['ctaBodyTwo']);

        $ctaTitleThree = $this->fm->validation($data['ctaTitleThree']); 
        $ctaBodyThree  = $this->fm->validation($data['ctaBodyThree']);
            
        $ctaTitleOne = mysqli_real_escape_string( $this->db->link, $data['ctaTitleOne']);
        $ctaBodyOne  = mysqli_real_escape_string( $this->db->link, $data['ctaBodyOne']);

        $ctaTitleTwo = mysqli_real_escape_string( $this->db->link, $data['ctaTitleTwo']);
        $ctaBodyTwo  = mysqli_real_escape_string( $this->db->link, $data['ctaBodyTwo']);

        $ctaTitleThree = mysqli_real_escape_string( $this->db->link, $data['ctaTitleThree']);
        $ctaBodyThree  = mysqli_real_escape_string( $this->db->link, $data['ctaBodyThree']);
      
       
         //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name_one = $file['ctaImageOne']['name'];
         $file_size = $file['ctaImageOne']['size'];
         $file_temp = $file['ctaImageOne']['tmp_name'];
 
         $div = explode('.', $file_name_one);
         $file_ext = strtolower(end($div));
         $same_image = 'ctaone'.'.'.$file_ext;
         $uploaded_image_one = "upload/".$same_image;
         //  < /image upload >   

         //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name_two = $file['ctaImageTwo']['name'];
         $file_size = $file['ctaImageTwo']['size'];
         $file_temp = $file['ctaImageTwo']['tmp_name'];
 
         $div = explode('.', $file_name_two);
         $file_ext = strtolower(end($div));
         $same_image = 'ctatwo'.'.'.$file_ext;
         $uploaded_image_two = "upload/".$same_image;
         //  < /image upload >  

         //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name_three = $file['ctaImageThree']['name'];
         $file_size = $file['ctaImageThree']['size'];
         $file_temp = $file['ctaImageThree']['tmp_name'];
 
         $div = explode('.', $file_name_three);
         $file_ext = strtolower(end($div));
         $same_image = 'ctathree'.'.'.$file_ext;
         $uploaded_image_three = "upload/".$same_image;
         //  < /image upload >   
 
         if (empty( $ctaTitleOne  || $file_name_one  || $ctaBodyOne || $ctaTitleTwo  || $file_name_two  || $ctaBodyTwo || $ctaTitleThree  || $file_name_three  || $ctaBodyThree )) {
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
                   $query = "UPDATE tbl_cta
                               SET  
                               ctaTitleOne   = '$ctaTitleOne',
                               ctaImageOne   = '$uploaded_image_one'
                               ctaBodyOne    = '$ctaBodyOne',                    
                               ctaTitleTwo   = '$ctaTitleTwo',
                               ctaImageTwo   = '$uploaded_image_two'
                               ctaBodyTwo    = '$ctaBodyTwo',
                               ctaTitleThree = '$ctaTitleThree',
                               ctaImageThree = '$uploaded_image_three'
                               ctaBodyThree  = '$ctaBodyThree'
                               WHERE id = '1'";
                   $updated_rows = $this->db->update($query);          
       
                   if ($updated_rows) {
                       $msg = "<span class='success'>CTA Updated.</span>"; 
                       return $msg;
                   } else {
                       $msg = "<span class='error'>CTA Not Updated !</span>";
                       return $msg;
                   }            
               }
             }  else {
                   $query = "UPDATE tbl_cta
                                SET  
                                ctaTitleOne   = '$ctaTitleOne',
                                ctaBodyOne    = '$ctaBodyOne',
                                ctaTitleTwo   = '$ctaTitleTwo',
                                ctaBodyTwo    = '$ctaBodyTwo',
                                ctaTitleThree = '$ctaTitleThree',
                                ctaBodyThree  = '$ctaBodyThree'
                                WHERE id = '1'";
                   
               $updated_rows = $this->db->update($query);          

               if ($updated_rows) {
                   $msg = "<span class='success'>CTA Updated.</span>"; 
                   return $msg;
               } else {
                   $msg = "<span class='error'>CTA Not Updated !</span>";
                   return $msg;
               }    
            }
        }    
    }


    /**
     * Method for showing CTA Edit Value & Front View
     */
    public function getCtaValue(){     
        $query = "SELECT * FROM tbl_cta WHERE id ='1'";
        $result = $this->db->select($query);
        return $result;
    }

        
    /**
     * Method for copyright update
     */
    public function updateCopyright( $data ){ 
    $copyright  = $this->fm->validation($data['copyright']); 

    $copyright  = mysqli_real_escape_string( $this->db->link, $data['copyright']);
    
        if (empty( $copyright  )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
        return $msg;

        } else {                 
            $query = "UPDATE tbl_copyright
                        SET                       
                        copyright = '$copyright'                                         
                        WHERE id  = '1'";   

            $updated_rows = $this->db->update($query);                
            if ($updated_rows) {
                $msg = "<span class='success'>Copyright Updated.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'>Copyright Not Updated !</span>";
                return $msg;
            }            
        }
    }

    
    /**
     * Method for showing Copyright Edit Value & Front View
     */
    public function getCopyRightValue(){     
        $query = "SELECT * FROM tbl_copyright WHERE id ='1'";
        $result = $this->db->select($query);
        return $result;
    }
        
   
}
