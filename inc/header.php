<?php

include 'lib/Database.php'; 
include 'helpers/Format.php';
spl_autoload_register(function($class){
  include_once "classes/".$class.".php";

});
session_start();
$db = new Database();
$fm = new Format();
$pd = new Product();
$cat = new Catagory();
$br = new Brand();
$ct = new Cart();
$cont = new Contact();
$customerId = Session::get('customerId')
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache")
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Baby Shop</title>
<meta content="" name="description">
<meta content="" name="author">
<link rel="shortcut icon" type="image/x-icon" href="images/baby.jpg">
<link rel="icon" type="image/png" href="images/baby.jpg">
<link rel="apple-touch-icon" href="images/favicon.png">
<link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poppins:300,500,600,700' rel='stylesheet' type='text/css'>
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/smoothproducts.css">
</head>
<body id="index">
<div class="wrapar"> 
  <!-- Header Start-->
  <div class="header">
    <div class="header-top">
      <div class="container">
        <div class="call pull-left">
          <p>Call us toll free : <span>+1324 56789</span></p>
        </div>
        <div class="user-info pull-right">
          <div class="user">
            <ul>
              <li>
                <?php 

                if (Session::get('customerlogin')==true) {
                  echo $firstName = Session::get('firstName');
                }else{
                 ?>
           
                <a href="#" data-toggle="modal" data-target="#login">Login</a> <?php } ?>
                <!-- Modal -->
                <div class="modal fade" id="login" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="panel-heading">
                          <div class="panel-title pull-left">Login</div>
                          <div class="pull-right">
                            <button aria-hidden="true" data-dismiss="modal" class="close btn btn-xs " type="button"> <i class="fa fa-times"></i> </button>
                          </div>
                        </div>
                      </div>
                      <div class="modal-body">

                        <form id="loginform" method="post" action="login.php" class="form-horizontal">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">
                          </div>
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                          </div>
                         
                          <div class="form-group"> 
                            <!-- Button -->
                            <div class="col-sm-12 controls"> <button id="btn-login" name="login" href="#" class="btn btn-primary btn-success">Login</button>   </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <div class="col-md-12 control">
                            <div>Don't have an account! <a href="register.php" >Sign Up Here</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <?php 
                  if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                Session:: destroy();
                                header('Location:index.php');
                            }

                 if (Session::get('customerlogin')==true) { ?>
                  <a href="?action=logout">logout</a>
               <?php }else{ ?>

                <a href="register.php">Register</a>
              <?php } ?>

                <div class="modal fade" id="register" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="panel-heading">
                          <div class="panel-title pull-left">Register</div>
                          <div class="pull-right">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times"></i> </button>
                          </div>
                        </div>
                      </div>
                      <form method="post" action="login.php">
                    
                      <div class="modal-body">
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">First Name</label>
                          <div class="controls">
                            <input type="text" id="username" name="firstName" placeholder="" class="input-xlarge">
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                          </div>
                        </div>
                         <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Last Name</label>
                          <div class="controls">
                            <input type="text" id="username" name="lastName" placeholder="" class="input-xlarge">
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                          </div>
                        </div>
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Address</label>
                          <div class="controls">
                            <textarea type="text" id="username" name="address" placeholder="" class="input-xlarge"></textarea>
                            
                          </div>
                        </div>
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Phone</label>
                          <div class="controls">
                            <input type="text" id="username" name="phone" placeholder="" class="input-xlarge">
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                          </div>
                        </div>
                        <div class="control-group"> 
                          <!-- E-mail -->
                          <label class="control-label" for="email">E-mail</label>
                          <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                            <p class="help-block">Please provide your E-mail</p>
                          </div>
                        </div>
                        <div class="control-group"> 
                          <!-- Password-->
                          <label class="control-label" for="password">Password</label>
                          <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                            <p class="help-block">Password should be at least 4 characters</p>
                          </div>
                        </div>
                      
                        <div class="control-group"> 
                          <!-- Button -->
                          <div class="controls">
                            <button name="register" class="btn btn-success">Register</button>
                          </div>
                        </div>
                      </div>

                      </form>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-mid">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header-left">
            <div class="logo"> <a href="index.php"><img src="images/baby.jpg" alt="#"></a> </div>
          </div>
          <div class="col-md-6 search_block">
            <div class="search">
              <form action="search.php" method="get">
               <!--  <div class="search_cat">
                  <select class="search-category" name="search-category">
                    <option class="computer" selected>All Categories</option>
                    <?php
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                      while ($result = $getCat->fetch_assoc()) {
                     ?>
                    <option class="computer" value="<?php echo $result['catName'];?>" ><?php echo $result['catName'];?></option>
                  <?php } } ?>
                    
                  </select>
                  <span class="fa fa-angle-down"></span> </div> -->
                <input name="keyword" type="text" placeholder="Search...">
                <button type="submit" class="btn submit"> <span class="fa fa-search"></span></button>
              </form>
            </div>
          </div>
          <div class="col-md-3 header-right">
            <div class="cart">
              <div class="cart-icon dropdown"></div>
             <!--  <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="cart.php">My Cart -->
              <a aria-expanded="false" aria-haspopup="true" role="button"  href="cart.php">My Cart

                <?php

                $check = $ct->checkCart();
                if ($check) {
                   $sum = Session::get("sum");
                   $quanti = Session::get("quanti");
                      echo "[ ".$quanti." ]<span>(TK.".$sum.")";
                }else{
                  echo "(Empty)";
                }
                
            
                ?></span></a>
            <!--   <ul class="dropdown-menu pull-right cart-dropdown-menu">
                <li>
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="product.php"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="product.php"><img class="img-thumbnail" src="images/product/car3-70x92.jpg" alt="img"></a></td>
                        <td class="text-left"><a href="#">Black African Print Pencil Skirt</a></td>
                        <td class="text-right quality">X1</td>
                        <td class="text-right price-new">$254.00</td>
                        <td class="text-center"><button type="button" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                </li>
                <li>
                  <div class="minitotal">
                    <table class="table pricetotal">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right price-new">$210.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                          <td class="text-right price-new">$2.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>VAT (20%)</strong></td>
                          <td class="text-right price-new">$42.00</td>
                        </tr>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right price-new">$254.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="controls"> <a class="btn btn-primary pull-left" href="cart.php" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a class="btn btn-primary pull-right" href="checkout.php" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                  </div>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <!-- Header End --> 
  
  <!-- Main menu Start -->
  <div id="main-menu">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button aria-controls= "navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">menu</a> </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="grid-view.php">Products</a></li>
            <li class="dropdown"> <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> Top Brand<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php
                    $getBr = $br->getAllBrand();
                    if ($getBr) {
                      while ($result = $getBr->fetch_assoc()) {
                     ?>
                <li><a href="grid-view.php?brandid=<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></a></li>
                <?php } } ?>
              </ul>
            </li>
            <li class="dropdown"> <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#"> More<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="cart.php">Cart.php</a></li>
                <li><a href="checkout-step4.php">Proceed to Checkout</a></li>
                <li><a href="checkout-final1.php">My Product</a></li>
            <!--     <li><a href="checkout.php">Checkout</a></li>
                <li><a href="cart.php">Shoping Cart</a></li>
                <li><a href="checkout-step1.php">Billing & shipping address</a></li>
                <li><a href="checkout-step2.php">Delivery method </a></li>
                <li><a href="checkout-step3.php">Payment method</a></li>
                <li><a href="checkout-step4.php">Order riview</a></li>
                <li><a href="404.php">Page Notfound</a></li> -->
              </ul>
            </li>
            
            <li><a href="contact-us.php">CONTACT US</a></li>
            <li><a href="about-us.php">ABOUT US</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- Main menu End --> 