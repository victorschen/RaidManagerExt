tmpForDelete = new Array();
tmpForInsert = new Array();


var  xmlHTTP = new ActiveXObject("Microsoft.XMLHTTP");
var xmlDoc= new ActiveXObject('MSXML2.DOMDocument');
xmlDoc.async = false;

function initAdmin() {
  var xslDoc = new ActiveXObject('MSXML2.DOMDocument');
  xslDoc.async = false;

  xmlDocument = new ActiveXObject('MSXML2.DOMDocument');
  xmlDocument.async = false;
  xmlDocument.load("style/insertentity.xml");

  xmlDoc.load("Monitor/raidConfig.xml");
  
  xslDoc.load("style/applyID.xsl");

if(xmlDoc.documentElement.nodeName=='Rack'){
  xmlDoc.loadXML(xmlDoc.documentElement.transformNode(xslDoc));
  
  xslDoc.load("style/tree.xslt.php");
  
  folderTree.innerHTML = xmlDoc.documentElement.transformNode(xslDoc);
//window.alert(xmlDocument.documentElement.selectSingleNode("//singleRaid").nodeName);
  }
  
}

function insertUpdateDisplay(action,insertupdateeneity) {
  var xslDoc
  var xslTemplate;
  var xslProc;
  var entity;


  xslDoc = new ActiveXObject('MSXML2.FreeThreadedDOMDocument')
  xslDoc.async = false;

  xslTemplate = new ActiveXObject('MSXML2.XSLTemplate')

  xslDoc.load("style/insertUpdate.xslt.php");
  xslTemplate.stylesheet = xslDoc;
  xslProc = xslTemplate.createProcessor();
  if(action=='update'){
    entity = xmlDoc.documentElement.selectSingleNode("//*[@id='" + selectedEntity +"']");
   // alert ("GBGGYY");
//alert (entity.attributes.getNamedItem("raidstat").nodeValue );
  }
  else{
    if(insertupdateeneity=='Disk')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//Disk");
    }
   /* else if(insertupdateeneity=='SubRaid')
      entity = xmlDocument.documentElement.selectSingleNode("//SubRaid");*/
    /*else if(insertupdateeneity=='singleRaid')
      entity = xmlDocument.documentElement.selectSingleNode("//singleRaid");
	*/
	/*popedom作为singleRaid的一个属性，选择同一节点。通过insertUpdate.xslt.php实现右键添加popedom的功能。修改by yxl*/
	else if(insertupdateeneity=='singleRaid')
      entity = xmlDocument.documentElement.selectSingleNode("//singleRaid");
  }
  xslProc.input = entity;

  xslProc.addParameter("action", action);
  xslProc.addParameter("selectedEntity", selectedEntity);
  xslProc.addParameter("insertupdateentity", insertupdateeneity);

  xslProc.transform();
  
  properties.innerHTML = xslProc.output;
  if(action=='update')
  {
   /*if(entity.nodeName=='SubRaid')
      {
	  for(op=0;op<eval("document.all.volumeLevel.options.length");op++)
      if(parseInt(document.all.volumeLevel.options[op].value)==parseInt(entity.attributes.getNamedItem("level").nodeValue))
      document.all.volumeLevel.options[op].selected=true;
       for(op=0;op<eval("document.all.volumeStripeSize.options.length");op++)
      if(parseInt(document.all.volumeStripeSize.options[op].value)==parseInt(entity.attributes.getNamedItem("chunk").nodeValue))
      document.all.volumeStripeSize.options[op].selected=true;
     }*/
    
     	if(entity.nodeName=='singleRaid')
      {
	     for(op=0;op<eval("document.all.LUNLevel.options.length");op++)
       if(document.all.LUNLevel.options[op].value==entity.attributes.getNamedItem("level").nodeValue)
       document.all.LUNLevel.options[op].selected=true;
      for(op=0;op<eval("document.all.LUNStripeSize.options.length");op++)
       if(parseInt(document.all.LUNStripeSize.options[op].value)==parseInt(entity.attributes.getNamedItem("chunk").nodeValue))
       document.all.LUNStripeSize.options[op].selected=true;
      }
     if(entity.nodeName=='Disk')
      {
	     for(op=0;op<eval("document.all.diskType.options.length");op++)
       if(document.all.diskType.options[op].value==entity.attributes.getNamedItem("type").nodeValue)
       document.all.diskType.options[op].selected=true;
	    for(op=0;op<eval("document.all.SpareDiskFlag.options.length");op++)
       if(document.all.SpareDiskFlag.options[op].value==entity.attributes.getNamedItem("isSpareDisk").nodeValue)
       document.all.SpareDiskFlag.options[op].selected=true;
      
     }
  }    
 }

