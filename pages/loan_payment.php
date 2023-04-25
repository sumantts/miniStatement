<?php 
if(!$_SESSION["User_Id"]){header('location:?p=login');}
include('common/header.php');

//Get Loan Product
$sql = "{call dbo.USP_GetLoan_Product()}";
$params = array(); 
if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
  //echo "Statement prepared.<br><br>\n"; 
} else {  
  //echo "Statement could not be prepared.\n";  
  die(print_r(sqlsrv_errors(), true));  
} 

if( sqlsrv_execute( $stmt ) === false ) {
  die( print_r( sqlsrv_errors(), true));
}else{
  // while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  //   echo $row['Product_Name'].", ".$row['Issue_Limit']."<br />";
  // } 
}//end sp


?>
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
                    <h4 class="card-title"><?=$title?></h4>
                    <form class="form-sample">
                      <!--<p class="card-description"> Personal info </p>-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Mobile Number *</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="Staff_Id" id="Staff_Id" value="<?=$_SESSION["Staff_Id"]?>" />
                              <input type="hidden" name="User_Id" id="User_Id" value="<?=$_SESSION["User_Id"]?>" />
                              <input type="tel" id="lp_mobile_number" class="form-control" />
                              <span class="col-form-label  text-danger" id="lp_mobile_number_error" style="font-size: 12px;"></span>
                              <span class="col-form-label  text-success" id="lp_mobile_number_success" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <button type="button" id="check_lp_mobile_number" class="btn btn-inverse-success btn-fw">Check</button>
                          </div>
                        </div>
                      </div>
					  
                      <div class="row" id="part_one" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Customer Name: <span id="lp_customer_name_span"> </span></label>  
                            <input type="hidden" id="lp_customer_id">
							              <input type="hidden" id="CustCd">                            
                          </div>
                        </div>
                      </div>
					  
					            <div class="row" id="part_two" style="display: none">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Product *</label>
                            <div class="col-sm-8">
                              
                            <select class="form-control form-control-lg" id="lp_product">
                              <option value="0">Select Loan Product</option>
                              <?php
                              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                              ?>
                              <option value="<?php echo $row['LnProd_ID']?>" Issue_Limit="<?php echo $row['Issue_Limit']?>"><?php echo $row['Product_Name']?></option>

                              <?php
                              }
                              ?>                              
                            </select>                            
                              <span class="col-form-label  text-danger" id="lp_product_error" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-danger">Loan Amount *</label>
                            <div class="col-sm-8">
                              <input type="number" step="0.01" id="lp_loan_amount" class="form-control" />
                              <span class="col-form-label  text-danger" id="lp_loan_amount_error" style="font-size: 12px;"></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                          <button type="button" class="btn btn-inverse-success btn-fw" id="saveLoanPayment">Save</button>						  
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