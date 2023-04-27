<?php
	include('assets/php/sql_conn.php');	
	
	if(isset($_GET["p"])){
	$p = $_GET["p"];
	}else{
		$p = '';
	}
	
	switch($p){
		case 'login':
		include('pages/login.php');
		break;

		case 'signup':
		include('pages/signup.php');
		break;

		case 'forget_password':
		include('pages/forget_password.php');
		break;

		case 'change_password':
		include('pages/change_password.php');
		break;
		
		case 'dashboard':
		$title = "Dashboard";
		include('pages/dashboard.php');		
		break;
		
		case 'statement_view':
		$title = "Statement View";
		include('pages/statement_view.php');		
		break;
		
		default:
		include('pages/login.php');
	}

?>