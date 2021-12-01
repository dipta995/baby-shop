<!-- Footer block Start  -->
<br>
  <footer id="footer">
    <div class="container">
      
      <div class="row">
        
        <div class="col-md-4">
          <div class="new-store">
            <h4>What's in store</h4>
            <ul class="toggle-footer">
              
              <li><a href="#">Delivery</a></li>
              <li><a href="#">Brand Directory</a></li>
              <li><a href="#">Buying Guides</a></li>
              <li><a href="#">My Account</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
        
        </div>
        <div class="col-md-4">
          <div class="contact">
            <h4>Contact Us</h4>
            <ul class="toggle-footer">
              <li> <i class="fa fa-map-marker"></i>
                <div class="address-info">Malibag, Rail Gate , Dhaka-1219 </div>
              </li>
              <li> <i class="fa fa-mobile"></i>
                <div class="call-info">+123456789<br>
                  <span>+12345678</span> </div>
              </li>
              <li> <i class="fa fa-envelope"></i>
                <div class="email-info"> <a href="#">babyshophelp@gmail.com</a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="social-link">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="copy-right">
              <p> </p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-offer">
        <h2>All Rights Reserved. Copyright <?php echo date('Y'); ?> Powered by Babyshop.</h2>
      </div>
    </div>
  </footer>
  <!-- Footer block End  --> 
  
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jQuery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="Bootstrap/js/bootstrap.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/globle.js"></script>
<script type="text/javascript" src="js/smoothproducts.min.js"></script> 
<script type="text/javascript">	
      $("#tabs li a").click(function(e){
        var title = $(e.currentTarget).attr("title");
        $("#tabs li a").removeClass("selected")
        $(".tab-content li div").removeClass("selected")
        $(".tab-"+title).addClass("selected")
        $(".items-"+title).addClass("selected")
        $("#items").attr("class","tab-"+title);
      });
	      $(window).load( function() {
        $('.sp-wrap').smoothproducts();
    });
     </script>
</body>
</html>