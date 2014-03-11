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
/*
**function: 根据raid的level，判断盘的个数是否正确
**xmldoc:	配置好的xml文件，raidConfigNew.xml
**returnValue: true:个数正确;false:个数错误
*/
function checkChunkByRaidLevel(xmldoc)
{	
	var raidArray = xmldoc.getElementsByTagName('singleRaid');
	var raidNumber = raidArray.length;
	
	
	for(var i=0; i<raidNumber; i++)
	{
		var level = raidArray.item(i).getAttribute("level");
		var raidstat = raidArray.item(i).getAttribute("raidstat");
		var diskArray = raidArray.item(i).getElementsByTagName('Disk');
		var diskNumber = diskArray.length;
		var diskCount = 0;		// 记录阵列中磁盘的个数（指非热备份盘）
		
		// alter by YanWei 2007-09-06 ( no test )
		var spareDiskCount = 0;		// 记录热备份盘个数
		
		for(var m=0; m<diskNumber; m++)
		{
			var isSpareDisk = diskArray.item(m).getAttribute("isSpareDisk");
		//	isSpareDisk=='0' ? diskCount++ : '';
			isSpareDisk=='0' ? diskCount++ : spareDiskCount++;
		}
		
		if(raidstat == "-1")
		{
			switch(level)
			{
				case '0':
							// alter by YanWei 2007-09-06 ( no test )
							//alert("spareDiskCount is "+spareDiskCount);
							if (spareDiskCount > 0)
							{
								alert('<?php echo $CASE_RAID0_B; ?>！ ');
								return false;
							}
							else if(diskCount>=2)
							{
								break;
							}

							else
							{
								alert('<?php echo $CASE_RAID0; ?>!');
								return false;
							}
				case '1':
							if(diskCount>=2)
							{
								break;
							}
							else
							{
								alert('<?php echo $CASE_RAID1; ?>!');
								return false;
							}
				case '4':
							if(diskCount>=3)
							{
								break;
							}
							else
							{
								alert('<?php echo $CASE_RAID4; ?>!');
								return false;
							}
				case '5':
							if(diskCount>=3)
							{
								break;
							}
							else
							{
								alert('<?php echo $CASE_RAID5; ?>!');
								return false;
							}
				case '6':
							if(diskCount>=4)
							{
								break;
							}
							else
							{
								alert('<?php echo $CASE_RAID6; ?>!');
								return false;
							}
				case '10':
							if(diskCount%2==0 && diskCount>=4)
							{
								break;
							}
							else
							{
								alert('<?php echo $CASE_RAID10; ?>!');
								return false;
							}
				default :
							return false;
			}
		}
	}
	
	if(checkCapacity(xmldoc) == false)
	{
		return false;
	}
	
	var isToSubmit = window.confirm('<?php echo $CONFIRM_RAID_PRO; ?>');
	if(isToSubmit == false)
	{
		return false;
	}
	else
	{		
		return true;
	}
}

/*
**function: 检查popedom格式是否正确
*/
function checkPopedomFormat1(popedom)
{
	var regexp = /^((all-)|((\d){1,3}\.(\d){1,3}\.(\d){1,3}\.(\d){1,3}-)*)$/;
	var result = regexp.test(popedom.value);
	if(!result||popedom.value=="")
	{
		document.getElementById('operationTip').innerHTML = '<strong><font color=\"#FF3300\"><?php echo $TIPS_IP_RAID; ?></font></strong>';
	}
	else
	{
		document.getElementById('operationTip').innerHTML = '';	
	}
}

/*
**function: 检查popedom格式是否正确
*/
function checkPopedomFormat2(popedom)
{
	var regexp = /^((all-)|((\d){1,3}\.(\d){1,3}\.(\d){1,3}\.(\d){1,3}-)*)$/;
	var result = regexp.test(popedom.value);
	if(!result||popedom.value=="")
	{
		document.getElementById('operationTip').innerHTML = '';
		alert("<?php echo $TIPS_IP_RAID; ?>");
		popedom.focus();
	}
	return false;
}

/*
**function: 当鼠标聚焦到popedom上时，系统提供正确的输入格式
*/
function popedomTipFocus()
{
	document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_IPFORM; ?>';
}

/*
**function: 当选择不同的level时，系统提供相应的热备份盘个数
*/
function raidLevelTip(selectedOption)
{
	switch(selectedOption.value)
	{
		case '0':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID0; ?>';
				break;
				
		case '1':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID1; ?>';
				break;
				
		case '4':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID4; ?>';
				break;
		case '5':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID5; ?>';
				break;
		case '6':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID6; ?>';
				break;
		case '10':
				document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_FRONT.$CASE_RAID10; ?>';
				break;
		default:
				break;
	}
	
}

/*
**function: 当鼠标离开level时，系统提示消息消失
*/
function raidLevelBlur()
{
	document.getElementById('operationTip').innerHTML = '';
}

/*
**function: 检查各个系列的磁盘阵列，已配置的阵列容量，是否超过所允许的容量
**xmldoc:	配置好的xml文件，raidConfigNew.xml
**returnValue: true:未超过;false:已超过
*/
function checkCapacity(xmldoc)
{
	var raidArray = xmldoc.getElementsByTagName('singleRaid');
	var raidNumber = raidArray.length;
	var totalCapacity = 0;    //各个raid级别容量加起来的总和
	
	for(var i=0; i<raidNumber; i++)
	{
		var diskArray = raidArray.item(i).getElementsByTagName('Disk');
		var diskNumber = diskArray.length;
		var thisRaidTotalCapacity = 0;     //这个raid级别，各个磁盘容量加起来的总和
		
		var thisRaidMiniCapacity = 0;     //这个raid级别，各个磁盘容量加起来的总和
		for(var m=0; m<diskNumber; m++)
		{
			var capacity = parseInt(diskArray.item(m).getAttribute("capacity"));
			if(m == 0)
			{
				thisRaidMiniCapacity = capacity;
			}
			else
			{
				thisRaidMiniCapacity = thisRaidMiniCapacity<capacity ? thisRaidMiniCapacity : capacity;
			}
		}
		
		totalCapacity += thisRaidMiniCapacity*diskNumber;
	}
	
	var productName = "HISTOR LEADER700";     //产品系列的名字
	var limitCapacity = 0;    //限制的容量
	switch(productName)
	{
		case "HISTOR LEADER200":
							limitCapacity = 2400;
							break;
		case "HISTOR LEADER300":
							limitCapacity = 3750;
							break;
		case "HISTOR LEADER500":
							limitCapacity = 4800;
							break;
		case "HISTOR LEADER700":
							limitCapacity = 7500;
							break;
		default         :
							break;
	}
	
	if(totalCapacity>limitCapacity)
	{
		window.alert("<?php echo $TIPS_RAID_PRO_A; ?>"+productName+"<?php echo $TIPS_RAID_PRO_B; ?>");
		return false;
	}
	else
	{
		return true;	
	}
}
</script>