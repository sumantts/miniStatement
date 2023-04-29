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
			echo json_encode($rows);
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
		sleep(5)
		echo json_encode($return_result);
	}//end function doLogin

	
	
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
	if($fn == 'signUpBtn'){
		$return_result = array();
		$phoneNumber = $_POST["phoneNumber"];
		$signUpOTP = $_POST["signUpOTP"];
		$signUpCustomerId = $_POST["signUpCustomerId"];

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