<?php
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

//根据来源不同，显示不同的错误
$flag = $_GET['flag'];
$messages = "";
if($flag=="lower")
{
	$messages = $MESSAGE_LOWER;
}
else
{
	if($flag=="greater")
	{
		$messages = $MESSAGE_GREATER;
	}
	else
	{
		$messages = $MESSAGE_OTHER;
	}
}
ob_end_flush();

?>
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
  {   
  document.forms[0].elements[1].focus();
  }
}

function returnFalse() {
  return false;
}		
        </script>
</head>
<body onLoad="formsFocus();" background="images/bg3.jpg">
<table width="98%" height="100%" align="center" class="loginBgPic">
	<tr align="center">
	      <td height="105" valign="bottom"><font color="FF4800"><?php echo $messages?></font></td>
  </tr>
	<tr align="center">
		<td height="467" valign="top" align="center">
		  <table width="802" height="444" border="0" align="right" cellpadding="0" cellspacing="4" background="images/bg.jpg">
            <form method="post" action="process_logon.php" id="logon" name="logon1">
              <tr>
                <td width="793" height="433" align="left" valign="top"><table width="763" height="323" border="0">
                    <tr>
                      <td width="439" rowspan="2" align="left" valign="top"><table width="387" border="0">
                          <tr>
                            <td width="69" height="58">&nbsp;</td>
                            <td width="308">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="292" height="254">
                                <param name="movie" value="images/left.swf" />
                                <param name="quality" value="high" />
                                <param name="wmode" value="transparent" />
                                <embed src="images/left.swf" width="292" height="254" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
                            </object></td>
                          </tr>
                      </table></td>
                      <td width="314" height="187" align="left" valign="top"><table width="314" border="0">
                        <tr>
                          <td width="168" height="32">&nbsp;</td>
                          <td width="136">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><img src="images/bgus.jpg" width="136" height="21" border="0" usemap="#Map" /></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top"><table width="97%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                          <tr>
                            <td width="19%" height="40" align="right">&nbsp;</td>
                            <td width="22%"><font color="#FFFFFF"><?php echo $USERNAME ?>：</font></td>
                            <td width="59%"><input name="name" type="text" size="22" onkeydown='if(event.keyCode==13) event.keyCode=9;'  ONFOCUS="document.body.onselectstart = null" ONBLUR="document.body.onselectstart = returnFalse;"/>                            </td>
                          </tr>
                          <tr>
                            <td height="40" align="right">&nbsp;</td>
                            <td><font color="#FFFFFF"><?php echo $PASSWORD ?>：</font></td>
                            <td><input name="password" type="password" size="22" onkeydown='if(event.keyCode==13) javaScript:jump()'  ONFOCUS="document.body.onselectstart = null" ONBLUR="document.body.onselectstart = returnFalse;" /></td>
                          </tr>
                          <tr align="center">
                            <td height="39" colspan="3"><table width="80%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="33%">&nbsp;</td>
                                  <td width="34%"><a href="#"><img src="images/<?php echo $BUTTEN_LOGIN; ?>" width="67" height="25" border="0"  onclick="javaScript:jump()" /></a></td>
                                  <td width="33%"><a href="#"><img src="images/<?php echo $BUTTEN_RESET; ?>" width="69" height="25" border="0"   onclick="window.document.logon1.reset();" /></a></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                </table>
				<table width="793" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $FOOT_TIPS ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php echo $COPYRIGHT ?> <?php echo $FIRM_NAME ?></td>
  </tr>
</table>
</td>
              </tr>
            </form>
        </table></td>
  </tr>
</table>

            
<map name="Map" id="Map"><area shape="rect" coords="1,1,53,20" href="process_language.php?lang=zh_CN" /><area shape="rect" coords="67,1,134,20" href="process_language.php?lang=en_US" /></map> 
</body>
</html>         