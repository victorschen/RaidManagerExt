<?php

//�������
ob_start();
//include "initial.php";
include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;
//�����Ự���ⲽ�ز����� 
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
	echo "<script language=\"javaScript\">window.top.location.href=\"index.php\";</script>";	
	exit(0);
}

//���Ĵ���д������
//����Monitor�ļ�������û��isSubmit���еĻ�ɾ����isSubmit added by gaobo 071010
$fileSub = "Monitor/isSubmit"; 
if(file_exists($fileSub))  
{    	 
	@unlink($fileSub);				 
}
$_SESSION['submited'] = '';	

ob_end_flush();		

?>
<HTML>
<HEAD>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<?php include "script/raid_properties.js.php" ?>
<script language="javascript" src="script/autosize.js"></script>
<script language="javascript" src="script/button.js"></script>
<script language="javascript">

//added by gaobo 071003
flagChangConfig = '0';
//added by gaobo 071004
window.top.flagCheckRaidSubmit = '0';

/* �������д򿪹ر���ϸ������Ϣ 071102 */
function displayMenu(name)
{  
	if (document.getElementById(name).style.display=="none") {
		document.getElementById(name).style.display="";
		dispIndex = name;
	}
	else {
		document.getElementById(name).style.display="none";
	}
}

/* �û�ɾ���������еĻ��̺󣬱��ָ����д�����ϢΪ��ʾ״̬����Ҫ�õ���ȫ�ֱ��� */
var dispIndex;

/*
 **function:	 �������ֱ�ʾ������״̬��ת��������ֱ�ʾ��״̬
 **statusNumber: �����ֱ�ʾ������״̬
 **returnValue��	�����ֱ�ʾ��״̬
 */
function parseRaidStatus(statusNumber)
{
	var statusString = "";

	switch(statusNumber)
	{
	case "10":
		statusString = '<font color="#009900"><?php echo $MONITOR_JS_NORMAL ?></font>';
		break;
	case "20":
		statusString = "<?php echo $MONITOR_JS_RECOVERY ?>";
		break;
	case "30":
		statusString = "<?php echo $MONITOR_JS_RESYNC ?>";
		break;
	case "40":
		statusString = '<font color="#FF3300"><?php echo $MONITOR_JS_ERROR ?></font>';
		break;
	case "50":
		statusString = '<font color="#FF9933"><?php echo $MONITOR_JS_DEGRADE ?></font>';
		break;
	default :
		statusString = "<?php echo $MONITOR_JS_UNKNOW ?>";
		break;
	}

	return statusString;
}

