<?php

//缓存输出
ob_start();
//include "initial.php";
include "inc_config.php";
$lang = $DEFAULT_LANGUAGE ;
//启动会话，这步必不可少 
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

//您的代码写在这里
//搜索Monitor文件夹下有没有isSubmit，有的话删除掉isSubmit added by gaobo 071010
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

/* 控制阵列打开关闭详细磁盘信息 071102 */
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

/* 用户删除掉阵列中的坏盘后，保持该阵列磁盘信息为显示状态所需要用到的全局变量 */
var dispIndex;

/*
	**function:	 将用数字表示的阵列状态，转变成用文字表示的状态
	**statusNumber: 用数字表示的阵列状态
	**returnValue：	用文字表示的状态
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

if(parseInt(navigator.appVersion.charAt(0))>=4)
  {
	var isNN=(navigator.appName=='Netscape')?1:0;
	var isIE=(navigator.appName.indexOf('Microsoft')!=-1)?1:0;
   } 
   if(isIE)
   { 
	/* 创建raidConfig.xml的DOM对象实例IE版*/
	var xmlDoc= new ActiveXObject('MSXML2.DOMDocument');
    xmlDoc.async = false;
	xmlDoc.load("Monitor/raidConfig.xml");
	var xmlDocument = new ActiveXObject('MSXML2.DOMDocument');
	}
	 if(isNN)
   { 
	/* 创建raidConfig.xml的DOM对象实例FireFox版*/
	 var xmlDoc = document.implementation.createDocument('','',null);
	 xmlDoc.async = false;
	 xmlDoc.load("Monitor/raidConfig.xml");
	 var xmlDocResult = new XMLSerializer();
	 var xmlDocSubmit;
	 var xmlDocument = document.implementation.createDocument('','',null);
   /*以下3行代码可以用来在FF下查看当前xmlDoc内容*/
    //var xmls1 = new XMLSerializer();
    //var text2 = xmls1.serializeToString(xmlDocument);
	//alert("text2 is "+text2);
	}

