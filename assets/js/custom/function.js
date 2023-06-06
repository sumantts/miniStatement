
	//Login Page Function
	$( "#login_btn" ).on( "click", function() {
		$username = $('#username').val();
		$password = $('#password').val();

		$('#error_text').html('');
		if($username == ''){
			$('#error_text').html('Please enter username');
		}else if($password == ''){
			$('#error_text').html('Please enter password');
		}else{
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
		}
	});

	//Forget Password Page Function
	$( "#forgetPasswordBtn" ).on( "click", function() {
		$customerId = $('#customerId').val();
		$fogetPwdOTP = $('#fogetPwdOTP').val();
		$generatePwd = $('#generatePwd').val();

		console.log('generatePwd: '+$generatePwd)

		$('#error_text').html('');
		if($customerId == ''){
			$('#error_text').html('Please enter Customer Id');

		}else if($fogetPwdOTP == ''){
			if($customerId != ''){
				//call a service to send OTP
				$.ajax({
				method: "POST",
				url: "assets/php/function.php",
				data: { fn: "forgetPasswordOTP", customerId: $customerId }
				})
				.done(function( res ) {
					console.log(res);
					$res1 = JSON.parse(res);
					if($res1.status == true){
						$('#error_text').html('OTP sent to you mobile, Please enter OTP');
						$current_otp = $res1.otp;					
					}else{
						//alert($res1.message);
						$('#error_text').html($res1.message);
					}
				});
			}//end if

			$( "#forgetPasswordBtn" ).html('Validate OTP');
			$('#block2').show();
			$('#error_text').html('OTP sent to you mobile, Please enter OTP');
		}else if($generatePwd == ''){
			if($fogetPwdOTP != ''){
				console.log($current_otp+' == '+$fogetPwdOTP);
				if($current_otp == $fogetPwdOTP){
					$( "#forgetPasswordBtn" ).html('Submit');
					$('#block3').show();
					$('#error_text').html('Please enter your password');
				}else{
					$('#error_text').html('Incorrect OTP');					
				}
			}
		}else{
			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "forgetPasswordBtn", customerId: $customerId, fogetPwdOTP: $fogetPwdOTP, generatePwd: $generatePwd }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					
				}else{
					//alert($res1.message);
					$('#error_text').html($res1.message);
				}
			});
			return false;
		}
	});

	//Signup Page Function
	$( "#signUpBtn" ).on( "click", function() {
		$accountNumber = $('#accountNumber').val();
		$phoneNumber = $('#phoneNumber').val();
		$signUpOTP = $('#signUpOTP').val();
		$signCreatePassword = $('#signCreatePassword').val();

		$('#error_text').html('');

		if($phoneNumber == ''){
			$('#error_text').html('Please enter Phone Number');
			
		}else if($signUpOTP == ''){
			if($phoneNumber != ''){
				$.ajax({
				method: "POST",
				url: "assets/php/function.php",
				data: { fn: "getCustomerName", accountNumber: $accountNumber, phoneNumber: $phoneNumber }
				})
				.done(function( res ) {
					console.log(res);
					$res1 = JSON.parse(res);
					if($res1.status == true){
						$('#cusNameSpan').html($res1.Member_Name);
						$('#cusIdSpan').html($res1.Member_Code);
						$Member_ID = $res1.Member_ID;
						$Member_Code = $res1.Member_Code;
						$tempSignUpOTP = $res1.signUpOTP;
						$('#signUpOTP').val($tempSignUpOTP);

						$( "#signUpBtn" ).html('Validate OTP');
						$('#block2').show();
						$('#error_text').html('OTP sent to you mobile, Please enter OTP');
					}else{
						//alert($res1.message);
						$('#error_text').html($res1.message);
					}
				});
			}
		}else if(($signUpOTP == '') || ($signUpOTP != $tempSignUpOTP)){
			$('#error_text').html('Please enter the correct OTP');
		}else if($signCreatePassword == ''){
			$( "#signUpBtn" ).html('Submit');
			$('#block2').hide();
			$('#block3').show();
			$('#error_text').html('Please create password');
		}else{
			console.log('call registration fun....');
			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "signUpBtn", Member_ID: $Member_ID, Member_Code: $Member_Code, signCreatePassword: $signCreatePassword }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					$('#error_text').html('Registration completed successfully');					
					$('#accountNumber').val('');
					$('#phoneNumber').val('');
					$('#signUpOTP').val('');
					$('#signCreatePassword').val('');
					
					$('#cusNameSpan').html('');
					$('#cusIdSpan').html('');
					$('#block3').hide();
					$( "#signUpBtn" ).html('Get OTP');
				}else{
					//alert($res1.message);
					$('#error_text').html($res1.message);
				}
			});
			//return false;
		}
	});

	//Change Password Function
	$( "#ChangePasswordBtn" ).on( "click", function() {
		$cpCustomerId = $('#cpCustomerId').val();
		$cpCurrentPassword = $('#cpCurrentPassword').val();
		$cpNewPassword = $('#cpNewPassword').val();

		$('#error_text').html('');

		if($cpCustomerId == ''){
			$('#error_text').html('Please enter Customer Id');
		}else if($cpCurrentPassword == ''){
			$('#error_text').html('Please enter Current Password');
		}else if($cpNewPassword == ''){
			$('#error_text').html('Please enter New Password');
		}else{
			$('#block2').show();

			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "ChangePasswordBtn", cpCustomerId: $cpCustomerId, cpCurrentPassword: $cpCurrentPassword, cpNewPassword: $cpNewPassword }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					
				}else{
					//alert($res1.message);
					$('#error_text').html($res1.message);
				}
			});
			return false;
		}
	});

	//Generate A/c Statement Function
	$( "#generateAcStatement" ).on( "click", function() {
		$from_date = $('#from_date').val();
		$upto_date = $('#upto_date').val();

		$('#from_date_error').html('');
		$('#upto_date_error').html('');

		if($from_date == ''){
			$('#from_date_error').html('Please enter Start Date');
		}else if($upto_date == ''){
			$('#upto_date_error').html('Please enter Upto date');
		}else{
			$('#block2').show();

			$.ajax({
			method: "POST",
			url: "assets/php/function.php",
			data: { fn: "generateAcStatement", from_date: $from_date, upto_date: $upto_date }
			})
			.done(function( res ) {
				console.log(res);
				$res1 = JSON.parse(res);
				if($res1.status == true){
					
				}else{
					//alert($res1.message);
					$('#error_text').html($res1.message);
				}
			});
			return false;
		}
	});
	
	//Loading screen
	$body = $("body");
	$(document).on({
		ajaxStart: function() { $body.addClass("loading");    },
		 ajaxStop: function() { $body.removeClass("loading"); }    
	});