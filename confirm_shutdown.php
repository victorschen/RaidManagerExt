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


$logged = 0;
$logon_name  = "";

if(isset($_SESSION['logged'])){
	$logged = $_SESSION['logged'];
	$logon_name = $_SESSION['logon_name'];
}
if(!$logged){
	header("location:index.php");
	exit(0);
}

//您的代码写在这里


	$title = "";
	$discription = "";
	$forward_url = $_GET['forward_url'];
	
	switch($forward_url)
	{
		case "process_shutdown.php":
				$title = "$SHUTDOWN_TITLE";
				$discription = "$SHUTDOWN_DESCRIPTION";
				break;
		case "process_restart.php":
				$title = "$RESTART_TITLE";
				$discription = "$RESTART_DESCRIPTION";
				break;
		case "process_restore_default.php":
		        $title = "$RESTART_DEFAULT_TITLE";
	        	$discription = "$RESTART_DEFAULT_DESCRIPTION";	
				break;
		default :
				break;
	}
	$forward_url = "process_confirm_shutdown.php?forward_url=$forward_url";

ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<script language="javascript">
	function checkFileIsNull()
	{
		if(window.document.restore.file.value == "")
		{
			window.alert("<?php echo $TIPS_ENTERPASSWORD; ?>");
			window.document.restore.file.focus();
			return false;
		}
		
		window.document.restore.submit();
	}
	
		//鼠标自动获取登录框焦点 added by gaobo 070911
	function formsFocus()
	{
	  if(document.forms[0])
	  { document.forms[0].elements[0].focus(); }
	}	
	//added by gaobo 070930
	function returnFalse() {
	  return false;
	}	
</script>
</head>
<body onLoad="formsFocus();">
<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><br>
		  <br>
		
		
		
		<form action="<?php echo $forward_url ?>"  method="post" name="restore" id="restore">
		<table border="0" cellpadding="5" cellspacing="1" bgcolor="9DCDED">
              <tr bgcolor="9DCDED"> 
                <td width="649" height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $title ?></font></strong></td>
                    </tr>
                </table></td>
              </tr>
			  <tr>  <!--  bgcolor="#EFFCFE"" width="80%" height="70%" -->
                <td height="251" align="center" valign="middle" bgcolor="#FFFFFF"><table width="557" height="202" border="0" cellpadding="5" cellspacing="0"class="inc_menu_table">
                  <tr>
                    <!-- bgcolor="#C7E3F3"-->
                    <td height="45" colspan="4" align="center" valign="middle" bgcolor="#B8D3F8"><strong><font color="#FF0000"><?php echo $SHUTDOWN_NOTICE ?>&nbsp;&nbsp;<?php echo $discription ?></font></strong></td>
                  </tr>
                  <tr>
                    <!-- bgcolor="#E3F3F9"-->
                    <td colspan="4" align="center" bgcolor="#DAE9FC"><table width="70%" border="0" cellpadding="5" cellspacing="0"class="inc_menu_table">
                        <tr>
                          <td width="50">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="50">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="50">&nbsp;</td>
                          <td><img src="images/dot.gif" width="14" height="11"></td>
                          <td><font color="#000000"><?php echo $SHUTDOWN_PASSWORD ?></font></td>
                          <td><input type="password" id="file" name="file" size="20" ONFOCUS="document.body.onselectstart = null" ONBLUR="document.body.onselectstart = returnFalse;"></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="50">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <!-- bgcolor="#E3F3F9"-->
                    <td width="38%" align="right" valign="top" bgcolor="#DAE9FC"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="checkFileIsNull()"></td>
                    <!-- bgcolor="#E3F3F9"-->
                    <td width="5%" align="left" bgcolor="#DAE9FC">&nbsp;</td>
                    <!-- bgcolor="#E3F3F9"-->
                    <td width="35%" align="left" valign="top" bgcolor="#DAE9FC"><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="restore.reset()"></td>
                    <!-- bgcolor="#E3F3F9"-->
                    <td width="11%" align="center" bgcolor="#DAE9FC">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
          </table></form>
</td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>