<?php
/**
 * Format Class
 */
class Format{
    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date));
    }
    
  public function formatOnlyDate($date){
        return date('j', strtotime($date));
    }
    
  public function formatOnlyMonth($date){
        return date('F', strtotime($date));
    } 
    
  public function formatDateMonth($date){
        return date('j F', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text."";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos( $text, ' '));
        $text = $text."...";
        return $text;
    }

    public function validation($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function title(){
        $path  = $_SERVER['SCRIPT_FILENAME'];
        $title = basename( $path, '.php' );
        if ($title == 'index') {
            $title = 'home';
        }elseif ($title == 'contact') {
            $title = 'contact';
        }
        return $title = ucwords($title);
    }

}
?>
