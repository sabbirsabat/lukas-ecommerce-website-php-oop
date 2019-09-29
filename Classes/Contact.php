<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 


    /**
     *    0 = inbox
     *    1 = sent
     *    2 = save / draft
     *    3 = seen
     *    4 = trash
     */

?>

<?php

class Contact{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for message insert from front view CONTACT.PHP
     */
    public function messageInsert( $data ){  
        $name    = $this->fm->validation($data['name']);
        $email   = $this->fm->validation($data['email']);
        $subject = $this->fm->validation($data['subject']);
        $message = $this->fm->validation($data['message']);
  
        $name    = mysqli_real_escape_string( $this->db->link, $data['name']);
        $email   = mysqli_real_escape_string( $this->db->link, $data['email']);
        $subject = mysqli_real_escape_string( $this->db->link, $data['subject']);
        $message = mysqli_real_escape_string( $this->db->link, $data['message']);

            if (empty($name)) {
                $msg = "<span class='error'>Name must not be empty !</span>";
                return $msg; 
            }elseif (empty($email)) {
                $msg = "<span class='error'>Email must not be empty !</span>";
                return $msg; 
            }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = "<span class='error'>Invaliid email address !</span>";
                return $msg; 
            }elseif (empty($subject)) {
                $msg = "<span class='error'>Subject must not be empty !</span>";
                return $msg; 
            }elseif (empty($message)) {
                $msg = "<span class='error'>Message must not be empty !</span>";
                return $msg; 
            } else {
                $query = "INSERT INTO tbl_contact ( name, email, subject, message ) VALUES ('$name', '$email','$subject','$message')";
                $inserted_rows = $this->db->insert($query);

                if ($inserted_rows) {
                    $msg = "<span class='success'>Message sent successfully.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'> Message not sent !</span>";
                    return $msg; 
                }
            }
    }

    
    /**
     * Method for mail listing
     */
    public function getAllMailList(){
        $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";     // 0 means = inbox
        $result = $this->db->select($query);
        return $result;
     } 
    
    
    /**
     * Method for view mail
     */
    public function viewMessage($id){
        $query = "SELECT * FROM tbl_contact WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
     }
    
     
    /**
     * Method for mail reply
     */
    public function replyMessage($data, $id){
         $to   = $this->fm->validation($data['toEmail']);
         $from = $this->fm->validation($data['fromEmail']);
         $sub  = $this->fm->validation($data['subject']);
         $msg  = $this->fm->validation($data['message']);
    
        $sendmail = mail($to, $sub, $msg, $from);
        if ( $sendmail ) {         
            $msg = "<span class='success'>Message sent successfully.</span>"; 
            return $msg;
           } else {
            $msg = "<span class='error'> Something went wrong ! </span>";
            return $msg; 
           }
     }


     /**
     * Method for reply mail value
     */
    public function replyMessageValue($id){
        $query = "SELECT * FROM tbl_contact WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
     }


    /**
     * Method for mail compose & send
     */
