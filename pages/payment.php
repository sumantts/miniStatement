<?php 
if(!$_SESSION["User_Id"]){header('location:?p=login');}
include('common/header.php');?>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include('common/navbar.php');?>
      <!-- partial -->
      <?php include('common/left_menu.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Withdrawal/Payment</h4>
                    <form class="form-sample">
                      <!--<p class="card-description"> Personal info </p>-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Account Number *</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="Staff_Id" id="Staff_Id" value="<?=$_SESSION["Staff_Id"]?>" />
                              <input type="tel" id="account_number" class="form-control" />
							  <span class="col-form-label  text-danger" id="account_number_error" style="font-size: 12px;"></span>
							  <span class="col-form-label  text-success" id="account_number_success" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <button type="button" id="check_payment_account_number" class="btn btn-inverse-success btn-fw">Check</button>
                          </div>
                        </div>
                      </div>
					  
                      <div class="row" id="part_one" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Customer Name: <span id="customer_name_span"> </span></label>  
							<input type="hidden" id="customer_name">                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Product Name: <span id="product_name_span"> </span></label>                            
							<input type="hidden" id="product_name">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Balance Amount: <span id="balance_amount_span"> </span></label>                         
							<input type="hidden" id="balance_amount">                           
                          </div>
                        </div>
                      </div>
					  
					  <div class="row" id="part_two" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Payment Amount *</label>
                            <div class="col-sm-8">
                              <input type="number" step="0.01" id="payment_amount" class="form-control" />
							  <span class="col-form-label  text-danger" id="payment_amount_error" style="font-size: 12px;"></span>
							  <span class="col-form-label  text-success" id="payment_amount_success" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <button type="button" class="btn btn-inverse-success btn-fw" id="sendOTP">OTP</button>						  
                          </div>
                        </div>
                      </div>
					  
					  <div class="row" id="part_three" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Enter OTP*</label>
                            <div class="col-sm-8">
                              <input type="number" id="otp" class="form-control" value="" />
							                <span class="col-form-label  text-danger" id="otp_error" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
						  <input type="hidden" value="<?=$_SESSION["User_Id"]?>" id="usrID">
						              <input type="hidden" value="" id="ContNo">
                          <button type="button" class="btn btn-inverse-success btn-fw" id="savePayment">Payment</button>
                          </div>
                        </div>
                      </div>                   
                      
                    </form>
                  </div>
                </div>
              </div>
		  
			
			
		  
		  </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
    <?php include('common/footer.php');?>