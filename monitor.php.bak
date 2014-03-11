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

//查看操作日志是否已满
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

//搜索Monitor文件夹下有没有raidConfig_error，如果有则说明raidConfig.xml出错 added by gaobo 071004
$filesNew = "Monitor/raidConfig_error";
 if(file_exists($filesNew))   
 {   
      //echo 'alert("配置信息出错！请立刻用正确的配置备份文件恢复配置！")';
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
                  <table width="656" height="182" border="0" cellpadding="0" cellspacing="0" background="images/bg.gif" bgcolor="#353535">
                    <tr> 
                      <td height="182" align="left"><table width="622" border="0">
                        <tr>
                          <td width="45">&nbsp;</td>
                          <td width="567"><table width="550" border="0" cellspacing="1" cellpadding="0">
                            <tr  style="cursor:pointer">
                              <td width="32" onClick="dispShowDisk(0,event)"><img id="0"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(1,event)"><img id="1"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(2,event)"><img id="2"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(3,event)"><img id="3"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(4,event)"><img id="4"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(5,event)"><img id="5"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(6,event)"><img id="6"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(7,event)"><img id="7"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(8,event)"><img id="8"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(9,event)"><img id="9"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(10,event)"><img id="10"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(11,event)"><img id="11"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(12,event)"><img id="12"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
                              <td width="32" onClick="dispShowDisk(13,event)"><img id="13"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
			      			  <td width="32" onClick="dispShowDisk(14,event)"><img id="14"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
			     			  <td width="32" onClick="dispShowDisk(15,event)"><img id="15"  src="images/22.jpg" width="30" height="138" alt="<?php echo $MONITOR_DISPLAY_DISKDETAIL; ?>"></td>
							  <!--下面这个td用来支撑表格宽度 -->
							  <td width="17" height="138"></td>                              
                            </tr>
                          </table></td>
                        </tr>
                        
                      </table></td>
                    </tr>
                    
                    <tr> 
                      <td align="left" valign="top" bgcolor="#333333"><table width="641" height="35" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="44">&nbsp;</td>
                          <td width="597" align="left" valign="top"><table width="536" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="38" height="31" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx2.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx3.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx4.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx5.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx6.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx7.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx8.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx9.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx10.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><strong><font color="#FFFFFF"><img src="images/dx11.jpg" width="28" height="27"></font></strong></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx12.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td width="33" align="center" bgcolor="#333333"><img src="images/dx13.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx14.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
			      					<td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx15.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
			      					<td width="38" align="center"><table width="20" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                                  <tr>
                                    <td align="center" bgcolor="#009900"><img src="images/dx16.jpg" width="28" height="27"></td>
                                  </tr>
                              </table></td>
                              <!--  -->
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table> <br>
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr align="center"> 
                      <td valign="top"><strong><?php echo $MONITOR_DESCRIPTION ?></strong>&nbsp;1、<?php echo $MONITOR_DISK_NORMAL ?>； 
                        2、<?php echo $MONITOR_DISK_BROKEN ?> 
                        <?php  $MONITOR_DISK_NULL ?>。 </td>
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
