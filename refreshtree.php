<?php
	//ѡ����ȷ�������ļ�
	include "inc_config.php";
	$lang = $DEFAULT_LANGUAGE ;
	//�����Ự���ⲽ�ز����� 
    session_start();    
	if(isset($_SESSION['lang'])){
		$lang = $_SESSION['lang'];
	}
	$include_file = "lang/string_table.". $lang .".php";
	include $include_file;
	
	$_SESSION['submited'] = 1;	

	//��Ӻ�̨���ڲ�������ʾ added by gaobo 071001 	
echo '<link href="css/1.css" rel="stylesheet" type="text/css">';	
echo '<body background="images/_r3_c9.jpg" leftmargin="50">';
echo '<table border="0" cellpadding="5" cellspacing="1" bgcolor="#DEEFF8" background="images/_r3_c9.jpg">';
echo '<tr><td align="center"> ';
echo '<table width="696px" height="275px" border="0" cellpadding="5" cellspacing="0" class="unnamed1" background="images/bgbg.jpg">';
echo '<tr><td align="center"><font color="#FFFFFF">'.$SAVECONF_TIP.'</font></td>';
echo '<td width="50">&nbsp;</td></tr></table></td></tr></table>';

		echo "<meta http-equiv=refresh content='6; url=raid_properties.php'>";

?>