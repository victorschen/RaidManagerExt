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

//���Ĵ���д������

ob_end_flush();
?>
<script language="javascript">
// JavaScript Document
// JavaScript Document
/*
**function: ���û�����ָ���������ʱ����ҳ����ʾʣ��ʱ��Ľ�����
**
*/
var bar = 0;
function showRestorePercent()
{
	setImageWidth(0);
}

/*
**function: ���ݻָ��������ò�������ʱ��ռӦ�õ���ʱ�䣬����̬��ʾ�������Ŀ��
**paramName: currentTime,��ǰ�ָ�������������ʱ��
*/
function setImageWidth(currentTime)
{
	var imageId = document.getElementById("percentImage");	
	var imageWidth = imageId.width;   //��ǰ�������Ŀ��
	var totalLength = 600;            //���������ܿ��
	var totalTime = 7000;            //�ٶ��ָ�������Ҫ�õ���ʱ�䣬�˴�Ϊ7��
	var refreshRate = totalTime*0.01;  //ÿ���೤ʱ��ˢ��һ��
	var currentLength = currentTime/totalTime*totalLength;
	
	//window.alert("ggyy");
	bar= bar + 1;
	
	if(currentTime < totalTime)       //��û�лָ��� 
	{
		document.getElementById("showText").innerHTML = "<?php echo $PRO_RES_BAK_TIP_A; ?>";
		imageId.width = currentLength;
		//alert(bar);
		document.getElementById("process_bar").innerText=bar + "%";
		currentTime += refreshRate;
		setTimeout("setImageWidth("+currentTime+")", refreshRate);
	}
	else
	{
		document.getElementById("showText").innerHTML = "<?php echo $PRO_RES_BAK_TIP_B; ?>";
		
		imageId.width = totalLength;
		//alert("�����ѹر�!")		
		//setTimeout('refresh()',1);
		window.location.href="monitor.php";
	}
}
</script>