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
var showDiskAttributs = new Array();



// JavaScript Document
var SHRINK_TIME = 9;
   var http_request = false;
	function send_request(url) {//初始化、指定处理函数、发送请求的函数
		http_request = false;
		//开始初始化XMLHttpRequest对象
		if(window.XMLHttpRequest) { //Mozilla 浏览器
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType) {//设置MiME类别
				http_request.overrideMimeType('text/xml');
			}
		}
		else if (window.ActiveXObject) { // IE浏览器
			try {
				http_request = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try {
					http_request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			}
		}
		
		
		if (!http_request) { // 异常，创建对象实例失败
			window.alert("<?php echo $FOR_HTTPREQUEST ?>");
			return false;
		}
		http_request.onreadystatechange = processRequest;
		// 确定发送请求的方式和URL以及是否同步执行下段代码
		url = url+"?a="+Math.random();
		http_request.open("GET", url, true);
		
		http_request.send(null);
	}
	// 处理返回信息的函数
    function processRequest() {
        if (http_request.readyState == 4) { // 判断对象状态
            if (http_request.status == 200) { // 信息已经成功返回，开始处理信息
                //alert(http_request.responseText);
				var xmldoc = http_request.responseXML;
				showDiskStatus(xmldoc);
				showRaidStatus(xmldoc);
				showDiskInfo(xmldoc);
				//showRaidStatusByPicture(50, 2);
            } else { //页面不正常
                //alert("您所请求的页面有异常。"+http_request.status);
            }
        }
    }
	
	//从raidConfig.xml中解析出每一个磁盘的状态
	function showDiskStatus(xmldoc)
	{
		var diskArray = xmldoc.getElementsByTagName('Disk');
		var diskNumber = diskArray.length;
		var disksStatus = new Array(16);
		
		var debug = "";
		for(var i=0; i<diskNumber; i++)
		{
			var scsiId = diskArray.item(i).getAttribute("scsiID");
			disksStatus[parseInt(trim(scsiId))-1] = diskArray.item(i).getAttribute("status");
		}
		
		for(var i=0; i<16; i++)
		{
			switch(disksStatus[i])
			{
				case undefined:
									document.getElementById(i).src = "images/22.jpg";
									//shrink(i, SHRINK_TIME);
									break;
				case '0':
									document.getElementById(i).src = "images/nomarl.gif";
									//shrink(i, SHRINK_TIME);
									break;
				case '2':
									document.getElementById(String(i)).src = "images/wrong.gif";
									shrink(i, SHRINK_TIME);
									break;
				default:	
									document.getElementById(i).src = "images/22.jpg";
									//shrink(i, SHRINK_TIME);
									break;
			}
		}
	}
	
	//根据磁盘的状态，不停的用图片的形式显示出来
	function shrink(diskSN,times)
	{
    	if(times<0)
		{
			document.getElementById(diskSN).style.visibility = 'visible';
    		return;
    	}
    	if(document.getElementById(diskSN).style.visibility == 'visible')
		{
    		document.getElementById(diskSN).style.visibility = 'hidden';
		}
    	else 
		{
			document.getElementById(diskSN).style.visibility = 'visible';
		}
    	times--;
    	setTimeout("shrink("+diskSN+"," + times +")",300);
    }
	
	function refreshDiskStatusPerThreeSec()
	{
		setInterval("send_request('Monitor/raidConfig.xml')", 3000);
	}
	
	function showDiskDetail(urls)
	{
		window.showModalDialog(urls+"&b="+Math.random(),"<?php echo $TIPS_DISK_INFO_IMAGE ?>","dialogHeight:350px;dialogWidth:400px;help:no;scroll:no;status:no;unadorned:no");
	}
	
	function   trim(str)   
  	{
			return   str.replace(" ","");     
	}

	//added by gaobo 071004
	var showDivs = new Array();
	//从raidConfig.xml中解析出每一个磁盘阵列的状态
	function showRaidStatus(xmldoc)
	{
		var raidArray = xmldoc.getElementsByTagName('singleRaid');
		var raidNumber = raidArray.length;
		var disksStatus = new Array(16);
		var e = e||window.event;
		var htmlContent = new Array();
		
		if(raidNumber != 0)
		{
			htmlContent.push( '		<table width="643" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">');
        htmlContent.push( '            <tr> ');
        htmlContent.push( '              <td height="25" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"> ');
        htmlContent.push( '                <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">');
        htmlContent.push( '                 <tr> ');
        htmlContent.push( '                    <td width="50">&nbsp;</td>');
        htmlContent.push( '                    <td align="center"><strong><font color="#000000"><?php echo $MONITOR_JS_TITLE ?></font></strong></td>');
        htmlContent.push( '                  </tr>');
        htmlContent.push( '                </table></td>');
        htmlContent.push( '            </tr>');
        htmlContent.push( '            <tr> ');
		htmlContent.push( '              <td align="center" bgcolor="#FFFFFF" class="unnamed1"> ');
					
		for(var i=0; i<raidNumber; i++)
		{
			var diskArray = raidArray[i].getElementsByTagName('Disk');
			var diskNumber = diskArray.length;
			var m;
			var disk;
			var str = new String("");
			
			 
			for(m=0; m<diskNumber; m++)
			{
				disk = diskArray.item(m).getAttribute("scsiID");
				str += disk;		
				str += '、';
			}
			
			var index = raidArray.item(i).getAttribute("index");
			var level = raidArray.item(i).getAttribute("level");
			var raidstat = raidArray.item(i).getAttribute("raidstat");
			var raidcap = raidArray.item(i).getAttribute("raidcap");
			
			//added by gaobo 070929
		    var chunk = raidArray.item(i).getAttribute("chunk");
            var devName = raidArray.item(i).getAttribute("devName");
            var mappingNo = raidArray.item(i).getAttribute("mappingNo");
            var raidDiskNum = raidArray.item(i).getAttribute("raidDiskNum");
            var spareDiskNum = raidArray.item(i).getAttribute("spareDiskNum");
            var popedom = raidArray.item(i).getAttribute("popedom");
			
			index = index==""?"unknown":index;
			level = level==""?"unknown":level;
			raidstat = raidstat==""?"unknown":raidstat;
			raidcap = raidcap==""?"unknown":raidcap;
			chunk = chunk==""?"unknown":chunk;
			devName = devName==""?"unknown":devName;
			mappingNo = mappingNo==""?"unknown":mappingNo;
			raidDiskNum = raidDiskNum==""?"unknown":raidDiskNum;
			spareDiskNum = spareDiskNum==""?"unknown":spareDiskNum;
			popedom = popedom==""?"unknown":popedom;
			
			var showRaidDiv = new Array();
            showRaidDiv.push('<table width="200" border="0" cellpadding="5" cellspacing="1" bgcolor="#F0F5FD"> ');
            showRaidDiv.push('<tr><td height="25" colspan="2" background="images/smallbar.jpg" align="center"><font color="#FFFFFF"><strong><?php echo $MONITOR_RAID_ATTRI; ?></strong></font></td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><?php echo $ATTRIBUTE_NAME; ?></td><td><?php echo $ATTRIBUTE_VALUE; ?></td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_JS_NO ?></nobr></td><td>'+index+'</td></tr> '); 
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_JS_LEVEL ?></nobr></td><td>'+level+'</td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_CHUNK ?></nobr></td><td>'+chunk+'</td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_DEVNAME ?></nobr></td><td>'+devName+'</td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_JS_STATUS ?></nobr></td><td>'+parseRaidStatus(raidstat)+'</td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_RAIDCAP ?></nobr></td><td>'+raidcap+'</td></tr> ');
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_RAIDDISKNUM ?></nobr></td><td>'+raidDiskNum+'</td></tr> ');      //raidDiskNum
	    	showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_ISCISI_ID ?></nobr></td><td>'+str+'</td></tr> ');                
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_SPAREDISKNUM ?></nobr></td><td>'+spareDiskNum+'</td></tr> ');    //spareDiskNum
		    showRaidDiv.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $PROPERTIES_POPEDOM ?></nobr></td><td>'+popedom+'</td></tr> ');
	    	showRaidDiv.push('<!--tr><td colspan="2">&nbsp;</td></tr--></table> ');
			var showRaidDivSting = showRaidDiv.join("");
			showDivs[i] = showRaidDivSting;
              
			
			if(level == '0')     //raid0 
			{
				htmlContent.push( '		<table width="95%" border="0" cellpadding="5" cellspacing="1" class="unnamed1" style="cursor:pointer" onclick=\"dispShowRaid('+i+',event)\">');
                htmlContent.push( '          <tr align="center" bgcolor="#D6E6FA"> ');
                htmlContent.push( '            <td height="25" width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_NO ?></font></strong></td>');
                htmlContent.push( '           <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_LEVEL ?></font></strong></td>');
                htmlContent.push( '            <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_STATUS ?></font></strong></td>');
                htmlContent.push( '            <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_CAPACITY ?></font></strong></td>');
                htmlContent.push( '          </tr>');
                htmlContent.push( '          <tr align="center" bgcolor="#F0F5FD"> ');
                htmlContent.push( '            <td height="25">'+index+'</td>');
                htmlContent.push( '            <td>'+level+'</td>');
                htmlContent.push( '            <td>'+parseRaidStatus(raidstat)+'</td>');
                htmlContent.push( '            <td>'+raidcap+'</td>');
                htmlContent.push( '          </tr>');
                htmlContent.push( '        </table>');
                htmlContent.push( '        <br>');
			}
			else   //非raid0
			{
				var time = "";
				var speed = "";
				var percent = "";
				
				if((raidstat=='20') || (raidstat=='30'))
				{
					time = raidArray.item(i).getAttribute("time");
					speed = raidArray.item(i).getAttribute("speed");
					percent = raidArray.item(i).getAttribute("percent");
					
					htmlContent.push( '	<table width="95%" border="0" cellpadding="5" cellspacing="1" class="unnamed1" style="cursor:pointer" onclick=\"dispShowRaid('+i+',event)\">');
                    htmlContent.push( '      <tr align="center" bgcolor="#D6E6FA"> ');
                    htmlContent.push( '        <td height="25" width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_NO ?></font> </strong></td>');
                    htmlContent.push( '        <td width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_LEVEL ?></font></strong></td>');
                    htmlContent.push( '        <td width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_STATUS ?></font></strong></td>');
                    htmlContent.push( '        <td width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_CAPACITY ?></font></strong></td>');
                    htmlContent.push( '        <td width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_LEFT_TIEM ?></font></strong></td>');
                    htmlContent.push( '        <td width="14%"><strong><font color="#333333"><?php echo $MONITOR_JS_SPEED ?></font></strong></td>');
                    htmlContent.push( '        <td><strong><font color="#333333"><?php echo $MONITOR_JS_PERCENT ?></font></strong></td>');
                    htmlContent.push( '      </tr>');
                    htmlContent.push( '      <tr align="center" bgcolor="#F0F5FD"> ');
                    htmlContent.push( '        <td height="25">'+index+'</td>');
                    htmlContent.push( '        <td>'+level+'</td>');
                    htmlContent.push( '        <td>'+parseRaidStatus(raidstat)+'</td>');
                    htmlContent.push( '        <td>'+raidcap+'</td>');
                    htmlContent.push( '        <td>'+time+' min</td>');
                    htmlContent.push( '        <td>'+speed+' K/S</td>');
                    htmlContent.push( '        <td>'+percent+'%</td>');
                    htmlContent.push( '      </tr>');
                    htmlContent.push( '      <tr bgcolor="#D6E6FA"> ');
                    htmlContent.push( '        <td height="25" colspan="7" align="center"><strong><?php echo $MONITOR_JS_PICTURE ?></strong></td>');
                    htmlContent.push( '      </tr>');
                    htmlContent.push( '      <tr bgcolor="#F0F5FD"> ');
                    htmlContent.push( '        <td height="25" colspan="7" align="center">['+showRaidStatusByPicture(parseFloat(percent), 5)+']&nbsp;&nbsp;&lt;'+percent+'%&gt;</td>');
                    htmlContent.push( '      </tr>');
                    htmlContent.push( '    </table><br>');

				}
				else
				{
					htmlContent.push( '		<table width="95%" border="0" cellpadding="5" cellspacing="1" class="unnamed1" style="cursor:pointer" onclick=\"dispShowRaid('+i+',event)\" >');
					htmlContent.push( '          <tr align="center" bgcolor="#D6E6FA"> ');
					htmlContent.push( '            <td height="25" width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_NO ?></font></strong></td>');
					htmlContent.push( '           <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_LEVEL ?></font></strong></td>');
					htmlContent.push( '            <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_STATUS ?></font></strong></td>');
					htmlContent.push( '            <td width="25%"><strong><font color="#333333"><?php echo $MONITOR_JS_CAPACITY ?></font></strong></td>');
					htmlContent.push( '          </tr>');
					htmlContent.push( '          <tr align="center" bgcolor="#F0F5FD"> ');
					htmlContent.push( '            <td height="25">'+index+'</td>');
					htmlContent.push( '            <td>'+level+'</td>');
					htmlContent.push( '            <td>'+parseRaidStatus(raidstat)+'</td>');
					htmlContent.push( '            <td>'+raidcap+'</td>');
					htmlContent.push( '          </tr>');
					htmlContent.push( '        </table>');
					htmlContent.push( '        <br>'	);
				}
			}
		}
		
		htmlContent.push( '</td>');
		htmlContent.push( '</tr>');
	  	htmlContent.push( '</table>');
	  	htmlContent.push( '<br>');
		}
		var htmlContentString = htmlContent.join("");
		document.getElementById("hoho").innerHTML = htmlContentString;
	}
	
	/*
	**function:	 显示阵列的同步进度
	**percentage: 阵列同步进度的百分比
	**rate：	每几个百分点显示一个图形符号
	*/
	function showRaidStatusByPicture(percentage, rate)
	{
		var result = "";
		var totalNum = parseInt(100/rate);   		//图形的总数，包括=，〉和.
		var equaleNum = parseInt(percentage/rate);  //=号的总数
		
		if(equaleNum==0)    //刚开始
		{
			result += ">";
			for(var i=0; i<totalNum-1; i++)
			{
				result += "~";
			}
		}
		else
		{
			if(equaleNum==totalNum)  //结束时
			{
				for(var i=0; i<totalNum; i++)
				{
					result += "=";
				}
			}
			else		//同步过程中
			{
				for(var i=0; i<equaleNum; i++)
				{
					result += "=";
				}
				
				result += ">";
				
				for(var i=equaleNum+1; i<totalNum; i++)
				{
					result += "~";
				}
			}
		}
		
		return result;
	}
	
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

