<?php
//�������
ob_start();

include "../inc_config.php";
$lang = $DEFAULT_LANGUAGE ;
//�����Ự���ⲽ�ز����� 
session_start();    
if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}
$include_file = "../lang/string_table.". $lang .".php";
include $include_file;

//���Ĵ���д������

ob_end_flush();

echo '<?xml version="1.0" encoding="'. $CHARSET . '"?>';
?>

<menu>
<!--��ʹ�á����������С��Ҽ��˵����ܡ�-->
  <!--<entity id="c1">
    <description><?php echo $INSERT_SUBRAID; ?></description>
    <image>images/insert.gif</image>
    <imageOpen>images/insert.gif</imageOpen>
    <onClick>insertUpdateDisplay('insert','SubRaid')</onClick>
    <contents>
    </contents>
	</entity>-->
  
  <entity id="c2">
    <description><?php echo $UPDATE; ?></description>
    <image>images/refresh.gif</image>
    <imageOpen>images/refresh.gif</imageOpen>
    <onClick>insertUpdateDisplay('update','singleRaid')</onClick>
    <contents>
    </contents>
  </entity>
  <entity id="c3">
    <description><?php echo $DELETE; ?></description>
    <image>images/delete.gif</image>
    <imageOpen>images/delete.gif</imageOpen>
    <onClick>{if(confirm('<?php echo $TIPS_DELRAID; ?>')){deleteEntity('singleRaid');expandAll(folderTree);}return false;}</onClick>
    <contents>
    </contents>
  </entity>
</menu>