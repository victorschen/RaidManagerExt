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
	$pri = "a";
	include "isLogOn.php";
	
	
	
	if(file_exists("/var/www/RaidManager/Monitor/raidConfigNew.xml"))
	{
		$str = "<script language='javaScript'>";
		$str .= "window.history.back();";
		$str .= "window.alert('".$SAVECONF_ALERT."');";
		$str .= "</script>";
		
		echo $str;
	}
	else
	{
		//��¼������־
		include "log/Log.php";
		writeLog("$CONFIGURATION_LOG");
		
		//��Web������������ñ����һ��raidConfigNew.xml���ļ�
		chdir("/var/www/RaidManager/Monitor/");
		$RC = fopen("raidConfigNew.xml","w");
		system("chmod a+rwx raidConfigNew.xml");
		$xmlString = $_POST['xmlsave'];
		$Temp = stripslashes($xmlString);
		$Temp = str_replace("encoding=\"UTF-16\"","",$Temp);
		fwrite($RC,$Temp);
		fclose($RC);
		
		//�ύ��ϣ����ñ�־��Ϣ added by gaobo 071010		
		$_SESSION['submited'] = 1;		
		//������������������ҳ����û����źţ�Ҫ��ˢ������ҳ�棬�뵱ǰ�ύ���ҳ��ͬ�� added by gaobo 071010
		$fp = fopen("isSubmit","w"); 
	    fclose($fp);
		

//��Ӻ�̨���ڲ�������ʾ added by gaobo 071001 	
echo '<link href="css/1.css" rel="stylesheet" type="text/css">';	
echo '<body background="images/_r3_c9.jpg" leftmargin="50">';
echo '<table border="0" cellpadding="5" cellspacing="1" bgcolor="#DEEFF8" background="images/_r3_c9.jpg">';
echo '<tr><td align="center"> ';
echo '<table width="696px" height="275px" border="0" cellpadding="5" cellspacing="0" class="unnamed1" background="images/bgbg.jpg">';
echo '<tr><td align="center"><font color="#FFFFFF">'.$SAVECONF_TIP.'</font></td>';
echo '<td width="50">&nbsp;</td></tr></table></td></tr></table>';

		echo "<meta http-equiv=refresh content='6; url=raid_properties.php'>";
	}
?>
