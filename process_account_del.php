<?php
ob_start();

	//选择正确的语言文件
	include "inc_config.php";
	$lang = $DEFAULT_LANGUAGE ;  
	//启动会话，这步必不可少 
    session_start();   
    if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
    }
	$include_file = "lang/string_table.". $lang .".php";
	include $include_file;

	//判断用户是否登录和具有此操作的权限
	$pri = "e";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$ACCOUNT_DELETE_LOG".$_GET['user']);


	$username= $_GET['user'];
	

	
	$users = file("users.txt");
	unlink('users.txt');
	$tmp = fopen("users.txt","w+");
	while (list($key, $val) = each($users)) {
	    $user = split(":",$val);
	    $name = $user[0];
	    $password = $user[1];
	    $password = trim($password);
		$privilege1 = $user[2];
	    $privilege1 = trim($privilege1);
	    if($username != $name && $name != ""){
	    	fwrite($tmp,"$name:$password:$privilege1\n");
	    }
	}
	fclose($tmp);

	//在monitor下边新建一个user文件，以便存入pci卡
	$Restart = fopen("Monitor/user","w");
	fclose($Restart);
	header("location:account.php");
	    



ob_end_flush();
?>