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
	$pri = "e";
	include "isLogOn.php";
	
	//��¼������־
	include "log/Log.php";
	writeLog("$ACCOUNT_ADD_LOG".$_POST['names']);

  //��ȡȨ��
  $privilege = "";
  $tmp_flag = 0;
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
//�߼�����д������
	$name = $_POST['names'];
	$password = $_POST['passwords'];


	
	$password = md5($password);
	$users = file("users.txt");
	$success = 0;
	/*
	whileѭ�����������ж��´������û����Ƿ��Ѿ�������users.txt�ļ���,��������ͬ���û���,�����־λ$tmp_flag����0.�������־λ$tmp_flag = 1;
	*/
	while (list($key, $val) = each($users)) 
		{
			$user = split(":",$val);
			$file_name = $user[0];
						
			if( $name == $file_name)
			{
				
				$tmp_flag = 0;
				break;
			}
			else 
			{
			  $tmp_flag = 1;
			}
		}
	if ($tmp_flag == 1)
	{		
	   $file = fopen('users.txt',"a+");
	   if($file) $success = 1;
	   else $success = 0;
	
	   fwrite($file,"$name:$password:$privilege\n");
	   fclose($file);
	
	/*
	 *  ��Monitor�±��½�һ��user�ļ����Ա����pci��
	 *  ��ôMonitorĿ¼����Ϊ 666��������������������Ҫ��ִ��Ȩ��
	 *  �����Ҫ��Ȩ������Ϊ 777
	 *  alter by YanWei 2007-09
	 */
	 
	   $Restart = fopen("Monitor/user","w");
	   fclose($Restart);
	
	   $url = "javascript:history.go(-1);";
	   $status = $ACCOUNT_ADD_FAILURE;
	   if($success){
		  $url = "account.php";
		  $status = $ACCOUNT_ADD_SUCCESS;
	   }
     }
	 else if ($tmp_flag == 0)
	 {
	   $url = "account.php";
	   $status = $ACCOUNT_ADD_FAILURE;
	 }
	 
ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<script language="javascript" type="text/javascript">

	function bodyloaded(){
		 
		 setTimeout("goback()",100);
			
	}
	
	function goback(){
		// alert by YanWei 2007-09
		var flag = <?php echo $tmp_flag; ?>;
		if (flag == 0)
			alert("<?php echo $ACCOUNT_ADD_FAILURE; ?>");
		else if (flag == 1)
			alert("<?php echo $ACCOUNT_ADD_SUCCESS; ?>");
		
	    window.location.href = "<?php echo $url; ?>?tt=<?php echo $tmp_flag; ?>";
			
	}
	// <body onLoad="bodyloaded()">

</script>
</head>
<body onLoad="bodyloaded()">

<?php // echo $status; ?>
</body>
</html>