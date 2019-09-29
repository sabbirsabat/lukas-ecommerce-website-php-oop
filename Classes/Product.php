<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php'); 
    include_once ($filepath.'/../helpers/Format.php'); 
?>

<?php

class Product{

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    /**
     * Method for product insert
     */
    public function productInsert( $data, $file){ 
        $product_name    = $this->fm->validation($data['product_name']);
        $catId           = $this->fm->validation($data['catId']);
        $brandId         = $this->fm->validation($data['brandId']);
        $colorId         = $this->fm->validation($data['colorId']);
        $sizeId          = $this->fm->validation($data['sizeId']);
        $body            = $this->fm->validation($data['body']);
        $sale_price      = $this->fm->validation($data['sale_price']);       
        $regular_price   = $this->fm->validation($data['regular_price']);       
        $tax             = $this->fm->validation($data['tax']);       
        $tag             = $this->fm->validation($data['tag']);       
        $sku             = $this->fm->validation($data['sku']);       
        $stock           = $this->fm->validation($data['stock']);       
        $short_body      = $this->fm->validation($data['short_body']);       
        $size_guide      = $this->fm->validation($data['size_guide']);       
        $extra_info      = $this->fm->validation($data['extra_info']);       
        $weight          = $this->fm->validation($data['weight']);       
        $length          = $this->fm->validation($data['length']);       
        $width           = $this->fm->validation($data['width']);       
        $height          = $this->fm->validation($data['height']);       
        $upsell          = $this->fm->validation($data['upsell']);       
        $cross_sells     = $this->fm->validation($data['cross_sells']);       
        $product_type    = $this->fm->validation($data['product_type']);
     
        $product_name    = mysqli_real_escape_string( $this->db->link, $data['product_name']);
        $catId           = mysqli_real_escape_string( $this->db->link, $data['catId']);
        $brandId         = mysqli_real_escape_string( $this->db->link, $data['brandId']);
        $colorId         = mysqli_real_escape_string( $this->db->link, $data['colorId']);
        $sizeId          = mysqli_real_escape_string( $this->db->link, $data['sizeId']);
        $body            = mysqli_real_escape_string( $this->db->link, $data['body']);
        $sale_price      = mysqli_real_escape_string( $this->db->link, $data['sale_price']);     
        $regular_price   = mysqli_real_escape_string( $this->db->link, $data['regular_price']);     
        $tax             = mysqli_real_escape_string( $this->db->link, $data['tax']);     
        $tag             = mysqli_real_escape_string( $this->db->link, $data['tag']);     
        $sku             = mysqli_real_escape_string( $this->db->link, $data['sku']);     
        $stock           = mysqli_real_escape_string( $this->db->link, $data['stock']);     
        $short_body      = mysqli_real_escape_string( $this->db->link, $data['short_body']);     
        $size_guide      = mysqli_real_escape_string( $this->db->link, $data['size_guide']);     
        $extra_info      = mysqli_real_escape_string( $this->db->link, $data['extra_info']);           
        $weight          = mysqli_real_escape_string( $this->db->link, $data['weight']);     
        $length          = mysqli_real_escape_string( $this->db->link, $data['length']);     
        $width           = mysqli_real_escape_string( $this->db->link, $data['width']);     
        $height          = mysqli_real_escape_string( $this->db->link, $data['height']);     
        $upsell          = mysqli_real_escape_string( $this->db->link, $data['upsell']);     
        $cross_sells     = mysqli_real_escape_string( $this->db->link, $data['cross_sells']);     
        $product_type    = mysqli_real_escape_string( $this->db->link, $data['product_type']);

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
 
         if (empty( $product_name  || $catId  || $brandId  || $colorId  || $sizeId  || $body  || $sale_price  || $regular_price  || $tax  || $tag  || $sku  || $stock  || $short_body  || $size_guide  || $extra_info  || $file_name  || $weight  || $length  || $width  || $height  || $upsell  || $cross_sells  || $product_type  )) {
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
            $query = "INSERT INTO tbl_product (product_name ,catId ,brandId ,colorId ,sizeId ,body ,sale_price ,regular_price ,tax ,tag ,sku ,stock ,short_body ,size_guide ,extra_info ,image ,weight ,length ,width ,height ,upsell ,cross_sells ,product_type) VALUES( '$product_name' ,'$catId' ,'$brandId' ,'$colorId' ,'$sizeId' ,'$body' ,'$sale_price' ,'$regular_price' ,'$tax' ,'$tag' ,'$sku' ,'$stock' ,'$short_body' ,'$size_guide' ,'$extra_info' ,'$uploaded_image' ,'$weight' ,'$length' ,'$width' ,'$height' ,'$upsell' ,'$cross_sells' ,'$product_type' )";
            $inserted_rows = $this->db->insert($query);
 
            if ($inserted_rows) {
                $msg = "<span class='success'>Product Published.</span>"; 
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Published !</span>";
                return $msg;
            }            
         }      
    }


