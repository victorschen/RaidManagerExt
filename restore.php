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
	function checkUploadFileIsNull()
	{
		if(window.document.restore.file.value == "")
		{
			window.alert("<?php echo $RESTORE_SAVED_CONFIGURATION;?>");
			window.document.restore.file.focus();
			return false;
		}
	    var uploadFileName = window.document.restore.file.value;
		var isToConfirm = window.confirm('<?php echo $RESTORE_UPLOAD_CONF_A; ?>'+'"'+uploadFileName+'"'+'<?php echo $RESTORE_UPLOAD_CONF_B; ?>');
	    if(isToConfirm == true)
	   {	  
		 window.document.restore.submit();	
	   }
	   else
	   {
		return false;
	   }			
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
<body onLoad="formsFocus();">

<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" valign="top" background="images/_r3_c9.jpg" id="main"><br>
	  <br>
	  <form action="process_restore.php" enctype="multipart/form-data" method="post" name="restore" id="restore">
        <table border="0" cellpadding="5" cellspacing="1" bordercolor="#9DCDED" bgcolor="9DCDED">
          <tr bgcolor="9DCDED">
            <td width="633" height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"><table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                <tr>
                  <td width="50">&nbsp;</td>
                  <td><strong><font color="#FFFFFF"><?php echo $RESTORE_CONFIGURATION?></font></strong></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="275" align="center" bgcolor="#FFFFFF"><table width="527" height="220" border="0" cellpadding="5" cellspacing="0"class="inc_menu_table">
                <tr>
                  <td height="45" colspan="4" align="center" valign="bottom" bgcolor="#B8D3F8"><strong><?php echo $RESTORE_EXPLANATION?></strong></td>
                </tr>
                <tr>
                  <td height="125" colspan="4" align="center" bgcolor="#DAE9FC"><table width="70%" border="0" cellpadding="5" cellspacing="0" class="unnamed1">
                      <tr>
                        <td width="50">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="50">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><img src="images/dot.gif" width="14" height="11" align="right"></td>
                        <td><font color="#000000"><?php echo $RESTORE_FILENAME?></font></td>
                        <td><input type="file" id="file" name="file" ONFOCUS="document.body.onselectstart = null;" ONBLUR="document.body.onselectstart = returnFalse;"></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="50">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>				
                  <td align="right" valign="top" bgcolor="#DAE9FC"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="checkUploadFileIsNull();"></td>
                  <td width="6%" align="left" bgcolor="#DAE9FC">&nbsp;</td>
                  <td width="38%" align="left" valign="top" bgcolor="#DAE9FC"><table width="51" height="24" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="restore.reset()"></td>
                      </tr>
                  </table></td>
                  <td width="11%" align="center" bgcolor="#DAE9FC">&nbsp;</td>
                </tr>
              </table>
                <br>
            </td>
          </tr>
        </table>
      </form></td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>