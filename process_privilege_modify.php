<?php 

	//ѡ����ȷ�������ļ�
	include "inc_config.php";
	$lang = $DEFAULT_LANGUAGE ;  
    //�����Ự���ⲽ�ز����� 
    session_start();   
    if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
    }
	$include_file = "lang/string_table.". $lang .".php";
	include $include_file;

	//�ж��û��Ƿ��¼�;��д˲�����Ȩ��
	$pri = "e";
	include "isLogOn.php";
	
	//��¼������־
	include "log/Log.php";
	
	$userName = trim($_POST['userName']);
	
	//��ȡȨ��
  $privilege = "";
  if(isset($_POST["privilege"]))
  {
	foreach($_POST["privilege"] as $key=>$value)
	{
		switch($value)
		{
			case "Configuration":
					$privilege .= "a";
					break;
			case "Backup":
					$privilege .= "b";
					break;
			case "Restore":
					$privilege .= "c";
					break;
			case "Network":
					$privilege .= "d";
					break;
			case "Account":
					$privilege .= "e";
					break;
			case "Monitor":
					$privilege .= "f";
					break;
			case "Shut down":
					$privilege .= "g";
					break;
			case "Restart":
					$privilege .= "h";
					break;
			case "Restore default":
					$privilege .= "i";
					break;
			case "Log":
					$privilege .= "j";
					break;
			default		:
					break;
		}
	}
  }
  
  	$user_password = file("users.txt");
	$isSuccess = 0;
	
	while(list($key, $value) = each($user_password))
	{
		$user_pass = split(":", $value);
		$username_in_file = $user_pass[0];
		$password_in_file = trim($user_pass[1]);
		
		if($userName==$username_in_file)
		{
			$user_password[$key] = $userName.":".$password_in_file.":".$privilege."\n";
			$fp = fopen("users.txt", "w+");
			foreach($user_password as $key=>$value)
			{
				fwrite($fp, $value);
			}
			fclose($fp);
			
			//��monitor�±��½�һ��user�ļ����Ա����pci��
			$Restart = fopen("Monitor/user","w");
			fclose($Restart);
			
			//��¼������־
			writeLog("$PRIVILEGE_MODIFY_LOG".$userName);
	
			
			$isSuccess = 1;
			break;
		}
	}
	
		if($isSuccess==0)
		{
			echo "<script language=\"javaScript\">window.alert(\"$MODIFY_FAIL\");window.history.back();</script>";
		}
		else
		{
			echo "<script language=\"javaScript\">window.alert(\"$MODIFY_SUCCESS\");window.location.href=\"account.php\";</script>";
		}
	
?>