/* ����DOM���󣬽���XML */
//if(parseInt(navigator.appVersion.charAt(0))>=4)
//{
//	var isNN=(navigator.appName=='Netscape')?1:0;
//	var isIE=(navigator.appName.indexOf('Microsoft')!=-1)?1:0;
//} 
var xmlDoc = null;
var http_request = false;
//��ʼ��ʼ��XMLHttpRequest����
if (window.ActiveXObject) { // IE�����
	try {
		http_request = new ActiveXObject("Msxml2.XMLHTTP");

		//��ԭҳ�汣�ּ�����
		var isIE = 1;
		var xmlDocument = new ActiveXObject("Microsoft.XMLDOM");
	} catch (e) {
		try {
			http_request = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {}
	}
}

//else if(window.XMLHttpRequest) { //Mozilla �����
else {
	http_request = new XMLHttpRequest();
	if (http_request.overrideMimeType) {//����MiME���
		http_request.overrideMimeType('text/xml');
	}
	//��ԭҳ�汣�ּ�����
	var isNN = 1;
	var xmlDocResult = new XMLSerializer();
	var xmlDocSubmit;
	var xmlDocument = document.implementation.createDocument('','',null);
}

if (!http_request) { // �쳣����������ʵ��ʧ��
	window.alert("<?php echo $FOR_HTTPREQUEST ?>");
	//return false;
}
http_request.onreadystatechange = processRequest;
// ȷ����������ķ�ʽ��URL�Լ��Ƿ�ͬ��ִ���¶δ���
var url = "Monitor/raidConfig.xml?a="+Math.random();
http_request.open("GET", url, true);

http_request.send(null);

// ��������Ϣ�ĺ���
function processRequest() {
	if (http_request.readyState == 4) { // �ж϶���״̬
		if (http_request.status == 200) { // ��Ϣ�Ѿ��ɹ����أ���ʼ������Ϣ
			//alert(http_request.responseText);
			xmlDoc = http_request.responseXML;
			//��ʾ���б��
			showRaidTable();
		} else { //ҳ�治����
			alert("���������ҳ�����쳣��"+http_request.status);
		}
	}
}
//
//if(window.ActiveXObject)
//{ 
//	var isIE = 1;
//	/* ����raidConfig.xml��DOM����ʵ��IE��*/
//	//var xmlDoc= new ActiveXObject('MSXML2.DOMDocument');
//	xmlDoc= new ActiveXObject("Microsoft.XMLDOM");
//	xmlDoc.async = false;
//	xmlDoc.load("Monitor/raidConfig.xml");
//	//var xmlDocument = new ActiveXObject('MSXML2.DOMDocument');
//	var xmlDocument = new ActiveXObject("Microsoft.XMLDOM");
//}
//else
//	/* ����raidConfig.xml��DOM����ʵ��FireFox,Chrome��*/
//	if(document.implementation && 
//		document.implementation.createDocument)
//{ 
//	var isNN = 1;
//	var xmlhttp = new window.XMLHttpRequest();
//	xmlhttp.open = ("GET", "Monitor/raidConfig.xml", true);
//	xmlhttp.send(null);
//	xmlDoc = xmlhttp.responseXML;
//	
//	//var xmlDoc = document.implementation.createDocument('','',null);
//	//xmlDoc.async = false;
//	//xmlDoc.load("Monitor/raidConfig.xml");
//	var xmlDocResult = new XMLSerializer();
//	var xmlDocSubmit;
//	var xmlDocument = document.implementation.createDocument('','',null);
//	///*����3�д������������FF�²鿴��ǰxmlDoc����*/
//	////var xmls1 = new XMLSerializer();
//	////var text2 = xmls1.serializeToString(xmlDocument);
//	////alert("text2 is "+text2);
//}
//else
//{
//	xmlDoc = null;
//}
//

/* ����raidConfig.xml��DOM����ʵ�� �������м���IE/FireFox�棡designed by gaobo*/
/* ����ȫ�ֱ���choseSpareDisk�ṩ������ȱ��ĺ����� */ 
var choseSpareDisk = new Array();
var showRaidDetailString = new Array();
/* ��������������幦�ܱ�� */
function showRaidTable()
{
	var raidArray = xmlDoc.getElementsByTagName('singleRaid');
	var raidNumber = raidArray.length;
	var disksStatus = new Array(14);
	var diskInRaid = new Array();
	var raidTableContent = new Array();

	raidTableContent.push('<table width="675" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">'); 
	raidTableContent.push('<tr><td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"><table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">'); 			 
	raidTableContent.push('<tr><td width="50">&nbsp;</td><td><strong><font color="#FFFFFF"><?php echo $ITEM_CONFIG ?></font></strong></td></tr></table></td></tr>'); 
	raidTableContent.push('<tr><td align="center" bgcolor="#FFFFFF" colspan="10">');

	if(raidNumber > 0)
	{		
		/* ������������Ϣ�����װ�ο� */
		raidTableContent.push( '<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">');
		raidTableContent.push( '            <tr> ');
		raidTableContent.push( '              <td height="25" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"> ');
		raidTableContent.push( '                <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">');
		raidTableContent.push( '                 <tr> ');
		raidTableContent.push( '                    <td width="50">&nbsp;</td>');
		raidTableContent.push( '                    <td align="center"><strong><font color="#000000"><?php echo $RAID_DETAIL ?></font></strong></td>');
		raidTableContent.push( '                  </tr>');
		raidTableContent.push( '                </table></td>');
		raidTableContent.push( '            </tr>');
		raidTableContent.push( '            <tr> ');
		raidTableContent.push( '              <td align="center" bgcolor="#FFFFFF" class="unnamed1" colspan="10"> ');	 
		/* ������������Ϣ���װ�ο�style="table-layout:fixed" */ 

		/* ������б�񣬱�ͷ���� */
		raidTableContent.push('<table width="100%" cellpadding="3" cellspacing="1" border="0"><tr bgcolor="#D6E6FA" align="center">');
		raidTableContent.push('<td><div align="center"><nobr><?php echo $MONITOR_JS_NO ?></nobr></div></td><td><div align="center"><nobr><?php echo $MONITOR_JS_LEVEL ?></nobr></div></td>');		   
		raidTableContent.push('<td><div align="center"><nobr>&nbsp;&nbsp;&nbsp;<?php echo $MONITOR_JS_STATUS ?>&nbsp;&nbsp;&nbsp;</nobr></div></td><td><div align="center"><nobr><?php echo $PROPERTIES_CHUNK ?></nobr></div></td>');
		raidTableContent.push('<td><div align="center"><nobr><?php echo $PROPERTIES_RAIDCAP ?></nobr></div></td><td><div align="center"><nobr><?php echo $PROPERTIES_SPAREDISKNUM ?></nobr></div></td>');
		raidTableContent.push('<td><div align="center"><nobr><?php echo $PROPERTIES_RAIDDISKNUM ?></nobr></div></td><td><div align="center"><nobr><?php echo $BINDINGIP ?></nobr></div></td><td><div align="center"><nobr><?php echo $PROPERTIES_POPEDOM ?></nobr></div></td><td><div align="center"><nobr><?php echo $OPERATION_FF ?></nobr></div></td></tr>');			

		for(var i=0; i<raidNumber; i++)
		{			
			var index = raidArray.item(i).getAttribute("index");
			var level = raidArray.item(i).getAttribute("level");
			var raidstat = raidArray.item(i).getAttribute("raidstat");
			var raidcap = raidArray.item(i).getAttribute("raidcap");			
			var chunk = raidArray.item(i).getAttribute("chunk");
			var devName = raidArray.item(i).getAttribute("devName");
			var binding = raidArray.item(i).getAttribute("binding");
			var mappingNo = raidArray.item(i).getAttribute("mappingNo");
			var raidDiskNum = raidArray.item(i).getAttribute("raidDiskNum");
			var spareDiskNum = raidArray.item(i).getAttribute("spareDiskNum");
			var popedom = raidArray.item(i).getAttribute("popedom");

			index = index==""?"Unknown":index;
			level = level==""?"Unknown":level;
			raidstat = raidstat==""?"Unknown":raidstat;
			raidcap = raidcap==""?"Unknown":raidcap;
			chunk = chunk==""?"Unknown":chunk;
			devName = devName==""?"Unknown":devName;
			mappingNo = mappingNo==""?"Unknown":mappingNo;
			raidDiskNum = raidDiskNum==""?"Unknown":raidDiskNum;
			spareDiskNum = spareDiskNum==""?"Unknown":spareDiskNum;
			popedom = popedom==""?"Unknown":popedom;	

			/* ����bindingֵ�ж�binding���еĹ�ѡ��� ��ʱ����- -*/
			var bindingCheckA = '';
			var bindingCheckB = ''; 
			if(binding=='0-')
			{
				bindingCheckA = 'checked="checked"';
				bindingCheckB = '';
			}else if(binding=='1-'){
				bindingCheckA = '';
				bindingCheckB = 'checked="checked"';
			}else if(binding=='0-1-'){
				bindingCheckA = 'checked="checked"';
				bindingCheckB = 'checked="checked"';
			}			

			/* ��ʾ�޸�ͨ�����õ�DIV */			
			var showBinding = new Array();
			showBinding.push('<form id="form3" action="save_cmd.php" method="POST" enctype="mutipart/form-data"><table width="200">');
			showBinding.push('<tr align="center"><td colspan="2" height="28" background="images/h2_bg01.gif"><?php echo $RAID  ?>'+index+' <?php echo $BINDCHANNAL.$BINDINGMSG ?></td></tr>');				
			showBinding.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $SELECTBINDINGIP ?></nobr></td><td bgcolor="#F0F5FD"><input type="checkbox" name="changeBinding" value="0-" onkeydown="if(event.keyCode==13) changeBindingSubmit('+index+')" '+bindingCheckA+'/><?php echo $BINDCHANNAL ?>0<input type="checkbox" name="changeBinding" value="1-" onkeydown="if(event.keyCode==13) changeBindingSubmit('+index+')" '+bindingCheckB+'/><?php echo $BINDCHANNAL ?>1</td></tr>');
			showBinding.push('<tr><td colspan="2"><table><tr align="center"><td width="15%"></td><td><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="changeBindingSubmit('+index+')"></td><td width="10%"></td>');
			showBinding.push('<td><input name="cancel" type="button" style="width:64px" value="<?php echo $CANCEL; ?>" onclick="shutdownBindingDiv()"></td></tr></table></td></tr>');	
			showBinding.push('</table><input type="textarea" name="cmdsave" value="" style="display:none"></form>');	
			showBindingString[i] = showBinding.join("");	

			/* ��ʾ����IPȨ���õ�DIV */			
			var showIp = new Array();
			showIp.push('<table width="200">');
			showIp.push('<tr align="center"><td colspan="2" height="28" background="images/h2_bg01.gif"><?php echo $RAID  ?>'+index+' <?php echo $PROPERTIES_POPEDOM ?></td></tr>');
			showIp.push('<tr><td bgcolor="#D6E6FA" width="35%"><nobr><?php echo $PROPERTIES_POPEDOM ?>��</nobr></td><td bgcolor="#F0F5FD"><div style="overflow:auto;padding:0;">'+popedom+'</div></td></tr>');	
			showIp.push('<tr><td colspan="2" align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="shutdownIpDiv()"></td></tr>');			
			showIp.push('</table>');	
			showIpString[i] = showIp.join("");			   								

			/* ������б�����ݲ��� */
			raidTableContent.push('<tr bgcolor="#F0F5FD"><td onclick="dispRaidDetail('+i+',event)" style="cursor:pointer"><div align="center"><p style="text-decoration:underline">'+index+'</p></div></td><td><div align="center">'+level+'</div></td><td><div align="center">'+parseRaidStatus(raidstat)+'</div></td>');
			raidTableContent.push('<td><div align="center">'+chunk+'</div></td><td><div align="center">'+raidcap+'</div></td><td><div align="center">'+spareDiskNum+'</div></td>');
			raidTableContent.push('<td><div align="center">'+raidDiskNum+'</div></td><td align="center" onclick="dispBindingDiv('+i+',event)" style="cursor:pointer"><nobr><?php echo $CLICK_HERE_FF  ?></nobr></td><td align="center"  onclick="dispIpDiv('+i+',event)" style="cursor:pointer"><nobr><?php echo $CLICK_HERE_FF  ?></nobr></td>');
			raidTableContent.push('<td align="center"><input name="deleteRaidButton" id="deleteRaidButton" type="button" value="<?php echo $DELETE_RAID_FF; ?>" onclick="deleteRaid('+index+')"/></td></tr>');

			/* ������������ڰ������̵ı�� */
			//raidTableContent.push('<tr><td colspan="10" align="center">');
			var raidDetail = new Array();
			raidDetail.push('<table id="'+index+'" name="'+index+'" width="460" cellpadding="3" cellspacing="1" border="0" class="forRaidConfig">');
			raidDetail.push('<tr><td height="25" colspan="10" background="images/h2_bg01.gif" align="center"><strong><?php echo $RAID  ?>'+index+' <?php echo $DISK_DETAIL  ?></strong></td></tr> ');
			raidDetail.push('<tr bgcolor="#D6E6FA" align="left"><td><div align="center"><nobr><?php echo $MONITOR_ID  ?></nobr></div></td><td><div align="center"><nobr><?php echo $MONITOR_TYPE  ?></nobr></div></td>');
			raidDetail.push('<td><div align="center"><nobr><?php echo $MONITOR_SN  ?></nobr></div></td><td><div align="center"><nobr><?php echo $MONITOR_CAPACITY  ?></nobr></div></td>');
			raidDetail.push('<td><div align="center"><nobr><?php echo $MONITOR_STATUS  ?></nobr></div></td><td width="43"><div align="center"><nobr><?php echo $MONITOR_SPAREDISK  ?></nobr></div></td><td colspan="2"><div align="center"><nobr><?php echo $OPERATION_FF  ?></nobr></div></td>');
			raidDetail.push('</tr>');

			var diskArray = raidArray[i].getElementsByTagName('Disk');
			var diskNumber = diskArray.length;
			var m;			
			/*��ȡ�����а������̵ĸ�����Ϣ*/
			for(m=0; m<diskNumber; m++)
			{
				var idSelected = diskArray.item(m).getAttribute("scsiID");			   
				var scsiId = diskArray.item(m).getAttribute("scsiID");
				diskInRaid.push(scsiId);
				var diskStat = diskArray.item(m).getAttribute("status");
				//���ݴ��̵�״̬��ѡ�����ͼ��
				var diskStatForImg = diskArray.item(m).getAttribute("status");
				var imagePath = "";
				imagePath = diskStatForImg=='0'?'images/disk_normal.gif':'images/disk_broken.gif';					
				var showIsSpare =diskArray.item(m).getAttribute("isSpareDisk");
				if(diskStatForImg!='2'&&showIsSpare=="1")
				{
					imagePath = 'images/disk_spare.gif';
				}
				diskStat = diskStat=='0'?'<font color="#009900"><?php echo $PROPERTIES_STATUS_OK; ?></font>':'<font color="#FF3300"><?php echo $PROPERTIES_STATUS_BAD; ?></font>';
				showIsSpare = showIsSpare=='0'?'<?php echo $NO; ?>':'<font color="#FF9933"><?php echo $YES; ?></font>';
				type = diskArray.item(m).getAttribute("type");
				status = diskStat;
				sn = (diskArray.item(m).getAttribute("sn")).replace(/(^\s*)|(\s*$)/g, "");
				vendor = diskArray.item(m).getAttribute("vendor");
				capacity = diskArray.item(m).getAttribute("capacity");
				isSpareDisk = showIsSpare;				

				raidDetail.push('<tr bgcolor="#F0F5FD"><td><div align="center"><img src="'+imagePath+'">Disk '+scsiId+'</div></td><td><div align="center">'+type+'</div></td>');
				raidDetail.push('<td><div align="center">&nbsp;'+sn+'</div></td><td><div align="center">'+capacity+'</div></td><td><div align="center">'+status+'</div></td><td><div align="center">'+showIsSpare+'</div></td><td><div align="center" style="cursor:pointer" onclick="deleteDisk('+idSelected+')"><?php echo $DELETE; ?></div></td>');
				raidDetail.push('</tr>');

			}//end for diskNumber '+parseDiskStatus(diskStat)+'
			raidDetail.push('<tr><td colspan="10" height="5"><table><tr><td><input name="addSpareDiskButton" id="addSpareDiskButton" type="button" value="<?php echo $ADD_SPAREDISK ?>" onclick="addSpareDiskToRaid('+index+')"/></td><td width="70%"></td><td><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="shutdownRaidDetailDiv()"></td></tr></table></td></tr></table>');
			showRaidDetailString[i] = raidDetail.join("");

		}//end for raidNumber			 
		/* ������Ϣ���װ�ο�Ľ�β */
		raidTableContent.push( '</td></tr></table><br>');	
	}//end if raidNumber!=0


	/* ������ʣ����̲��������װ�ο� */
	raidTableContent.push( '<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">');
	raidTableContent.push( '            <tr> ');
	raidTableContent.push( '              <td height="25" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"> ');
	raidTableContent.push( '                <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">');
	raidTableContent.push( '                 <tr> ');
	raidTableContent.push( '                    <td width="50">&nbsp;</td>');
	raidTableContent.push( '                    <td align="center"><strong><font color="#000000"><?php echo $DISK_DETAIL ?></font></strong></td>');
	raidTableContent.push( '                  </tr>');
	raidTableContent.push( '                </table></td>');
	raidTableContent.push( '            </tr>');
	raidTableContent.push( '            <tr> ');
	raidTableContent.push( '              <td align="center" bgcolor="#FFFFFF"> ');	 
	/* ������ʣ����̲��������װ�ο� */


	//������治�������еĴ��̵ı��	 
	raidTableContent.push('<form name="form2"><table width="100%" style="position:relative">');
	raidTableContent.push('<tr><td colspan="10"><table width="100%" cellpadding="3" cellspacing="1" border="0"><tr bgcolor="#D6E6FA"><td><div align="center"></div></td>');
	raidTableContent.push('<td><div align="center"><nobr><?php echo $MONITOR_ID  ?></nobr></div></td><td><div align="center"><nobr><?php echo $MONITOR_TYPE  ?></nobr></div></td>');
	raidTableContent.push('<td><div align="center"><nobr><?php echo $MONITOR_SN  ?></nobr></div></td><td><div align="center"><nobr><?php echo $MONITOR_CAPACITY  ?></nobr></div></td>');
	raidTableContent.push('<td><div align="center"><nobr><?php echo $MONITOR_STATUS  ?></nobr></div></td>');
	raidTableContent.push('<td><div align="center"><nobr><?php echo $MONITOR_SPAREDISK  ?></nobr></div></td><td><div align="center"><nobr><?php echo $OPERATION_FF  ?></nobr></div></td></tr>');
	otherDiskArray = xmlDoc.getElementsByTagName('Disk');
	var otherDiskNumber = otherDiskArray.length;	   
	var j;
	//alert(diskInRaid);
	for(j=0; j<otherDiskNumber; j++)
	{
		var scsiId = otherDiskArray.item(j).getAttribute("scsiID");
		var existFlag = 0;
		for(k=0;k<diskInRaid.length;k++)
		{
			if(diskInRaid[k]==scsiId) 
			{
				existFlag = 1;
			}
		}
		if(existFlag==0)
		{

			var idSelected = otherDiskArray.item(j).getAttribute("scsiID");				   
			var diskStat = otherDiskArray.item(j).getAttribute("status");
			/* ��diskStatΪ2��ʱ�������ȱ��İ�ťΪdisabled������ǰ�ĸ�ѡ��Ϊdisabled by gaobo 080111 */
			var checkBoxDis='';
			var bottunDisabled='';
			if(diskStat=='2')
			{
				checkBoxDis='disabled="true"';
				bottunDisabled='disabled="true"';
			}					  

			/* ���ݴ��̵�״̬��ѡ�����ͼ�� */
			var diskStatForImg = otherDiskArray.item(j).getAttribute("status");
			var imagePath = "";
			imagePath = diskStatForImg=='0'?'images/disk_normal.gif':'images/disk_broken.gif';

			var showIsSpare =otherDiskArray.item(j).getAttribute("isSpareDisk");

			diskStat = diskStat=='0'?'<font color="#009900"><?php echo $PROPERTIES_STATUS_OK; ?></font>':'<font color="#FF3300"><?php echo $PROPERTIES_STATUS_BAD; ?></font>';
			showIsSpare = showIsSpare=='0'?'<?php echo $NO; ?>':'<font color="#FF9933"><?php echo $YES; ?></font>';
			type = otherDiskArray.item(j).getAttribute("type");				   
			status = diskStat;
			sn = (otherDiskArray.item(j).getAttribute("sn")).replace(/(^\s*)|(\s*$)/g, "");
			vendor = otherDiskArray.item(j).getAttribute("vendor");
			capacity = otherDiskArray.item(j).getAttribute("capacity");
			isSpareDisk = showIsSpare;

			raidTableContent.push('<tr bgcolor="#F0F5FD"><td><div align="center"><input type="checkbox" name="list" value="'+scsiId+'" '+checkBoxDis+'/></div></td><td><div align="center"><img src="'+imagePath+'">Disk '+scsiId+'</div></td><td><div align="center">'+type+'</div></td>');
			raidTableContent.push('<td><div align="center">&nbsp;'+sn+'</div></td><td><div align="center">'+capacity+'</div></td><td><div align="center">'+status+'</div></td>');
			raidTableContent.push('<td width="104px" align="center"><SELECT name="setSpare'+scsiId+'" id="setSpare'+scsiId+'" value="" onchange="setChoseSpareDisk('+scsiId+')" '+bottunDisabled+'><option value="0"><?php echo $NO; ?></option><option value="1"><?php echo $YES; ?></option></SELECT></td><td align="center" style="cursor:pointer" onclick="deleteDisk('+idSelected+')"><?php echo $DELETE; ?></td></tr>');
		}//end if existFlag==0			  
	}//end for otherDiskNumber
	raidTableContent.push( '</form>');
	/* �������а�ť */	   
	raidTableContent.push('<tr><td colspan="10"><table><tr><td><input name="boxSelectALL" type="button" value="<?php echo $BOXSELECTALL ?>" onclick="listBoxSelectAll()"/></td><td><input name="createNewRaid" type="button" value="<?php echo $INSERT_RAID; ?>" onclick="showCreateRaidDiv();dispCreateRaidDiv(event)"/></td></tr></table>');
	raidTableContent.push('</td></tr>');
	/* ʣ����̲������β */	   
	raidTableContent.push('</table>');


	/* ˢ�º��ύ��ť */
	raidTableContent.push( '<tr align="center"><td colspan="10">');	   
	raidTableContent.push( '<br><table><tr><td><FORM name="form1" action="save_config.php" method="POST" enctype="mutipart/form-data"><input name="refresh" type="button" value="<?php echo $REFRESH; ?>" onclick="refreshRaidPage()" />');
	raidTableContent.push( '&nbsp;&nbsp;&nbsp;&nbsp;<input name="submitDoc" type="button" value="<?php echo $SUBMIT_CONFIG; ?>" onclick="checkForTmpInsert()"><input type="textarea" name="xmlsave" value="" style="display:none"></FORM></td></tr></table>');
	raidTableContent.push( '</td></tr>');
	//raidTableContent.push( '');	   

	/* ʣ����̲���������װ�ο�Ľ�β */
	raidTableContent.push( '</td></tr></table>');	   

	/* �����Ŀ�ܵĽ�β */
	raidTableContent.push('</td></tr></table>'); 
	var raidTableContentSting = raidTableContent.join("");
	document.getElementById("showRaidTable").innerHTML = raidTableContentSting;	   
}


/* �ռ��û�ѡ������Ϊ�ȱ��̵�scsiID by gaobo 080112*/
function setChoseSpareDisk(scsiId)
{
	var oListboxSpare = document.getElementById("setSpare"+scsiId+"");
	for(s=0;s<2;s++)
	{
		if(oListboxSpare.options[s].selected)
		{
			var spareValue = oListboxSpare.options[s].value;	
			if(spareValue=="1")	
			{
				var spareNum = choseSpareDisk.length;
				for(i=0;i<spareNum;i++)
				{
					if(choseSpareDisk[i]==scsiId)
					{
						return false;
					}
				}
				choseSpareDisk.push(scsiId);	
			}//end if spareValue=="1"
			else if(spareValue=="0")	
			{
				var spareNum = choseSpareDisk.length;
				for(m=0;m<spareNum;m++)
				{
					if(choseSpareDisk[m]==scsiId)
					{
						choseSpareDisk[m]='';
					}
				}
			}//end if spareValue=="0"			
		}//end if selected
	}//end for(s=0;s<2;s++)	
	//alert(choseSpareDisk);
}

/* ȫѡ��ѡ��ť���ܺ��� by gaobo */
function listBoxSelectAll()
{
	/* �ж��û��Ƿ�ѡ���˴��� */ 
	if(!(document.form2.list))
	{  
		return false;
	}
	if(document.form2 && document.form2.list.length>0)
	{
		for(i=0;i<document.form2.list.length;i++)
		{
			if(!(document.form2.list[i].disabled))
			{
				//alert(document.form2.list[i].disabled);
				document.form2.list[i].checked = true;
			}		
		}  
	}//end if document.form2 && document.form2.list.length>0 

}

/* ˢ�°�ť���ܺ��� */
function refreshRaidPage()
{		
	window.location.href='update_ui.php';	
}

/* ������Ϊ�´��������а���ͬʱɾ���������д��ڵĴ��̶�����´��������𻵵����� 2.0�� */
function checkForTmpInsert()
{

	if(flagChangConfig == '0')
	{
		alert("<?php echo $ALERT_NO_OPERATION;?>");
		return false;
	} 
	tmpForInsert = new Array();
	/* ���tmpForDelete��Ϊ�գ�˵����ɾ�����в�������ʼ�ռ��ύʱ��ǰXML�����������ܹ������Ĵ���ID */
	if(tmpForDelete!= '')
	{

		if(xmlDoc.getElementsByTagName('singleRaid'))
		{
			var raidExist = xmlDoc.getElementsByTagName('singleRaid');
			var raidExistLength = raidExist.length;

			for(var r=0;r<raidExistLength;r++)
			{
				var diskExist = raidExist[r].getElementsByTagName('Disk');
				var diskExistLength = diskExist.length;
				var tmpDiskId;
				for(var d=0;d<diskExistLength;d++)
				{
					tmpDiskId = diskExist[d].getAttribute("scsiID");
					tmpForInsert.push(tmpDiskId);
				}//end for d<diskExistLength	
			}//end for r<raidExistLength
			//alert(tmpForInsert);   
		}//end if xmlDoc.getElementsByTagName('singleRaid')
	}//enc if tmpForDelete!=''

	if(tmpForInsert != '')
	{
		var tmpForInsertLength = tmpForInsert.length;
		for(var i=0;i<tmpForInsertLength;i++)
		{
			//alert("diskId is "+diskId);
			for(var j=0;j<tmpForDelete.length;j++)
			{
				if(tmpForInsert[i] == tmpForDelete[j])
				{
					alert("<?php echo $DEL_CREATE_ALERT; ?>");
					return false;
				}				 
			}
		}//end for i<tmpForInsertLength    
		if(checkChunkByRaidLevel(xmlDoc))
		{	   
			//alert("shangmian");
			window.top.flagCheckRaidSubmit = '2';
			if(isIE)
			{
				var xmlDocTemp = xmlDoc.xml;
				//alert(xmlDocTemp);
				xmlDocTemp1 = xmlDocTemp.replace(/[\r\n]+/g,"");
				//alert(xmlDocTemp1);
				xmlDocTemp2 = xmlDocTemp1.replace(/>[\s\0]+</g,"><");
				//alert(xmlDocTemp2);		
				document.form1.xmlsave.value = xmlDocTemp2;
			}
			if(isNN)
			{
				var xmlDocTemp = xmlDocSubmit.replace(/[\r\n]+/g,"");
				var xmlDocTemp2 = xmlDocTemp.replace(/>[\s\0]+</g,"><");
				document.form1.xmlsave.value = xmlDocTemp2;
				//alert(xmlDocTemp2);
			}
			document.form1.submit();
			return false;   
		}
		else return false; 
	}//end if tmpForInsert != ''  
	else if(checkChunkByRaidLevel(xmlDoc))
	{        
		//alert("xiamian");
		window.top.flagCheckRaidSubmit = '2';
		if(isIE)
		{
			var xmlDocTemp = xmlDoc.xml;
			//alert(xmlDocTemp);
			xmlDocTemp1 = xmlDocTemp.replace(/[\r\n]+/g,"");
			//alert(xmlDocTemp1);
			xmlDocTemp2 = xmlDocTemp1.replace(/>[\s\0]+</g,"><");
			//alert(xmlDocTemp2);
			document.form1.xmlsave.value = xmlDocTemp2;
		}
		if(isNN)
		{
			var xmlDocTemp = xmlDocSubmit.replace(/[\r\n]+/g,"");
			var xmlDocTemp2 = xmlDocTemp.replace(/>[\s\0]+</g,"><");
			document.form1.xmlsave.value = xmlDocTemp2;
			//alert(xmlDocTemp2);
		}
		document.form1.submit();  
	}
	else return false; 
}

/* ɾ�����̹��ܺ��� */
function deleteDisk(scsiId)
{		
	/*����3�д������������FF�²鿴��ǰxmlDoc����*/
	//var xmls1 = new XMLSerializer();
	//var text2 = xmls1.serializeToString(xmlDoc);
	//alert("text2 is "+text2);

	var diskArray = xmlDoc.getElementsByTagName('Disk');		
	var diskNumber = diskArray.length;

	/* �������д��̣��������û������ID��ͬ�Ĵ��� */	
	for(m=0; m<diskNumber; m++)
	{
		var diskId = diskArray.item(m).getAttribute("scsiID");	

		if(diskId==scsiId)
		{
			var diskStat = diskArray.item(m).getAttribute("status");
			if(diskStat==0)
			{
				//alert("����һ���õĴ��̣������ܰ���ɾ����");
				return false;
			}
			else{
				entity = diskArray.item(m);
				entity1=entity.parentNode;
				if(entity1.nodeName=='singleRaid')
				{
					entity2=entity1.attributes;
					entity2.getNamedItem("raidDiskNum").nodeValue=parseInt(entity2.getNamedItem("raidDiskNum").nodeValue)-1;
				}	
				entity = entity.parentNode.removeChild(entity);
				showRaidTable(xmlDoc);	
				if(isNN)
				{			   
					xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
				}
				//�û������˲�����flag��1
				flagChangConfig = '1';
				/* ���������ˢ�´����д�����Ϣ����ʾ gaobo 080111 */
				document.getElementById("showRaidDetail").innerHTML = showRaidDetailString[raidDetailIndex];
			}	  
		}//end if(diskId==scsiId)
	}//end for m<diskNumber	   
}

/* ��¼��ɾ���������еĴ���ID */
tmpForDelete = new Array();
/* ɾ�����й��ܺ��� */
function deleteRaid(index)
{	
	//alert("now index is "+index);
	var raidArray = xmlDoc.getElementsByTagName('singleRaid');		
	var raidNumber = raidArray.length;
	/* �����������У��������û��������ͬ������ */	
	for(m=0; m<raidNumber; m++)
	{
		var raidIndex = raidArray.item(m).getAttribute("index");
		//alert(raidIndex);	   
		if(raidIndex==index)
		{	   
			var diskArray = raidArray.item(m).getElementsByTagName('Disk');
			entity = raidArray.item(m);	
			/* �ռ���ɾ��������״̬�������а����Ĵ���scsiIDװ������tmpForDelete */
			if(entity.getAttribute("raidstat") != '-1')
			{		
				var diskForDeleteArray = entity.getElementsByTagName('Disk');
				//alert(diskArray.length);
				for(var d=0; d<diskForDeleteArray.length; d++)
				{

					var idIsDelete;			  
					if(diskForDeleteArray.item(d).getAttribute("status")!= '2')
					{
						idIsDelete = diskForDeleteArray.item(d).getAttribute("scsiID");
						//alert(idIsDelete);
						tmpForDelete.push(idIsDelete);
					}		
				}
				//alert(tmpForDelete);
			}//end if entity.getAttribute("raidstat")

			if((j=entity.childNodes.length) > 0 ) 
			{ 
				for(i=0;i<j;i++)
				{		   	   
					var entityvoldisk;				
					entityvoldisk=entity.removeChild(entity.childNodes[0]);
					entityvoldisk.setAttribute("isSpareDisk","0");
					//alert(entityvoldisk.getAttribute("isSpareDisk"));
					xmlDoc.documentElement.appendChild(entityvoldisk);
				}
			}
			entity2=xmlDoc.documentElement.attributes; 
			entity2.getNamedItem("raidNum").nodeValue=parseInt(entity2.getNamedItem("raidNum").nodeValue)-1;
			entity = entity.parentNode.removeChild(entity);
			/* ����������ı��Ľ�� */
			showRaidTable(xmlDoc);	
			/* ��ʱ����ı���XML */	   
			if(isNN)
			{			   
				xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
			}
			/* �û������˲�����flag��1 */	   
			flagChangConfig = '1';
		}//end if(raidIndex==index)
	}//end for m<raidNumber
}

/* Ϊ�Ѿ����������ŵ���������ȱ��� */
function addSpareDiskToRaid(index)
{
	//alert("now index is "+index);
	var raidArray = xmlDoc.getElementsByTagName('singleRaid');		
	var raidNumber = raidArray.length;
	/* �����������У��������û��������ͬ������ */	
	for(m=0; m<raidNumber; m++)
	{
		var raidIndex = raidArray.item(m).getAttribute("index");
		//alert(raidIndex);	   
		if(raidIndex==index)
		{	   
			/* ���������Ƿ���RAID0���ǵĻ�������ʾ��������ȱ������ǵĻ��ٽ��н�һ�������� */	  
			var raidLevel = raidArray.item(m).getAttribute("level");  
			if(raidLevel=='0')
			{
				alert("<?php echo $CASE_RAID0_B; ?>�� ");
				/* �������д�����Ϣ����Ϊ��ʾ */	      
				document.getElementById(index).style.display="";
				return false;		 
			}
			else
			{		    
				var choseSpareDiskLength = choseSpareDisk.length;
				if(choseSpareDiskLength=='0')
				{
					alert("<?php echo $ADD_SPAREDISK_ALERT ?>");
					return false;
				}
				else
				{
					/* �ҳ�choseSpareDisk��ÿһ��Ҫ��Ϊ�ȱ���ID��Ӧ�Ĵ��̶��� */
					for(var i=0;i<choseSpareDiskLength;i++)
					{
						var spareDiskArray = xmlDoc.getElementsByTagName('Disk');			   
						var spareDiskArrayLength = spareDiskArray.length;		
						for(var j=0;j<spareDiskArrayLength;j++)
						{
							var diskId = spareDiskArray[j].getAttribute('scsiID');

							if(choseSpareDisk[i]==diskId)
							{				  
								var setSpareDisk;
								/* �ҵ����û�����Ϊ�ȱ�������֮�󣬽������ڵ��ԭλ��ɾ��������setSpareDisk */
								setSpareDisk = xmlDoc.documentElement.removeChild(spareDiskArray[j]);
								/* ���ô���Ϊ�ȱ�isSpareDiskΪ1 */	
								setSpareDisk.setAttribute("isSpareDisk","1");
								/* �����̽ڵ�ҽ������û�ѡ�е�Ҫ����ȱ�������raidArray.item(m) */					
								raidArray.item(m).appendChild(setSpareDisk);
								var spareNum = raidArray.item(m).getAttribute("spareDiskNum");	
								spareNum = parseInt(spareNum)+1;
								raidArray.item(m).setAttribute("spareDiskNum",spareNum);	
								/* ��������ע�Ϳ��Բ鿴��ǰxml */		
								//var xmls1 = new XMLSerializer();
								//var text2 = xmls1.serializeToString(xmlDoc);
								//alert("text2 is "+text2);
								j=spareDiskArrayLength;
								//alert("j is "+j);
							}//end if choseSpareDisk[i]==diskId				  
						}//end for j<spareDiskArrayLength			  
					}//end for i<choseSpareDiskLength 	

				}//end if choseSpareDiskLength=='0'��else

			}//end if(raidLevel=='0')��else     	
			/* ����������ı��Ľ�� */
			showRaidTable(xmlDoc);	
			/* ��ʱ����ı���XML */	   
			if(isNN)
			{			   
				xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
			}	  
			/* �û������˲�����flag��1 */	   
			flagChangConfig = '1';
			choseSpareDisk = new Array();
			/* ���������ˢ�´����д�����Ϣ����ʾ gaobo 080111 */
			document.getElementById("showRaidDetail").innerHTML = showRaidDetailString[raidDetailIndex];
		}//end if(raidIndex==index)
	}//end for m<raidNumber

}

function changeBindingSubmit(index)
{
	var isToSubmit = window.confirm('<?php echo $CONFIRM_RAID_PRO; ?>');
	if(isToSubmit == false)
	{					
		return false;
	}
	else
	{
		var newBindingArray = new Array();
		bindingBoxLength = document.getElementById("form3").changeBinding.length; 
		var changeBindingBox = document.getElementById("form3").changeBinding;
		//alert(bindingBoxLength);
		for(j=0;j<bindingBoxLength;j++)
		{
			/* �����ͨ��Box��check����װ���ͨ���� */
			if(changeBindingBox[j].checked)
			{
				newBindingArray.push(j.toString());		   
			}
		}
		//alert("newBindingArray[0] is "+newBindingArray[0]);
		var newBindingLength =newBindingArray.length;
		//alert("newBindingLength is "+newBindingLength);
		/* ��ȡXML�оɵİ��˵�ͨ���� */
		var raidArray = xmlDoc.getElementsByTagName('singleRaid');
		var raidNumber = raidArray.length;
		for(k=0;k<raidNumber;k++)
		{
			var raidIndex = raidArray[k].getAttribute("index");
			if(raidIndex==index)
			{
				var oldBinding = raidArray[k].getAttribute("binding");		 
				//alert("oldBinding is "+oldBinding);
			}//end if(raidIndex==index)			  
		}//end for k=0;k<raidNumber;k++	
		/* ����ȡ�����ľ�ͨ���ż�¼��������oldBindingArray */ 
		var oldBindingArray = oldBinding.split("-"); 
		//alert("oldBindingArray is "+oldBindingArray);
		var oldBindingLength = oldBindingArray.length;
		var delBindingArray=new Array();
		var addBindingArray=new Array();
		for(m=0;m<oldBindingLength;m++)
		{
			var bindingExist ='0';
			for(n=0;n<newBindingLength;n++)
			{
				//alert("1st time now the n is "+n+" and the newBindingArray[n] is "+newBindingArray[n]);
				//alert("oldBindingArray[m] is "+oldBindingArray[m]);
				oldOne = oldBindingArray[m];
				newOne = newBindingArray[n];
				if(oldBindingArray[m]==newBindingArray[n])
				{
					//alert("��ͬ����");
					bindingExist ='1';				     
					newBindingArray[n]='';					 
				}
				//alert("2nd now the n is "+n+" and the newBindingArray[n] is "+newBindingArray[n]);
			}
			if(bindingExist=='0'&&oldBindingArray[m]!='')
			{
				//alert(oldBindingArray[m])
				oldBindingArray[m]+='-';
				delBindingArray.push(oldBindingArray[m]);				
			}			   
		}//end for(m=0;m<oldBindingLength;m++)
		for(k=0;k<newBindingLength;k++)
		{
			//alert("now the k is "+k+" and the newBindingArray[k] is "+newBindingArray[k]);

			if(newBindingArray[k]!="")
			{
				newBindingArray[k]+='-';
				//alert(newBindingArray[k]);
				addBindingArray.push(newBindingArray[k]);			  
			}				 
		}//end for(k=0;k<newBindingLength;k++)

		var delBindingString = delBindingArray.join("");
		var addBindingString = addBindingArray.join("");			
		//alert("delBindingString is "+delBindingString);
		//alert("addBindingString is "+addBindingString);
		delBindingString = delBindingString==""?"null":delBindingString;
		addBindingString = addBindingString==""?"null":addBindingString;

		/* ���������ַ������ */
		var changeBindi = new Array();
		changeBindi.push('binding*');
		changeBindi.push(index);
		changeBindi.push('*');
		changeBindi.push(delBindingString);
		changeBindi.push('*');
		changeBindi.push(addBindingString);				
		var changeBindiSting = changeBindi.join("");
		//alert(changeBindiSting);
		window.top.flagCheckRaidSubmit = '2';
		document.getElementById("form3").cmdsave.value = changeBindiSting;			
		document.getElementById("form3").submit();		


	}//end else

}

/*
 **function: ���popedom��ʽ�Ƿ���ȷ,�����ȷ��������һ����������
 */
function checkPopedomSubmit(popedom)
{
	var regexp = /^((all-)|((\d){1,3}\.(\d){1,3}\.(\d){1,3}\.(\d){1,3}-)*)$/;
	var result = regexp.test(popedom.value);
	if(!result||popedom.value=="")
	{
		document.getElementById('operationTip').innerHTML = '';
		alert("<?php echo $TIPS_IP_RAID; ?>");
		popedom.focus();
		return false;
	}
	else{
		createRaid();
		document.getElementById("createRaidDiv").style.display="none";
	}
}

/* Ϊ����û��Ƿ�ѡ�д������ñ�־���� */
var checkflag = "false";
/* �������й��ܺ��� */
function createRaid()
{
	checkflag = "false";
	/* �ж��û��Ƿ�ѡ���˴��� */ 
	if(document.form2 && document.form2.list.length>1)
	{
		var selectedNum=0;
		for(i=0;i<document.form2.list.length;i++)
		{
			if(document.form2.list[i].checked == true)
			{
				checkflag=true;
				selectedNum++;
			}
		}
		//alert("selectedNum is "+selectedNum);
		if(selectedNum==1)
		{
			alert("<?php echo $RAID_ALERT_FF_2; ?>");
			return false;
		}
	} 
	else
	{
		alert("<?php echo $RAID_ALERT_FF_2; ?>");
		return false;
	}
	if(checkflag=="false")
	{ 
		alert("<?php echo $RAID_ALERT_FF_1; ?>");
		return false;
	}
	/* �жϽ�����û�ѡ���˴��̣���ʼ�������� */  
	var diskIsSelected;                     //��ű�ѡ�еĴ���scsiID
	/* ����style/insertentity.xml��DOM����ʵ��,�������������� */ 
	xmlDocument.async = false;
	xmlDocument.load("style/createSingle.xml");
	var entitys = xmlDocument.getElementsByTagName('singleRaid');
	var entity = entitys[0]; 
	xmlDoc.documentElement.appendChild(entity);

	/* ����û�ѡ���˴��̣������̵�Disk�ڵ�װ��diskIsSelectedArray���� */
	if(document.form2.list.length>1)
	{   
		var DiskArray = xmlDoc.getElementsByTagName('Disk');
		var diskTotalNum = DiskArray.length;
		var boxCheckedNum = document.form2.list.length;
		var diskID;
		for(i=0;i<boxCheckedNum;i++)
		{
			//alert("i is "+i);
			if(document.form2.list[i].checked == true)
			{
				checkflag=true;
				diskIsSelected = document.form2.list[i].value;
				//alert("found the diskIsSelected is "+diskIsSelected+" now start to look for it in DiskArray!");	     
				for(var k=0;k<diskTotalNum;k++)
				{
					//alert("k is "+k);
					diskID = DiskArray[k].getAttribute("scsiID");			  
					if(diskID==diskIsSelected)
					{			 
						//alert("now k is "+k+" this time we get it, the diskID is "+diskID); 
						//alert("and the diskIsSelected is "+diskIsSelected);
						/* ��ȡ�˴��̵��ȱ�����ѡ�� */
						var oListboxSpare = document.getElementById("setSpare"+diskID+"");
						for(s=0;s<2;s++)
						{
							if(oListboxSpare.options[s].selected)
							{
								var spareValue = oListboxSpare.options[s].value;						
							}
						}
						/* �������к󣬴��ȱ����б���ɾ���˴���ID by gaobo 080116 */
						var spareNum = choseSpareDisk.length;
						for(m=0;m<spareNum;m++)
						{
							if(choseSpareDisk[m]==diskID)
							{
								choseSpareDisk[m]='';
							}
						}						
						DiskArray[k].setAttribute("isSpareDisk",spareValue);
						/* ��Rack��ɾ���˴��̽ڵ� */
						tmpDisk = xmlDoc.documentElement.removeChild(DiskArray[k]);
						//alert("tmp is "+tmpDisk.getAttribute("scsiID"));
						/* ���˽ڵ������entity */
						entity.appendChild(tmpDisk);	
						/* ��������ע�Ϳ��Բ鿴��ǰXML */
						//var xmls1 = new XMLSerializer();
						//var text2 = xmls1.serializeToString(xmlDoc);
						//alert("text2 is "+text2);
						k=diskTotalNum;  //�Ǻ� 071030
					}//end if diskID==diskIsSelected
				}//end for k<diskTotalNum		 
			}//end if document.form2.list[i].checked == true	      
		}//end for i<boxCheckedNum

		/* �û���ѡ�����������������ϣ���ʼ�޸����е����� */
		/* ��ȡ�û�����ķֿ��С��ֵ */
		var oListboxChunk;
		var chunkValue;
		oListboxChunk = document.getElementById("LUNStripeSize");
		var chunkListLength = oListboxChunk.options.length;
		for(var p=0;p<chunkListLength;p++)
		{
			if(oListboxChunk.options[p].selected)
			{
				chunkValue = oListboxChunk.options[p].value;
				p = chunkListLength;
			}
		}
		entity.setAttribute("chunk",chunkValue);
		/* ��ȡ�û���������м����ֵ */
		var oListboxLevel;
		var levelValue;
		oListboxLevel = document.getElementById("LUNLevel");
		var levelListLength = oListboxLevel.options.length;
		for(var q=0;q<levelListLength;q++)
		{
			if(oListboxLevel.options[q].selected)
			{
				levelValue = oListboxLevel.options[q].value;
				q = levelListLength;
			}
		}
		entity.setAttribute("level",levelValue);
		/* ��ȡ�û�������������IP��ֵ */
		var popedomText = document.getElementById("popedom");
		var popedomValue = popedomText.value;
		entity.setAttribute("popedom",popedomValue);
		/* ��ȡ�û�����İ�IP��ֵ */
		var bindingArray = new Array();
		bindingBoxLength = document.getElementById("form4").binding.length; 
		var bindingBox = document.getElementById("form4").binding;
		//alert(bindingBoxLength);
		var bindingString='';
		for(j=0;j<bindingBoxLength;j++)
		{
			/* �����ͨ��Box��check����װ���ͨ���� */
			if(bindingBox[j].checked)
			{
				bindingArray.push(j);
				bindingArray.push('-');		   
			}
		}
		bindingString = bindingArray.join("");
		//alert(bindingString);
		entity.setAttribute("binding",bindingString);
		/* ��һ���½����������м����ȱ����̣����������� */
		var newDiskArray = entity.getElementsByTagName('Disk');
		var newDiskArrayLength = newDiskArray.length;
		var spareNum = 0;
		var dataDiskNum;
		for(d=0;d<newDiskArrayLength;d++)
		{
			if(newDiskArray[d].getAttribute("isSpareDisk")=="1")
			{
				spareNum=parseInt(spareNum)+1;
			}
		}
		dataDiskNum = parseInt(newDiskArrayLength)-parseInt(spareNum);
		entity.setAttribute("spareDiskNum",spareNum);
		entity.setAttribute("raidDiskNum",dataDiskNum);
		/* ���ó�ʼ����״̬������ */
		entity.setAttribute("raidstat","-1");
		entity.setAttribute("raidcap","");	
		/* Rack����������������Ҫ��1 */	
		entity2=xmlDoc.documentElement.attributes;
		entity2.getNamedItem("raidNum").nodeValue=parseInt(entity2.getNamedItem("raidNum").nodeValue)+1;
		/* �����½������е�indexֵ */	 
		lastRaidIndexValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue);
		entity.setAttribute("index",lastRaidIndexValue);	  
		entity2.getNamedItem("lastRaidIndex").nodeValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)+1;
		/* ����������ı��Ľ�� */
		showRaidTable(xmlDoc);	
		/* ��ʱ����ı���XML */	 
		//alert(xmlDoc.xml);  
		if(isNN)
		{			   
			xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
		}
		/* �û������˲�����flag��1 */	  
		flagChangConfig = '1';
	}

}



