<?php
//缓存输出
ob_start();

include "../inc_config.php";
$lang = $DEFAULT_LANGUAGE ;  
//启动会话，这步必不可少 
session_start();    
if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}
$include_file = "../lang/string_table.". $lang .".php";
include $include_file;

//您的代码写在这里

ob_end_flush();

echo '<?xml version="1.0" encoding="'. $CHARSET . '"?>';
?>
<menu>
  <entity id="c2">
    <description><?php echo $UPDATE; ?></description>
    <image>images/refresh.gif</image>
    <imageOpen>images/refresh.gif</imageOpen>
    <onClick>insertUpdateDisplay('update','SubRaid')</onClick>
    <contents>
    </contents>
  </entity>
  <entity id="c3">
    <description><?php echo $DELETE; ?></description>
    <image>images/delete.gif</image>
    <imageOpen>images/delete.gif</imageOpen>
    <onClick>deleteEntity('SubRaid')</onClick>
    <contents>
    </contents>
  </entity>
</menu>