<?php
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
		//记录操作日志
		include "log/Log.php";
		writeLog("$CONFIGURATION_LOG");
		
		//将Web界面的阵列配置保存成一个raidConfigNew.xml的文件
		chdir("/var/www/RaidManager/Monitor/");
		$RC = fopen("raidConfigNew.xml","w");
		system("chmod a+rwx raidConfigNew.xml");
		$xmlString = $_POST['xmlsave'];
		$Temp = stripslashes($xmlString);
		$Temp = str_replace("encoding=\"UTF-16\"","",$Temp);
		fwrite($RC,$Temp);
		fclose($RC);
		
		//提交完毕，设置标志信息 added by gaobo 071010		
		$_SESSION['submited'] = 1;		
		//给其他处于阵列配置页面的用户发信号，要求刷新配置页面，与当前提交后的页面同步 added by gaobo 071010
		$fp = fopen("isSubmit","w"); 
	    fclose($fp);
		

//添加后台正在操作的提示 added by gaobo 071001 	
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