function insertEntity(parentEntityID,insertentity) {
  var entity;
  var entity2;
  var newEntity;
  var element;
  var attribute;
  var xslDoc;
  var i;
  var xxx;
  var yyy;
  var entity3;
  var flag=0;
  var flagdiskinvol=0;
//用户进行了操作，flag置1 added by gaobo 071003
 flagChangConfig = '1';

  xslDoc = new ActiveXObject('MSXML2.FreeThreadedDOMDocument')
  xslDoc.async = false;
  
  xslDoc.load("style/tree.xslt.php");

  /*if(insertentity=='Disk')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//Disk");
      entity2=xmlDoc.documentElement.attributes;
      flagdiskinvol=1;
      if(parseInt(entity2.getNamedItem("DiskTotal").nodeValue) >= parseInt(entity2.getNamedItem("DiskMax").nodeValue))
           { alert("Disk的总数不能超过"+entity2.getNamedItem("DiskMax").nodeValue);
	     return;
	   }
      else  entity2.getNamedItem("DiskTotal").nodeValue=parseInt(entity2.getNamedItem("DiskTotal").nodeValue)+1;
    }
  else if(insertentity=='SubRaid')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//SubRaid");
      flag=1;
**加一个判断vol多少的属性**
 entity2=xmlDoc.documentElement.attributes;
      if(parseInt(entity2.getNamedItem("VolumeAssigned").nodeValue-'0') >= parseInt(entity2.getNamedItem("VolumeMax").nodeValue-'0'))
           { alert("Volume的总数不能超过"+parseInt(entity2.getNamedItem("LunMax").nodeValue-'0'));
	     return;
	   }
    entity2.getNamedItem("VolumeAssigned").nodeValue=parseInt(entity2.getNamedItem("VolumeAssigned").nodeValue)+1;
   }
  else if(insertentity=='singleRaid')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//singleRaid");
     entity2=xmlDoc.documentElement.attributes;
      if(parseInt(entity2.getNamedItem("LunAssigned").nodeValue-'0') >= parseInt(entity2.getNamedItem("LunMax").nodeValue-'0'))
           { alert("singleRaid 的总数不能超过"+parseInt(entity2.getNamedItem("LunMax").nodeValue-'0'));
	     return;
	   } 
      else {entity2.getNamedItem("LunAssigned").nodeValue=parseInt(entity2.getNamedItem("LunAssigned").nodeValue)+1;
      
      }
    }*/
	/*xmlDocument装载的是字符串来自insertentity.xml*/

  /*这个是给entity赋值，如果要上面的就去掉了
  */
  if(insertentity=='Disk')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//Disk");
      
  }
     
  /*else if(insertentity=='SubRaid')
    {
      entity = xmlDocument.documentElement.selectSingleNode("//SubRaid");
      
   }*/
  else if(insertentity=='singleRaid')

      {entity = xmlDocument.documentElement.selectSingleNode("//singleRaid");
        
  	}  
  newEntity = xmlDoc.createElement(insertentity);
  attribute = xmlDoc.createAttribute("id");
  attribute.text = document.uniqueID;
  newEntity.attributes.setNamedItem(attribute);
  for(i=0; i < entity.attributes.length; i++) {
    xxx=entity.attributes.item(i).baseName;//alert(xxx);
     if(insertentity=='Disk' & xxx == 'type')
      {var op;
    op=eval("document.all.diskType.selectedIndex");
    
	yyy=eval("document.all.diskType.options[op].value");
	   }
    
    else if(insertentity=='Disk' & xxx == 'isSpareDisk')
      {var op;
    op=eval("document.all.SpareDiskFlag.selectedIndex");
    
	yyy=eval("document.all.SpareDiskFlag.options[op].value");
	   }
    
    else 
		if(insertentity=='Disk' & xxx == 'isSpareDisk')
      {var op;
    op=eval("document.all.isSpareDisk.selectedIndex");
    
	yyy=eval("document.all.isSpareDisk.options[op].value");
	   }
    
    else 
    if(insertentity=='SubRaid' & xxx == 'level')
      {
	      var op;
        op=eval("document.all.volumeLevel.selectedIndex");
        yyy=eval("document.all.volumeLevel.options[op].value");
      }
    else if(insertentity=='SubRaid'  & xxx == 'chunk')
      {
	      var op;
	
        op=eval("document.all.volumeStripeSize.selectedIndex");
        yyy=eval("document.all.volumeStripeSize.options[op].value");
      }
      else if(insertentity=='singleRaid'  & xxx == 'chunk')
      {
		  
	      var op;
        op=eval("document.all.LUNStripeSize.selectedIndex");
        yyy=eval("document.all.LUNStripeSize.options[op].value");
      }
      
    else if(insertentity=='singleRaid' & xxx == 'level')
      {
        var op;
        op=eval("document.all.LUNLevel.selectedIndex");
        yyy=eval("document.all.LUNLevel.options[op].value");
      }
	else if(insertentity=='singleRaid' & xxx == 'index')
		 {
			 entity2=xmlDoc.documentElement.attributes;
                yyy=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue);
				
  <!--修改by yxl-->                 <!--entity2.getNamedItem("RaidAssigned").nodeValue=parseInt(entity2.getNamedItem("RaidAssigned").nodeValue)+1;-->
  
  entity2.getNamedItem("raidNum").nodeValue=parseInt(entity2.getNamedItem("raidNum").nodeValue)+1;
  
		   entity2.getNamedItem("lastRaidIndex").nodeValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)+1;	 

	         }
	else if(insertentity=='SubRaid'  & xxx == 'index')
		{entity2=xmlDoc.documentElement.attributes;
                yyy=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue);
  <!--修改by yxl-->               <!--entity2.getNamedItem("RaidAssigned").nodeValue=parseInt(entity2.getNamedItem("RaidAssigned").nodeValue)+1;-->
		   entity2.getNamedItem("lastRaidIndex").nodeValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)+1;	 
		   
		}
	else if((insertentity=='SubRaid' |insertentity=='singleRaid') & xxx == 'LunNumber')
		{entity2=xmlDoc.documentElement.attributes;
                yyy=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)-1;
              }
     else 
	 if(xxx=='popedom')
	    {
			yyy=document.getElementById("popedom").value;
		 }
	 else
     	yyy=eval(xxx+".value");
     	/*将页面的值分别赋给结点的各个属性*/
      attribute = xmlDoc.createAttribute(xxx);
      attribute.text=yyy;
	  newEntity.attributes.setNamedItem(attribute);
	  
  }
