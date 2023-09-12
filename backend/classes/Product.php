<?php 
require_once 'Database.php';
class Product {
    private  $db;
    public function __construct() {
        $this->db = new Database();

    }
    //CRUD 
    public function insertProduct($name, $quantity){
        $query = "select * from products where productname='$name'; ";
        if($this->db->select($query)){
            $alert = "<span>Product is taken</span>";
        }
        else {
        $query = "insert into products (productname, quantity) value ('$name', $quantity); ";
        if($this->db->insert($query))
           $alert = "<span>Success</span>";
            else $alert = "<span>Failed</span>";
        }
        return $alert;
    }

    public function getAllProduct(){
        $query = "select * from products;";
        return ($this->db->select($query));
    }

    public function getProductbyId($id){
        $query = "select * from products where product_id=$id; ";
        return ($this->db->select($query));
    }

    public function updateProduct($name, $quantity){
        $query = "select * from products where productname='$name'; ";
        if($this->db->select($query)){
            $query2="update products set quantity=$quantity
                    where productname='$name';";
            if ($this->db->update($query2)) 
                echo "update ok";
                else echo "update failed";
        }
        else echo "Can not found";
       
    }

    public function deleteProduct($id){
        $query = "select * from products where product_id=$id; ";
        if($this->db->select($query)){
            $query2="delete from products where product_id=$id;";
            if ($this->db->update($query2)) 
                echo "delete ok" ;
                else echo "delete failed";
        }
        else echo "Can not found";
       
    }
}
?>
