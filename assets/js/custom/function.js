
	//Login Page Function
	$( "#login_btn" ).on( "click", function() {
		$username = $('#username').val();
		$password = $('#password').val();

		$.ajax({
		  method: "POST",
		  url: "assets/php/function.php",
		  data: { fn: "doLogin", username: $username, password: $password }
		})
		  .done(function( res ) {
			console.log(res);
			$res1 = JSON.parse(res);
			if($res1.status == true){
				window.location.href = '?p=dashboard';
			}else{
				//alert($res1.message);
				$('#error_text').html($res1.message);
			}
		});
		return false;
	});
	
	
	//Receipt Page Function
	$( "#check_account_number" ).on( "click", function() {
		$account_number = $('#account_number').val();
		$Staff_Id = $('#Staff_Id').val();
		
		if($account_number == ''){
			$('#account_number_error').html('Please Provide Account Number');
			return false;
		}else{	
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "checkAccountNumber", account_number: $account_number, Staff_Id: $Staff_Id }
			})
			  .done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#customer_name').val($res1.customer_name);
					$('#product_name').val($res1.product_name);
					$('#installment_amount').val($res1.installment_amount);
					$('#ContNo').val($res1.ContNo);
					//$('#fine_amount').val($res1.fine_amount);
					$('#collection_amount').val('');
					$('#balance_amount').val($res1.balance_amount);
					
					$('#customer_name_span').html($res1.customer_name);
					$('#product_name_span').html($res1.product_name);
					$('#installment_amount_span').html($res1.installment_amount);
					//$('#demand_amount_span').html($res1.demand_amount);
					//$('#fine_amount_span').html($res1.fine_amount);
					//$('#total_demand_span').html($res1.total_demand);
					$('#balance_amount_span').html($res1.balance_amount);
					
					$('#part_one').show();
					$('#part_two').show();
				}else{
					$('#account_number_error').html($res1.error_msg);
					clearReceiptForm();	
					return false;
				}
			});
		}//end if
	});	
	
	$('#account_number').on('input', function() {
		$('#account_number_error').html('');
		$('#account_number_success').html('');
		clearReceiptForm();
	});
	
	function clearReceiptForm(){
		//$('#account_number').val('');
		$('#customer_name').val('');
		$('#product_name').val('');
		$('#installment_amount').val('');
		//$('#demand_amount').val('');
		//$('#fine_amount').val('');
		//$('#total_demand').val('');
		$('#balance_amount').val('');
		
		$('#customer_name_span').html('');
		$('#product_name_span').html('');
		$('#installment_amount_span').html('');
		//$('#demand_amount_span').html('');
		//$('#fine_amount_span').html('');
		//$('#total_demand_span').html('');
		$('#balance_amount_span').html('');
		
		$('#part_one').hide();
		$('#part_two').hide();
	}
	
	$( "#receipt_save" ).on( "click", function() {
		$usrID = $('#usrID').val();
		$accountNo = $('#account_number').val();
		$transType = 'D';
		$transAmt = $('#collection_amount').val();
		$fineAmt = $('#fine_amount').val();
		$balanceAmt = $('#balance_amount').val();
		$ContNo = $('#ContNo').val();
		$newBalanceAmt = parseFloat($transAmt) + parseFloat($balanceAmt);
		
		if(parseFloat($transAmt) <= 0){
			$('#collection_amount_error').html('Please Provide Correct Amount');
			return false;
		}else{	
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "receiptSave", usrID: $usrID, accountNo: $accountNo, transType: $transType, transAmt: $transAmt, fineAmt: $fineAmt, balanceAmt: $balanceAmt, newBalanceAmt: $newBalanceAmt, ContNo: $ContNo}
			})
			  .done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					clearReceiptForm();
					$('#account_number_success').html($res1.message);
				}else{
					$('#collection_amount_error').html($res1.message);
					return false;
				}
			});
		}//end if
	});
	//End Receipt Section
	
	//Start Payment Page Function
	$( "#check_payment_account_number" ).on( "click", function() {
		$account_number = $('#account_number').val();
		$Staff_Id = $('#Staff_Id').val();
		$otpArr = [];
		
		if($account_number == ''){
			$('#account_number_error').html('Please Provide Account Number');
			return false;
		}else{	
			$('#account_number_error').html('');
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "checkPaymentAccountNumber", account_number: $account_number, Staff_Id: $Staff_Id }
			})
			  .done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#customer_name').val($res1.customer_name);
					$('#ContNo').val($res1.ContNo);
					$('#product_name').val($res1.product_name);
					$('#balance_amount').val($res1.balance_amount);
					
					$('#customer_name_span').html($res1.customer_name);
					$('#product_name_span').html($res1.product_name);
					$('#balance_amount_span').html($res1.balance_amount);
					
					$('#part_one').show();
					$('#part_two').show();
				}else{
					$('#account_number_error').html($res1.error_msg);
					$('#customer_name').val('');
					$('#balance_amount').val('');
					
					$('#customer_name_span').html('');
					$('#balance_amount_span').html('');
					
					$('#part_one').hide();
					$('#part_two').hide();
					return false;
				}
			});
		}//end if
	});
	
	$( "#sendOTP" ).on( "click", function() {
		$payment_amount = $('#payment_amount').val();
		$account_number = $('#account_number').val();
		$balance_amount = $('#balance_amount').val();
		$('#payment_amount_error').html('');
		$('#payment_amount_success').html('');
		$('#payment_amount_error').html('');

		$ContNo = $('#ContNo').val();
		
		if($payment_amount == '' || parseFloat($payment_amount) <= 0){
			$('#payment_amount_error').html('Please Provide Proper Amount');
			return false;
		}else if(parseFloat($payment_amount) > parseFloat($balance_amount)){
			$('#payment_amount_error').html('You can not withdraw more than Balance amount');
			return false;
		}else{	
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "sendOtp", account_number: $account_number, ContNo: $ContNo, payment_amount: $payment_amount }
			})
			  .done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				$('#payment_amount_success').html('');
				$('#payment_amount_error').html('');
		
				if($res1.status == true){
					$('#part_three').show();
					$('#payment_amount_success').html($res1.message);
					$otpArr.push($res1.otp);
					console.log(JSON.stringify($otpArr));

				}else{
					$('#payment_amount_error').html($res1.message);
					return false;
				}
			});
		}//end if
	});
	
	$( "#savePayment" ).on( "click", function() {
		$otp = $('#otp').val();
		$usrID = $('#usrID').val();
		$ContNo = $('#ContNo').val();
		$accountNo = $('#account_number').val();
		$transType = 'W';
		$transAmt = $('#payment_amount').val();
		$fineAmt = 0;//$('#fine_amount').val();
		$balanceAmt = $('#balance_amount').val();
		$newBalanceAmt = parseFloat($balanceAmt) - parseFloat($transAmt);
		
		if(parseFloat($transAmt) <= 0){
			$('#payment_amount_error').html('Please Provide Correct Amount');
			return false;
		}else if($otp == ''){
			$('#otp_error').html('Please Enter OTP');
			return false;
		}else{	
			$otp_match = false;
			for($i = 0; $i < $otpArr.length; $i++){
				if(parseInt($otpArr[$i]) == parseInt($otp)){
					$otp_match = true;
				}
			}//end for

			if($otp_match == true){
				$('#otp_error').html('');
				$otpArr = [];
				
				$.ajax({
				method: "POST",
				url: "assets/php/function.php",
				data: { fn: "receiptSave", usrID: $usrID, accountNo: $accountNo, transType: $transType, transAmt: $transAmt, fineAmt: $fineAmt, balanceAmt: $balanceAmt, newBalanceAmt: $newBalanceAmt, ContNo: $ContNo}
				})
				.done(function( res ) {
					console.log(res);
					$res1 = JSON.parse(res);
					if($res1.status == true){
						clearPaymentForm();
						$('#account_number_success').html($res1.message);
					}else{
						$('#payment_amount_error').html($res1.message);
						return false;
					}
				});
			}else{
				$('#otp_error').html('Please Enter Correct OTP');
				return false;
			}//end otp if
		}//end if
	});
	
	$('#payment_amount').on('input', function() {
		$payment_amount = $('#payment_amount').val();
		$balance_amount = $('#balance_amount').val();
		$('#payment_amount_error').html('');
		$('#part_three').hide();
		if(parseFloat($payment_amount) > parseFloat($balance_amount)){
			$('#payment_amount_error').html('You can not withdrow more than Balance amount');
			return false;
		}
	});
	
	function clearPaymentForm(){
		$('#account_number').val('');
		$('#account_number_error').html('');
		$('#account_number_success').html('');
		
		$('#customer_name_span').html('');
		$('#customer_name').val('');
		$('#balance_amount_span').html('');
		$('#balance_amount').val('');
		
		$('#payment_amount').val('');
		$('#payment_amount_error').html('');
		$('#payment_amount_success').html('');
		
		$('#otp').val('');
		$('#otp_error').html('');
		
		$('#part_one').hide();
		$('#part_two').hide();
		$('#part_three').hide();
	}
	//End Payment Page Function
	
	//Start Loan Page Function
	//Loan payment start	
	$( "#check_lp_mobile_number" ).on( "click", function() {
		$lp_mobile_number = $('#lp_mobile_number').val();
		$Staff_Id = $('#Staff_Id').val();
		
		if($lp_mobile_number == ''){
			$('#lp_mobile_number_error').html('Please Provide Mobile Number');
			return false;
		}else{	
			$('#lp_mobile_number_error').html('');
			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "checkLoanMobileNumber", lp_mobile_number: $lp_mobile_number, Staff_Id: $Staff_Id }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#lp_customer_name_span').html($res1.CstNm);
					$('#lp_customer_id').val($res1.CustId);
					$('#CustCd').val($res1.CustCd);
					
					$('#part_one').show();
					$('#part_two').show();
				}else{
					$('#lp_mobile_number_error').html($res1.error_msg);
					clearReceiptForm();	
					return false;
				}
			});
		}//end if
	});	

	//Save
	$( "#saveLoanPayment" ).on( "click", function() {
		$lp_mobile_number = $('#lp_mobile_number').val();
		$lp_product = $('#lp_product').val();
		$lp_loan_amount = $('#lp_loan_amount').val();
		$Staff_Id = $('#Staff_Id').val();
		$User_Id = $('#User_Id').val();
		$lp_customer_id = $('#lp_customer_id').val();
		$CustCd = $('#CustCd').val();
		
		var lp_product = $('#lp_product').find('option:selected'); 
		$Issue_Limit = lp_product.attr("Issue_Limit");

		if($lp_mobile_number == ''){
			$('#lp_mobile_number_error').html('Please Provide Mobile Number');
			return false;
		}else if( $lp_product == 0){
			$('#lp_product_error').html('Please Select Loan Product');
			return false;
		}else if($lp_loan_amount == '' || parseInt($lp_loan_amount) < 1){
			$('#lp_loan_amount_error').html('Please provide loan amount');
			return false;
		}else if( parseInt($lp_loan_amount) > parseInt($Issue_Limit)){
			$('#lp_loan_amount_error').html('Max Limit: '+$Issue_Limit);
			return false;
		}else{	
			$('#lp_mobile_number_error').html('');
			$('#lp_loan_amount_error').html('');

			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "saveLoanPayment", User_Id: $User_Id, lp_product_id: $lp_product, lp_mobile_number: $lp_mobile_number, lp_customer_id: $lp_customer_id, lp_loan_amount: $lp_loan_amount, CustCd: $CustCd }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#lp_mobile_number_success').html($res1.error_msg);
					$('#lp_mobile_number').val('');	
					$('#lp_product').val('0');
					$('#lp_loan_amount').val('');

					$('#part_one').hide();
					$('#part_two').hide();
				}else{
					$('#lp_mobile_number_error').html($res1.error_msg);
					clearReceiptForm();	
					return false;
				}
			});
		}//end if
	});	

	//Loan payment end

	$( "#check_loan_account_number" ).on( "click", function() {
		$loan_account_number = $('#loan_account_number').val();
		$Staff_Id = $('#Staff_Id').val();
		
		$('#loan_account_number_success').html('');
		$('#loan_account_number_error').html('');
		
		if($loan_account_number == ''){
			$('#loan_account_number_error').html('Please Provide Account Number');
			return false;
		}else{	
			$('#loan_account_number_error').html('');
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "checkLoanAccountNumber", loan_account_number: $loan_account_number, Staff_Id: $Staff_Id }
			})
			  .done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#loan_account_name_span').html($res1.customer_name);
					$('#ContNo').val($res1.ContNo);
					$('#loan_account_product_span').html($res1.product_name);					
					
					$('#IntDue_span').html($res1.IntDue);
					$('#IntDue').val($res1.IntDue);
					$('#LastPay_span').html($res1.LastPay);
					$('#LastPay').val($res1.LastPay);
					
					$('#loan_account_total_demand_span').html($res1.total_demand);
					$('#TotalDemand').val($res1.total_demand);
					$('#loan_account_outstanding_span').html($res1.OutsAmt);
					$('#TotalOutstanding').val($res1.OutsAmt);
					
					$('#part_one').show();
					$('#part_two').show();
				}else{
					$('#loan_account_number_success').html('');
					$('#loan_account_number_error').html($res1.error_msg);
					return false;
				}
			});
		}//end if
	});
	//End Loan Page Function
	
	
	//Member Receipt Function Start
	$( "#check_member_Id" ).on( "click", function() {
		//$loan_account_number = $('#loan_account_number').val();
		$Staff_Id = $('#Staff_Id').val();
		$User_Id = $('#User_Id').val();
		$member_Id = $('#member_Id').val();
		
		$('#member_Id_error').html('');
		$('#member_Id_success').html('');
		
		if($member_Id == ''){
			$('#member_Id_error').html('Please Provide Member ID');
			return false;
		}else{	
			$('#member_Id_error').html('');
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "checkMemberId", member_Id: $member_Id, Staff_Id: $Staff_Id, User_Id: $User_Id }
			})
			  .done(function( res ) {
				
				$res1 = JSON.parse(res);
				if($res1.status == true){

					$('#receipt_body').html('');
					$statement = $res1.statement;
					console.log($statement);

					$msg_body = '*'+$res1.org_name+'*%0a%0a';
					$msg_body += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Collection Receipt*';
					$msg_body += '%0a%0a*Date* : '+$res1.current_date+'%0a';
					$msg_body += '*Member Name* : '+$res1.member_name+'('+$res1.member_code+')%0a';
					
					$msg_body += '%0a*Deposit Type* &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *Amount*';

					for($i = 0; $i < $statement.length; $i++){
						$msg_body += '%0a'+$statement[$i].Sl+'. '+$statement[$i].Remarks+'  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'+$statement[$i].CrAmt;
					}//end for

					$msg_body += '%0a-----------------------------------------------------';
					$msg_body += '%0a &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; *Total* : *'+$res1.net_CrAmt+'*';
					$msg_body += '%0a*Agent* : '+$res1.staff_name;

					$('#receipt_body').html($msg_body);

					//Generate Table Data
					$('#text_org_name').html($res1.org_name);
					$('#text_collection_date').html('Date: '+$res1.current_date);
					$('#text_mem_name').html('Member Name: '+$res1.member_name+'('+$res1.member_code+')');

					var trText = "<tr><td scope='col'>Deposit Type</td><td scope='col' style='text-align: right;'>Amount</td> </tr>";

					for($j = 0; $j < $statement.length; $j++){
						trText += "<tr><td>"+$statement[$j].Sl+'. '+$statement[$j].Remarks+"</th><td style='text-align: right;'>"+$statement[$j].CrAmt+"</td></tr>";
					}//end for

					trText += "<tr> <td >Total</td> <td style='text-align: right;'>"+$res1.net_CrAmt+"</td> </tr>";

					trText += "<tr> <td colspan='2' style='text-align: center;'>Agent: "+$res1.staff_name+"</td> </tr>";

					$('#collectionList').html(trText);
					
					$('#part_one').show();
					$('#part_two').show();
				}else{
					$('#receipt_body').html('');
					$('#member_Id_success').html('');
					$('#member_Id_error').html($res1.error_msg);
					return false;
				}
			});
		}//end if
	});
	//Member Receipt Function End
	
	
	//Update password Function Start
	$( "#updatePassword" ).on( "click", function() {
		//$loan_account_number = $('#loan_account_number').val();
		$Staff_Id = $('#Staff_Id').val();
		$User_Id = $('#User_Id').val();
		$password = $('#password').val();
		$confirm_password = $('#confirm_password').val();
		
		$('confirm_password_error').html('');
		$('#confirm_password_success').html('');
		
		if($password == ''){
			$('#password_error').html('Please Enter Password');
			return false;
		}else if($confirm_password == ''){
			$('#confirm_password_error').html('Please Enter Confirm Password');
			return false;
		}else if($password != $confirm_password){
			$('#password_error').html(' Password & Confirm password must be same');
			$('#confirm_password_error').html('Password & Confirm password must be same');
			return false;
		}else{	
			$('#password_error').html('');
			$('#confirm_password_error').html('');
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "updatePassword", password: $password, Staff_Id: $Staff_Id, User_Id: $User_Id }
			})
			  .done(function( res ) {
				
				$res1 = JSON.parse(res);
				if($res1.status == true){
					alert('Password updated successfully, please login again');
					window.location.href = '?p=login&out=ok';
				}else{
									
					return false;
				}
			});
		}//end if
	});
	//Password update Function End

	//Save Loan Collection	
	$( "#save_loan_collection" ).on( "click", function() {
		
		$usrID = $('#usrID').val();
		$accountNo = $('#loan_account_number').val();
		$collection_amount = $('#collection_amount').val();
		$PrnAmt = $('#PrnAmt').val();
		$InttAmt = $('#InttAmt').val();
		$TotalDemand = $('#TotalDemand').val();
		$TotalOutstanding = $('#TotalOutstanding').val();
		//$SmsCd = $('#SmsCd').val();
		$BalanceAmt = 0;
		console.log('collection_amount: '+$collection_amount);
		$('#loan_account_number_success').html('');
		$('#loan_account_number_error').html('');
		$ContNo = $('#ContNo').val();
		console.log('ContNo: '+$ContNo);
			
		if($collection_amount == '' || parseFloat($collection_amount) <= 0){
			$('#collection_amount_error').html('Please Provide Correct Amount');
			return false;
		}else{	
			//Case 1: Collection Amount < Interest
			if(parseFloat($collection_amount) < parseFloat($InttAmt)){
				$InttAmt = parseFloat($collection_amount);
				$PrnAmt = 0;
				$BalanceAmt = parseFloat($TotalOutstanding);
			}
			
			//Case 2: Collection Amount > Interest && < Total Demand
			if((parseFloat($collection_amount) >= parseFloat($InttAmt)) && (parseFloat($collection_amount) < parseFloat($TotalDemand))){
				$PrnAmt = parseFloat($collection_amount) - parseFloat($InttAmt);
				$BalanceAmt = parseFloat($TotalOutstanding) - parseFloat($PrnAmt);
			}
			
			//Case 2: Collection Amount >= Total Demand
			if((parseFloat($collection_amount) >= parseFloat($TotalDemand))){
				$PrnAmt = parseFloat($collection_amount) - parseFloat($InttAmt);
				$BalanceAmt = parseFloat($TotalOutstanding) - parseFloat($PrnAmt);
			}
			
			$.ajax({
			  method: "POST",
			  url: "assets/php/function.php",
			  data: { fn: "save_loan_collection", usrID: $usrID, accountNo: $accountNo, collection_amount: $collection_amount, PrnAmt: $PrnAmt, InttAmt: $InttAmt, TotalDemand: $TotalDemand, TotalOutstanding: $TotalOutstanding, BalanceAmt: $BalanceAmt, ContNo: $ContNo}
			})
			  .done(function( res ) {
				//console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#loan_account_number').val('');
					$('#loan_account_name_span').html('');
					$('#loan_account_product_span').html('');					
					$('#loan_account_principal_demand_span').html('');
					$('#PrnAmt').val('');
					$('#loan_account_interest_demand_span').html('');
					$('#InttAmt').val('');
					$('#loan_account_total_demand_span').html('');
					$('#TotalDemand').val('');
					$('#loan_account_outstanding_span').html('');
					$('#TotalOutstanding').val('');
					$('#collection_amount').val('');
					$('#ContNo').val('');								
					
					$('#loan_account_number_success').html('Transaction Saved, '+$res1.sms_status);
					
					$('#part_one').hide();
					$('#part_two').hide();
				}else{					
					$('#loan_account_number_error').html($res1.message);
					return false;
				}
			});
		}//end if
	});
	
	//Loading screen
	$body = $("body");
	$(document).on({
		ajaxStart: function() { $body.addClass("loading");    },
		 ajaxStop: function() { $body.removeClass("loading"); }    
	});