/*     public function composeMessage($data){
         $to   = $this->fm->validation($data['toEmail']);
         $from = $this->fm->validation($data['fromEmail']);
         $sub  = $this->fm->validation($data['subject']);
         $msg  = $this->fm->validation($data['message']);
    
        $sendmail = mail($to, $sub, $msg, $from);
        if ( $sendmail ) {         
            $msg = "<span class='success'>Message sent successfully.</span>"; 
            return $msg;
           } else {
            $msg = "<span class='error'> Something went wrong ! </span>";
            return $msg; 
           }
     } */

     
    /**
     * Method for mail compose & send & save database
     */
    public function composeMessage($data){
         $to   = $this->fm->validation($data['toEmail']);
         $from = $this->fm->validation($data['fromEmail']);
         $sub  = $this->fm->validation($data['subject']);
         $msg  = $this->fm->validation($data['message']);
    
        $sendmail = mail($to, $sub, $msg, $from);
        if ( $sendmail ) {         
            $query = "INSERT INTO tbl_contact WHERE status='1' ( toEmail, fromEmail, subject, message ) VALUES ('$to', '$from','$sub','$msg')";    // 1 means  = sent
            $inserted_rows = $this->db->insert($query);
                if($inserted_rows){
                    $msg = "<span class='success'>Message sent successfully.</span>"; 
                    return $msg;
                }

           } else {
            $msg = "<span class='error'> Something went wrong ! </span>";
            return $msg; 
           }
     }

    /**
     * Method for mail compose & save draft database
     */
    public function draftMessage($data){
         $to   = $this->fm->validation($data['toEmail']);
         $from = $this->fm->validation($data['fromEmail']);
         $sub  = $this->fm->validation($data['subject']);
         $msg  = $this->fm->validation($data['message']);
    
        $sendmail = mail($to, $sub, $msg, $from);
        if ( $sendmail ) {         
            $query = "INSERT INTO tbl_contact WHERE status='2' ( toEmail, fromEmail, subject, message ) VALUES ('$to', '$from','$sub','$msg')";    // 2 means  = ssave/ draft
            $inserted_rows = $this->db->insert($query);
                if($inserted_rows){
                    $msg = "<span class='success'>Message drafted.</span>"; 
                    return $msg;
                }

           } else {
            $msg = "<span class='error'> Something went wrong ! </span>";
            return $msg; 
           }
     }

     /**
     * Method for draft mail listing
     */
    public function getDraftList(){
        $query = "SELECT * FROM tbl_contact WHERE status='2' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
     } 

     
     /**
     * Method for sent mail listing
     */
    public function getAllSentMailList(){
        $query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
     } 


    /**
     * Method for message move to seen box 
     */
  
    public function moveToSeenBox($seenid){      // 3 means = seen
     $query = "UPDATE tbl_contact 
               SET 
               status = '3'       
               WHERE id = '$seenid'";

     $updateSeenId = $this->db->update($query);

         if ( $updateSeenId) {            
             $msg = "<span class='success'>Message store at Seen box.</span>"; 
             return $msg;
         } else {
             $msg = "<span class='error'> Something went wrong ! </span>";
             return $msg; 
         }
     }   
    

    /**
     * Method for Seen Mail listing
     */
    public function getAllSeenMailList(){
        $query = "SELECT * FROM tbl_contact WHERE status='3' ORDER BY id DESC";    // 3 means = seen
        $result = $this->db->select($query);
        return $result;
    } 


    /**
     * Method for message move to trash 
     */

    public function moveToTrash($trashid){
        $query = "UPDATE tbl_contact 
                    SET 
                    status = '4' 
                    WHERE id = '$trashid'";

        $updateTrashId = $this->db->update($query);

            if ( $updateTrashId) {            
                $msg = "<span class='success'>Message store at Trash box.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'> Something went wrong ! </span>";
                return $msg; 
            }
    } 

    /**
     * Method for Trash Mail listing
     */
    public function getAllTrashMailList(){
        $query = "SELECT * FROM tbl_contact WHERE status='4' ORDER BY id DESC";     // 4 means = trash
        $result = $this->db->select($query);
        return $result;
    } 


    /**
     * Method for message restore to inbox 
     */
    public function restoreMail($restorid){      // 0 means = inbox
        $query = "UPDATE tbl_contact 
                    SET 
                    status = '0' 
                    WHERE id = '$restorid'";

        $restore_mail = $this->db->update($query);

            if ( $restore_mail) {            
                $msg = "<span class='success'> Message restore to inbox.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'> Something went wrong ! </span>";
                return $msg; 
            }
    } 
  
     /**
     * Method for Permanently Delete Mail 
     */

    public function permanentDelete($delid){
        $query = "DELETE FROM tbl_contact WHERE id ='$delid'";
        $deleteMail = $this->db->update($query);

            if ( $deleteMail) {            
                $msg = "<span class='success'>Message deleted permanently.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'> Something went wrong ! </span>";
                return $msg; 
            }
    }  
    
    

    // Mail Notification  Count

    /**
     *    0 = inbox
     *    1 = sent
     *    2 = save / draft
     *    3 = seen
     *    4 = trash
     */
    
    // Inbox
   
    public function inboxCount(){
        $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
        $msg = $this->db->select($query);
        if ($msg) {
        $count = mysqli_num_rows($msg);
        echo "(".$count.")";
        }else {
            echo "(0)";
        } 
    } 

    // Sent
    public function sentCount(){
        $query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
        $msg = $this->db->select($query);
        if ($msg) {
        $count = mysqli_num_rows($msg);
        echo "(".$count.")";
        }else {
            echo "(0)";
        } 
    } 

    // Draft
    public function draftCount(){
        $query = "SELECT * FROM tbl_contact WHERE status='2' ORDER BY id DESC";
        $msg = $this->db->select($query);
        if ($msg) {
        $count = mysqli_num_rows($msg);
        echo "(".$count.")";
        }else {
            echo "(0)";
        } 
    } 

    // Seen
    public function seenCount(){
        $query = "SELECT * FROM tbl_contact WHERE status='3' ORDER BY id DESC";
        $msg = $this->db->select($query);
        if ($msg) {
        $count = mysqli_num_rows($msg);
        echo "(".$count.")";
        }else {
            echo "(0)";
        } 
    } 

    // Trash
    public function trashCount(){
        $query = "SELECT * FROM tbl_contact WHERE status='4' ORDER BY id DESC";
        $msg = $this->db->select($query);
        if ($msg) {
        $count = mysqli_num_rows($msg);
        echo "(".$count.")";
        }else {
            echo "(0)";
        } 
    } 


}