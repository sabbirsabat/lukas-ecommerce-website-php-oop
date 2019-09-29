<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Customer{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


    /**
     * Method for customer registration
     */
    public function customerRegistration( $data ){
        
        $first_name = $this->fm->validation($data['first_name']);
        $last_name  = $this->fm->validation($data['last_name']);
        $username   = $this->fm->validation($data['username']);
        $email      = $this->fm->validation($data['email']);
        $gender     = $this->fm->validation($data['gender']);
        $phone      = $this->fm->validation($data['phone']);
        $password   = $this->fm->validation ( md5 ( $data ['password'] ) );

        $first_name = mysqli_real_escape_string( $this->db->link, $data['first_name']);
        $last_name  = mysqli_real_escape_string( $this->db->link, $data['last_name']);
        $username   = mysqli_real_escape_string( $this->db->link, $data['username']);
        $email      = mysqli_real_escape_string( $this->db->link, $data['email']);
        $gender     = mysqli_real_escape_string( $this->db->link, $data['gender']);
        $phone      = mysqli_real_escape_string( $this->db->link, $data['phone']);
        $password   = mysqli_real_escape_string( $this->db->link, md5($data['password']));

        if ( $first_name == "" || $last_name == "" || $username == "" || $email == "" || $gender == "" || $phone == "" || $password == "" ) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } 
        $mailquery = "SELECT * FROM tbl_customer WHERE email= '$email' LIMIT 1";
        $mailChk   = $this->db->select($mailquery);
        if ($mailChk != false) {
            $msg = "<span class='error'>Email already exist !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_customer (first_name, last_name, username, email, gender, phone, password ) VALUES('$first_name', '$last_name', '$username', '$email', '$gender', '$phone','$password')";
            $inserted_rows = $this->db->insert($query);

            if ($inserted_rows) {
                $msg = "<span class='success succ-reg'>Registration Successfully.<a class='login-reg' href='login.php'>login </a> </span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'> Something Wrong !</span>";
                return $msg;
            } 
        }

    }

    /**
     * Method for Customer Login
     */
    public function customerLogin( $data ){
        $email    = $this->fm->validation($data['email']);
        $password = $this->fm->validation ( md5 ( $data['password'] ) );

        $email    = mysqli_real_escape_string( $this->db->link, $data['email']);
        $password = mysqli_real_escape_string( $this->db->link, md5($data['password']));

        if (empty($email) || empty($password)) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        }

        $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
        $result = $this->db->select($query);
        if ($result !=false) {
            $value = $result->fetch_assoc();	
            Session::set("custLogin", true);
            Session::set("cmrId", $value['id']);
            Session::set("cmrName", $value['username']);
            header("Location:index.php");	

        }else {
            $msg = "<span class='error'>Email or Password not matched !</span>";
            return $msg;
        }
    }


    /**
     * Customer Profile show data
     */
    public function getCustomerData($id){
        $query  = "SELECT * FROM tbl_customer WHERE id = '$id' ";
        $result = $this->db->select($query); 
        return $result;
    }

    /**
     * Customer List show
     */
    public function getAllCustomer(){
        $query  = "SELECT * FROM tbl_customer";
        $result = $this->db->select($query); 
        return $result;
    }


    /**
     * Customer Data Update  Test
     */
    public function customerUpdate($data, $file, $cmrId){
        $first_name            = mysqli_real_escape_string( $this->db->link, $data['first_name']);
        $last_name             = mysqli_real_escape_string( $this->db->link, $data['last_name']);
        $username              = mysqli_real_escape_string( $this->db->link, $data['username']);
        $email                 = mysqli_real_escape_string( $this->db->link, $data['email']);
        $gender                = mysqli_real_escape_string( $this->db->link, $data['gender']);
        $phone                 = mysqli_real_escape_string( $this->db->link, $data['phone']);
   //  $password              = mysqli_real_escape_string( $this->db->link, md5($data['password']));
        $bio                   = mysqli_real_escape_string( $this->db->link, $data['bio']);
        $b_first_name          = mysqli_real_escape_string( $this->db->link, $data['b_first_name']);
        $b_last_name           = mysqli_real_escape_string( $this->db->link, $data['b_last_name']);
        $b_email               = mysqli_real_escape_string( $this->db->link, $data['b_email']);
        $b_company_name        = mysqli_real_escape_string( $this->db->link, $data['b_company_name']);
        $b_country             = mysqli_real_escape_string( $this->db->link, $data['b_country']);
        $b_st_address_line_one = mysqli_real_escape_string( $this->db->link, $data['b_st_address_line_one']);
        $b_st_address_line_two = mysqli_real_escape_string( $this->db->link, $data['b_st_address_line_two']);
        $b_town_city           = mysqli_real_escape_string( $this->db->link, $data['b_town_city']);
        $b_state_division      = mysqli_real_escape_string( $this->db->link, $data['b_state_division']);
        $b_postcode_zip        = mysqli_real_escape_string( $this->db->link, $data['b_postcode_zip']);
        $b_phone               = mysqli_real_escape_string( $this->db->link, $data['b_phone']);
        $s_first_name          = mysqli_real_escape_string( $this->db->link, $data['s_first_name']);
        $s_last_name           = mysqli_real_escape_string( $this->db->link, $data['s_last_name']);
        $s_email               = mysqli_real_escape_string( $this->db->link, $data['s_email']);
        $s_company_name        = mysqli_real_escape_string( $this->db->link, $data['s_company_name']);
        $s_country             = mysqli_real_escape_string( $this->db->link, $data['s_country']);
        $s_st_address_line_one = mysqli_real_escape_string( $this->db->link, $data['s_st_address_line_one']);
        $s_st_address_line_two = mysqli_real_escape_string( $this->db->link, $data['s_st_address_line_two']);
        $s_town_city           = mysqli_real_escape_string( $this->db->link, $data['s_town_city']);
        $s_state_division      = mysqli_real_escape_string( $this->db->link, $data['s_state_division']);
        $s_postcode_zip        = mysqli_real_escape_string( $this->db->link, $data['s_postcode_zip']);
        $s_phone               = mysqli_real_escape_string( $this->db->link, $data['s_phone']);
        $note                  = mysqli_real_escape_string( $this->db->link, $data['note']);

        //  < image upload >
         $permited  = array('jpg','jpeg','png','gif');
         $file_name = $file['image']['name'];
         $file_size = $file['image']['size'];
         $file_temp = $file['image']['tmp_name'];
 
         $div = explode('.', $file_name);
         $file_ext = strtolower(end($div));
         $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
         $uploaded_image = "admin/upload/".$unique_image;
         //  < /image upload >   

        if (empty( $first_name  || $last_name  || $username  || $email  || $gender  || $phone  || $bio || $file_name || $b_first_name || $b_last_name || $b_email || $b_company_name || $b_country || $b_st_address_line_one || $b_st_address_line_two || $b_town_city || $b_state_division || $b_postcode_zip || $b_phone || $s_first_name || $s_last_name || $s_email || $s_company_name || $s_country || $s_st_address_line_one || $s_st_address_line_two || $s_town_city || $s_state_division || $s_postcode_zip || $s_phone || $note )) {
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
                    $query = "UPDATE tbl_customer
                               SET
                               first_name            = '$first_name', 
                               last_name             = '$last_name', 
                               username              = '$username', 
                               email                 = '$email', 
                               gender                = '$gender',                              
                               phone                 = '$phone',   
                               bio                   = '$bio',   
                               image                 = '$uploaded_image',
                               b_first_name          = '$b_first_name',
                               b_last_name           = '$b_last_name',
                               b_email               = '$b_email',
                               b_company_name        = '$b_company_name',
                               b_country             = '$b_country',
                               b_st_address_line_one = '$b_st_address_line_one',
                               b_st_address_line_two = '$b_st_address_line_two',
                               b_town_city           = '$b_town_city',
                               b_state_division      = '$b_state_division',
                               b_postcode_zip        = '$b_postcode_zip',
                               b_phone               = '$b_phone',
                               s_first_name          = '$s_first_name',
                               s_last_name           = '$s_last_name',
                               s_email               = '$s_email',
                               s_company_name        = '$s_company_name',
                               s_country             = '$s_country',
                               s_st_address_line_one = '$s_st_address_line_one',
                               s_st_address_line_two = '$s_st_address_line_two',
                               s_town_city           = '$s_town_city',
                               s_state_division      = '$s_state_division',
                               s_postcode_zip        = '$s_postcode_zip',
                               s_phone               = '$s_phone',
                               note                  = '$note'
                               WHERE id              = '$cmrId'";
                        $updated_row = $this->db->update($query);
                        if ($updated_row) {
                            $msg = "<span class='success'>Customer data update successfully. <a href='profile-details.php'>View Profile</a></span>";
                            return $msg;
                        } else {
                            $msg = "<span class='error'>Customer data not updated !</span>";
                            return $msg;
                      }            
                 }
              }  else {
                  $query = "UPDATE tbl_customer
                               SET
                               first_name            = '$first_name', 
                               last_name             = '$last_name', 
                               username              = '$username', 
                               email                 = '$email', 
                               gender                = '$gender',                              
                               phone                 = '$phone',   
                               bio                   = '$bio',                           
                               b_first_name          = '$b_first_name',
                               b_last_name           = '$b_last_name',
                               b_email               = '$b_email',
                               b_company_name        = '$b_company_name',
                               b_country             = '$b_country',
                               b_st_address_line_one = '$b_st_address_line_one',
                               b_st_address_line_two = '$b_st_address_line_two',
                               b_town_city           = '$b_town_city',
                               b_state_division      = '$b_state_division',
                               b_postcode_zip        = '$b_postcode_zip',
                               b_phone               = '$b_phone',
                               s_first_name          = '$s_first_name',
                               s_last_name           = '$s_last_name',
                               s_email               = '$s_email',
                               s_company_name        = '$s_company_name',
                               s_country             = '$s_country',
                               s_st_address_line_one = '$s_st_address_line_one',
                               s_st_address_line_two = '$s_st_address_line_two',
                               s_town_city           = '$s_town_city',
                               s_state_division      = '$s_state_division',
                               s_postcode_zip        = '$s_postcode_zip',
                               s_phone               = '$s_phone',
                               note                  = '$note'
                              WHERE id     = '$cmrId'";
                       $updated_rows = $this->db->update($query);          

                    if ($updated_rows) {
                        $msg = "<span class='success'>Customer data update successfully.<a href='profile-details.php'>View Profile</a></span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Customer data not updated !</span>";
                        return $msg;
                    }    
             }
         }
    }
    
    
 /**
     * Customer Data Update  from checkout
     */
    public function customerUpdateCheckout($data, $cmrId){
        $b_first_name          = mysqli_real_escape_string( $this->db->link, $data['b_first_name']);
        $b_last_name           = mysqli_real_escape_string( $this->db->link, $data['b_last_name']);
        $b_email               = mysqli_real_escape_string( $this->db->link, $data['b_email']);
        $b_company_name        = mysqli_real_escape_string( $this->db->link, $data['b_company_name']);
        $b_country             = mysqli_real_escape_string( $this->db->link, $data['b_country']);
        $b_st_address_line_one = mysqli_real_escape_string( $this->db->link, $data['b_st_address_line_one']);
        $b_st_address_line_two = mysqli_real_escape_string( $this->db->link, $data['b_st_address_line_two']);
        $b_town_city           = mysqli_real_escape_string( $this->db->link, $data['b_town_city']);
        $b_state_division      = mysqli_real_escape_string( $this->db->link, $data['b_state_division']);
        $b_postcode_zip        = mysqli_real_escape_string( $this->db->link, $data['b_postcode_zip']);
        $b_phone               = mysqli_real_escape_string( $this->db->link, $data['b_phone']);
        $s_first_name          = mysqli_real_escape_string( $this->db->link, $data['s_first_name']);
        $s_last_name           = mysqli_real_escape_string( $this->db->link, $data['s_last_name']);
        $s_email               = mysqli_real_escape_string( $this->db->link, $data['s_email']);
        $s_company_name        = mysqli_real_escape_string( $this->db->link, $data['s_company_name']);
        $s_country             = mysqli_real_escape_string( $this->db->link, $data['s_country']);
        $s_st_address_line_one = mysqli_real_escape_string( $this->db->link, $data['s_st_address_line_one']);
        $s_st_address_line_two = mysqli_real_escape_string( $this->db->link, $data['s_st_address_line_two']);
        $s_town_city           = mysqli_real_escape_string( $this->db->link, $data['s_town_city']);
        $s_state_division      = mysqli_real_escape_string( $this->db->link, $data['s_state_division']);
        $s_postcode_zip        = mysqli_real_escape_string( $this->db->link, $data['s_postcode_zip']);
        $s_phone               = mysqli_real_escape_string( $this->db->link, $data['s_phone']);
        $note                  = mysqli_real_escape_string( $this->db->link, $data['note']);

         
        if (empty($b_first_name || $b_last_name || $b_email || $b_company_name || $b_country || $b_st_address_line_one || $b_st_address_line_two || $b_town_city || $b_state_division || $b_postcode_zip || $b_phone || $s_first_name || $s_last_name || $s_email || $s_company_name || $s_country || $s_st_address_line_one || $s_st_address_line_two || $s_town_city || $s_state_division || $s_postcode_zip || $s_phone || $note )) {
            $msg = "<span class='error'>Field must not be empty !</span>";
            return $msg;
        } else {
            
                  $query = "UPDATE tbl_customer
                               SET                                         
                               b_first_name          = '$b_first_name',
                               b_last_name           = '$b_last_name',
                               b_email               = '$b_email',
                               b_company_name        = '$b_company_name',
                               b_country             = '$b_country',
                               b_st_address_line_one = '$b_st_address_line_one',
                               b_st_address_line_two = '$b_st_address_line_two',
                               b_town_city           = '$b_town_city',
                               b_state_division      = '$b_state_division',
                               b_postcode_zip        = '$b_postcode_zip',
                               b_phone               = '$b_phone',
                               s_first_name          = '$s_first_name',
                               s_last_name           = '$s_last_name',
                               s_email               = '$s_email',
                               s_company_name        = '$s_company_name',
                               s_country             = '$s_country',
                               s_st_address_line_one = '$s_st_address_line_one',
                               s_st_address_line_two = '$s_st_address_line_two',
                               s_town_city           = '$s_town_city',
                               s_state_division      = '$s_state_division',
                               s_postcode_zip        = '$s_postcode_zip',
                               s_phone               = '$s_phone',
                               note                  = '$note'
                              WHERE id     = '$cmrId'";
                       $updated_rows = $this->db->update($query);          

                    if ($updated_rows) {
                        $msg = "<span class='success'>Customer data update successfully.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Customer data not updated !</span>";
                        return $msg;
                    }    
             }
         }
  
    
     /**
     * Method for showing blog Edit Value 
     */
    public function getCustomerById($id){     
        $query  = "SELECT * FROM tbl_customer WHERE id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    
    /**
     * Method for customer delete
     */

    public function delCustomerById($id){     
        $delquery = "DELETE FROM tbl_customer WHERE id = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Customer Deleted successfully.');</script>";
            echo "<script> window.location = 'customer-list.php'; </script>";
            } else {
            echo "<script> alert('Customer not deleted !');</script>";
            echo "<script> window.location = 'customer-list.php'; </script>";
        }
    }
 
}
    
  