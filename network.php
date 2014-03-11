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
include "script/raid_properties.js.php";

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

$settings = array();
$original_ifcfg = "";
$original_dns = "";
$lines = file('ifcfg-eth');
foreach ($lines as $line_num => $line) {
    $linecontent = split("=",$line);
    $settings[$linecontent[0]] = $linecontent[1];
}

//得到主网卡和备用网卡当前的设置
$eth0 = file('/etc/sysconfig/network-scripts/ifcfg-eth0');
$eth1 = file('/etc/sysconfig/network-scripts/ifcfg-eth1');

$settingsEth0 = array();
$settingsEth1 = array();

foreach ($eth0 as $line_num => $line) {
    $linecontent = split("=",$line);
    $settingsEth0[$linecontent[0]] = $linecontent[1];
}
foreach ($eth1 as $line_num => $line) {
    $linecontent = split("=",$line);
    $settingsEth1[$linecontent[0]] = $linecontent[1];
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
<script language="javascript" src="script/button.js"></script>
<script language="javascript" src="script/validate.js"></script>
<script language="javascript">
	var message_error = new Array();
	var detial_tip = new Array();
    message_error[1] = "<?php echo $ERROR_IP_ADDRESS; ?>";
    message_error[2] = "<?php echo $ERROR_NETMASK; ?>";
    message_error[3] = "<?php echo $ERROR_GATEWAY; ?>";
   
    detial_tip[1] = "<?php echo $ERROR_DETIAL_1; ?>";
    detial_tip[2] = "<?php echo $ERROR_DETIAL_2; ?>";
    detial_tip[3] = "<?php echo $ERROR_DETIAL_3; ?>";
    detial_tip[4] = "<?php echo $ERROR_DETIAL_4; ?>";
    detial_tip[5] = "<?php echo $ERROR_DETIAL_4; ?>";
    detial_tip[6] = "<?php echo $ERROR_DETIAL_4; ?>";
    

    function checkIPAddress(id,ip){
    	if( id>3 && document.getElementById(String(id)).value == "") return 1;
    	id = Number(id);
        if(!checkip(ip)){
            document.getElementById('span_' + id).innerHTML = message_error[id];
            document.getElementById('span_' + id).style.display = 'block'; 
            document.getElementById('detialTip').innerHTML = detial_tip[id];
            return 0;
        }
        else{
            document.getElementById('span_' + id).innerHTML = "";
            document.getElementById('detialTip').innerHTML  = "<?php echo $NETWORK_TITLE; ?>";
            document.getElementById('span_' + id).style.display = 'none';
            return 1;
        }
    }
    
    function checkSubmit(){
	    var i;
	    var checksum = 0;
	    for(i=1;i<4;i++){
	    	checksum += checkIPAddress(i,document.getElementById(String(i)).value);
	    }
	    if(checksum != 3) {
	    	 document.getElementById('detialTip').innerHTML = '<?php echo $CHECK_ERRORS; ?>';
	    	 shrink('detialTip',8);
	    	 return;
	   	}
	    else
		{
			if(document.getElementById('eth0').checked==false && document.getElementById('eth1').checked==false)
			{
				document.getElementById('ethernetTip').innerHTML = '<?php echo $ERROR_ETHERNET; ?>';
				document.getElementById('ethernetTip').style.display = 'block'; 
				//shrink('ethernetTip',8);
				return false;
			}
			else
			{
	    	   	network_settings.submit();
			}
	    }

    }
    
    function shrink(id,times){
    	if(times<0){
			document.getElementById('detialTip').style.display = 'block';
    		return;
    	}
    	if(document.getElementById('detialTip').style.display == 'block')
    		document.getElementById('detialTip').style.display = 'none';
    	else document.getElementById('detialTip').style.display = 'block';
    	times--;
    	setTimeout("shrink('detialTip'," + times +")",80);
    }
    
    function showEthernetDetail(ethernet)
	{
		var formNames = document.network_set;
		if(ethernet=='ethernet0')
		{
			formNames.ipaddr.value = '<?php echo trim($settingsEth0['IPADDR']) ?>';
			formNames.netmask.value = '<?php echo trim($settingsEth0['NETMASK']) ?>';
			formNames.gateway.value = '<?php echo trim($settingsEth0['GATEWAY']) ?>';
		}
		else
		{
			formNames.ipaddr.value = '<?php echo trim($settingsEth1['IPADDR']) ?>';
			formNames.netmask.value = '<?php echo trim($settingsEth1['NETMASK']) ?>';
			formNames.gateway.value = '<?php echo trim($settingsEth1['GATEWAY']) ?>';
		}
	}

 	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	   
</script>
</head>
<body>

<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
	  <td background="images/_r3_c9.jpg" id="main" align="center"><br>
		  <br>
		
		
			<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr>
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1">
<table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $NETWORK_SETTINGS; ?></font></strong></td>
                    </tr>
                  </table>
                  
                </td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF"><br>
							
				
                  <table width="100%" border="0" cellpadding="0" cellspacing="5" class="unnamed1">
                    <tr>
                      <td height="40" align="center"><div id='detialTip' ><?php echo $NETWORK_TITLE; ?></div></td>
                    </tr>
                  </table>
				  <form id="network_settings"  enctype="mutipart/form-data" method='post' action="process_network.php" name="network_set">
                  <table width="565" border="0" cellpadding="5" cellspacing="1" class="unnamed1">
				  <?php
						while (list($key, $val) = each($settings)) {
							$original_ifcfg .= "$key=$val";
						}
						?>
                    <tr>
                          <td bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                          <td align="left" bgcolor="#B8D3F8"><nobr><?php echo $ETHERNET_SELECT; ?>：</nobr></td>
                          <td bgcolor="#DAE9FC">
						  <input id="eth0" type="radio" name="ethernet" value="eth0" onClick="showEthernetDetail('ethernet0')" checked="checked"><?php echo $ETHERNET0; ?>&nbsp;&nbsp;&nbsp;
                      <input id="eth1" type="radio" name="ethernet" value="eth1"  onClick="showEthernetDetail('ethernet1')" ONFOCUS="document.body.onselectstart = null" ONBLUR="document.body.onselectstart = returnFalse;"><?php echo $ETHERNET1; ?>					  </td>
                      <td bgcolor="#DAE9FC" width="337"><div id='ethernetTip' class='errorTip'></div></td>
                    </tr>
                    <tr> 
                      <td width="14" bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td width="29" align="left" bgcolor="#B8D3F8"><nobr><?php echo $IP_ADDRESS; ?>：</nobr></td>
                      <td width="140" bgcolor="#DAE9FC"> 
                      <input name="ipaddr" type="text" size="20" ONFOCUS="document.body.onselectstart = null" onblur='checkIPAddress("1",this.value);document.body.onselectstart = returnFalse;' id='1' value="<?php echo $settingsEth0['IPADDR']; ?>" onkeydown='if(event.keyCode==13) event.keyCode=9;'></td>
                      <td width="337" bgcolor="#DAE9FC"><div id='span_1' class='errorTip'></div></td>
                    </tr>
                    <tr> 
                      <td bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td align="left" bgcolor="#B8D3F8"><nobr><?php echo $SUBNET_MASK; ?>：</nobr></td>
                      <td bgcolor="#DAE9FC"> 
                      <input name="netmask" type="text" size="20" ONFOCUS="document.body.onselectstart = null" onblur='checkIPAddress("2",this.value);document.body.onselectstart = returnFalse;' id='2' value="<?php echo $settingsEth0['NETMASK']; ?>" onkeydown='if(event.keyCode==13) event.keyCode=9;'></td>
                      <td bgcolor="#DAE9FC"><div id='span_2' class='errorTip'></div></td>
                    </tr>
                    <tr> 
                      <td bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td align="left" bgcolor="#B8D3F8"><nobr><?php echo $GATEWAY; ?>：</nobr></td>
                      <td bgcolor="#DAE9FC"> 
                      <input name="gateway" type="text" size="20" onblur='checkIPAddress("3",this.value);'  id='3' value="<?php echo $settingsEth0['GATEWAY']; ?>" onkeydown='if(event.keyCode==13) checkSubmit();'></td>
                      <td bgcolor="#DAE9FC"><div id='span_3' class='errorTip'></div></td>
                    </tr>
                    <tr align="center"> 
                      <td colspan="4"> <br>
                        <table width="50%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="checkSubmit()"></td>
                            <td><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="network_settings.reset()"></td>
                          </tr>
                        </table>
					  </td>
                    </tr>
                  </table>
				  </form>
				  </td></tr></table>
	
						

	  </td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>
</html>