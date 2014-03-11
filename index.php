<?php

//缓存输出
ob_start();

include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;
//启动会话，这步必不可少 
session_start();  
if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}
$include_file = "lang/string_table.". $lang .".php";
include $include_file;

 
  //判断是否登陆 
if (isset($_SESSION["yqsj"]) && $_SESSION["yqsj"] == true) 
{ 
  $_SESSION["yqsj"] = false;
  } 

$action = "";
$command  = "";
if(isset($_GET['action'])){
	$action=$_GET['action'];
	$command = "onload='showTip()'";
}


			$logged = 0;
			$logon_name  = "";
			
			if(isset($_SESSION['logged'])){
				$logged = $_SESSION['logged'];
				$logon_name = $_SESSION['logon_name'];
			}
			if($logged){
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

	function showTip(){
		window.showModalDialog("actions.php?action=<?php echo $action; ?>","","dialogHeight:350px;dialogWidth:500px;help:no;scroll:no;status:no");
	}

//zhouzhou modify
function jump(){
		
	 window.location.replace("process_logon.php?name="+document.logon1.name.value+"&password="+document.logon1.password.value);
              
    }
			
	//鼠标自动获取登录框焦点 added by gaobo 070911
function formsFocus()
{
  if(document.forms[0])
  { document.forms[0].elements[0].focus(); }
}		

 	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	   
</script>

</head>
<body onLoad="formsFocus();document.body.onselectstart = returnFalse;"><!-- <?php echo $command ?>-->

<table border="0" bordercolor="#FFFFFF" id="layout" >
	<tr>
		<td  id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td><table width="100%" height="100%">
		  <tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		
		
			<td id="main"  style="vertical-align: middle;" background="images/_r3_c9.jpg" valign="top">			
			<iframe id="tree" src="raid_properties.php" name="tree" frameborder="0" style="width:793px;height:72%;" scrolling="yes"></iframe>
			<iframe id="sysmessage" src="system_messages.php" name="sysmessage" frameborder="0" style="width:793px; height:28%;" scrolling="yes"></iframe>
		
			<iframe id="behind" src="refreshbehind.php" name="behind" frameborder="0" style="display:none;" scrolling="no"></iframe>
			</td>
			
		  </tr>
			</table>
		</td>
	</tr>
	<tr bordercolor="0">
		<td height="12"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>
</body>
</html>
<?php
	ob_end_flush();		
			}
			else{
				//echo "<td  align=\"center\"  width='100%'>";
				//include "login.php";
				//echo "<meta http-equiv=refresh content='0; url=login.php'>";
				//echo "</td>";	
				header("location:login.php");
				exit(0);							
				}
			?>