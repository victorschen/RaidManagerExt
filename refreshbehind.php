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

//����Monitor�ļ�������û��raidConfig_error���������˵��raidConfig.xml���� added by gaobo 071004
$filesNew = "Monitor/raidConfig_error";
 if   (file_exists($filesNew))   {       
      echo "<script language=\"javaScript\">window.alert(\"".$MONITOR_RAIDCONF_ERROR."\");window.top.location.href=\"restore.php\";</script>";	
  } 
  
//������Monitor�ļ�������isSubmit�Ļ�����˵���������û��ύ���������õ���Ϣ����Ҫ���û�����ͬ�������� added by gaobo 071010  
//echo "<script language=\"javaScript\">window.alert(\"����".$_SESSION['submited']."\");
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
  
//���Ĵ���д������

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