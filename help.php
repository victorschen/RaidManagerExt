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
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
</head>
<body>

<table id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><br>
		  <br>
			<?php 
				include $HELP_html;
			?>
		<br>
	  </td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>
