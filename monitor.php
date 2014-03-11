<?php

//�������
ob_start();

include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;
//�����Ự���ⲽ�ز����� 
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

//�鿴������־�Ƿ�����
include "log/Log.php";
$maxLogNumber = 1400;
$count = getRecordCount();
if($count>=$maxLogNumber)
{
	if(!isset($_SESSION['isFulled']) && $logon_name=='root')
	{
		echo '<script language="javaScript">window.alert("'.$MONITOR_ALERT_LOG_A.$count.$MONITOR_ALERT_LOG_B.'");</script>';			
		$_SESSION['isFulled'] = 1;
	}
}

//����Monitor�ļ�������û��raidConfig_error���������˵��raidConfig.xml���� added by gaobo 071004
$filesNew = "Monitor/raidConfig_error";
 if(file_exists($filesNew))   
 {   
      //echo 'alert("������Ϣ��������������ȷ�����ñ����ļ��ָ����ã�")';
      echo "<script language=\"javaScript\">window.alert(\"".$MONITOR_RAIDCONF_ERROR."\");window.location.href=\"restore.php\";</script>";	
  } 

ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<?php include "script/monitor.js.php" ?>
<script language="javascript">
	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	
</script>
</head>
<!---->
<body onLoad="send_request('Monitor/raidConfig.xml');refreshDiskStatusPerThreeSec();document.body.onselectstart = returnFalse;">
<div id="showRaid" style="position:absolute;display:none;overflow:visible;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF; border-color:9DCDED" onClick="this.style.display='none'">
</div>
<div id="showDisk" style="position:absolute;display:none;overflow:visible;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF; border-color:9DCDED" onClick="this.style.display='none'">
</div>
<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><br>
		  <br>		  
		  <table width="675" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr> 
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $MONITOR_SYSTEM_STATUS ?></font></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF"> <br>
                    <div id="rackbody"></div>
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr align="center"> 
                      <td valign="top"><strong><?php echo $MONITOR_DESCRIPTION ?></strong>&nbsp;1��<?php echo $MONITOR_DISK_NORMAL ?>�� 
                        2��<?php echo $MONITOR_DISK_BROKEN ?> 
                        <?php  $MONITOR_DISK_NULL ?>�� </td>
                    </tr>
                  </table> 
                  <br><br>
				  <div id="hoho"></div>
                </td>
              </tr>
          </table>
	  </td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>
</html>