/* 创建raidConfig.xml的DOM对象实例 配置阵列兼容IE/FireFox版！designed by gaobo*/
/* 设置全局变量choseSpareDisk提供给添加热备的函数用 */ 
var choseSpareDisk = new Array();
var showRaidDetailString = new Array();
/* 描绘配置阵列整体功能表格 */
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
		   /* 下面是阵列信息框外的装饰框 */
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
		/* 上面是阵列信息外的装饰框style="table-layout:fixed" */ 
		
		/* 描绘阵列表格，表头部分 */
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
				
				/* 根据binding值判断binding框中的勾选情况 暂时用着- -*/
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
				
				/* 显示修改通道绑定用的DIV */			
				var showBinding = new Array();
				showBinding.push('<form id="form3" action="save_cmd.php" method="POST" enctype="mutipart/form-data"><table width="200">');
				showBinding.push('<tr align="center"><td colspan="2" height="28" background="images/h2_bg01.gif"><?php echo $RAID  ?>'+index+' <?php echo $BINDCHANNAL.$BINDINGMSG ?></td></tr>');				
				showBinding.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $SELECTBINDINGIP ?></nobr></td><td bgcolor="#F0F5FD"><input type="checkbox" name="changeBinding" value="0-" onkeydown="if(event.keyCode==13) changeBindingSubmit('+index+')" '+bindingCheckA+'/><?php echo $BINDCHANNAL ?>0<input type="checkbox" name="changeBinding" value="1-" onkeydown="if(event.keyCode==13) changeBindingSubmit('+index+')" '+bindingCheckB+'/><?php echo $BINDCHANNAL ?>1</td></tr>');
				showBinding.push('<tr><td colspan="2"><table><tr align="center"><td width="15%"></td><td><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="changeBindingSubmit('+index+')"></td><td width="10%"></td>');
	            showBinding.push('<td><input name="cancel" type="button" style="width:64px" value="<?php echo $CANCEL; ?>" onclick="shutdownBindingDiv()"></td></tr></table></td></tr>');	
				showBinding.push('</table><input type="textarea" name="cmdsave" value="" style="display:none"></form>');	
				showBindingString[i] = showBinding.join("");	
				
				/* 显示阵列IP权限用的DIV */			
				var showIp = new Array();
				showIp.push('<table width="200">');
				showIp.push('<tr align="center"><td colspan="2" height="28" background="images/h2_bg01.gif"><?php echo $RAID  ?>'+index+' <?php echo $PROPERTIES_POPEDOM ?></td></tr>');
				showIp.push('<tr><td bgcolor="#D6E6FA" width="35%"><nobr><?php echo $PROPERTIES_POPEDOM ?>：</nobr></td><td bgcolor="#F0F5FD"><div style="overflow:auto;padding:0;">'+popedom+'</div></td></tr>');	
				showIp.push('<tr><td colspan="2" align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="shutdownIpDiv()"></td></tr>');			
				showIp.push('</table>');	
				showIpString[i] = showIp.join("");			   								
				
				 /* 描绘阵列表格，数据部分 */
				raidTableContent.push('<tr bgcolor="#F0F5FD"><td onclick="dispRaidDetail('+i+',event)" style="cursor:pointer"><div align="center"><p style="text-decoration:underline">'+index+'</p></div></td><td><div align="center">'+level+'</div></td><td><div align="center">'+parseRaidStatus(raidstat)+'</div></td>');
		        raidTableContent.push('<td><div align="center">'+chunk+'</div></td><td><div align="center">'+raidcap+'</div></td><td><div align="center">'+spareDiskNum+'</div></td>');
		        raidTableContent.push('<td><div align="center">'+raidDiskNum+'</div></td><td align="center" onclick="dispBindingDiv('+i+',event)" style="cursor:pointer"><nobr><?php echo $CLICK_HERE_FF  ?></nobr></td><td align="center"  onclick="dispIpDiv('+i+',event)" style="cursor:pointer"><nobr><?php echo $CLICK_HERE_FF  ?></nobr></td>');
				raidTableContent.push('<td align="center"><input name="deleteRaidButton" id="deleteRaidButton" type="button" value="<?php echo $DELETE_RAID_FF; ?>" onclick="deleteRaid('+index+')"/></td></tr>');
				
				/* 下面描绘阵列内包含磁盘的表格 */
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
				/*获取阵列中包含磁盘的各项信息*/
				for(m=0; m<diskNumber; m++)
				 {
				   	var idSelected = diskArray.item(m).getAttribute("scsiID");			   
					var scsiId = diskArray.item(m).getAttribute("scsiID");
					diskInRaid.push(scsiId);
					var diskStat = diskArray.item(m).getAttribute("status");
					//根据磁盘的状态来选择磁盘图标
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
		/* 阵列信息外的装饰框的结尾 */
	    raidTableContent.push( '</td></tr></table><br>');	
	   }//end if raidNumber!=0
	  
	 
	  /* 下面是剩余磁盘操作框外的装饰框 */
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
	/* 上面是剩余磁盘操作框外的装饰框 */
	 
	 
	     //下面描绘不在阵列中的磁盘的表格	 
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
				   /* 当diskStat为2的时候，设置热备的按钮为disabled，磁盘前的复选框为disabled by gaobo 080111 */
				   var checkBoxDis='';
				   var bottunDisabled='';
				   if(diskStat=='2')
				    {
					 checkBoxDis='disabled="true"';
					 bottunDisabled='disabled="true"';
					 }					  
						
				   /* 根据磁盘的状态来选择磁盘图标 */
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
	   /* 创建阵列按钮 */	   
	   raidTableContent.push('<tr><td colspan="10"><table><tr><td><input name="boxSelectALL" type="button" value="<?php echo $BOXSELECTALL ?>" onclick="listBoxSelectAll()"/></td><td><input name="createNewRaid" type="button" value="<?php echo $INSERT_RAID; ?>" onclick="showCreateRaidDiv();dispCreateRaidDiv(event)"/></td></tr></table>');
	   raidTableContent.push('</td></tr>');
	   /* 剩余磁盘操作框结尾 */	   
	   raidTableContent.push('</table>');
	   
	   
	   /* 刷新和提交按钮 */
	   raidTableContent.push( '<tr align="center"><td colspan="10">');	   
	   raidTableContent.push( '<br><table><tr><td><FORM name="form1" action="save_config.php" method="POST" enctype="mutipart/form-data"><input name="refresh" type="button" value="<?php echo $REFRESH; ?>" onclick="refreshRaidPage()" />');
	   raidTableContent.push( '&nbsp;&nbsp;&nbsp;&nbsp;<input name="submitDoc" type="button" value="<?php echo $SUBMIT_CONFIG; ?>" onclick="checkForTmpInsert()"><input type="textarea" name="xmlsave" value="" style="display:none"></FORM></td></tr></table>');
	   raidTableContent.push( '</td></tr>');
	    //raidTableContent.push( '');	   
	   
	   /* 剩余磁盘操作框的外的装饰框的结尾 */
	   raidTableContent.push( '</td></tr></table>');	   
		
	   /* 最外层的框架的结尾 */
	   raidTableContent.push('</td></tr></table>'); 
	   var raidTableContentSting = raidTableContent.join("");
	   document.getElementById("showRaidTable").innerHTML = raidTableContentSting;	   
   }
   