    /**
     * Method for Join Query showing product list
     */
    public function getAllProduct(){ 
        $query  = "SELECT tbl_product.*,
                    tbl_category.catName, tbl_brand.brandName, tbl_color.colorName, tbl_size.sizeName
                    FROM tbl_product
                    INNER JOIN tbl_category
                    ON tbl_product.catId = tbl_category.catId
                    INNER JOIN tbl_brand
                    ON tbl_product.brandId = tbl_brand.brandId
                    INNER JOIN tbl_color
                    ON tbl_product.colorId = tbl_color.colorId
                    INNER JOIN tbl_size
                    ON tbl_product.sizeId = tbl_size.sizeId
                    ORDER BY tbl_product.productId DESC"; 
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for showing Product Edit Value 
     */
    public function getProById($id){     
        $query  = "SELECT * FROM tbl_product WHERE productId = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Method for product update
     */
    public function productUpdate(  $data, $file, $id){       
        $product_name    = $this->fm->validation($data['product_name']);
        $catId           = $this->fm->validation($data['catId']);
        $brandId         = $this->fm->validation($data['brandId']);
        $colorId         = $this->fm->validation($data['colorId']);
        $sizeId          = $this->fm->validation($data['sizeId']);
        $body            = $this->fm->validation($data['body']);
        $sale_price      = $this->fm->validation($data['sale_price']);       
        $regular_price   = $this->fm->validation($data['regular_price']);       
        $tax             = $this->fm->validation($data['tax']);       
        $tag             = $this->fm->validation($data['tag']);       
        $sku             = $this->fm->validation($data['sku']);       
        $stock           = $this->fm->validation($data['stock']);       
        $short_body      = $this->fm->validation($data['short_body']);       
        $size_guide      = $this->fm->validation($data['size_guide']);       
        $extra_info      = $this->fm->validation($data['extra_info']);       
        $weight          = $this->fm->validation($data['weight']);       
        $length          = $this->fm->validation($data['length']);       
        $width           = $this->fm->validation($data['width']);       
        $height          = $this->fm->validation($data['height']);       
        $upsell          = $this->fm->validation($data['upsell']);       
        $cross_sells     = $this->fm->validation($data['cross_sells']);       
        $product_type    = $this->fm->validation($data['product_type']);
     
        $product_name    = mysqli_real_escape_string( $this->db->link, $data['product_name']);
        $catId           = mysqli_real_escape_string( $this->db->link, $data['catId']);
        $brandId         = mysqli_real_escape_string( $this->db->link, $data['brandId']);
        $colorId         = mysqli_real_escape_string( $this->db->link, $data['colorId']);
        $sizeId          = mysqli_real_escape_string( $this->db->link, $data['sizeId']);
        $body            = mysqli_real_escape_string( $this->db->link, $data['body']);
        $sale_price      = mysqli_real_escape_string( $this->db->link, $data['sale_price']);     
        $regular_price   = mysqli_real_escape_string( $this->db->link, $data['regular_price']);     
        $tax             = mysqli_real_escape_string( $this->db->link, $data['tax']);     
        $tag             = mysqli_real_escape_string( $this->db->link, $data['tag']);     
        $sku             = mysqli_real_escape_string( $this->db->link, $data['sku']);     
        $stock           = mysqli_real_escape_string( $this->db->link, $data['stock']);     
        $short_body      = mysqli_real_escape_string( $this->db->link, $data['short_body']);     
        $size_guide      = mysqli_real_escape_string( $this->db->link, $data['size_guide']);     
        $extra_info      = mysqli_real_escape_string( $this->db->link, $data['extra_info']);           
        $weight          = mysqli_real_escape_string( $this->db->link, $data['weight']);     
        $length          = mysqli_real_escape_string( $this->db->link, $data['length']);     
        $width           = mysqli_real_escape_string( $this->db->link, $data['width']);     
        $height          = mysqli_real_escape_string( $this->db->link, $data['height']);     
        $upsell          = mysqli_real_escape_string( $this->db->link, $data['upsell']);     
        $cross_sells     = mysqli_real_escape_string( $this->db->link, $data['cross_sells']);     
        $product_type    = mysqli_real_escape_string( $this->db->link, $data['product_type']);

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
 
         if (empty( $product_name  || $catId  || $brandId  || $colorId  || $sizeId  || $body  || $sale_price  || $regular_price  || $tax  || $tag  || $sku  || $stock  || $short_body  || $size_guide  || $extra_info  || $file_name  || $weight  || $length  || $width  || $height  || $upsell  || $cross_sells  || $product_type  )) {
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
                    $query = "UPDATE tbl_product
                                SET  
                                product_name  = '$product_name',
                                catId         = '$catId',
                                brandId       = '$brandId',
                                colorId       = '$colorId',
                                sizeId        = '$sizeId',
                                body          = '$body',
                                sale_price    = '$sale_price',
                                regular_price = '$regular_price',
                                tax           = '$tax',
                                tag           = '$tag',
                                sku           = '$sku',
                                stock         = '$stock',
                                short_body    = '$short_body',
                                size_guide    = '$size_guide',
                                extra_info    = '$extra_info',
                                image         = '$uploaded_image',
                                weight        = '$weight',
                                length        = '$length',
                                width         = '$width',
                                height        = '$height',
                                upsell        = '$upsell',
                                cross_sells   = '$cross_sells',
                                product_type  = '$product_type'
                              WHERE productId =' $id'"; 
                    $updated_rows = $this->db->update($query);          
        
                    if ($updated_rows) {
                        $msg = "<span class='success'>Product Updated.</span>"; 
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Product Not Updated !</span>";
                        return $msg;
                    }            
                }
              }  else {
                    $query = "UPDATE tbl_product
                                SET  
                                product_name  = '$product_name',
                                catId         = '$catId',
                                brandId       = '$brandId',
                                colorId       = '$colorId',
                                sizeId        = '$sizeId',
                                body          = '$body',
                                sale_price    = '$sale_price',
                                regular_price = '$regular_price',
                                tax           = '$tax',
                                tag           = '$tag',
                                sku           = '$sku',
                                stock         = '$stock',
                                short_body    = '$short_body',
                                size_guide    = '$size_guide',
                                extra_info    = '$extra_info',                            
                                weight        = '$weight',
                                length        = '$length',
                                width         = '$width',
                                height        = '$height',
                                upsell        = '$upsell',
                                cross_sells   = '$cross_sells',
                                product_type  = '$product_type'
                              WHERE productId =' $id'"; 
                    
                $updated_rows = $this->db->update($query);          

                if ($updated_rows) {
                    $msg = "<span class='success'>Product Updated.</span>"; 
                    return $msg;
                } else {
                    $msg = "<span class='error'>Product Not Updated !</span>";
                    return $msg;
                }    
             }
         }
    }

