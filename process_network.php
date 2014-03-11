<?php

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
	$pri = "d";
	include "isLogOn.php";
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$NETWORK_LOG");



if(empty($_POST['ipaddr']) || empty($_POST['gateway']) || empty($_POST['netmask']) || empty($_POST['ethernet']))
{
	echo '<script lanuage="javaScript">window.alert("'.$PRO_NETWORK_ALERT.'");window.location.href="index.php"</script>';
	//header("location:index.php");
	exit(0);
}
ob_end_flush();

$message = "";
$lines = file('/etc/sysconfig/network-scripts/ifcfg-'.$_POST['ethernet']);

$settings = array();
foreach ($lines as $line_num => $line) {
    $linecontent = explode("=",$line);
    $linecontent[1] = trim($linecontent[1]);
    $settings[$linecontent[0]] = $linecontent[1];
}



$settings['DEVICE'] = trim($_POST['ethernet']);
$settings['IPADDR'] = trim($_POST['ipaddr']);
$settings['GATEWAY'] = trim($_POST['gateway']);
$settings['NETMASK'] = trim($_POST['netmask']);

/*
$addr = explode('.', $settings['IPADDR']);
$nmsk = explode('.', $settings['NETMASK']);

$net_addr = array(0,0,0,0);
$bcst_addr = array(0,0,0,0);

for($i=0;$i<4;$i++){
	$addr[$i] = intval($addr[$i]);
	$nmsk[$i] = intval($nmsk[$i]);
	$net_addr[$i] = $addr[$i] & $nmsk[$i];
	$bcst_addr[$i] = 256 +( $net_addr[$i] | ( ~$nmsk[$i] ));
}

//$settings['NETWORK'] = implode(".", $net_addr);
//$settings['BROADCAST'] = implode(".", $bcst_addr);
*/





///$dns_settings[0] = $_POST['dns1'];
//$dns_settings[1] = $_POST['dns2'];
//$dns_settings[2] = $_POST['dns3'];

//write new ifcfg-eth0 file:
//chmod('ifcfg-eth0',0777);
//chmod('resolv.conf',0777);


$file_ip = fopen("ifcfg-eth","w+");
foreach($settings as $key => $value){
    fwrite($file_ip,"$key=$value\n");
}
fclose($file_ip);

$fp_flag = fopen("Monitor/".$_POST['ethernet'], "w");
fclose($fp_flag);

/*$file_dns = fopen('Monitor/resolv.conf','w+');
fwrite($file_dns,"search domain\n");
foreach($dns_settings as $key => $value){
    fwrite($file_dns, "nameserver $value\n");
}
fclose($file_dns);
*/
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
	window.location.href="http://<?php echo $settings['IPADDR'] ?>/index.php";
}
</script>
<?php include "script/network_processbar.js.php" ?>

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