/* 收集用户选择设置为热备盘的scsiID by gaobo 080112*/
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

/* 全选复选框按钮功能函数 by gaobo */
function listBoxSelectAll()
{
 /* 判断用户是否选择了磁盘 */ 
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

/* 刷新按钮功能函数 */
function refreshRaidPage()
{		
	window.location.href='update_ui.php';	
}

/* 修正因为新创建的阵列包含同时删除的阵列中存在的磁盘而造成新创建阵列损坏的问题 2.0版 */
function checkForTmpInsert()
{

  if(flagChangConfig == '0')
	{
		 alert("<?php echo $ALERT_NO_OPERATION;?>");
		 return false;
		} 
	tmpForInsert = new Array();
  /* 如果tmpForDelete不为空，说明有删除阵列操作，开始收集提交时当前XML中所有阵列总共包含的磁盘ID */
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

/* 删除磁盘功能函数 */
function deleteDisk(scsiId)
{		
	/*以下3行代码可以用来在FF下查看当前xmlDoc内容*/
    //var xmls1 = new XMLSerializer();
    //var text2 = xmls1.serializeToString(xmlDoc);
	//alert("text2 is "+text2);
	
	var diskArray = xmlDoc.getElementsByTagName('Disk');		
	var diskNumber = diskArray.length;
	
	/* 遍历所有磁盘，查找与用户点击的ID相同的磁盘 */	
	for(m=0; m<diskNumber; m++)
	{
	  var diskId = diskArray.item(m).getAttribute("scsiID");	
	   
	  if(diskId==scsiId)
	  {
	    var diskStat = diskArray.item(m).getAttribute("status");
	    if(diskStat==0)
		  {
		   //alert("这是一个好的磁盘，您不能把它删除！");
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
			   //用户进行了操作，flag置1
			   flagChangConfig = '1';
			   /* 界面输出后刷新此阵列磁盘信息的显示 gaobo 080111 */
			   document.getElementById("showRaidDetail").innerHTML = showRaidDetailString[raidDetailIndex];
		       }	  
	  }//end if(diskId==scsiId)
	}//end for m<diskNumber	   
}

/* 记录被删除的阵列中的磁盘ID */
tmpForDelete = new Array();
/* 删除阵列功能函数 */
function deleteRaid(index)
{	
	//alert("now index is "+index);
	var raidArray = xmlDoc.getElementsByTagName('singleRaid');		
	var raidNumber = raidArray.length;
	/* 遍历所有阵列，查找与用户点击的相同的阵列 */	
	for(m=0; m<raidNumber; m++)
	{
	  var raidIndex = raidArray.item(m).getAttribute("index");
	  //alert(raidIndex);	   
	  if(raidIndex==index)
	  {	   
	   var diskArray = raidArray.item(m).getElementsByTagName('Disk');
	   entity = raidArray.item(m);	
	   /* 收集被删除的正常状态的阵列中包含的磁盘scsiID装入数组tmpForDelete */
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
	   /* 界面上输出改变后的结果 */
	   showRaidTable(xmlDoc);	
	   /* 临时保存改变后的XML */	   
       if(isNN)
		{			   
		  xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
		 }
	   /* 用户进行了操作，flag置1 */	   
       flagChangConfig = '1';
	  }//end if(raidIndex==index)
	}//end for m<raidNumber
}

/* 为已经正常运行着的阵列添加热备盘 */
function addSpareDiskToRaid(index)
{
//alert("now index is "+index);
	var raidArray = xmlDoc.getElementsByTagName('singleRaid');		
	var raidNumber = raidArray.length;
	/* 遍历所有阵列，查找与用户点击的相同的阵列 */	
	for(m=0; m<raidNumber; m++)
	{
	  var raidIndex = raidArray.item(m).getAttribute("index");
	  //alert(raidIndex);	   
	  if(raidIndex==index)
	  {	   
	   /* 检查此阵列是否是RAID0，是的话给予提示不能添加热备，不是的话再进行进一步操作。 */	  
		 var raidLevel = raidArray.item(m).getAttribute("level");  
		 if(raidLevel=='0')
		 {
		  alert("<?php echo $CASE_RAID0_B; ?>！ ");
		  /* 保持阵列磁盘信息设置为显示 */	      
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
			    /* 找出choseSpareDisk中每一个要设为热备的ID对应的磁盘对象 */
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
						/* 找到被用户设置为热备的盘了之后，将其对象节点从原位置删除掉存入setSpareDisk */
						setSpareDisk = xmlDoc.documentElement.removeChild(spareDiskArray[j]);
						/* 设置此盘为热备isSpareDisk为1 */	
						setSpareDisk.setAttribute("isSpareDisk","1");
						/* 将磁盘节点挂接至被用户选中的要添加热备的阵列raidArray.item(m) */					
						raidArray.item(m).appendChild(setSpareDisk);
						var spareNum = raidArray.item(m).getAttribute("spareDiskNum");	
						spareNum = parseInt(spareNum)+1;
						raidArray.item(m).setAttribute("spareDiskNum",spareNum);	
						/* 以下三行注释可以查看当前xml */		
						//var xmls1 = new XMLSerializer();
						//var text2 = xmls1.serializeToString(xmlDoc);
						//alert("text2 is "+text2);
						j=spareDiskArrayLength;
						//alert("j is "+j);
					   }//end if choseSpareDisk[i]==diskId				  
					 }//end for j<spareDiskArrayLength			  
				   }//end for i<choseSpareDiskLength 	
			   
			    }//end if choseSpareDiskLength=='0'的else
	 
		    }//end if(raidLevel=='0')的else     	
	   /* 界面上输出改变后的结果 */
	   showRaidTable(xmlDoc);	
	   /* 临时保存改变后的XML */	   
        if(isNN)
	     {			   
		  xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
		 }	  
	   /* 用户进行了操作，flag置1 */	   
       flagChangConfig = '1';
	   choseSpareDisk = new Array();
	   /* 界面输出后刷新此阵列磁盘信息的显示 gaobo 080111 */
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
	     /* 如果此通道Box被check，则装入此通道号 */
	     if(changeBindingBox[j].checked)
		  {
		   newBindingArray.push(j.toString());		   
		  }
	    }
	//alert("newBindingArray[0] is "+newBindingArray[0]);
	 var newBindingLength =newBindingArray.length;
	 //alert("newBindingLength is "+newBindingLength);
	 /* 读取XML中旧的绑定了的通道号 */
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
	 /* 将读取出来的旧通道号记录导入数组oldBindingArray */ 
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
				  //alert("相同？？");
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
		 		 
         		 /* 构成命令字符串输出 */
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
**function: 检查popedom格式是否正确,如果正确，进行下一步创建阵列
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