/* ���촴�����в˵� */
var showCreateRaidString;
function showCreateRaidDiv(xmlDoc)
{
	/* �����ʾ��Ϣ�ı�� */
	var showCreateRaid = new Array();
	showCreateRaid.push('<form id="form4"><table width="200" border="0"><tr><td colspan="2" height="28" align="center" background="images/h2_bg01.gif"><?php echo $RAID_ATTRIBUTE; ?></td></tr>');
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $ATTRIBUTE_NAME; ?></nobr></td><td bgcolor="#F0F5FD" align="center"><nobr><?php echo $ATTRIBUTE_VALUE; ?></nobr></td></tr><tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_CHUNK ?></nobr></td>');
	showCreateRaid.push('<td bgcolor="#F0F5FD"><Select id="LUNStripeSize" name="LUNStripeSize">');
	showCreateRaid.push('<option  name="chunk" value="4" >4</option><option  name="chunk" value="8" >8</option><option  name="chunk" value="16" >16</option>');
	showCreateRaid.push('<option  name="chunk" value="32">32</option><option  name="chunk" value="64" selected="selected">64</option><option  name="chunk" value="128">128</option>');
	showCreateRaid.push('<option  name="chunk" value="256">256</option><option  name="chunk" value="512">512</option></Select></td></tr>');
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_LEVEL ?></nobr></td><td bgcolor="#F0F5FD">');
	showCreateRaid.push('<Select id="LUNLevel" name="LUNLevel" ONBLUR="raidLevelBlur()" raidLevelTip(this)" >');
	showCreateRaid.push('<option  name="level" value="0" >0</option><option  name="level" value="1" >1</option><option  name="level" value="4" >4</option>');
	showCreateRaid.push('<option  name="level" value="5">5</option><option name="level" value="6">6</option><option name="level" value="10">10</option></Select></td></tr>');

	/*  ����nas���ܺ�ѡ���豸������nas����iSCSI        
		showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr>�豸����</nobr></td><td bgcolor="#F0F5FD">');
	showCreateRaid.push('<Select id="selectDevType" name="selectDevType" >');
	showCreateRaid.push('<option  name="devType" value="0" >iSCSI</option><option  name="devType" value="1" >nas</option></Select></td></tr>');*/	

	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_POPEDOM ?></nobr></td><td bgcolor="#F0F5FD">');
	showCreateRaid.push('<input name="popedom" type="text" id="popedom" value="all-" size="30" onFocus="popedomTipFocus();" onblur="checkPopedomFormat1(this);"></td></tr>');

	/* ѡ���ͨ��IP */
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $SELECTBINDINGIP ?></nobr></td><td bgcolor="#F0F5FD"><input type="checkbox" name="binding" value="0-" onkeydown="if(event.keyCode==13) checkPopedomSubmit(popedom)" checked="checked"/><?php echo $BINDCHANNAL ?>0<input type="checkbox" name="binding" value="1-" onkeydown="if(event.keyCode==13) checkPopedomSubmit(popedom)" checked="checked"/><?php echo $BINDCHANNAL ?>1</td></tr>');	

	showCreateRaid.push('<tr bgcolor="#F0F5FD"><td colspan="2"><div id="operationTip"></div></td></tr>');
	showCreateRaid.push('<tr><table><tr align="center"><td width="25%"></td><td><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="checkPopedomSubmit(popedom)"></td><td width="15%"></td>');
	showCreateRaid.push('<td><input name="cancel" type="button" style="width:64px" value="<?php echo $CANCEL; ?>" onclick="shutdownRaidDiv()"></td></tr></table></tr>');
	/* �����table��β */
	showCreateRaid.push('</table></form>');
	showCreateRaidString = showCreateRaid.join("");
}

