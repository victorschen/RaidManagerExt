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
	echo "<script language=\"javaScript\">window.top.location.href=\"index.php\";</script>";	
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
<script language="javascript" src="script/autosize.js"></script>
<script language="javascript">
function reload(){
	setTimeout("refresh()",10000);
}

function refresh(){
	window.location.href='system_messages.php';
}

</script>

<style>
<!--
.style7 {font-size: 16px; font-weight: bold; }
.style8 {font-size: 12px}
-->
</style>
<link href="css/1.css" rel="stylesheet" type="text/css">
</head>
<body onmousemove ="dyniframesize('sysmessage');" onLoad="dyniframesize('sysmessage');reload();" style="background-image:url(images/_r3_c9.jpg)">


<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr> 
                <td height="25" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td align="center"><strong><font color="#000000"><?php echo $LOG_MESSAGE; ?></font></strong></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#F5FCFF" class="unnamed1"> <table width="100%" border="0" cellpadding="5" cellspacing="1" class="unnamed1">
                    <tr align="center" bgcolor="#C7E3F3"> 
                      <td width="10%" height="25" bgcolor="#C7E3F3"><strong><?php echo $LOG_LEVEL; ?></strong></td>
                      <td width="10%" bgcolor="#C7E3F3"><strong><?php echo $LOG_DATE; ?></strong></td>
                      <td width="10%" bgcolor="#C7E3F3"><strong><?php echo $LOG_TIME; ?></strong></td>
                      <td width="70%" bgcolor="#C7E3F3"><strong><?php echo $LOG_EVENT; ?></strong></td>
                    </tr>
					
					 <?php
						  $items = file("Monitor/log");
						  $level = "";
						  while (list($key, $val) = each($items)){
								$item = explode('|',$val);
								switch($item[2]){
									case "RAIDSTATUS":
										$level = "level_info";
										break;
									case "DISKADD":
										$level = "level_add";
										break;
									case "DISKFAULTY":
										$level = "level_fault";
										break;
									default:
										$level = "level_other";
								}
								
								
								echo "<tr>";
								echo "<td height=\"25\" align=\"center\" bgcolor=\"#E3F3F9\" ><img src=\"style/"."$DEFAULT_STYLE/$level.gif\" /></td>";
								echo "	<td bgcolor=\"#E3F3F9\" >" . $item[0] . "</td>";
								echo "	<td  bgcolor=\"#E3F3F9\"  >" . $item[1] . "</td>";
								echo "	<td bgcolor=\"#E3F3F9\" >" . $item[3] . "</td>";
								echo "</tr>";
						  }
					  ?>
                  </table>
                  <br>
                </td>
              </tr>
            </table>
</body>
</html>