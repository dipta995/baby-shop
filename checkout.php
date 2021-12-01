<?php include'inc/header.php';?>
  
  <div id="blog-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12  col-sm-12 Authentication">
          <h2 class="Authentication-title tf"> Authentication</h2>
          <div class="row">
            <div class="col-xs-12 col-sm-6 ">
              <h4 class="block-title-2"> Create an account </h4>
              <form class="account-creat">
                <div class="form-group">
                  <input type="text" placeholder="Enter name" id="exampleInputName" class="form-control">
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Enter email" id="InputEmail1" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" id="InputPassword1" class="form-control">
                </div>
                <button class="btn   btn-primary" type="submit"><i class="fa fa-user"></i> Create an account</button>
              </form>
            </div>
            <div class="col-xs-12 col-sm-6 ">
              <h4 class="block-title-2"><span>Already registered?</span></h4>
              <form class="registered">
                <div class="form-group">
                  <input type="email" placeholder="Enter email" id="InputEmail2" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" id="InputPassword2" class="form-control">
                </div>
                <div class="checkbox">
                  <label class="">
                    <input type="checkbox" name="vehicle" value="Bike">
                    Remember me </label>
                </div>
                <div class="forgot-password">
                  <p><a href="forgot-password.php" title="Recover your forgotten password">Forgot your password? </a></p>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Sign In</button>
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
   
  <?php include'inc/footer.php';?>