<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<!--Begin: Style Sheet-->
<style>
.success{font-size: 18px; color: green;}
.error{font-size: 18px; color: red;}
</style>   
<!--End: Style Sheet-->

<?php

class Cart{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }


    /**
     * Method for Cart Add & Avoid Added Same Product.
     */
    public function addToCart($quantity, $id){
        $quantity  = $this->fm->validation($quantity);
        $quantity  = mysqli_real_escape_string( $this->db->link, $quantity);
        $productId = mysqli_real_escape_string( $this->db->link, $id);
        $sId       = session_id();
        
        $squery  = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result  = $this->db->select($squery)->fetch_assoc();

        $product_name = $result['product_name'];
        $sale_price  = $result['sale_price'];
        $image       = $result['image'];

        $chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId' ";  // Avoid Added Same Product.
        $getPro  = $this->db->select($chquery);
       
        if ($getPro) {
          $msg = "Product Already Added Your Cart ! <a href='cart.php'>Check Cart</a>";
          return $msg;
        } else{  
            $query = "INSERT INTO tbl_cart (sId, productId, product_name, sale_price, quantity, image) VALUES('$sId', '$productId', '$product_name', '$sale_price', '$quantity', '$image')";
            $inserted_rows = $this->db->insert($query);

            if ($inserted_rows) {
                $msg = " Product Added To Cart Successfully. <a href='cart.php'>view cart</a> or <a href='shop.php'>Continue Shoping</a>";
                return $msg;
            } else {
                header("Location:404.php");
            }     
        }
    }


    /**
     * Method for Session Id and Cart Database
     */
    public function getCartProduct(){
        $sId = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for Session Id and Order Database
     */
/*     public function geOrderProduct(){
        $sId = session_id();
        $query  = "SELECT * FROM tbl_order WHERE sId = '$sId' ";
        $result = $this->db->select($query);
        return $result;
    }
 */

    /**
     * Method for Update Cart Page Quantity
     */
    public function updateCartQuantity($cartId, $quantity){       
        $cartId   = $this->fm->validation($cartId);
        $quantity = $this->fm->validation($quantity);

        $cartId   = mysqli_real_escape_string( $this->db->link, $cartId);
        $quantity = mysqli_real_escape_string( $this->db->link, $quantity);

        $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
        $updated_row = $this->db->update($query);
        
        if ($updated_row) {
            header("Location:cart.php");
        } else {
            $msg = "<span class='error'>Quantity Not Updated !</span>";
            return $msg;
        }        
    } 


    /**
     * Delete Product from Selected Cart Product
     */
    public function delProductByCart($delProdCart){
        $delProdCart   = $this->fm->validation($delProdCart);
        $delProdCart   = mysqli_real_escape_string( $this->db->link, $delProdCart);

        $query   = "DELETE FROM tbl_cart WHERE cartId = '$delProdCart'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
           echo "<script>window.location = 'cart.php';</script>";
               
        } else {
            $msg = "<span class='error'>Product Not Deleted !</span>";
            return $msg;
        }
    }


    /**
     * 1) Remove Cart Amount 2) Check cart product quantity or empty quantity
     */
    public function checkCartTable(){
        $sId = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
        $result = $this->db->select($query); 
        return $result;
    }
    

    /**
     * logout delete cart
     */
    public function delCustomerCart(){
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId='$sId'";
        $this->db->delete($query);
    }


    /**
     * Order Now : Cart to Order database
     */
    public function orderProduct($cmrId){
        $sId = session_id();
        $query  = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $getPro = $this->db->select($query); 
        if ($getPro) {
           while ($result = $getPro->fetch_assoc()) {

               $productId    = $result['productId'];
               $product_name = $result['product_name'];
               $quantity     = $result['quantity'];
               $sale_price   = $result['sale_price'] * $quantity;
               $image        = $result['image'];

               $query = "INSERT INTO tbl_order (cmrId, productId, product_name, quantity, sale_price, image) VALUES('$cmrId', '$productId', '$product_name', '$quantity', '$sale_price', '$image')";
               $inserted_rows = $this->db->insert($query);           
           }
        }
    }

    
    /**
     * Order Now : payment method add to Order database
     */
 
    public function paymentInsert($payment_method, $cmrId){
        $sId = session_id();
        $payment_method = $this->fm->validation($payment_method);
        $payment_method = mysqli_real_escape_string( $this->db->link, $payment_method);

        if (empty($payment_method)) {
            $msg = "<span class='error'>Payment button must not be empty !</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_order(cmrId, payment_method ) VALUES( '$cmrId', '$payment_method' )";
            $paymentinsert = $this->db->insert($query);
        }
    }
   

    /**
     * Payable Amount
     */
    public function payableAmount($cmrId){
        $query  = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' AND date = now()";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Show ordered product
     */
    public function getOrderedProduct($cmrId){
        $query  = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Show ordered product
     */
    public function checkOrder($cmrId){
        $sId = session_id();
        $query  = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId'";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Admin Panel All product show
     */
    public function getAllOrderProduct(){
        $query  = "SELECT * FROM tbl_order ORDER BY date DESC";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Product Shifted Admin panel 
     */
    public function productShifted($id, $date, $sale_price){
        $id    = mysqli_real_escape_string( $this->db->link, $id);
        $date  = mysqli_real_escape_string( $this->db->link, $date);
        $sale_price = mysqli_real_escape_string( $this->db->link, $sale_price);

        $query = "UPDATE tbl_order 
                    SET 
                    status = '1' 
                    WHERE cmrId = '$id' 
                    AND
                    date   = '$date'
                    AND
                    sale_price  = '$sale_price'";
        $updated_row = $this->db->update($query);

        if ($updated_row) {
            $msg = "<span class='success'>Product Shifted.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Not Shifted !</span>";
            return $msg;
        }                 
    }


    /**
     * Shifted Product Delete Or Remove from Admin Panel
     */
    public function delProductShifted($id, $time, $sale_price){
        $id    = mysqli_real_escape_string( $this->db->link, $id);
        $date  = mysqli_real_escape_string( $this->db->link, $time);
        $sale_price = mysqli_real_escape_string( $this->db->link, $sale_price);

        $query   = "DELETE  FROM tbl_order WHERE cmrId = '$id' AND date = '$date' AND sale_price = '$sale_price'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Shifted Product Removed.</span>";
                return $msg;
        } else {
            $msg = "<span class='error'>Shifted Product Not Removed !</span>";
            return $msg;
        }
    }


    /**
     * Product Shifted Confirm from front view by customer
     */
    public function productShiftConfirm($id, $time, $sale_price){
        $id    = mysqli_real_escape_string( $this->db->link, $id);
        $date  = mysqli_real_escape_string( $this->db->link, $time);
        $sale_price = mysqli_real_escape_string( $this->db->link, $sale_price);

        $query = "UPDATE tbl_order 
                    SET 
                    status = '2' 
                    WHERE cmrId = '$id' 
                    AND
                    date   = '$date'
                    AND
                    sale_price  = '$sale_price'";
        $updated_row = $this->db->update($query);

        if ($updated_row) {
            $msg = "<span class='success'>Shifted Successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Not Shifted !</span>";
            return $msg;
        }          
    }

}
?>
 