/* 为检测用户是否选中磁盘设置标志变量 */
var checkflag = "false";
/* 创建阵列功能函数 */
function createRaid()
{
 checkflag = "false";
 /* 判断用户是否选择了磁盘 */ 
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
  /* 判断结果是用户选择了磁盘，则开始创建阵列 */  
 var diskIsSelected;                     //存放被选中的磁盘scsiID
 /* 创建style/insertentity.xml的DOM对象实例,用来创建新阵列 */ 
 xmlDocument.async = false;
 xmlDocument.load("style/createSingle.xml");
 var entitys = xmlDocument.getElementsByTagName('singleRaid');
 var entity = entitys[0]; 
 xmlDoc.documentElement.appendChild(entity);

/* 如果用户选中了磁盘，将磁盘的Disk节点装入diskIsSelectedArray数组 */
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
				   /* 读取此磁盘的热备份盘选项 */
				   var oListboxSpare = document.getElementById("setSpare"+diskID+"");
				     for(s=0;s<2;s++)
					   {
					    if(oListboxSpare.options[s].selected)
						 {
						   var spareValue = oListboxSpare.options[s].value;						
						  }
						}
					/* 创建阵列后，从热备盘列表中删除此磁盘ID by gaobo 080116 */
					var spareNum = choseSpareDisk.length;
						for(m=0;m<spareNum;m++)
						   {
							if(choseSpareDisk[m]==diskID)
							  {
							   choseSpareDisk[m]='';
							   }
							}						
				   DiskArray[k].setAttribute("isSpareDisk",spareValue);
				   /* 从Rack中删除此磁盘节点 */
				   tmpDisk = xmlDoc.documentElement.removeChild(DiskArray[k]);
				   //alert("tmp is "+tmpDisk.getAttribute("scsiID"));
				   /* 将此节点挂载至entity */
				   entity.appendChild(tmpDisk);	
				   /* 下面三行注释可以查看当前XML */
				   //var xmls1 = new XMLSerializer();
				   //var text2 = xmls1.serializeToString(xmlDoc);
				   //alert("text2 is "+text2);
				   k=diskTotalNum;  //呵呵 071030
				 }//end if diskID==diskIsSelected
			 }//end for k<diskTotalNum		 
        }//end if document.form2.list[i].checked == true	      
      }//end for i<boxCheckedNum
	  
	  /* 用户所选磁盘向阵列中添加完毕，开始修改阵列的属性 */
	    /* 获取用户输入的分块大小的值 */
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
		/* 获取用户输入的阵列级别的值 */
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
		/* 获取用户输入的允许访问IP的值 */
		var popedomText = document.getElementById("popedom");
		var popedomValue = popedomText.value;
		entity.setAttribute("popedom",popedomValue);
		/* 获取用户输入的绑定IP的值 */
		var bindingArray = new Array();
	    bindingBoxLength = document.getElementById("form4").binding.length; 
	    var bindingBox = document.getElementById("form4").binding;
	    //alert(bindingBoxLength);
	    var bindingString='';
	    for(j=0;j<bindingBoxLength;j++)
	    {
	     /* 如果此通道Box被check，则装入此通道号 */
	      if(bindingBox[j].checked)
	   	  {
		   bindingArray.push(j);
		   bindingArray.push('-');		   
	  	  }
	    }
	  	bindingString = bindingArray.join("");
		//alert(bindingString);
		entity.setAttribute("binding",bindingString);
		/* 数一下新建的阵列中有几个热备份盘，几个数据盘 */
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
		/* 设置初始阵列状态和容量 */
		entity.setAttribute("raidstat","-1");
		entity.setAttribute("raidcap","");	
		/* Rack的属性上阵列数量要加1 */	
	  entity2=xmlDoc.documentElement.attributes;
	  entity2.getNamedItem("raidNum").nodeValue=parseInt(entity2.getNamedItem("raidNum").nodeValue)+1;
      /* 设置新建立阵列的index值 */	 
      lastRaidIndexValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue);
	  entity.setAttribute("index",lastRaidIndexValue);	  
	  entity2.getNamedItem("lastRaidIndex").nodeValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)+1;
	  /* 界面上输出改变后的结果 */
	  showRaidTable(xmlDoc);	
	  /* 临时保存改变后的XML */	 
	  //alert(xmlDoc.xml);  
        if(isNN)
	     {			   
		  xmlDocSubmit = xmlDocResult.serializeToString(xmlDoc);	
		 }
	  /* 用户进行了操作，flag置1 */	  
      flagChangConfig = '1';
  }
 
}



