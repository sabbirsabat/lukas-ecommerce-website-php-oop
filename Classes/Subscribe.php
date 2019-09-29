<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Subscribe{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
   
    /**
     * Method for showing Subscriber Form Edit Value 
     */
    public function getSubcribeFromData(){     
        $query  = "SELECT * FROM tbl_subscribe_meta WHERE subsId = '1' ";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Subscriber Form update
     */
    public function subsFormUpdate(  $data, $file ){       
        $subs_title = $this->fm->validation($data['subs_title']);
        $subs_body  = $this->fm->validation($data['subs_body']);
 
        $subs_title = mysqli_real_escape_string( $this->db->link, $data['subs_title']);
        $subs_body  = mysqli_real_escape_string( $this->db->link, $data['subs_body']);

     
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
 
         if (empty( $subs_title  || $subs_body ||  $file_name )) {
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
                    $query = "UPDATE tbl_subscribe_meta
                                SET  
                                subs_title  = '$subs_title',
                                subs_body   = '$subs_body',
                                image       = '$uploaded_image'
                               WHERE subsId = '1'"; 
                    $updated_rows = $this->db->update($query);          
        
                    if ($updated_rows) {
                        $msg = "<span class='success'>Subscription Data Updated.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Subscription Not Updated !</span>";
                        return $msg;
                    }            
                }
              }  else {
                    $query = "UPDATE tbl_subscribe_meta
                               SET  
                               subs_title  = '$subs_title',
                               subs_body   = '$subs_body'                         
                             WHERE subsId = '1'"; 
                    
                $updated_rows = $this->db->update($query);          

                if ($updated_rows) {
                    $msg = "<span class='success'>Subscription Data Updated.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'>Subscription Data Not Updated !</span>";
                    return $msg;
                }    
             }
         }
    }

    /**
     * Method for Subscriber list
     */
    public function getAllSubscriber(){ 
        $query  = "SELECT * FROM tbl_subscriber";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Subscription data delete
     */

    public function delSubscribeById($id){   
        $delquery = "DELETE FROM tbl_subscriber WHERE id = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Subscriber Deleted successfully.');</script>";
            echo "<script> window.location = 'subscriber.php'; </script>";
            } else {
            echo "<script> alert('Subscriber not deleted !');</script>";
            echo "<script> window.location = 'subscriber.php'; </script>";
        }
    }
    
       
    // Front View Code Start ========================================================================//
     

    /**
     * Method for front view Form Subscribe Data 
     */
    public function getFormSubscribeData(){
        $query  = "SELECT * FROM tbl_subscribe_meta WHERE subsId = '1'"; 
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view Email Input Submit from Subcribers 
     */
    public function insertEmailFromSubscriber($email){
        $email = $this->fm->validation($email);
        $email = mysqli_real_escape_string( $this->db->link, $email);

        if (empty($email)) {
            $msg = "<span class='error'>Subscription field must not be empty !</span>";
            return $msg;
        } else {
            $mailquery = "SELECT * FROM tbl_subscriber WHERE email = '$email' limit 1";
            $mailcheck =  $this->db->select($mailquery);  
                if ($mailcheck != false) {              
                    $msg = "<span class='error'>Email already exist ! Please input another email address.</span>";
                    return $msg;
                } else { 
                    $query = "INSERT INTO tbl_subscriber (email) VALUES('$email') ";
                    $emailinsert = $this->db->insert($query);
                    if ( $emailinsert) {
                        $msg = "<span class='success'>Subscription Successfully.</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Subscription not added !</span>";
                        return $msg;
                    } 
            }
        }
    }



}

