<?php 
include 'inc/header.php';

$viewcat = $cat->getAllCat();
$viewbr = $br->getAllBrand();
$quant = $qa->getAllQuantity();
if (isset($_POST['insert'])) {
  echo $pd->Insertproduct($_POST,$_FILES);
   
}
 ?>

      <div class="container-fluid">
        <h1 class="mt-4"> Upload New Product <a href="viewproduct.php">View Product</a></h1>

      	<form method="post" action="" enctype="multipart/form-data">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Product title</label>
    <input type="text" name="productName" id="form4Example1" class="form-control" />
  </div>

  <!-- Email input -->
   <div class="form-group">
  <label for="sel1">Category:</label>
  <select name="catId" class="form-control" id="sel1">
  	<?php  while ($res = $viewcat->fetch_assoc()) { ?>
    <option value="<?php echo $res['catId']; ?>"><?php echo $res['catName'] ?></option>
 <?php }  ?>
  </select>
</div> 
 <div class="form-group">
  <label for="sel1">Brand</label>
  <select name="brandId" class="form-control" id="sel1">
    	<?php  while ($res = $viewbr->fetch_assoc()) { ?>
    <option value="<?php echo $res['brandId']; ?>"><?php echo $res['brandName'] ?></option>
 <?php }  ?>
 
  </select>
</div> 
<div class="form-group">
  <label for="sel1">Unit </label>
  <select name="quantityId" class="form-control" id="sel1">
    	<?php  while ($res = $quant->fetch_assoc()) { ?>
    <option value="<?php echo $res['quantityId']; ?>"> <?php echo $res['quantity_name'] ?></option>
 <?php }  ?>
 
  </select>
</div> 
<div class="form-group">
  <label for="sel1">Type</label>
  <select name="offer" class="form-control" id="sel1">
     
    <option value="0">No Offer</option>
    <option value="1">Add Offer</option>
 
 
  </select>
</div> 


 <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Product Price</label>
    <input name="price" type="text" id="form4Example1" class="form-control" />
  </div>
   <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Product Quantity</label>
    <input name="total_quantity" type="number" min="0" value="0"id="form4Example1" class="form-control" />
  </div>
   <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Product Code</label>
    <input name="productCode" readonly value="<?php echo substr(md5(time()), 0, 8); ?>" type="text"  class="form-control" />
  </div>
  
   <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Product Image</label>
    <input type="file" name="image" id="form4Example1" class="form-control" />
  </div>
  <!-- Message input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example3">Product Details</label>
    <textarea class="form-control" name="body" id="form4Example3" rows="4"></textarea>
  </div>

  <!-- Checkbox -->
 

  <!-- Submit button -->
  <button type="submit" name="insert" class="btn btn-primary btn-block mb-4">Upload</button>
</form>
      </div>
   <?php include 'inc/footer.php'; ?>