/* 构造创建阵列菜单 */
var showCreateRaidString;
function showCreateRaidDiv(xmlDoc)
{
 /* 描绘显示信息的表格 */
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
	
	/*  加入nas功能后，选择设备类型是nas还是iSCSI        
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr>设备类型</nobr></td><td bgcolor="#F0F5FD">');
	showCreateRaid.push('<Select id="selectDevType" name="selectDevType" >');
	showCreateRaid.push('<option  name="devType" value="0" >iSCSI</option><option  name="devType" value="1" >nas</option></Select></td></tr>');*/	
	
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_POPEDOM ?></nobr></td><td bgcolor="#F0F5FD">');
	showCreateRaid.push('<input name="popedom" type="text" id="popedom" value="all-" size="30" onFocus="popedomTipFocus();" onblur="checkPopedomFormat1(this);"></td></tr>');
	
	/* 选择绑定通道IP */
	showCreateRaid.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $SELECTBINDINGIP ?></nobr></td><td bgcolor="#F0F5FD"><input type="checkbox" name="binding" value="0-" onkeydown="if(event.keyCode==13) checkPopedomSubmit(popedom)" checked="checked"/><?php echo $BINDCHANNAL ?>0<input type="checkbox" name="binding" value="1-" onkeydown="if(event.keyCode==13) checkPopedomSubmit(popedom)" checked="checked"/><?php echo $BINDCHANNAL ?>1</td></tr>');	
	
	showCreateRaid.push('<tr bgcolor="#F0F5FD"><td colspan="2"><div id="operationTip"></div></td></tr>');
	showCreateRaid.push('<tr><table><tr align="center"><td width="25%"></td><td><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onclick="checkPopedomSubmit(popedom)"></td><td width="15%"></td>');
	showCreateRaid.push('<td><input name="cancel" type="button" style="width:64px" value="<?php echo $CANCEL; ?>" onclick="shutdownRaidDiv()"></td></tr></table></tr>');
	/* 最外框table结尾 */
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

/* 关闭阵列磁盘信息DIV */
function shutdownRaidDetailDiv()
{
document.getElementById("showRaidDetail").style.display="none";
}

/* 对应上面showCreateRaidDiv(xmlDoc)函数，为上述函数生成的结果信息DIV的显示按坐标定位 */
function dispCreateRaidDiv(e)  
{
/* 获取用户窗口正中的坐标 */
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
<body onLoad="showRaidTable();" style="position:relative; margin:0;background-image:url(images/_r3_c9.jpg)">
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
