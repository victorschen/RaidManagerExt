<?php


//缓存输出
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
	$pri = "b";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$BACKUP_LOG");

//您的代码写在这里

	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename=raid_backup.ini;') ;
    
	$lines = file("Monitor/raidConfig.xml");
	echo base64_encode("一期封闭开发070926") . "\n";
	foreach ($lines as $line_num => $line) {
		echo base64_encode($line) . "\n";
	}

ob_end_flush();


?>
