<?php

	//判断用户是否登录，若没有，则返回登录页
	$logged = 0;
	$logon_name  = "";
	$privilege = "";
	
	session_start(); 
	
	if(isset($_SESSION['logged'])){
		$logged = $_SESSION['logged'];
		$logon_name = $_SESSION['logon_name'];
		$privilege = $_SESSION['privilege'];  
	}
	if(!$logged){
		header("location:index.php");
		exit(0);
	}
	
	//判断用户是否具有所指定的权限
	if(($privilege=="") || (strpos($privilege, $pri)===false))
	{
		//改成下面这行可以解决配置界面权限不够造成的“画中画”问题 added by gaobo 071011
		echo "<script language=\"javaScript\">window.top.location.href=\"failure.php\";</script>";
		exit(0);
	}
?>