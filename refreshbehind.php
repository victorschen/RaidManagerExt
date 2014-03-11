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

//搜索Monitor文件夹下有没有raidConfig_error，如果有则说明raidConfig.xml出错 added by gaobo 071004
$filesNew = "Monitor/raidConfig_error";
 if   (file_exists($filesNew))   {       
      echo "<script language=\"javaScript\">window.alert(\"".$MONITOR_RAIDCONF_ERROR."\");window.top.location.href=\"restore.php\";</script>";	
  } 
  
//搜索到Monitor文件夹下有isSubmit的话，则说明有其他用户提交了阵列配置的信息，则要求用户立刻同步阵列树 added by gaobo 071010  
//echo "<script language=\"javaScript\">window.alert(\"存在".$_SESSION['submited']."\");
$fileSub = "Monitor/isSubmit";
 if(file_exists($fileSub))   
  { 	
   if(!isset($_SESSION['submited']))
    {	
	 echo "<script language=\"javaScript\">window.top.flagCheckRaidSubmit = '2';</script>"; 
     echo "<script language=\"javaScript\">window.alert(\"".$LOG_ISSUBMIT_ALERT."\");window.top.tree.location.href=\"refreshtree.php\";</script>";		 		
     }else{
		    if($_SESSION['submited']!=1)
			{		
			 echo "<script language=\"javaScript\">window.top.flagCheckRaidSubmit = '2';</script>"; 
			 echo "<script language=\"javaScript\">window.alert(\"".$LOG_ISSUBMIT_ALERT."\");window.top.tree.location.href=\"refreshtree.php\";</script>";					
			}
		  }      
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
	setTimeout("refresh()",2000);
}

function refresh(){
	window.location.href='refreshbehind.php';
}

</script>

</head>
<body onLoad="reload();">

</body>
</html>