function shutdownRaidDiv()
{
	document.getElementById("createRaidDiv").style.display="none";
}

function shutdownBindingDiv()
{
	document.getElementById("changeBindingDiv").style.display="none";
}

function shutdownIpDiv()
{
	document.getElementById("ipDiv").style.display="none";
}

/* �ر����д�����ϢDIV */
function shutdownRaidDetailDiv()
{
	document.getElementById("showRaidDetail").style.display="none";
}

/* ��Ӧ����showCreateRaidDiv(xmlDoc)������Ϊ�����������ɵĽ����ϢDIV����ʾ�����궨λ */
function dispCreateRaidDiv(e)  
{
	/* ��ȡ�û��������е����� */
	var middleWindowWidth = document.body.clientWidth/2;
	var middleWindowHeight = document.body.clientHeight/2;
	var oCreateRaidDiv = document.getElementById("createRaidDiv");
	oCreateRaidDiv.innerHTML = showCreateRaidString;
	oCreateRaidDiv.style.display="block";
	oCreateRaidDiv.style.left=middleWindowWidth + document.body.scrollLeft - 160;
	oCreateRaidDiv.style.top=middleWindowHeight + document.body.scrollTop - 60;
}

var showIpString = new Array();
function dispIpDiv(i,e)  
{
	var oIpDiv =document.getElementById("ipDiv");
	oIpDiv.innerHTML = showIpString[i];
	oIpDiv.style.display="block";
	oIpDiv.style.left=e.clientX + document.body.scrollLeft;
	oIpDiv.style.top=e.clientY + document.body.scrollTop;
}

