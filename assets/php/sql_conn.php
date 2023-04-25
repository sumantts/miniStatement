<?php
//phpinfo();die/;
/*************************
$servername = "127.0.0.1\SQLEXPRESS";
$conninfo = array("Database"=>"MPower_Core_Pioneer","UID"=>"sa","PWD"=>"admin123");
$conn = sqlsrv_connect($servername,$conninfo);


if ($conn) {
	//echo "SQL Server connection Success";
} else {
	echo "SQL Server connection Failed";
    echo "<pre>";
	die( print_r( sqlsrv_errors(), true)); 
}
session_start();
error_reporting(0);
**************/
$org_name = 'MiniStatement App';
$org_second_name = 'MiniStatement App Co-Operative Society Ltd.';
$logo_login = 'assets/images/logo_martibhumi_login.jpg';
$logo = 'assets/images/logo_martibhumi_dash.jpg';
$small_logo = 'assets/images/logo_martibhumi_small.jpg';
$fav_icon = 'assets/images/logo_martibhumi_small.ico';


// $sql = "SELECT  TOP 10 * from Acct_GL_Head";
// $stmt = sqlsrv_query($conn,$sql);

// if($stmt === false)
// {
// 	die("ERROR");
// }

// while($row = sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC))
// {
// 	echo $row["Account_Desc"]."<br>";
// }


// exit();


?>