//alert(newEntity.xml);
/*******                                                                                             *******/
//*******当数组tmpForDelete不为空时,记录新创建的阵列的id存入数组tmpForInsert added by gaobo 071002 ******
//*****                                                                                           ******
  if(tmpForDelete!='')
{
   //alert("yeah");
   //alert(newEntity.attributes.getNamedItem("id").nodeValue);
   var idIsInsert = newEntity.attributes.getNamedItem("id").nodeValue;
   //alert("idIsInsert is "+idIsInsert);
   tmpForInsert.push(idIsInsert);  
}
//***************************************************************		

	if(insertentity=='singleRaid')
	{
	  raidstat = xmlDoc.createAttribute("raidstat");
      raidstat.text="-1";
	  newEntity.attributes.setNamedItem(raidstat);
	  
	  raidcap = xmlDoc.createAttribute("raidcap");
      raidcap.text="";
	  newEntity.attributes.setNamedItem(raidcap);
	}

  entity = xmlDoc.documentElement.selectSingleNode("//*[@id='" + parentEntityID +"']");
  
  /*增加序号的作用,对于Volume还要等到加一个volAssigned就可以了*/
  /*if(newEntity.nodeName=="singleRaid")
  newEntity.attributes.getNamedItem("index").text="0"+parseInt(xmlDoc.documentElement.attributes.getNamedItem("LunAssigned").nodeValue-1);
 if(newEntity.nodeName=="SubRaid")
  newEntity.attributes.getNamedItem("index").text="0"+parseInt(xmlDoc.documentElement.attributes.getNamedItem("VolumeAssigned").nodeValue-1);
 */
  entity.appendChild(newEntity);
  if(entity.nodeName=='singleRaid' & insertentity=='SubRaid')
  	{entity2=entity.attributes;
  	entity2.getNamedItem("SubRaidNumber").nodeValue=parseInt(entity2.getNamedItem("SubRaidNumber").nodeValue)+1;
  	 }

 /*
 if((flag==1)&&(entity.nodeName=="singleRaid"))
 {entity3=entity.attributes;
entity3.getNamedItem("MemberVolume").nodeValue=parseInt(entity3.getNamedItem("MemberVolume").nodeValue)+1;
flag=0;
 }
if((flagdiskinvol==1)&&(entity.nodeName=="SubRaid"))
{entity3=entity.attributes;
entity3.getNamedItem("MemberDisk").nodeValue=parseInt(entity3.getNamedItem("MemberDisk").nodeValue)+1;
flagdiskinvol=0;
}
*/
/*插入磁盘under vol*/

  document.all[parentEntityID].insertAdjacentHTML("beforeEnd", newEntity.transformNode(xslDoc));
   /*新插入的结点显示*/
   document.all[parentEntityID].lastChild.style.display = "block";
