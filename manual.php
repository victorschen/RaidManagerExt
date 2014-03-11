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
if(!$logged){
	header("location:index.php");
	exit(0);
}

//您的代码写在这里

ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=gb2312">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.STYLE1 {color: #3399FF}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#Layer1 {
	position:absolute;
	left:274px;
	top:324px;
	width:108px;
	height:13px;
	z-index:1;
	overflow: visible;
}
-->
</style>
</head>
<body>
<table id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?>
	    <span class="pageTitle"><a name="top"></a></span></td>
	</tr>
	<tr>
		<td width="17" id="menu"><?php include "inc_menu.php"; ?></td>
		<td width="1244" height="100%" background="images/_r3_c9.jpg" id="main">
		
				<iframe id="manualframe" src="<?php echo $MANUAL_html; ?>" name="manualframe" frameborder="0" style="width:793px;height:100%;" scrolling="yes"></iframe>	
		
	  </td>
	</tr>
	
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>