<?php

//�������
ob_start();

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

	if($_GET['flag'] !='process_password_modify')
	{
		//�ж��û��Ƿ��¼�;��д˲�����Ȩ��
		$pri = "e";
		include "isLogOn.php";
	}
	include "log/Log.php";
	
	
	

$account_name = $_GET['user'];

//���Ĵ���д������


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
			
			//��monitor�±��½�һ��user�ļ����Ա����pci��
			$Restart = fopen("Monitor/user","w");
			fclose($Restart);
			
			//��¼������־
			writeLog("$ACCOUNT_MODIFY_LOG".$_POST['oldpass3']);
	
			//�ж��Ǵ�process_password_modify.php�����������Ǵ�view_account.php�д�����
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
				//��¼������־
				writeLog("$ACCOUNT_MODIFY_ERROR_LOG".$_POST['oldpass3']);
				
				echo "<script language=\"javaScript\">window.alert(\"$MODIFY_FAIL\");window.history.back();</script>";
			}
		}
	}
?>