    /**
     * Method for product delete
     */

    public function delProById($id){
        $query   = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $getData = $this->db->select($query);
            if ($getData) {
            while ($delimg = $getData->fetch_assoc()) {
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
        $delData  = $this->db->delete($delquery);
            if ( $delData ) {
            echo "<script> alert('Product Deleted successfully.');</script>";
            echo "<script> window.location = 'product-list.php'; </script>";
            } else {
            echo "<script> alert('Product not deleted !');</script>";
            echo "<script> window.location = 'product-list.php'; </script>";
        }
    }

   
   
    //Front View Code Start ================================================================//
     

    /**
     * Method for front view All Product for SHOP.PHP
     */
    public function getAllshopProduct(){
        $query  = "SELECT * FROM tbl_product ORDER BY productId";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view Some Recent Product for SHOP.PHP
     */
    public function getSomeShopProduct(){
        $query  = "SELECT * FROM tbl_product ORDER BY productId LIMIT 4";
        $result = $this->db->select($query);
        return $result;
     }
    
    /**
     * Method for front view feature product
     */
    public function getFeturedProduct(){
        $query  = "SELECT * FROM tbl_product WHERE product_type='1' ORDER BY productId DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view Popular product
     */
    public function getPopularProduct(){
        $query  = "SELECT * FROM tbl_product WHERE product_type='2' ORDER BY productId DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view Top Rated
     */
    public function getTopRatedProduct(){
        $query  = "SELECT * FROM tbl_product WHERE product_type='3' ORDER BY productId DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
     }
    
    /**
     * Method for front view Best Seller
     */
    public function getBestSellProduct(){
        $query  = "SELECT * FROM tbl_product WHERE product_type='4' ORDER BY productId DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
     }
    

    /**
     * Method for front view single/details product
     */
    public function getSingleProduct($id){        
        $query = "SELECT p.*, c.catName, b.brandName, cl.colorName, s.sizeName
                  FROM tbl_product as p, tbl_category as c, tbl_brand as b, tbl_color as cl, tbl_size as s
                  WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.colorId = cl.colorId AND p.sizeId = s.sizeId AND p.productId = '$id' ";

        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Category ways product show
     */
    public function productByCat($id){
        $catId  = mysqli_real_escape_string( $this->db->link, $id);
        $query  = "SELECT * FROM tbl_product WHERE catId = '$catId'";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Brand ways product show
     */
    public function productByBrand($id){
        $brandId = mysqli_real_escape_string( $this->db->link, $id);
        $query   = "SELECT * FROM tbl_product WHERE brandId = '$brandId'";
        $result  = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Color ways product show
     */
    public function productByColor($id){
        $colorId = mysqli_real_escape_string( $this->db->link, $id);
        $query   = "SELECT * FROM tbl_product WHERE colorId = '$colorId'";
        $result  = $this->db->select($query);
        return $result;
    }


    /**
     * Method for Product Compare
     */
    public function insertCompareData($cmprid, $cmrId){
        $cmrId      = mysqli_real_escape_string( $this->db->link, $cmrId);
        $productId  = mysqli_real_escape_string( $this->db->link, $cmprid);
          
        // Query for Already Added
        $cquery  = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' AND productId = '$productId'";
        $check   = $this->db->select($cquery);
        if ($check) {
            $msg = "<span class='error'>Already Added ! <a href='compare.php'>Check Compare</a></span>";
            return $msg;
           }    

        // Select for insert Compare table
        $query  = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($query)->fetch_assoc(); 
        if ($result) {
          
               $productId    = $result['productId'];
               $product_name = $result['product_name'];
               $sale_price   = $result['sale_price'];
               $image        = $result['image'];

               // Insert for Compare
               $query = "INSERT INTO tbl_compare (cmrId, productId, product_name, sale_price, image) VALUES('$cmrId', '$productId', '$product_name', '$sale_price', '$image')";
               $inserted_rows = $this->db->insert($query);   
               
               if ($inserted_rows) {
                $msg = "<span class='success'> Product  Added for Compare! <a href='compare.php'>View Compare</a>.</span>"; 
                return $msg;
               } else {
                $msg = "<span class='error'>Not Added Compare !</span>";
                return $msg;
               }
           }     
    }


    /**
     * Get Compare Data
     */
    public function getComparedData($cmrId){
        $query = "SELECT * FROM tbl_compare WHERE cmrId = '$cmrId' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Delete Compare Data; when click logout button. 
     */
    public function delCompareData($cmrId){
        $query = "DELETE FROM tbl_compare WHERE cmrId = '$cmrId'";
        $delData  = $this->db->delete($query);
    }


    /**
     * Get Wish List Data
     */
    public function saveWishListData($id, $cmrId){

        // Query for Already Added
        $cquery  = "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId' AND productId = '$id'";
        $check   = $this->db->select($cquery);
        if ($check) {
            $msg = "<span class='error'>Already Added !  <a href='wishlist.php'>Check Wishlist</a></span>";
            return $msg;
            } 

        //  Select for insert Wish List table
        $pquery  = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($pquery)->fetch_assoc(); 
        if ($result) {
               $productId    = $result['productId'];
               $product_name = $result['product_name'];
               $sale_price   = $result['sale_price'];
               $image        = $result['image'];

              // Insert for Wishlist 
               $query = "INSERT INTO tbl_wishlist (cmrId, productId, product_name, sale_price, image) VALUES('$cmrId', '$productId', '$product_name', '$sale_price', '$image')";
               $inserted_rows = $this->db->insert($query);     

               if ($inserted_rows) {
                $msg = "<span class='success'>Prduct Added for Wishlist ! <a href='wishlist.php'>View Wishlist</a></span>"; 
                return $msg;
               } else {
                $msg = "<span class='error'>Not Added Wishlist !</span>";
                return $msg;
               }      
        }
    }


    /**
     * control wish list page & show wish list
     */
    public function checkWlistData($cmrId){
        $query = "SELECT * FROM tbl_wishlist WHERE cmrId = '$cmrId' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }


    /**
     * Remove Wish List
     */
    public function delWlistData($cmrId, $productId){
        $query = "DELETE FROM tbl_wishlist WHERE cmrId = '$cmrId' AND productId = '$productId'";
        $delData  = $this->db->delete($query);
        if ($delData) {
            $msg = "<span class='success'>Remove Wish List Product.</span>"; 
            return $msg;
           } else {
            $msg = "<span class='error'>Not Remove !</span>";
            return $msg;
           }    
    }
   
}
