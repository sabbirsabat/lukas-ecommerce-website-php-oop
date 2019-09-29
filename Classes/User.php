<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class User{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for User insert
     */
    public function userInsert( $data ){
        $username   = $this->fm->validation($data['username']); 
        $email      = $this->fm->validation($data['email']);
        $first_name = $this->fm->validation($data['first_name']);
        $last_name  = $this->fm->validation($data['last_name']);
        $website    = $this->fm->validation($data['website']);
        $password   = $this->fm->validation( md5 ( $data[ 'password' ] ));
        $role       = $this->fm->validation($data['role']);
   

        if (empty( $username || $email || $first_name || $last_name || $website || $password || $role )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else {
            $mailquery = "SELECT * FROM tbl_admin WHERE email = '$email' limit 1";
            $mailcheck =  $this->db->select($mailquery);  
                if ($mailcheck != false) {              
                    $msg = "<span class='success'>Email Already Exist !</span>";
                } else {                        
                    $query = "INSERT INTO tbl_admin( username, email, first_name, last_name, website, password, role ) VALUES ( '$username', '$email', '$first_name', '$last_name', '$website', '$password', '$role' )";
                    $useradd = $this->db->insert($query);
                        if ( $useradd) {
                            $msg = "<span class='success'>User Added</span>";
                            return $msg;
                        } else {
                            $msg = "<span class='error'>User Not Added!</span>";
                            return $msg;
                        }
                }
         } 
    }

    /**
     * Method for showing user list
     */
    public function getAllUser(){
        $query  = "SELECT * FROM tbl_admin ORDER BY userId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for edit user value
     */
    public function getUserById($id){
        $query  = "SELECT * FROM tbl_admin WHERE userId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    /**
     * Method for Showing User Profile 
     */
    public function getUserProfile($userid, $userrole ){
        $query = "SELECT * FROM tbl_admin WHERE userid = '$userid' AND role= '$userrole'";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for  user update
     */
    public function userUpdate($data, $file, $userid ){
        $username   = $this->fm->validation($data['username']); 
        $email      = $this->fm->validation($data['email']);
        $first_name = $this->fm->validation($data['first_name']);
        $last_name  = $this->fm->validation($data['last_name']);
        $address    = $this->fm->validation($data['address']);
        $zip        = $this->fm->validation($data['zip']);
        $website    = $this->fm->validation($data['website']);
        $body       = $this->fm->validation($data['body']);
        $role       = $this->fm->validation($data['role']);

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


        if (empty( $username || $email || $first_name || $last_name || $address || $zip || $website || $body || $file_name || $role )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;

        }  else {    
             
            if (!empty($file_name) ) {

                if ($file_size >1048567) {
                    $msg = "<span class='error'>Image size should be less than 1 MB!</span>";
                    return $msg;
                
                } elseif (in_array($file_ext, $permited) === false) {        
                    $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $msg;
        
                } else {      
                    move_uploaded_file($file_temp, $uploaded_image);   
                    $query = "UPDATE tbl_admin 
                             SET 
                                username   = '$username',
                                email      = '$email',
                                first_name = '$first_name',
                                last_name  = '$last_name',
                                address    = '$address',
                                zip        = '$zip',
                                website    = '$website',
                                body       = '$body',
                                image      = '$uploaded_image',
                                role       = '$role'
                              WHERE userId = '$userid'";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>User Updated.</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>User Not Updated !</span>";
                        return $msg;
                    }
                }
               } else{
                    $query = "UPDATE tbl_admin 
                    SET 
                        username   = '$username',
                        email      = '$email',
                        first_name = '$first_name',
                        last_name  = '$last_name',
                        address    = '$address',
                        zip        = '$zip',
                        website    = '$website',
                        body       = '$body',                     
                        role       = '$role'
                    WHERE userId = '$userid'";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>User Updated.</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>User Not Updated !</span>";
                        return $msg;
                    }
               }
           
        }
   
   }
    
    
    /**
     * Method for  user delete
     */
    public function delUserById($id){
        $query   = "DELETE  FROM tbl_admin WHERE userId = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>User Deleted.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>User Not Deleted !</span>";
            return $msg;
        }
    }

}

?>