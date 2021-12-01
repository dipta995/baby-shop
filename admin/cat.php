<?php 
include 'inc/header.php';
if (isset($_POST['insert'])) {

  echo $cat->catInsert($_POST);
	 
}
 
if (isset($_POST['update'])) {
 
  echo $cat->catUpdate($_POST,($_GET['editbr']));
   
}
if (isset($_GET['delbr'])) {
  $delbr = $_GET['delbr'];
  echo $cat->delCatById($delbr);
   
}
 
$viewbr = $cat->getAllCat();

 
 ?>

      <div class="container-fluid">
        <h1 class="mt-4"> Upload New category name <a href="cat.php">Now</a></h1>
<div class="row">
  <div class="col-md-5">

  <?php if (isset($_GET['editbr'])) { 
    $editbrandview = $cat->getAllCatId(($_GET['editbr']));
foreach ($editbrandview as $value) {

    ?>
     <form method="post" action="" >
  <!-- Name input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Brand Name</label>
    <input type="text" value="<?php echo $value['catName']; ?>" name="catName" id="form4Example1" class="form-control" />
  </div>
 
 
 
  <button type="submit" name="update" class="btn btn-primary btn-block mb-4">Update</button>
</form>
   <?php } }else{ ?>
    <form method="post" action="">
  <!-- Name input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form4Example1">Brand Name</label>
    <input type="text" name="catName" id="form4Example1" class="form-control" />
  </div>
 
 
  <button type="submit" name="insert" class="btn btn-primary btn-block mb-4">Send</button>
</form> <?php } ?>
  </div>
  <div class="col-md-7">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody> <?php 
  $a = 0;
                  while ($result = $viewbr->fetch_assoc()) {
                    $a++;

                ?>
    <tr>
      <th scope="row"><?php echo $a; ?></th>
      <td><?php echo $result['catName'] ?></td>
      <td><a href="?editbr=<?php echo $result['catId'] ?>">Edit</a></td>
      <td><a href="?delbr=<?php echo $result['catId'] ?>">Delete</a></td>
    </tr>
 <?php } ?>
 
  </tbody>
</table>

  </div>
</div>
      	

      </div>
   <?php include 'inc/footer.php'; ?>