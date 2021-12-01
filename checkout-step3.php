<?php include'inc/header.php';?>
  
  <div id="checkout-step-contain">
    <div class="container">
      <div class="account-content checkout-staps">
        <div class="staps">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"> <span class="stap">1 </span><a href="checkout-step1.php">Billing &amp; Shipping Address</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"><span class="stap">2 </span><a href="checkout-step2.php">Shipping Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap active">
                <div class="title"><span class="stap">3 </span><a href="checkout-step3.php">Payment Method</a></div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="checkout-stap">
                <div class="title"><span class="stap">4 </span><a href="checkout-step4.php">Order</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2 class="delivery-method tf"> Choose your Payment method </h2>
        </div>
        <div class="col-xs-12 col-sm-12">
          <div class="paymentBox">
            <div class="accordion">
              <div class="accordion-section"> <a href="#accordion-1" class="accordion-section-title"> Cash on Delivery</a>
                <div id="accordion-1" class="accordion-section-content open" style="display: block;">
                  <div class="panel-collapse collapse in" id="collapseOne">
                    <div class="panel-body">
                      <p>All transactions are secure and encrypted, and we neverstor To learn more, please view our privacy policy.</p>
                      <br>
                      <div class="radio">
                        <label>
                          <input type="radio" value="option1" id="optionsRadios1" name="optionsRadios">
                          Cash On Delivery </label>
                      </div>
                      <div class="form-group">
                        <label for="CommentsOrder">Add Comments About Your Order</label>
                        <textarea rows="3" cols="26" name="CommentsOrder" class="form-control" id="CommentsOrder"></textarea>
                      </div>
                      <div class="form-group clearfix">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="">
                            I have read and agree to the <a href="terms-conditions.html">Terms &amp; Conditions</a> </label>
                        </div>
                      </div>
                      <div class="pull-right"><a class="btn btn-large btn-primary" href="checkout-step4.html"> Order&nbsp;<i class="fa fa-arrow-right"></i> </a></div>
                    </div>
                  </div>
                </div>
                <!--end .accordion-section-content--> 
              </div>
              <!--end .accordion-section-->
              <div class="accordion-section"> <a href="#accordion-2" class="accordion-section-title">PayPal</a>
                <div style="display: none;" class="accordion-section-content" id="accordion-2">
                  <div class="panel-body">
                    <p>All transactions are secure and encrypted, and we neverstor To learn more, please view our privacy policy.</p>
                    <br>
                    <label class="checkbox-inline">
                      <input type="checkbox" value="1" >
                      Checkout with Paypal</label>
                    <div class="form-group">
                      <label for="CommentsOrder2">Add Comments About Your Order</label>
                      <textarea rows="3" cols="26" name="CommentsOrder2" class="form-control" id="CommentsOrder2"></textarea>
                    </div>
                    <div class="form-group clearfix">
                      <label class="checkbox-inline" >
                        <input type="checkbox" value="1">
                        I have read and agree to the <a href="terms-conditions.html">Terms &amp; Conditions</a></label>
                    </div>
                    <div class="pull-right"><a class="btn btn-large btn-primary" href="checkout-step4.html"> Order&nbsp;<i class="fa fa-arrow-right"></i> </a></div>
                  </div>
                </div>
                <!--end .accordion-section-content--> 
              </div>
              <!--end .accordion-section-->
              <div class="accordion-section"> <a href="#accordion-3" class="accordion-section-title active">Banks and Cards</a>
                <div style="display: none;" class="accordion-section-content " id="accordion-3">
                  <div class="panel-body">
                    <p>All transactions are secure and encrypted, and we neverstor Tolearn more, please view our privacy policy.</p>
                    <br>
                    <div class=" open">
                      <div class="creditCard">
                        <label for="CardNumber">Credit Card Number *</label>
                        <input type="text" name="Number" id="CardNumber">
                      </div>
                      <div class="paymentInput">
                        <label for="CardNumber2">Name on Credit Card *</label>
                        <input type="text" id="CardNumber2" name="CardNumber2">
                      </div>
                      <div class="paymentInput">
                        <div class="form-group">
                          <label>Expiration date *</label>
                          <select name="expire" aria-required="true" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="">Month</option>
                            <option value="1">01 - January</option>
                            <option value="2">02 - February</option>
                            <option value="3">03 - March</option>
                            <option value="4">04 - April</option>
                            <option value="5">05 - May</option>
                            <option value="6">06 - June</option>
                            <option value="7">07 - July</option>
                            <option value="8">08 - August</option>
                            <option value="9">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                          </select>
                          <select name="year" aria-required="true" class="form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="">Year</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                          </select>
                        </div>
                      </div>
                      <div class="paymentInput clearfix">
                        <label for="VerificationCode">Verification Code
                          *</label>
                        <input type="text" style="width:90px;" name="VerificationCode" id="VerificationCode">
                      </div>
                      <div>
                        <input type="checkbox" id="saveInfoid">
                        <label for="saveInfoid" class="saveinfo">&nbsp;Save my Card information</label>
                      </div>
                    </div>
                    <div class="pull-right"><a class="btn btn-large btn-primary" href="checkout-step4.html"> Order&nbsp;<i class="fa fa-arrow-right"></i> </a></div>
                  </div>
                </div>
                <!--end .accordion-section-content--> 
              </div>
              <!--end .accordion-section--> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
<script>
  
    function close_accordion_section() {
		jQuery('.accordion .accordion-section-title').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
		jQuery('.accordion2 .accordion-section-title1').removeClass('active');
		jQuery('.accordion2 .accordion-section-content1').slideUp(300).removeClass('open');
	}

	jQuery('.accordion-section-title').click(function(e) {
		// Grab current anchor value
		var currentAttrValue = jQuery(this).attr('href');

		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
			jQuery('.accordion2 ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});

</script>
  <?php include'inc/footer.php';?>