var showBindingString = new Array();
function dispBindingDiv(i,e)  
{
	var oChangeBinding = document.getElementById("changeBindingDiv");
	oChangeBinding.innerHTML = showBindingString[i];
	oChangeBinding.style.display="block";
	oChangeBinding.style.left=e.clientX + document.body.scrollLeft;
	oChangeBinding.style.top=e.clientY + document.body.scrollTop;
}

var raidDetailIndex;
function dispRaidDetail(i,e)  
{
	raidDetailIndex = i;
	var oShowRaidDetail = document.getElementById("showRaidDetail");
	oShowRaidDetail.innerHTML = showRaidDetailString[i];
	oShowRaidDetail.style.display="block";
	oShowRaidDetail.style.left=e.clientX + document.body.scrollLeft;
	oShowRaidDetail.style.top=e.clientY + document.body.scrollTop;
}	
</script>
</HEAD>
<body style="position:relative; margin:0;background-image:url(images/_r3_c9.jpg)">
<div id="createRaidDiv" style="position:absolute;display:none;overflow:visible;z-index:3;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF; border-color:9DCDED;">
</div>
<div id="ipDiv" style="position:absolute;display:none;overflow:visible;z-index:3;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF;border-color:9DCDED;">
</div>
<div id="showRaidDetail" style="position:absolute;display:none;overflow:visible;z-index:3;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF;border-color:9DCDED;">
</div>
<div id="changeBindingDiv" style="position:absolute;display:none;overflow:visible;z-index:3;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF;border-color:9DCDED;">
</div>
<div id="showRaidTable" style="z-index:1"></div>

</body>
</HTML>
