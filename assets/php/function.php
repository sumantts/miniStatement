<?php
	include('sql_conn.php');
	
	$fn = $_POST["fn"];
	
	//Login function
	if($fn == 'doLogin'){
		$return_result = array();
		$param1 = $_POST["username"];
		$param2 = $_POST["password"];

		$sql = "{call dbo.USP_NBCustValidate(?,?)}";

		$params = array($param1, $param2); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			//echo json_encode($rows);
			if(sizeof($rows) > 0){
				$status = true;
				$_SESSION["MemId"] = $rows["MemId"];
				$_SESSION["CustId"] = $rows["CustId"];
				$_SESSION["CustNm"] = $rows["CustNm"];
				$_SESSION["ContNo"] = $rows["ContNo"];
			}else{
				$status = false;
				$return_result['message'] = 'Wrong Username or Password';		
			}

		}
		$return_result['status'] = $status;
		//sleep(5)
		echo json_encode($return_result);
	} //end function doLogin

	
	
	//forget Password function
	if($fn == 'forgetPasswordBtn'){
		$return_result = array();
		$customerId = $_POST["customerId"];
		$fogetPwdOTP = $_POST["fogetPwdOTP"];
		$fogetPwdPassword = $_POST["fogetPwdPassword"];

		$sql = "{call dbo.USP_NBCustValidate(?,?)}";

		$params = array($param1, $param2); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			if(sizeof($rows) > 0){
				$status = true;
				$_SESSION["User_Id"] = $rows["User_Id"];
				$_SESSION["Staff_Id"] = $rows["Staff_Id"];
				$_SESSION["Staff_Name"] = $rows["Staff_Name"];
				$_SESSION["Adm"] = $rows["Adm"];
				$return_result['User_Id'] = $rows["User_Id"];
			}else{
				$status = false;
				$return_result['message'] = 'Wrong Username or Password';		
			}

		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function doLogin

	
	
	//Sign up function
	if($fn == 'getCustomerName'){
		$return_result = array();
		$accountNumber = $_POST["accountNumber"];
		$phoneNumber = $_POST["phoneNumber"];

		$sql = "{call dbo.USP_NBCheckCustomer_ByMob(?,?)}";

		$params = array($phoneNumber, $accountNumber); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			//echo json_encode($rows);
			if(sizeof($rows) > 0){
				$IsExists = $rows["IsExists"];		
				if($IsExists > 0){
					$status = false;
					$return_result['message'] = 'Your account already exists';	
				}else{
					$status = true;
					$return_result["IsExists"] = $rows["IsExists"];		
					$return_result["Member_ID"] = $rows["Member_ID"];
					$return_result["Member_Name"] = $rows["Member_Name"];
					$return_result["Member_Code"] = $rows["Member_Code"];	
				}	
			}else{
				$status = false;
				$return_result['message'] = 'Invallid Customer Id/Phone number';		
			}

		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function signup

	
	
	//Sign up function
	if($fn == 'signUpBtn'){
		$return_result = array();
		$Member_ID = $_POST["Member_ID"];
		$Member_Code = $_POST["Member_Code"];
		$signCreatePassword = $_POST["signCreatePassword"];

		$sql = "{call dbo.USP_NBGenerateCustLogIn(?,?,?)}";

		$params = array($Member_ID, $Member_Code, $signCreatePassword); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			if(sizeof($rows) > 0){
				$status = true;			
				
			}else{
				$status = false;
				$return_result['message'] = 'Statement Not Found';		
			}

		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function signup

	
	
	//Change password function
	if($fn == 'ChangePasswordBtn'){
		$return_result = array();
		$cpCustomerId = $_POST["cpCustomerId"];
		$cpCurrentPassword = $_POST["cpCurrentPassword"];
		$cpNewPassword = $_POST["cpNewPassword"];

		$sql = "{call dbo.USP_NBCustValidate(?,?)}";

		$params = array($param1, $param2); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			if(sizeof($rows) > 0){
				$status = true;
				$_SESSION["User_Id"] = $rows["User_Id"];
				$_SESSION["Staff_Id"] = $rows["Staff_Id"];
				$_SESSION["Staff_Name"] = $rows["Staff_Name"];
				$_SESSION["Adm"] = $rows["Adm"];
				$return_result['User_Id'] = $rows["User_Id"];
			}else{
				$status = false;
				$return_result['message'] = 'Wrong Username or Password';		
			}

		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function signup

	
	
	//Sign up function
	if($fn == 'generateAcStatement'){
		$return_result = array();
		$from_date = $_POST["from_date"];
		$upto_date = $_POST["upto_date"];

		$sql = "{call dbo.USP_NBCustAcList(?,?)}";

		$params = array($param1, $param2); 

		if ($stmt = sqlsrv_prepare($conn, $sql, $params)) {
			//echo "Statement prepared.<br><br>\n"; 
		} else {  
			//echo "Statement could not be prepared.\n";  
			die(print_r(sqlsrv_errors(), true));  
		} 

		if( sqlsrv_execute( $stmt ) === false ) {
			die( print_r( sqlsrv_errors(), true));
		}else{
			$rows = sqlsrv_fetch_array($stmt);
			if(sizeof($rows) > 0){
				$status = true;
				$_SESSION["User_Id"] = $rows["User_Id"];
				$_SESSION["Staff_Id"] = $rows["Staff_Id"];
				$_SESSION["Staff_Name"] = $rows["Staff_Name"];
				$_SESSION["Adm"] = $rows["Adm"];
				$return_result['User_Id'] = $rows["User_Id"];
			}else{
				$status = false;
				$return_result['message'] = 'Wrong Username or Password';		
			}

		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function signup
	
	
	
?>