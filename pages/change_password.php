<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$org_name?> | Change Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=$fav_icon?>" />
  </head>
  <body>
  <?php
  if(isset($_SESSION["User_Id"])){header('location:?p=dashboard');}
  if(isset($_GET["out"]) == "ok"){
	  session_unset();
	  header("location:?p=login");
  }
  ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">

            <div class="card-header" style="text-align: center;">
            <img src="<?=$logo_login?>">
            <h5 class="text-center font-weight-bold my-1" style="color: #fff; "><?=$org_second_name?></h5>
            </div>
            
              <div class="auto-form-wrapper">
                <h4 class="d-flex justify-content-center">Change Password</h4>
					  <span class="text-warning" id="error_text"></span>

                  <div class="form-group">
                    <label class="label">Customer Id</label>
                    <div class="input-group">
                      <input type="tel" class="form-control" placeholder="Customer Id" id="cpCustomerId">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label">Current Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" id="cpCurrentPassword">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="label">New Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" id="cpNewPassword">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block" id="ChangePasswordBtn" >Submit</button>
                  </div>

                  <div class="form-group d-flex justify-content-between">
                    <!-- <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                    </div> -->
                    <a href="?p=forget_password" class="text-small forgot-password text-black">Forgot Password?</a>
                    <a href="?p=change_password" class="text-small forgot-password text-black">Change Password?</a>
                  </div>
                  <!-- <div class="form-group">
                    <button class="btn btn-block g-login">
                      <img class="mr-3" src="assets/images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                  </div> -->
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Online User?</span>
                    <a href="?p=login" class="text-black text-small">Login</a>
                  </div> 
              </div>
              <!--<ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul>-->
              <p class="footer-text text-center pt-4">copyright @ <?=date('Y')?>. All rights reserved.</p>
              <!--<p class="footer-text text-center text-center"><a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"> Free Bootstrap template </a> from BootstrapDash templates</p>-->
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <!-- Top Nav bar message bar <script src="assets/js/shared/misc.js"></script>-->
    <!-- endinject -->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
	<script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="assets/js/custom/function.js"></script>
  <div class="modal"><!-- Place at bottom of page Loading.. --></div>
  </body>
</html>