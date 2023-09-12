<?php 
require_once '../backend/config/function.php';
require_once '../backend/classes/Product.php';
    $pd = new Product();
    if (isset($_GET["productid"]) && $_GET["productid"] != null) {
        $productid = $_GET['productid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $ins = $pd->deleteProduct($productid);
        echo $ins;
        header("location: ad_listproduct.php");
      }
    
?>