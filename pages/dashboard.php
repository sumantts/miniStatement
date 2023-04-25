<?php 
if(!$_SESSION["User_Id"]){header('location:?p=login');}
include('common/header.php');
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
                    <h4 class="card-title">Collection Summary of <?=ucfirst($_SESSION["Staff_Name"])?></h4>
                    <p class="card-description"> Welcome to <?=$org_name?> dashboard </p>

					<?php
					if($Adm == '0'){
					?>
					<div style="overflow-x: scroll;">
                    <table class="table table-bordered">
                      <thead>
						<tr>
						  <th scope="col">Particulars</th>
						  <th scope="col">No.</th>
						  <th scope="col">Amount</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>Deposit</th>
						  <td style="text-align: right;"><?=$ReceiptNo?></td>
						  <td style="text-align: right;"><?=$ReceiptAmt?></td>
						</tr>
						<tr>
						  <td>Withdrawal</th>
						  <td style="text-align: right;"><?=$PaymtNo?></td>
						  <td style="text-align: right;"><?=$PaymtAmt?></td>
						</tr>
						<tr>
						  <td>Loan Payment</th>
						  <td style="text-align: right;"><?=$DisbNo?></td>
						  <td style="text-align: right;"><?=$DisbAmt?></td>
						</tr>
						<tr>
						  <td>Loan Collection</th>
						  <td style="text-align: right;"><?=$LoanNo?></td>
						  <td style="text-align: right;"><?=$LoanAmt?></td>
						</tr>
						<tr>
						  <td colspan="2">Cash Balance</th>
						  <td style="text-align: right;"><?=$CashBalance?></td>
						</tr>
					  </tbody>
                    </table>
					</div>
					<?php } ?>
					
					<?php
					if($Adm == '1'){
					?>
					<div style="overflow-x: scroll;">
                    <table class="table table-bordered">
                      <thead>
						<tr>
						  <td>Agent name</td>
						  <td>Deposit</td>
						  <td>Withdrawal</td>
						  <td>Loan Collection</td>
						  <td>Loan Issue</td>
						</tr>
					  </thead>
					  <tbody>
					  <?php
					  	$net_Dep = 0;
						$net_Withd = 0;
						$net_LnRepay = 0;
						$net_LnIssue = 0;
						while( $row_n = sqlsrv_fetch_array( $stmt_n, SQLSRV_FETCH_ASSOC) ) {
							$Dep = $row_n['Dep'];
							$Withd = $row_n['Withd'];
							$LnRepay = $row_n['LnRepay'];
							$LnIssue = $row_n['LnIssue'];

							$net_Dep = $net_Dep + $Dep;
							$net_Withd = $net_Withd + $Withd;
							$net_LnRepay = $net_LnRepay + $LnRepay;
							$net_LnIssue = $net_LnIssue + $LnIssue;
						?>
						<tr>
						  <td style="text-align: left;"><?=$row_n['Staff_Name']?></td>
						  <td style="text-align: right;"><?=$Dep?></td>
						  <td style="text-align: right;"><?=$Withd?></td>
						  <td style="text-align: right;"><?=$LnRepay?></td>
						  <td style="text-align: right;"><?=$LnIssue?></td>
						</tr>
						<?php } ?>
						<tr style="font-weight: bold;">
						  <td>Total</th>
						  <td style="text-align: right;"><?=$net_Dep?></td>
						  <td style="text-align: right;"><?=$net_Withd?></td>
						  <td style="text-align: right;"><?=$net_LnRepay?></td>
						  <td style="text-align: right;"><?=$net_LnIssue?></td>
						</tr>
					  </tbody>
                    </table>
						</div>
					<?php } ?>
					
                  </div>
                </div>
              </div>
		  
		  </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
    <?php include('common/footer.php');?>