<?php
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

	//�ж��û��Ƿ��¼�;��д˲�����Ȩ��
	$pri = "e";
	include "isLogOn.php";
	
	//��¼������־
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

	//��monitor�±��½�һ��user�ļ����Ա����pci��
	$Restart = fopen("Monitor/user","w");
	fclose($Restart);
	header("location:account.php");
	    



ob_end_flush();
?>