/* 显示并定位Monitor.php页面的弹出DIV   added by gaobo 071005 */
/* 解决与FIREFOX浏览器兼容性问题，可以在FF下正常显示 modified by gaobo 071020 */
function dispShowRaid(i,e)  
{
//alert(showDivs[i]);
document.getElementById("showRaid").innerHTML = showDivs[i];
document.getElementById("showRaid").style.display="block";

var tempwidth;
var tempheight;
var minclientheight;
tempwidth = document.body.clientWidth - e.clientX;
tempheight = document.body.clientHeight - e.clientY;
ooclientheight = document.body.clientHeight;
//alert(document.body.clientHeight);
//alert(window.event.y + document.body.scrollTop);
//alert(tempheight);
if(tempwidth < 330)
  {document.getElementById("showRaid").style.left=e.clientX + document.body.scrollLeft - 160;}
	else
	{
	document.getElementById("showRaid").style.left=e.clientX + document.body.scrollLeft;
	}
if((ooclientheight > 400)&&(tempheight < 210))
 {document.getElementById("showRaid").style.top=e.clientY + document.body.scrollTop - 230;}
	else
	{
	document.getElementById("showRaid").style.top=e.clientY + document.body.scrollTop;
	}
}


/* 重写的查看磁盘信息功能，与前版本相比，可以兼容IE与FF浏览器，在FF浏览器下可正常显示 */
function showDiskInfo(xmldoc)
{
		var diskArray = xmldoc.getElementsByTagName('Disk');   //将XML中所有Disk节点装入数组
		var diskNumber = diskArray.length;                     //实际检测到的盘数
		var disksStatus = new Array(16);		
		var preDiskNumber = 16;                                //设置盘数。此版本为16盘位的阵列		

		for(var j=0; j<preDiskNumber; j++)                    //循环读出用户点击16个磁盘图标分别所需提供的信息
		{	
		    var flag = 1;		 
			for(var m=0; m<diskNumber; m++)           //遍历实际存在的每一个磁盘，找寻与用户点击对应的那个磁盘
			{
			  var diskID = diskArray.item(m).getAttribute("scsiID");
			   if((j+1)==diskID)  //找到用户点击的盘号拥有对应scsiID的磁盘
			   {
				flag=0;
				var scsiId = diskArray.item(m).getAttribute("scsiID");
		        var diskStat = diskArray.item(m).getAttribute("status");
				var showIsSpare =diskArray.item(m).getAttribute("isSpareDisk");
			    diskStat = diskStat=='0'?'<font color="#009900"><?php echo $PROPERTIES_STATUS_OK; ?></font>':'<font color="#FF3300"><?php echo $PROPERTIES_STATUS_BAD; ?></font>';
			    showIsSpare = showIsSpare=='0'?'<?php echo $NO; ?>':'<font color="#FF9933"><?php echo $YES; ?></font>';
				type = diskArray.item(m).getAttribute("type");
				status = diskStat;
				sn = (diskArray.item(m).getAttribute("sn")).replace(/(^\s*)|(\s*$)/g, "");
				vendor = diskArray.item(m).getAttribute("vendor");
				capacity = diskArray.item(m).getAttribute("capacity");
				isSpareDisk = showIsSpare;
			    /* 描绘显示信息的表格 */
				var showDiskAttribut = new Array();
				showDiskAttribut.push('<table width="200" border="0" cellpadding="5" cellspacing="1">');  
				showDiskAttribut.push('<tr><td height="25" colspan="2" background="images/smallbar.jpg" align="center"><strong><font color="#FFFF00"><?php echo $MONITOR_DISK;  ?>'+scsiId+'</font>&nbsp;<font color="#FFFFFF"><?php echo $MONITOR_DETAIL;  ?></font></strong></td></tr>');
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_ID  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+scsiId+'</td></tr>'); 
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_TYPE  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+type+'</td></tr>'); 
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_STATUS  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+status+'</td></tr>'); 
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_SN  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+sn+'</td></tr>');
				//showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_VENDOR  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+vendor+'</td></tr>'); 
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_CAPACITY  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+capacity+'</td></tr>'); 
				showDiskAttribut.push('<tr><td bgcolor="#D6E6FA"><nobr><?php echo $MONITOR_SPAREDISK  ?></nobr></td><td align="center" bgcolor="#F0F5FD">'+isSpareDisk+'</td></tr>'); 
				showDiskAttribut.push('<!--tr><td colspan="2" align="center">&nbsp;</td></tr--></table>');
				var showDiskString = showDiskAttribut.join("");
				showDiskAttributs[j] = showDiskString;
			   }//end if((j+1)==diskID)	
			     			
		    }//end for m<diskNumber	
			/* 如果flag==1，说明xml中无此ID的磁盘，说明此磁盘被损坏或被拔出 */
		    if(flag==1)
		     {
			    /* 描绘损坏或被拔出磁盘的表格 */
			    var showDiskAttribut = new Array();
				showDiskAttribut.push('<table width="200" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F5FCFF"><tr>');  
				showDiskAttribut.push('<td height="28" background="images/smallbar.jpg"><table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">');
				showDiskAttribut.push('<tr><td width="50">&nbsp;</td><td><strong></strong></td></tr></table></td></tr><tr>'); 
				showDiskAttribut.push('<td align="center"> <table width="90%" border="0" cellpadding="5" cellspacing="1" class="unnamed1"><tr>'); 
				showDiskAttribut.push('<td height="120" align="center" bgcolor="#E3F3F9"><img src="images/dot-11.gif" width="23" height="21"><br>'); 
				showDiskAttribut.push('<font color="#FF0000"><strong><?php echo $MONITOR_ERROR_TIPS; ?></strong></font></td></tr>');				 								 
				showDiskAttribut.push('</table></td></tr></table>');
				var showDiskString = showDiskAttribut.join("");
				showDiskAttributs[j] = showDiskString;			   
			  }
		}//end for j<diskNumber	
}		

/* 对应上面showDiskInfo(xmldoc)函数，为上述函数生成的结果信息DIV的显示按坐标定位 */
	function dispShowDisk(j,e)  
{
document.getElementById("showDisk").innerHTML = showDiskAttributs[j];
document.getElementById("showDisk").style.display="block";
document.getElementById("showDisk").style.left=e.clientX + document.body.scrollLeft;
document.getElementById("showDisk").style.top=e.clientY + document.body.scrollTop;
}		
</script>