/*插入后把父亲结点展开*/
  if(document.all[parentEntityID].open == "false") {
    clickOnEntity(document.all[parentEntityID]);
  }
  
}

function updateEntity(entityID,updateentity) {
  var entity;
  var xslDoc;
  var container;
  var i;
  var xxx;
  var yyy;

  xslDoc = new ActiveXObject('MSXML2.FreeThreadedDOMDocument')
  xslDoc.async = false;
  
  xslDoc.load("style/tree.xslt.php");

  entity = xmlDoc.documentElement.selectSingleNode("//*[@id='" + entityID +"']");

  for(i=0; i < entity.attributes.length; i++) {
    if((xxx=entity.attributes.item(i).baseName) != "id") {
    if(updateentity=='Disk' & xxx == 'type')
      {
      	var op;
      	op=eval("document.all.diskType.selectedIndex");
        yyy=eval("document.all.diskType.options[op].value");
        
      }
	else if(updateentity=='Disk' & xxx == 'isSpareDisk')
      {
      	var op;
      	op=eval("document.all.SpareDiskFlag.selectedIndex");
        yyy=eval("document.all.SpareDiskFlag.options[op].value");
        
      } 
    else if(updateentity=='SubRaid' & xxx == 'level')
      {
	      var op;
      op=eval("document.all.volumeLevel.selectedIndex");
        yyy=eval("document.all.volumeLevel.options[op].value");
      }
   else if(updateentity=='SubRaid'  & xxx == 'chunk')
      {
	      var op;
       op=eval("document.all.volumeStripeSize.selectedIndex");
       yyy=eval("document.all.volumeStripeSize.options[op].value");
        
      }
     else if(updateentity=='singleRaid'  & xxx == 'chunk')
      {
	     var op;
        op=eval("document.all.LUNStripeSize.selectedIndex");
        yyy=eval("document.all.LUNStripeSize.options[op].value");
             
      }
      
    else if(updateentity=='singleRaid' & xxx == 'level')
      {
       var op;
        op=eval("document.all.LUNLevel.selectedIndex");
        yyy=eval("document.all.LUNLevel.options[op].value");
      }
  /*error modified in 8.2*/ 
  if((updateentity=='Disk' & xxx == 'type')|(updateentity=='Disk' & xxx == 'isSpareDisk')|(updateentity=='SubRaid' & xxx == 'level')|(updateentity=='SubRaid'  & xxx == 'chunk')|(updateentity=='singleRaid'  & xxx == 'chunk')|(updateentity=='singleRaid' & xxx == 'level'))
    {entity.attributes.item(i).text = yyy;}
   else
   	 	
  	entity.attributes.item(i).text = document.all[xxx].value;
    }
  }

  container = document.createElement("DIV");
  container.innerHTML = entity.transformNode(xslDoc)
  
  container.childNodes(0).style.display = "block";
  document.all[entityID].swapNode(container.childNodes(0));
  container = null;
  
}

