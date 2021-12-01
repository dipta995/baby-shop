<?php include'inc/header.php';?>
  
  <div id="contact-page-contain">
    <div class="container">
     
      <div class="contact-submit">
        <h3>Contact By sending message</h3>
        <?php 
        if ($_SERVER['REQUEST_METHOD']=='POST') {
          $sendmsg = $cont->sendmessage($_POST);
        }
         ?>
        <form method="post" action="">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="input-group">
                <input type="text" name="firstname" class="form-control" placeholder="First Name *" required>
              </div>
              <!-- /input-group -->
              <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail *" required>
              </div>
              <!-- /input-group --> 
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="input-group">
                <input type="text" name="lastname" class="form-control" placeholder="Last Name *" required>
              </div>
              <!-- /input-group -->
              <div class="input-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject *" required>
              </div>
              <!-- /input-group --> 
            </div>
            <div class="col-md-12">
              <div class="input-group">
                <textarea class="form-control" name="message" id="textarea_message" placeholder="Message *"></textarea>
              </div>
              <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Send </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="address">
            <h2 class="tf"><i class="fa fa-map-marker"></i></h2>
            <div class="address-info">Warehouse & Offices 12345 Street name, California, USA </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="complaint">
            <h2 class="tf"><i class="fa fa-mobile"></i></h2>
            <div class="call-info">+91 987-654-321<br>
              <span>+0987-654-321</span> </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feedback">
            <h2 class="tf"><i class="fa fa-envelope"></i></h2>
            <div class="email-info"> <a href="#">support@lionode.com</a><br>
              <span><a href="#">info@lionode.com</a></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
  <?php include'inc/footer.php';?>