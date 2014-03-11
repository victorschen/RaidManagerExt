<?php
	ob_start();
	$lang = $_GET['lang'];
	session_start();
	//setcookie('lang',$lang,time() + 60*60*24*365);
	$_SESSION['lang'] = $lang;
	//header("Location: index.php?action=language&value=". $lang ."");
	header("Location: control.php?url=index");
	ob_end_flush();
?>