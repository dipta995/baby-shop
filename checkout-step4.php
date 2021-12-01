<?php include'inc/header.php';?>

<?php
Session::checkSession();


 if (isset($_GET['orderc'])==1) {
  $ct->addToOrder($customerId);
} ?>

  <div id="checkout-step-contain">
    <div class="container">
      <div class="account-content checkout-staps">
        <div class="staps">
 <!--          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap ">
                <div class="title"> <span class="stap">1 </span><a href="checkout-step1.php">Billing &amp; Shipping Address</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap ">
                <div class="title"><span class="stap">2 </span><a href="checkout-step2.php">Shipping Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"><span class="stap">3 </span><a href="checkout-step3.php">Payment Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap active">
                <div class="title"><span class="stap">4 </span><a href="checkout-step4.php">Order</a></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2 class="delivery-method tf">Order Riview</h2>
        </div>
        <div class="col-md-12">
          <div class="cart-content table-responsive">
            <table class="cart-table ">
              <tbody>
                <tr class="Cartproduct carttableheader">
                  <td style="width:10%"> Product</td>
                  <td style="width:45%">Details</td>
                  <td style="width:10%">QNT</td>
            
                  <td style="width:15%">Total</td>
                  <td class="delete" style="width:10%">&nbsp;</td>
                </tr>
                     <?php
          
              $sum = "";
              $quanti = "";

              $getpro = $ct->getCartProduct();
                if ($getpro) {
                  $i = 0;
                  while ($result = $getpro->fetch_assoc()) {
                    $i++;
                  
              ?>
                  <tr class="Cartproduct">
                  <td ><div class="image"><a href="product-details.php"><img alt="img" src="<?php echo $result['image'];?>"></a></div></td>
                  <td><div class="product-name">
                      <h4><a href="product-detail-view.php"><?php echo $result['productName']; ?></a></h4>
                    </div>
                    <span class="size"></span>
                    <div class="price"><span><?php echo $result['price']; ?> Taka</span></div></td>
                  <td class="product-quantity"><div class="quantity">
                       
               
     
               <?php echo $result['quantity']?>
                    </div></td>
                   
                  <td class="price"><?php 

                    $total = floatval($result['price']) * floatval($result['quantity']);
                echo $total ?> Taka</td>
                   
                </tr>
                 <?php 
                $quanti = floatval($quanti) + floatval($result['quantity']);
                $sum = floatval($sum) + floatval($total);
                
                Session::set("quanti", $quanti);
              ?>
              <?php } } ?>


              
                      <?php 
              $check = $ct->checkCart();
                if ($check){
            ?>
                <tr class="cart-detail">
                  <td colspan="4">Total products</td>
                  <td colspan="2" class="price"><?php echo $quanti; ?></td>
                </tr>
                <tr class="cart-detail">
                  <td colspan="4">Shipping</td>
                  <td colspan="2" class="price"><span class="success">Free shipping!</span></td>
                </tr>
                <tr class="cart-detail cart-total-price ">
                  <td colspan="4" >Total (tax excl.)</td>
                  <td colspan="2" class="price">TK. <?php echo $sum ?></td>
                </tr>
                <tr class="cart-detail">
                  <td colspan="4">Total tax</td>
                  <td colspan="2" class="price" id="total-tax"><?php
                echo $vat = $sum * 0.1;
                  
                  
                  ?></td>
                </tr>
                <tr class="cart-detail">
                  <td colspan="4"> Total</td>
                  <td colspan="2" class="price" id="total-price"><?php
                 $vat = $sum * 0.1;
                  $gtotal =  $sum + $vat;
                  echo $gtotal;
                  Session::set("sum", $gtotal);
                  ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="cart-bottom">
            <div class="box-footer">
             <!--  <div class="pull-left"><a href="checkout-step3.html" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Payment Method </a></div> -->
             <?php 
             $check = $ct->checkCart();
                if ($check){
              ?>
              <div class="pull-right"> <a class="btn btn-primary btn-small " href="?orderc=1"> Confirm Order &nbsp; <i class="fa fa-check"></i> </a> </div><?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php include'inc/footer.php';?>