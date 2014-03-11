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

include "lang/languages.index.php";

//您的代码写在这里
$message = "";
if(isset($_GET['action'])){
	if( $_GET['action'] == 'language' ){
		$value = $_GET['value'];
		$message = 	$LANGUAGE_CHANGED_1	.$LANGUAGES[$value] ."。" .	$LANGUAGE_CHANGED_2;
	}
}
ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
</head>
<body>

<table id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td id="main">
		<div id="actions">
			<div class="pageTitle"><?php echo $LANGUAGE_SETTINGS; ?></div>		
		</div>
		<p><?php echo $message; ?></p>
		<p><?php echo $LANGUAGE_COMMENT; ?></p>
		<form name="language" id="language" method="post" action="process_language.php">
			<?php echo $SELECT_LANGUAGE; ?>
			<select name="lang">
			<?php
				while (list($key, $val) = each($LANGUAGES)) {
				    echo "<option value='$key' ";
				    if($lang==$key) echo "selected";
				    echo " >$val</option>";
				}
			?>
			</select>
			&nbsp;&nbsp; <button type="submit"><?php echo $BUTTON_OK ?></button>
		</form>		 
		</td>
	</tr>
	<tr>
		<td colspan="2" id="footer"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>