<?php include'inc/header.php';?>
  
  <!-- Main Banner Start-->
  <div id="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div id="main-slider" class="owl-carousel">
            <?php 
$getApd = $pd->getOfferproductlimet();
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {

             ?>
            <div class="item"><img style="width: 100%; height: 450px;"  src="<?php echo $result['image'] ?>" alt="main-banner1"> </div>
          <?php }} ?>
           <!--  <div class="item"><img src="images/product/slide2.jpg" alt="main-banner2"></div>
            <div class="item"><img src="images/product/slide3.jpg" alt="main-banner3"></div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Banner End --> 
 
  

  
  <!-- Featured Products block Start  -->
  <div id="Featured">
    <div class="container">
      <div class="row">
        <div class="col-md-12 featured">
          <div class="Featured-Products-title">
            <h2 class="tf">Trending Now!<span> Get Our Best Prices </span></h2>
          </div>
          <div class= "customNavigation"> <a class="btn featured_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn featured_next next"><i class="fa fa-angle-right"></i></a> </div>
          <div class="box">
            <div id="featured-products" class="owl-carousel">
                <?php
                $getApd = $pd->getAllProductFrontpage();
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {

                ?>
              <div class="item">
                <div class="product-block ">
                  <div class="image"> <a href="product-detail-view.php?productid=<?php echo $result['productId'];?>"><img class="img-responsive spimg" title="T-shirt" alt="T-shirt" src="<?php echo $result['image'];?>"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="product-detail-view.php?productid=<?php echo $result['productId'];?>"><?php echo $result['productName'];?> </a></h3>
                    </div>
                    <div class="price"> <span class="price-new"><?php echo $result['price'];?>Taka</span> </div>
                    <div class="product-hov">
                       
                          <div class="review"> <span class="rate">
                            <?php  $rat = $cont->getavgrate($result['productId']);
                            for ($i=1; $i <= $rat ; $i++) {  ?>
                              <i class="fa fa-star rated"></i> 
                            <?php }

                             ?>
                            </span> </div>
                        
                      
                     <ul>
                        
                        <li class="addtocart"><a href="product-detail-view.php?productid=<?php echo $result['productId'];?>" >Show Product</a> </li>
                        
                      </ul>
                     
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
  </div>
  <!-- Featured Products block End  --> 
  
  <!-- CMS Banner & Video block Start  
  <div id="video">
    <div class="container">
      <div class=" cms-video-bg">
        <div class="col-md-4">
          <div class="cms-banner">
            <p>Latest Offers & Deals Every Single Day</p>
            <h4>30% off</h4>
            <p> Save big with the best further shopping deals and discounts</p>
            <button type="button" class="btn btn-default">Shop Now</button>
          </div>
        </div>
        video start -->
        <!-- video start
        <div class="col-md-8 video">
          <video controls>
            <source src="video/Fashion_Film.mp4" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
          </video>
        </div>
        video end --> 
        <!-- video end 
      </div>
    </div>
  </div>
   CMS Banner & Video block End  --> 
  
  <!-- Latest News block Start  -->
  <div id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-9 news">
          <div class="Latest-News-title">
            <h2 class="tf">Latest Product!<span> From newest items </span></h2>
          </div>
          <div class= "customNavigation"> <a class="btn Latest_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn Latest_next next"><i class="fa fa-angle-right"></i></a> </div>
          <div id="Latest-News" class="owl-carousel ">
               <?php
                $getApd = $pd->getAllProductletest();
                if ($getApd) {
                  while ($result = $getApd->fetch_assoc()) {

                ?>
            <div class="item">
              <div class="post">
                <div class="image"> <a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><img src="<?php echo $result['image']; ?>" alt="post" title="post" class="img-responsive"></a> </div>
                <div class="content-details">
                  <div class="post-title">
                    <h3><a href="product-detail-view.php?productid=<?php echo $result['productId']; ?>"><?php echo $result['productName']; ?></a></h3>
                  </div>
                  <div class="description">
                    <p><?php echo $fm->textShorten($result['body'],50); ?></p>
                      <div class="review"> <span class="rate">
                            <?php  $rat = $cont->getavgrate($result['productId']);
                            for ($i=1; $i <= $rat ; $i++) {  ?>
                              <i class="fa fa-star rated"></i> 
                            <?php }

                             ?>
                            </span> </div>
                    <div class="read-more"> <a class="read-more" href="product-detail-view.php?productid=<?php echo $result['productId']; ?>">Read More..</a> </div>
                  </div>
                </div>
              </div>
            </div>
        <?php } } ?>
         
           
          </div>
        </div>
        <div class="col-md-3 special">
          <div class="Special-title">
            <h2 class="tf">Best<samp> Offers</samp></h2>
          </div>
          <div class= "customNavigation"> <a class="special_prev"><i class="fa fa-angle-left"></i></a>
            <div id="owlStatus">
              <div class="currentItem">
                <div class="result"></div>
              </div>
              /
              <div class="owlItems">
                <div class="result"></div>
              </div>
            </div>
            <a class="special_next"><i class="fa fa-angle-right"></i></a> </div>
          <div class="Special-product">
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
        </div>
      </div>
    </div>
  </div>
  <!-- Latest News block End  --> 
  
  <?php include'inc/footer.php';?>

  
  