<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php'); 
    Session::checkLogin();
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>


<?php
class Adminlogin {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function userLogin( $username, $password ){
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);

        $username =mysqli_real_escape_string( $this->db->link, $username);
        $password =mysqli_real_escape_string( $this->db->link, $password);

        if(empty($username) || empty($password)){
            $loginmsg = "Username or Password must not be empty !";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
            $result = $this->db->select($query);
            if ($result !=false ) {
                $value = $result->fetch_assoc();
                Session::set("userLogin", true);
                Session::set("userId", $value['userId']);
                Session::set("username", $value['username']);
                Session::set("nicename", $value['nicename']);
                header("Location:dashboard.php");          
            } else {
                $loginmsg = "Username or Password not match !";
                return $loginmsg;
            }
        }
    }
}

?>