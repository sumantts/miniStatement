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
                    <h4 class="card-title">Loan Collection</h4>
                    <form class="form-sample">
                      <!--<p class="card-description"> Personal info </p>-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Account Number *</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="Staff_Id" id="Staff_Id" value="<?=$_SESSION["Staff_Id"]?>" />
                              <input type="tel" id="loan_account_number" class="form-control" />
							  <span class="col-form-label  text-danger" id="loan_account_number_error" style="font-size: 12px;"></span>
							  <span class="col-form-label  text-success" id="loan_account_number_success" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <button type="button" id="check_loan_account_number" class="btn btn-inverse-success btn-fw">Check</button>
                          </div>
                        </div>
                      </div>
					  
                      <div class="row" id="part_one" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name: <span id="loan_account_name_span"> </span></label>                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Product: <span id="loan_account_product_span"> </span></label>                            
                          </div>
                        </div>
						
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Loan Amount: <span id="loan_account_total_demand_span"> </span></label>
							<input type="hidden" id="TotalDemand">                            
                          </div>
                        </div>
						
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Outstanding: <span id="loan_account_outstanding_span"></span></label>
							<input type="hidden" id="TotalOutstanding">                            
                          </div>
                        </div>
						
						<div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Due Interest: <span id="IntDue_span"></span></label>
							<input type="hidden" id="IntDue">
                          </div>
                        </div>
						
                        <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Last Paid: <span id="LastPay_span"></span></label>
							<input type="hidden" id="LastPay">
                          </div>
                        </div>
						
                      </div>
					  
					  <div class="row" id="part_two" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Collection Amount *</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" id="collection_amount" />
							  <span class="col-form-label  text-danger" id="collection_amount_error" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
						
						<!--<div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Enter OTP*</label>
                            <div class="col-sm-8">
                              <input type="text" id="SmsCd" class="form-control" />
							  <span class="col-form-label  text-danger" id="SmsCd_error" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>-->
						
                        <div class="col-md-6">
                          <div class="form-group row">
						              <input type="hidden" value="<?=$_SESSION["User_Id"]?>" id="usrID">
						              <input type="hidden" value="" id="ContNo">
                          <button type="button" id="save_loan_collection" class="btn btn-inverse-success btn-fw">Save</button>
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