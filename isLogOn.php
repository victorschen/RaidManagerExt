<?php

	//�ж��û��Ƿ��¼����û�У��򷵻ص�¼ҳ
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
	
	//�ж��û��Ƿ������ָ����Ȩ��
	if(($privilege=="") || (strpos($privilege, $pri)===false))
	{
		//�ĳ��������п��Խ�����ý���Ȩ�޲�����ɵġ����л������� added by gaobo 071011
		echo "<script language=\"javaScript\">window.top.location.href=\"failure.php\";</script>";
		exit(0);
	}
?>