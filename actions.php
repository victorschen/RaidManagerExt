<?php

//缓存输出
ob_start();

include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;  
//启动会话，这步必不可少 
session_start();   
if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}
$include_file = "lang/string_table.". $lang .".php";
include $include_file;


$logged = 0;
$logon_name  = "";

if(isset($_SESSION['logged'])){
	$logged = $_SESSION['logged'];
	$logon_name = $_SESSION['logon_name'];
}
if($logon_name != 'root'){
	header("location:index.php");
	exit(0);
}

//您的代码写在这里

$action = $_GET['action'];


ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<script language="javascript" src="script/button.js"></script>
</head>
<body id="dialog">
	<div id="dialogTitle">
		<?php echo $PRODUCT_NAME; ?>
	</div>
	<div id="about">
		<?php echo $ACTIONS[$action]; ?>
	</div>
	<span></span><div class="abutton" onMouseOver="buttonOver(this);"  onmousedown="buttonDown(this);" onMouseUp="buttonUp(this);" onMouseOut="buttonUp(this);" onClick="window.close();"><?php echo $CLOSE; ?></div>		
</body>
</html>