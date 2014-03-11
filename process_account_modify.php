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

	if($_GET['flag'] !='process_password_modify')
	{
		//判断用户是否登录和具有此操作的权限
		$pri = "e";
		include "isLogOn.php";
	}
	include "log/Log.php";
	
	
	

$account_name = $_GET['user'];

//您的代码写在这里


ob_end_flush();
?>

<?php 
	$userName = $_POST['oldpass3'];
	$old_password = $_POST['oldpass2'];
	$new_password = $_POST['newpass'];
	
	$old_password_md5 = md5($old_password);
	$new_password_md5 = md5($new_password);
	
	$user_password = file("users.txt");
	
	while(list($key, $value) = each($user_password))
	{
		$user_pass = split(":", $value);
		$username_in_file = $user_pass[0];
		$password_in_file = trim($user_pass[1]);
		$privilege_in_file = trim($user_pass[2]);
		
		if($userName==$username_in_file && $old_password_md5==$password_in_file)
		{
			$user_password[$key] = $userName.":".$new_password_md5.":".$privilege_in_file."\n";
			$fp = fopen("users.txt", "w+");
			foreach($user_password as $key=>$value)
			{
				fwrite($fp, $value);
			}
			fclose($fp);
			
			//在monitor下边新建一个user文件，以便存入pci卡
			$Restart = fopen("Monitor/user","w");
			fclose($Restart);
			
			//记录操作日志
			writeLog("$ACCOUNT_MODIFY_LOG".$_POST['oldpass3']);
	
			//判断是从process_password_modify.php传过来，还是从view_account.php中传过来
			$forward = "";
			if($_GET['flag'] =='process_password_modify')
			{
				$forward = "process_password_modify.php?menu2=display";
			}
			else
			{
				$forward = "account.php";
			}
			echo "<script language=\"javaScript\">window.alert(\"$MODIFY_SUCCESS\");window.location.href=\"".$forward."\";</script>";
			break;
		}
		else
		{
			if($userName==$username_in_file && $old_password_md5!=$password_in_file)
			{
				//记录操作日志
				writeLog("$ACCOUNT_MODIFY_ERROR_LOG".$_POST['oldpass3']);
				
				echo "<script language=\"javaScript\">window.alert(\"$MODIFY_FAIL\");window.history.back();</script>";
			}
		}
	}
?>