function deleteEntity(deletedentity) {
  var entity;
  var entiey2;
 var entity1;
 var xslDoc;
 var parentID;
 var i,j,i1,j1;
 var rootElement;
 
  entity = xmlDoc.documentElement.selectSingleNode("//*[@id='" + selectedEntity +"']");
  rootElement=xmlDoc.documentElement;
  if(entity.childNodes.length > 0&&(deletedentity=='Rack')) {
    alert("这是一个挂有磁盘的阵列，您不能就这样把它移除了!");
  }
 else 
  if((deletedentity=='Disk')&&(entity.attributes.getNamedItem("status").nodeValue==0))
  {
   alert("这是一个好的磁盘,您不能这样将它移除!");
  }
  else {
     //用户进行了操作，flag置1 added by gaobo 071003
     flagChangConfig = '1'; 
    //alert("1111");
	//********                                                                             *******
	//**收集被删除的正常状态的阵列中包含的磁盘scsiID装入数组tmpForDelete added by gaobo 071002 **
	//**	                                                                              *******
	
	//alert("entity deleted is "+entity.xml);
	//alert(entity.attributes.getNamedItem("raidstat").nodeValue);
	if(entity.nodeName == 'singleRaid' && entity.attributes.getNamedItem("raidstat").nodeValue != '-1')
	{		
		var diskArray = entity.getElementsByTagName('Disk');
		//alert(diskArray.length);
		for(var i=0; i<diskArray.length; i++)
		{
			
			var idIsDelete;			  
			  if(diskArray.item(i).getAttribute("status")!= '2')
				{idIsDelete = diskArray.item(i).getAttribute("scsiID");
				 //alert(idIsDelete);
				 tmpForDelete.push(idIsDelete);
				}		
		}
		
		//将现有阵列的ID也装入数组tmpForInsert added by gaobo 071006
		 var raidExist = xmlDoc.getElementsByTagName("singleRaid");
   if(xmlDoc.getElementsByTagName("singleRaid"))
     {
	   var raidNumber = raidExist.length;
	   var m;
	   var idIsExist;			  
	   for(m=0; m<raidNumber; m++)
		 {
		 idIsExist = raidExist.item(m).getAttribute("id");
		 //alert("idIsExist is "+idIsExist);
		 tmpForInsert.push(idIsExist);			  
		 }
      }    
	}
  //*********	
	
	entity1=entity.parentNode;
    entity = entity.parentNode.removeChild(entity);
	
	   document.all[selectedEntity].removeNode(true);
  /**/  if(deletedentity=='Disk')
    {
      entity2=xmlDoc.documentElement.attributes;
      <!--entity2.getNamedItem("DiskTotal").nodeValue=parseInt(entity2.getNamedItem("DiskTotal").nodeValue)-1;-->
    if(entity1.nodeName=='singleRaid')
	{
      {
	    entity2=entity1.attributes;
        entity2.getNamedItem("raidDiskNum").nodeValue=parseInt(entity2.getNamedItem("raidDiskNum").nodeValue)-1;
      }//**参数变化
	  
	  rootElement.appendChild(entity);
      var xslDoc = new ActiveXObject('MSXML2.DOMDocument');
      xslDoc.async = false;
      xslDoc.load("style/tree.xslt.php");
      folderTree.innerHTML = xmlDoc.documentElement.transformNode(xslDoc);
	}
	  
    }
    if(deletedentity=='singleRaid')
{     entity2=xmlDoc.documentElement.attributes;
      /*entity2.getNamedItem("RaidAssigned").nodeValue=parseInt(entity2.getNamedItem("RaidAssigned").nodeValue)-1;*/

entity2.getNamedItem("raidNum").nodeValue=parseInt(entity2.getNamedItem("raidNum").nodeValue)-1;

//entity2.getNamedItem("lastRaidIndex").nodeValue=parseInt(entity2.getNamedItem("lastRaidIndex").nodeValue)-1;  

/*raid's children go to RACK*/
	if((j=entity.childNodes.length) > 0 ) 
{ for(i=0;i<j;i++)
   {var entityvoldisk;
	entity.childNodes.item(0).attributes.getNamedItem("isSpareDisk").nodeValue = "0";
   entityvoldisk=entity.removeChild(entity.childNodes[0]);
   /*如果有subraid把subraid的disk加入到Rack下面,2005 1226*/
   /*if((j1=entityvoldisk.childNodes.length)>0)
   	{ for(i1=0;i1<j1;i1++)
   	    { var entity3;
               entity3=entityvoldisk.removeChild(entityvoldisk.childNodes[0]);
		 rootElement.appendChild(entity3);
            }
      entity2.getNamedItem("RaidAssigned").nodeValue=parseInt(entity2.getNamedItem("RaidAssigned").nodeValue)-1;
      }
     else if(entityvoldisk.nodeName != 'SubRaid')*/
     {rootElement.appendChild(entityvoldisk);}
      var xslDoc = new ActiveXObject('MSXML2.DOMDocument');
      xslDoc.async = false;
      xslDoc.load("style/tree.xslt.php");
      folderTree.innerHTML = xmlDoc.documentElement.transformNode(xslDoc);
		
    }
}
    	}
  /*  if(deletedentity=='SubRaid')
  {VolumeAssigned changed
      entity2=xmlDoc.documentElement.attributes;
      entity2.getNamedItem("RaidAssigned").nodeValue=parseInt(entity2.getNamedItem("RaidAssigned").nodeValue)-1;
  	if(entity1.nodeName=='singleRaid')
     {entity2=entity1.attributes;
      entity2.getNamedItem("SubRaidNumber").nodeValue=parseInt(entity2.getNamedItem("SubRaidNumber").nodeValue)-1;
      }*/
	/*subraid's children go to RACK*/
	/*if((j=entity.childNodes.length) > 0) 
{ for(i=0;i<j;i++)
   {var entityvoldisk;
   entityvoldisk=entity.removeChild(entity.childNodes[0]);
   rootElement.appendChild(entityvoldisk);}
 var xslDoc = new ActiveXObject('MSXML2.DOMDocument');
  xslDoc.async = false;
  xslDoc.load("style/tree.xslt.php");
    folderTree.innerHTML = xmlDoc.documentElement.transformNode(xslDoc);
}
   }/*参数变化*/
   

   /*    if(entity.nodeName=="Disk")
    {xmlDoc.documentElement.appendChild(entity);
     window.confirm("Are you sure to remove the disk?");
      var xslDoc = new ActiveXObject('MSXML2.DOMDocument');
  xslDoc.async = false;
  xslDoc.load("style/tree.xslt.php");
    folderTree.innerHTML = xmlDoc.documentElement.transformNode(xslDoc);
  parentID=xmlDoc.documentElement.attributes.getNamedItem("id").nodeValue;
  
 	}*/
  }
}

