<?php 
//if(!$_SESSION["User_Id"]){header('location:?p=login');}
include('common/header.php');
/*****
	$Adm = $_SESSION["Adm"];
	$UsrID = $_SESSION["User_Id"];
	$CollDt = date('m/d/Y');
	
	$sql = "{call dbo.USP_Dashboard(?,?)}";

	$params = array($UsrID, $CollDt);
	if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
		//echo "Statement prepared.<br><br>\n"; 
	} else {  
		//echo "Statement could not be prepared.\n";  
		//die(print_r(sqlsrv_errors(), true));  
		$status = false;
		$error_msg .= "Statement could not be prepared";
	} 

	if( sqlsrv_execute( $stmt ) === false ) {
		//die( print_r( sqlsrv_errors(), true));
		$error_msg .= " SP Execution error";
	}else{
		$rows = sqlsrv_fetch_array($stmt);
		$return_result['rows'] = $rows;
		if(sizeof($rows) > 0){				
			$ReceiptNo = $rows["ReceiptNo"];			
			$ReceiptAmt = $rows["ReceiptAmt"];			
			$PaymtNo = $rows["PaymtNo"];			
			$PaymtAmt = $rows["PaymtAmt"];			
			$LoanNo = $rows["LoanNo"];				
			$LoanAmt = $rows["LoanAmt"];		
			$DisbAmt = $rows["DisbAmt"];				
			$DisbNo = $rows["DisbNo"];		
			$CashBalance = $rows["CashBalance"];
		}else{
			$status = false;
			$error_msg .= " No collection available";		
		}
	}//end 



	//Get Summary report
	$sql_n = "{call dbo.USP_Dashboard_Admin()}";
	$params_n = array(); 
	if ($stmt_n = sqlsrv_prepare($conn, $sql_n, $params_n)) {
	//echo "Statement prepared.<br><br>\n"; 
	} else {  
	//echo "Statement could not be prepared.\n";  
	die(print_r(sqlsrv_errors(), true));  
	} 

	if( sqlsrv_execute( $stmt_n ) === false ) {
	die( print_r( sqlsrv_errors(), true));
	}else{
	// while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	//   echo $row['Product_Name'].", ".$row['Issue_Limit']."<br />";
	// } 
	}//end sp	

	******/
		

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
		  
			<div class="col-lg-12 grid-margin stretch-card">
				
                <div class="card">
                  <div class="card-body">
                    <!-- <p class="card-description"> Welcome to 'Customer Name' dashboard </p> -->
                    <h5 class="card-title"> <?=$title?></h5>
					<p>Statement for the period 01-01-2023 to 31-01-2023</p>
					<p>Account No: </p>

					<div class="table-responsive">
						<table class="table table-bordered">
						<thead>
							<tr>
							<td ><strong>Date</strong></td>
							<td ><strong>Particulars</strong></td>
							<td ><strong>Dr.</strong></td>
							<td ><strong>Cr.</strong></td>
							<td><strong>Balance</strong></td>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
							</tr>
							
							<tr>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
							</tr>
							
							<tr>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
							</tr>
							
							<tr>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
							</tr>
							
							<tr>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
								<td style="text-align: right;">&nbsp;</td>
							</tr>
							
						</tbody>
						</table>
					</div>
					
					
					
                  </div>
                </div>
              </div>
		  
		  </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
    <?php include('common/footer.php');?>