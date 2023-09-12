<?php 
  require_once '../backend/config/function.php';
  require_once '../backend/classes/Product.php';
  $pd = new Product();
  $res=$pd->getAllProduct();
  $rows=$res->num_rows;
?>

<head>
  <title>Product Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="d-flex">
  <div class="input-group" class="d-flex">
    <div class="form-outline">
      <input type="search" id="form1" placeholder="Search product" class="form-control" />
    
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
    </div>
  </div>
  <a href="ad_addproduct.php">
    <button class="btn btn-primary btn-block mb-4 mt-3">Add</button>
  </a>
</div>

  <div class="container mt-3">
    <h2>Product List</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>???</th>
        </tr>
      </thead>
      <tbody>  
        <?php
            if ($res) {
            $j = 0;
            while ($showres = $res->fetch_assoc()) {
              $j++;
              // $res->data_seek($j);
              
        ?>
          <tr>
            <td><?php echo $showres['product_id'] ?></td>
            <td><?php echo $showres['productname']?></td>
            <td><?php echo $showres['quantity']   ?></td>
            <td>
              <a href="ad_updateproduct.php?productid=<?php echo $showres['product_id'] ?>" class="btn btn-primary btn-block mb-4 mt-3">Update</a>
              <a href="ad_deleteproduct.php?productid=<?php echo $showres['product_id'] ?>" class="btn btn-primary btn-block mb-4 mt-3">Delete</a>
            </td>
          </tr>
        <?php }} ?>
      </tbody>
    </table>
  </div>




<img src="http://t1.gstatic.com/licensed-image?q=tbn:ANd9GcTanua2hrFRrS7caz60Yo6UQoObOBR28_mrz7MPdA2CDty-CWssniGCZR44t04aYdJvcu0bD--rwZ_IQGUeqxQ" alt="">

</body>
</html>
