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

	//�ж��û��Ƿ��¼�;��д˲�����Ȩ��
	$pri = "b";
	include "isLogOn.php";
	
	//��¼������־
	include "log/Log.php";
	writeLog("$BACKUP_LOG");

//���Ĵ���д������

	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename=raid_backup.ini;') ;
    
	$lines = file("Monitor/raidConfig.xml");
	echo base64_encode("һ�ڷ�տ���070926") . "\n";
	foreach ($lines as $line_num => $line) {
		echo base64_encode($line) . "\n";
	}

ob_end_flush();


?>
