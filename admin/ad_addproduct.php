<?php 
require_once '../backend/config/function.php';
require_once '../backend/classes/Product.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = sanitizeString($_POST["product_name"]);
        $quan = sanitizeString($_POST["product_quantity"]);
        $ins = $pd->insertProduct($name,$quan); 
      }
?>
<html lang="en">
<head>
    <title>Add product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!--  -->
  <div>
         
         <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
         <fieldset>
         
         <!-- Text input-->
         <div class="form-group">
           <label class="col-md-4 mt-3 control-label" for="product_name">PRODUCT Name</label>  
           <div class="col-md-4">
           <input id="product_name" name="product_name" placeholder="product id" class="form-control input-md" required="" type="text">  
           </div>
         </div>
         <!-- Text input-->
         <div class="form-group">
           <label class="col-md-4 mt-3 control-label" for="product_quantity">PRODUCT Quantity</label>  
           <div class="col-md-4">
           <input id="product_quantity" name="product_quantity" placeholder="product name" class="form-control input-md" required="" type="text">
             
           </div>
         </div>
         <!-- Select Basic -->
         <!-- <div class="form-group">
           <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
           <div class="col-md-4">
             <select id="product_categorie" name="product_categorie" class="form-control">
             </select>
           </div>
         </div> -->
         <?php
           if (isset($ins)) echo $ins;
         ?>            
         <!-- Button -->
         <button type="submit" class="btn btn-primary btn-block mb-4 mt-3" name="addPd">Add </button>
        
       
         </fieldset>
         </form>
         
       </div>
</body>
</html>