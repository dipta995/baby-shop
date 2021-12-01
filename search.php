<?php 
 if (( isset($_GET['keyword']))) { ?>
	<?php include'inc/header.php';?>

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
                          <div class="price"> <span class="price-new">$<?php echo $result['price'] ?></span> </div>
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
        
        
            <div class="product-grid-view">
              <ul>
              <?php 
            /*  $catid="";
              $brandid="";
              if (  isset($_GET['catid'])) {
                $catid = $_GET['catid'];
              }elseif (isset($_GET['brandid'])) {
                $brandid = $_GET['brandid'];
              }*/
    
                
                  $getApd = $pd->Searchproduct($_GET['keyword']);
                
                ?>
                <?php
               
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {
                ?>
                <li>
                  <div class="item col-md-4 col-sm-6 col-xs-6">
                    <div class="product-block ">
                  <div class="image"> <a href="product-detail-view.php?productid=<?php echo $result['productId'];?>"><img class="img-responsive spimg" title="T-shirt" alt="T-shirt" src="<?php echo $result['image'];?>"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="product-detail-view.php?productid=<?php echo $result['productId'];?>"><?php echo $result['productName'];?> </a></h3>
                    </div>
                    <div class="price"> <span class="price-new"><?php echo $result['price'];?>Taka</span> </div>
                    <div class="product-hov">
                      <ul>
                        
                        <li class="addtocart"><a href="product-detail-view.php?productid=<?php echo $result['productId'];?>" >Add to Cart</a> </li>
                        
                      </ul>
                     
                    </div>
                  </div>
                </div>
                  </div>
                </li>
                <?php } }  ?>
              </ul>
            </div>
          </div>
      <!--     <div class="row">
            <div class="pagination-bar">
              <ul>
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div> -->
          <!-- right block end  --> 
        </div>
      </div>
    </div>
  </div>
  
   
<script>
	$(function() {
    	$( "#slider-range" ).slider({
      	range: true,
      	min: 0,
      	max: 800,
      	values: [ 75, 500 ],
      	slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      	}
    	});
    	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      	" - $" + $( "#slider-range" ).slider( "values", 1 ) );
  		});
  	</script> 
  <?php include'inc/footer.php';?>
	
	
<?php }else {
	
}
 ?>