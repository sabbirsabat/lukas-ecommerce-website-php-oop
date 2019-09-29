<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Payment{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    /**
     * Method for Payment Direct Bank Transfer
     */
    public function directBankTransfer($data){
        $title           = $this->fm->validation($data['title']);
        $description     = $this->fm->validation($data['description']);
        $instructions    = $this->fm->validation($data['instructions']);
        $account_name    = $this->fm->validation($data['account_name']);
        $account_number  = $this->fm->validation($data['account_number']);
        $short_code      = $this->fm->validation($data['short_code']);
        $iban            = $this->fm->validation($data['iban']);
        $bic_swift       = $this->fm->validation($data['bic_swift']);

        $title           = mysqli_real_escape_string( $this->db->link, $data['title']);
        $description     = mysqli_real_escape_string( $this->db->link, $data['description']);
        $instructions    = mysqli_real_escape_string( $this->db->link, $data['instructions']);
        $account_name    = mysqli_real_escape_string( $this->db->link, $data['account_name']);
        $account_number  = mysqli_real_escape_string( $this->db->link, $data['account_number']);
        $short_code      = mysqli_real_escape_string( $this->db->link, $data['short_code']);
        $iban            = mysqli_real_escape_string( $this->db->link, $data['iban']);
        $bic_swift       = mysqli_real_escape_string( $this->db->link, $data['bic_swift']);
    
        if (empty($title || $description || $instructions || $account_name || $account_number || $short_code || $iban || $bic_swift )) {
            $msg = "<span class='error'>Size field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_payment
                      SET 
                        title          = '$title',
                        description    = '$description',
                        instructions   = '$instructions',
                        account_name   = '$account_name',
                        account_number = '$account_number',
                        short_code     = '$short_code',
                        iban           = '$iban',
                        bic_swift      = '$bic_swift'
                     WHERE id = '1'";      
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Bank info updated.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Bank info Not Updated !</span>";
                return $msg;
            } 
        }
    }

    
    /**
     * Method for showing Direct Bank Transfer Edit Value
     */
    public function getDBTValue(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='1'";  // id = 1 for direct bank
        $result = $this->db->select($query);
        return $result;
    }
    
        /**
     * Method for showing front view Check Payment
     */
    public function getDBTPaymentData(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='1'";  //  id = 2 for Check Payment
        $result = $this->db->select($query);
        return $result;
    }



    /**
     * Method for Check Payment update
     */
    public function checkPayment($data){
        $title           = $this->fm->validation($data['title']);
        $description     = $this->fm->validation($data['description']);
        $instructions    = $this->fm->validation($data['instructions']);

        $title           = mysqli_real_escape_string( $this->db->link, $data['title']);
        $description     = mysqli_real_escape_string( $this->db->link, $data['description']);
        $instructions    = mysqli_real_escape_string( $this->db->link, $data['instructions']);
    
        if (empty($title || $description || $instructions )) {
            $msg = "<span class='error'>Size field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_payment
                      SET 
                        title          = '$title',
                        description    = '$description',
                        instructions   = '$instructions'                  
                     WHERE id = '2'";      
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Check payment info updated.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Check payment info Not Updated !</span>";
                return $msg;
            } 
        }
    }

      /**
     * Method for showing Check Payment Edit Value
     */
    public function getCKPaymentValue(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='2'";  //  id = 2 for Check Payment
        $result = $this->db->select($query);
        return $result;
    }      
    
    /**
     * Method for showing front view Check Payment
     */
    public function getCKPaymentData(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='2'";  //  id = 2 for Check Payment
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Check Payment update
     */
    public function cashOnDelivery($data){
        $title           = $this->fm->validation($data['title']);
        $description     = $this->fm->validation($data['description']);
        $instructions    = $this->fm->validation($data['instructions']);

        $title           = mysqli_real_escape_string( $this->db->link, $data['title']);
        $description     = mysqli_real_escape_string( $this->db->link, $data['description']);
        $instructions    = mysqli_real_escape_string( $this->db->link, $data['instructions']);
    
        if (empty($title || $description || $instructions )) {
            $msg = "<span class='error'>Size field must not be empty !</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_payment
                      SET 
                        title          = '$title',
                        description    = '$description',
                        instructions   = '$instructions'                  
                     WHERE id = '3'";      
            $updated_row = $this->db->update($query);

            if ($updated_row) {
                $msg = "<span class='success'>Cash on delivery info updated.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Cash on delivery  payment info Not Updated !</span>";
                return $msg;
            } 
        }
    }

      /**
     * Method for showing Cash on delivery Edit Value
     */
    public function getCODValue(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='3'";  //  id = 3 for Check Cash on delivery
        $result = $this->db->select($query);
        return $result;
    }      
    
    /**
     * Method for showing Cash on delivery Edit Value
     */
    public function getCODPaymentData(){     
        $query = "SELECT * FROM tbl_payment WHERE id ='3'";  //  id = 3 for Check Cash on delivery
        $result = $this->db->select($query);
        return $result;
    }

}
?>