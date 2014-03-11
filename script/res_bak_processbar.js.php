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

//您的代码写在这里

ob_end_flush();
?>
<script language="javascript">
// JavaScript Document
// JavaScript Document
/*
**function: 当用户点击恢复出厂设置时，网页上显示剩余时间的进度条
**
*/
var bar = 0;
function showRestorePercent()
{
	setImageWidth(0);
}

/*
**function: 依据恢复出厂设置操作已用时间占应用的总时间，来动态显示进度条的宽度
**paramName: currentTime,当前恢复出厂设置已用时间
*/
function setImageWidth(currentTime)
{
	var imageId = document.getElementById("percentImage");	
	var imageWidth = imageId.width;   //当前进度条的宽度
	var totalLength = 600;            //进度条的总宽度
	var totalTime = 7000;            //假定恢复备份需要用到的时间，此处为7秒
	var refreshRate = totalTime*0.01;  //每隔多长时间刷新一下
	var currentLength = currentTime/totalTime*totalLength;
	
	//window.alert("ggyy");
	bar= bar + 1;
	
	if(currentTime < totalTime)       //还没有恢复完 
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
		//alert("阵列已关闭!")		
		//setTimeout('refresh()',1);
		window.location.href="monitor.php";
	}
}
</script>