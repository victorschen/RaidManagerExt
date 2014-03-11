<?php
//�������
ob_start();

include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;  
//�����Ự���ⲽ�ز����� 
session_start();   
if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}
$include_file = "lang/string_table.". $lang .".php";
include $include_file;

	//��¼������־
	include "log/Log.php";
	writeLog("$LOGOUT_LOG");	

$_SESSION["logged"] = '';
$_SESSION["logon_name"] = '';
$_SESSION["privilege"] = '';

$status = $LOGGED_OUT;

ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<script language="javascript" type="text/javascript">

	function bodyloaded(){
		setTimeout("goback()",0);
	}
	
	function goback(){
		window.location.href = "index.php";
	}
	
	

</script>
</head>
<body onLoad="bodyloaded()">
</body>