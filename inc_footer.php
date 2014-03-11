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

ob_end_flush();
?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="middle" background="images/_r16_c1.gif" bgcolor="1671CC" class="unnamed1"> <font color="#FFFFFF"><strong><?php echo $COPYRIGHT ?></strong><?php echo $FIRM_NAME ?></font></td>
  </tr>
</table>