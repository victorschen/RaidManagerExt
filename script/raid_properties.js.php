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
/*
**function: ����raid��level���ж��̵ĸ����Ƿ���ȷ
**xmldoc:	���úõ�xml�ļ���raidConfigNew.xml
**returnValue: true:������ȷ;false:��������
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
		var diskCount = 0;		// ��¼�����д��̵ĸ�����ָ���ȱ����̣�
		
		// alter by YanWei 2007-09-06 ( no test )
		var spareDiskCount = 0;		// ��¼�ȱ����̸���
		
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
								alert('<?php echo $CASE_RAID0_B; ?>�� ');
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
**function: ���popedom��ʽ�Ƿ���ȷ
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
**function: ���popedom��ʽ�Ƿ���ȷ
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
**function: �����۽���popedom��ʱ��ϵͳ�ṩ��ȷ�������ʽ
*/
function popedomTipFocus()
{
	document.getElementById('operationTip').innerHTML = '<?php echo $TIPS_IPFORM; ?>';
}

/*
**function: ��ѡ��ͬ��levelʱ��ϵͳ�ṩ��Ӧ���ȱ����̸���
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
**function: ������뿪levelʱ��ϵͳ��ʾ��Ϣ��ʧ
*/
function raidLevelBlur()
{
	document.getElementById('operationTip').innerHTML = '';
}

/*
**function: ������ϵ�еĴ������У������õ������������Ƿ񳬹������������
**xmldoc:	���úõ�xml�ļ���raidConfigNew.xml
**returnValue: true:δ����;false:�ѳ���
*/
function checkCapacity(xmldoc)
{
	var raidArray = xmldoc.getElementsByTagName('singleRaid');
	var raidNumber = raidArray.length;
	var totalCapacity = 0;    //����raid�����������������ܺ�
	
	for(var i=0; i<raidNumber; i++)
	{
		var diskArray = raidArray.item(i).getElementsByTagName('Disk');
		var diskNumber = diskArray.length;
		var thisRaidTotalCapacity = 0;     //���raid���𣬸��������������������ܺ�
		
		var thisRaidMiniCapacity = 0;     //���raid���𣬸��������������������ܺ�
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
	
	var productName = "HISTOR LEADER700";     //��Ʒϵ�е�����
	var limitCapacity = 0;    //���Ƶ�����
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