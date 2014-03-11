<?php
//缓存输出
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
	$pri = "g";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$SHUTDOWN_LOG");
	
	//setcookie("logged","",time()-1);
    //setcookie("logon_name","",time()-1);
    //setcookie("privilege","",time()-1);
	$_SESSION["logged"] = '';
    $_SESSION["logon_name"] = '';
    $_SESSION["privilege"] = '';

	
	$ShutDown = fopen("/var/www/RaidManager/Monitor/halt_event","w");
	fclose($ShutDown);
	
	//header("location:index.php");
	//exit();
	
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

<?php include "script/shutdown_processbar.js.php" ?>

</head>
<!--body onLoad="javaScript:window.logon1.name.focus()"><<?php echo $command ?>-->
<body onLoad="showRestorePercent()">
<table border="0" bordercolor="#FFFFFF" id="layout" >
	<tr>
		<td  id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr align="center">
	    <td background="images/_r3_c9.jpg">
		   <table width="696px" height="275px" background="images/<?php echo $SHUTDOWN_IMAGE; ?>" align="center">
		     <tr align="center">
			 <td>


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

