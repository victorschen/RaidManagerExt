<?php
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

	//判断用户是否登录和具有此操作的权限
	$pri = "c";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$RESTORE_LOG");
	
	$uploadfile = $UPLOAD_DIR ."tmp.bak";
	
	if (!move_uploaded_file($_FILES['file']['tmp_name'], "tmp.bak" )) {
		$a = $_FILES['file']['error'];
		$b = $uploadfile;
		//echo $a.;
		//echo $b;
		//header("Location:index.php?action=restorefailed");
		//上传的文件无法打开的情况下给予提示 added by gaobo 071008
	    echo "<script language=\"javascript\">window.alert(\"$ALERT_UPLOADFILE_ERROR\");window.history.back();</script>";
		echo "<script language=\"javascript\">window.location.href=\"restore.php\";</script>";
		exit();
	}
	
	$lines = file("tmp.bak");
	$xmlstr = "";
	
	/*
	**判断提交的xml文件格式是否正确 by rhb 071004
	*/
	function startElement($parser_instance, $element_name, $attrs){}        //起始标签事件的函数
	function characterData($parser_instance, $xml_data) {}                 //读取数据时的函数 
	function endElement($parser_instance, $element_name) {}                //结束标签事件的函数
	
	$parser = xml_parser_create(); 
	xml_set_element_handler($parser, "startElement", "endElement");//设立标签触发时的相应函数 这里分别为startElement和endElenment
	xml_set_character_data_handler($parser, "characterData");		//设立数据读取时的相应函数	
	
	foreach ($lines as $line_num => $line) 
	{
		/* 保证提交的配置信息，是合法的配置信息 */
	    if($line_num==0)
		{
		   if(base64_decode($line)!="一期封闭开发070926")
			{
			    echo "<script language=\"javascript\">window.alert(\"$ALERT_RESTORE_ERROR\");window.history.back();</script>";
				echo "<script language=\"javascript\">window.location.href=\"restore.php\";</script>";
				exit();
			   //header("Location:restore.php");
			}
		}
		else
		{
			/* xml格式错误 */
			if(!xml_parse($parser, base64_decode($line)))
			{
				xml_parser_free($parser);//关闭和释放parser解析器 
				echo "<script language=\"javascript\">window.alert(\"".$PRO_RES_XMLERROR."\");window.history.back();</script>";
				exit();
			}
			
			$xmlstr = $xmlstr.base64_decode($line);
		}	
	}
	
	xml_parser_free($parser);//关闭和释放parser解析器
	
	/* 先写到一个临时文件里，防止文件还没写完，就被daemon处理掉 */
	$file = fopen('Monitor/restore.xml',"w+");
	fwrite ($file,$xmlstr);
	fclose($file);
	rename('Monitor/restore.xml', 'Monitor/raidConfigNew.xml');
	/* 删除raidConfig出错时候的信号文件raidConfig_error 071004*/
	system("rm -rf Monitor/raidConfig_error");
	/* 生成标志文件,通知daemon */
	$fp = fopen("Monitor/restore","w");
	fclose($fp);
	/*
	echo "<script language=\"javascript\">window.location.href=\"monitor.php\";</script>";
	exit();
	*/
	ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<script language="javascript" src="script/button.js"></script>

<?php include "script/res_bak_processbar.js.php" ?>

</head>

<body onLoad="showRestorePercent();">
<table border="0" bordercolor="#FFFFFF" id="layout" >
	<tr>
		<td  id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr align="center">
	    <td background="images/_r3_c9.jpg">
		   <table width="696px" height="275px" background="images/bgbg.jpg" align="center">
		     <tr align="center">
			 <td align="center">


					<font color="#FFFFFF"><div align="center" id="showText"></div></font>
					<table width="600" border="1" align="center" bordercolor="#FFFFFF">
						  <tr bordercolor="#CCCCCC"><div align="center" id="process_bar">
								<td height="29" bordercolor="#FFFFFF" background="images/h2_bg013.gif"><img src="images/_r7_c10.jpg" name="percentImage" width="36" height="25" id="percentImage"/></td>
						  </div>				
						  </tr>		  
					</table>
	      </td>
	      </tr>
	     </table>
	  </td>
	  </tr>
	  	<tr height="40">
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	    </tr>
</table>
</body>
</html>


