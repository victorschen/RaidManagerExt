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
</head>
<body>

<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" id="main"><br><br>
		
		
		
		
		<table border="0" cellpadding="5" cellspacing="1" bgcolor="#DEEFF8"  background="images/_r3_c9.jpg">
              <tr bgcolor="9DCDED"> 
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?PHP echo $FAILURE_TITLE; ?></font></strong></td>
                    </tr>
                  </table>
				</td>
              </tr>
              <tr> 
                <td align="center"> 
				
                  <table width="696px" height="275px" border="0" cellpadding="5" cellspacing="0" class="unnamed1" background="images/bgbg.jpg">
                    
                    <tr> 
                      <td align="center"> 
						 <font color="#FFFFFF"><?PHP echo $FAILURE_NO_PRIVILEGE; ?></font></td>
						 <td width="50">&nbsp;</td>
						 <td width="50">&nbsp;</td>
				    </tr>
                  </table>  
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