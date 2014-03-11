<?php
    include "inc_config.php";
	$lang = $DEFAULT_LANGUAGE ;
    session_start();  
	if(isset($_SESSION['lang'])){
		$lang = $_SESSION['lang'];
	}
	$include_file = "lang/string_table.". $lang .".php";
	include $include_file;


	//判断用户是否登录，若没有，则返回登录页
	$logged = 0;
	$logon_name  = "";
	$privilege = "";
	
	if(isset($_SESSION['logged'])){
		$logged = $_SESSION['logged'];
		$logon_name = $_SESSION['logon_name'];
		$privilege = $_SESSION['privilege'];  
	}
	if(!$logged){
		header("location:index.php");
		exit(0);
	}
	//added 071006
	$fp_logon_flag = fopen("Monitor/logon_flag", "w");
    fclose($fp_logon_flag);
	
	//搜索Monitor文件夹下有没有raidConfig_error，如果有则说明raidConfig.xml出错 added by gaobo 071004
    $filesNew = "Monitor/raidConfig_error";
    if(file_exists($filesNew))  
	 {    
      echo "<script language=\"javaScript\">window.alert(\"".$MONITOR_RAIDCONF_ERROR."\");window.top.location.href=\"restore.php\";</script>";	
	  exit(0);
     } 
	
	//判断用户是否具有所指定的权限，0:无；1：有
	function getPrivilege($pri)
	{
		global $privilege;
		
		if($privilege =="")
		{
			return 0;
		}
		else
		{
			return strpos($privilege, $pri)===false ? 0:1;
		}
	}
	
	$url = $_GET['url'];
	
	//判断用户是否有权限转向所请求的页面
	switch($url)
	{
		case "index":
					$forward_url = getPrivilege('a')==1 ? "index.php?menu1=display":"failure.php?menu1=display";
					break;
		case "process_backup":
					$forward_url = getPrivilege('b')==1 ? "process_backup.php?menu1=display":"failure.php?menu1=display";
					break;
		case "restore":
					$forward_url = getPrivilege('c')==1 ? "restore.php?menu1=display":"failure.php?menu1=display";
					break;
		case "network":
					$forward_url = getPrivilege('d')==1 ? "network.php?menu2=display":"failure.php?menu2=display";
					break;
		case "account":
					$forward_url = getPrivilege('e')==1 ? "account.php?menu2=display":"process_password_modify.php?menu2=display";
					break;
		case "monitor":
					$forward_url = getPrivilege('f')==1 ? "monitor.php?menu3=display":"failure.php?menu3=display";
					break;
		case "process_shutdown":
					$forward_url = getPrivilege('g')==1 ? "confirm_shutdown.php?forward_url=process_shutdown.php&menu3=display":"failure.php?menu3=display";
					break;
		case "process_restart":
					$forward_url = getPrivilege('h')==1 ? "confirm_shutdown.php?forward_url=process_restart.php&menu3=display":"failure.php?menu3=display";
					break;
		case "process_restore_default":
					$forward_url = getPrivilege('i')==1 ? "confirm_shutdown.php?forward_url=process_restore_default.php&menu3=display":"failure.php?menu3=display";
					break;
		case "operation_log":
					$forward_url = getPrivilege('j')==1 ? "watchLog.php?menu3=display":"failure.php?menu3=display";
					break;
		default:
					$forward_url = "failure.php";
					break;
	}
	
	header("location:$forward_url");
	
?>