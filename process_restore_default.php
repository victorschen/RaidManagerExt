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
	$pri = "i";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$RESTART_DEFAULT_LOG");
	
	
	$Restart = fopen("/var/www/RaidManager/Monitor/default","w");
	fclose($Restart);	

	$_SESSION["logged"] = '';
    $_SESSION["logon_name"] = '';
    $_SESSION["privilege"] = '';

	//header("location:http://192.168.0.168");
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
<script language="javascript">
function refresh(){
	window.location.href="http://192.168.0.168";
}
</script>
<?php include "script/restore_processbar.js.php" ?>

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


