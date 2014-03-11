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
  <!--<entity id="c1">
    <description><?php echo $INSERT; ?></description>
    <image>images/insert.gif</image>
    <imageOpen>images/insert.gif</imageOpen>
    <contents>-->
      <!--<entity id="i2">
        <description><?php echo $SUBRAID; ?></description>
        <image>images/icon_subraid.gif</image>
        <imageOpen>images/icon_subraid.gif</imageOpen>
	<onClick>insertUpdateDisplay('insert','SubRaid')</onClick>
        <contents>
        </contents>
      </entity>-->
      <entity id="i3">
        <description><?php echo $INSERT_RAID; ?></description>
        <image>images/insert.gif</image>
        <imageOpen>images/insert.gif</imageOpen>
	<onClick>insertUpdateDisplay('insert','singleRaid');mouseClick('options');</onClick>
        <contents>
        </contents>
      </entity>
    <!--</contents>
    <contents>
    </contents>
  </entity>-->
  <!--<entity id="c2">
    <description><?php echo $DELETE; ?></description>
    <image>images/delete.gif</image>
    <imageOpen>images/delete.gif</imageOpen>
    <onClick>deleteEntity('Rack')</onClick>
    <contents>
    </contents>
  </entity>-->
</menu>