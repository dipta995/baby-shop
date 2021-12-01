<?php include'inc/header.php';?>
  <?php
    if (!isset($_GET['productid']) || $_GET['productid'] ==NULL) {
        echo "<script>window.location = 'index.php'; </script>";
    }else{
        $id = $_GET['productid'];
    }
/*    if ($_SERVER['REQUEST_METHOD']== 'POST') {
      $quantity = $_POST['quantity'];
      if ($quantity<= 0) {
        
      }else{

      $addCart = $ct->addToCart($quantity,$id);
      }
      

    }*/
?>

  <div id="product-category">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4"> 
              <!-- left block Start  -->
              <div id="left">
            <div class="sidebar-block">
              <div class="sidebar-widget Category-block">
                <div class="sidebar-title">
                  <h4> Categories</h4>
                </div>
                <ul class="title-toggle">
               
                   <?php
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                      while ($result = $getCat->fetch_assoc()) {
                    ?>
                  <li><a href="grid-view.php?catid=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
                 <?php } } ?>
                </ul>
              </div>
              
              <div class="sidebar-widget Shop-by-block">
                <div class="sidebar-title">
                  <h4>Shop by</h4>
                </div>
                <ul class="title-toggle">
                  <li class="category">
                    <h5><a href="grid-view.php">Brand</a></h5>
                    <ul>
                    <?php
                    $getBr = $br->getAllBrand();
                    if ($getBr) {
                      while ($result = $getBr->fetch_assoc()) {
                     ?>
                      <li><a href="grid-view.php?brandid=<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></a></li>
                      <?php } } ?>
                    </ul>
                  </li>
              
                </ul>
              </div>
              <div class="sidebar-widget banner-block">
                 <div id="special" class="owl-carousel">
                 <?php
                $getApd = $pd->getOfferproduct();
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {

                ?>
              <div class="item"><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><img src="<?php echo $result['image']; ?>" alt="#"></a> </div>
            <?php } }?>
              
            </div>
              </div>
              <div class="sidebar-widget Best-Products-block">
                <div class="sidebar-title">
                  <h4> Best Products</h4>
                </div>
                <ul class="title-toggle">
                         <?php
                $bestpro = $pd->bestproduct();
                if ($bestpro) {
                  while ($result = $bestpro->fetch_assoc()) {

                ?>  
         
                  <li>
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="<?php echo $result['image'] ?>"></a> </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            <h5><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><?php echo $result['productName'] ?></a></h5>
                          </div>
                          <div class="review"></div>
                          <div class="price"> <span class="price-new"><?php echo $result['price'] ?> Taka</span> </div>
                          <div class="addto-cart"><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>">Add to Cart</a></div>
                        </div>
                      </div>
                    </div>
                  </li>
                   <?php } }  ?>

                  
                </ul>
              </div>
            </div>
          </div>
          <!-- left block end  --> 
        </div>
        <div class="col-md-9 col-sm-8"> 
          <!-- right block Start  -->
          <div id="right">
          <?php 
          $catid="";
          $proid = $_GET['productid'];
          $getprobyid = $pd->getProById($proid);
          if ($getprobyid) {
            while ($result = $getprobyid->fetch_assoc()) {
              $catid = $result['catId']; 
              
          ?>
            <div class="product-detail-view">
              <div class="row">
                <div class="col-md-6">
                  <div class="sp-loading"><img src="images/sp-loading.gif" alt=""><br>
                    LOADING IMAGES</div>
                  <div class="sp-wrap"> <a class="item" href="<?php echo $result['image'];?>"><img src="<?php echo $result['image'];?>" alt=""></a> <!-- <a class="item" href="images/product/feature-pro-2.jpg"><img src="images/product/feature-pro-2.jpg" alt=""></a>  --> </div>
                </div>
                <div class="col-md-6">
                  <div class="product-detail-content">
                    <div class="product-name">
                      <h4><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><?php echo $result['productName'];?> </a></h4>
                    </div>
                 
                    <div class="price">   <span class="price-new"><?php echo $result['price'];?>Taka</span> </div>
                    <div class="stock"><span>In stock : </span><?php 
						if($result['total_quantity']==0){echo "Out of Stock";}else{ echo "<span style='color:green;'>Available</span>";}
					?> </div>
                    <div class="products-code"> <span>Product Code :</span> <?php echo $result['productCode'];?></div>
                   
               <!--      <div class="Sort-by">
                      <label>Sort by</label>
                      <select class="selectpicker form-control" id="select-by-size">
                        <option selected="selected" value="#">S</option>
                        <option value="#">M</option>
                        <option value="#">L</option>
                      </select>
                    </div>
                    <div class="Color">
                      <label>Color</label>
                      <select class="selectpicker form-control" id="select-by-color">
                        <option selected="selected" value="#">Blue</option>
                        <option value="#">Green</option>
                        <option value="#">Orange</option>
                        <option value="#">White</option>
                      </select>
                    </div> -->
          
                      
                    <div class="product-qty">
                      <?php 
                    if (isset($_SERVER['REQUEST_METHOD'])== 'POST' && isset($_POST['quan'])) {
      $quantity = $_POST['quantity'];
      if ($quantity<= 0) {
        
      }else{

      echo $addCart = $ct->addToCart($quantity,$id);
      }
      

    }
                       ?>
                      <form action="" method="post">
            <input type="number" class="buyfield" name="quantity" value="0" max="<?php echo $result['total_quantity']; ?>"/>
             <div class="add-to-cart">
			 <?php 
			 if($result['total_quantity']>0){			 ?>
            <input type="submit" class="btn btn-default" name="quan" value="Add to Cart"/>
			 <?php } ?>
            </div>
          </form> 
                       
                    </div>
                   
                    
                  </div>
                  <br>
                  <?php if (isset($_POST['ratsubmit'])) {
                    $cont->ratsubmit($_POST,$proid,$customerId);
                  }
	$checkres = $pd->checkorderproducgt($proid,$customerId);
	if($checkres=="Success"){
				  ?>
				  
				  
                     <form method="post" action="">
                     <select style="width: 100px;" name="total_rat">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       
                     </select>
                    <div class="add-to-cart">
            <input type="submit" class="btn btn-default" name="ratsubmit" value="Rating Now"/>
            </div>
                   </form>
	<?php } ?>
                </div>
              </div>
            </div>
            <div class="product-detail-tab">
              <div class="row">
                <div class="col-md-12">
                  <div id="tabs">
                    <ul class="nav nav-tabs">
                      <li><a class="tab-Description selected" title="Description">Description</a></li>
                       
                    </ul>
                  </div>
                  <div id="items">
                    <div class="tab-content">
                      <ul>
                        <li>
                          <div class="items-Description selected">
                            <div class="Description">  
                            <?php echo $result['body'];?>
                              
                             </div>
                          </div>
                        </li>
                       
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php  } }  ?>

            <div class="Related-product">
              <div class="row">
                <div class="col-md-12">
                  <div class="Featured-Products-title">
                    <h1 class="tf">Related Products</h1>
                  </div>
                  <div class= "customNavigation"> <a class="btn related_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn related_next next"><i class="fa fa-angle-right"></i></a> </div>
                  <div id="related-products" class="owl-carousel">
                     
                     
                   <?php
                $getApd = $pd->relatedproductview($catid);
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {

                ?>  
         
                    <div class="item">
                      <div class="product-block ">
                        <div class="image"> <a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><img style="height: 250px; width: 250px;" class="img-responsive" title="T-shirt" alt="T-shirt" src="<?php echo $result['image']; ?>"></a> </div>
                        <div class="product-details">
                          <div class="product-name">
                            <h4><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><?php echo $result['productName']; ?></a></h4>
                          </div>
                          <div class="price"><!--  <span class="price-old">$123.20</span> --> <span class="price-new"><?php echo $result['price']; ?> Taka</span> </div>
                          <div class="product-hov">
                            <ul>
                       
                              <li class="addtocart"><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>" >Details View</a> </li>
                           
                            </ul>
                    <div class="review"> <span class="rate">
                            <?php  $rat = $cont->getavgrate($result['productId']);
                            for ($i=1; $i <= $rat ; $i++) {  ?>
                              <i class="fa fa-star rated"></i> 
                            <?php }

                             ?>
                            </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
   <?php } } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- right block end  --> 
        </div>
      </div>
    </div>
  </div>
 
     
  <?php include'inc/footer.php';?>
