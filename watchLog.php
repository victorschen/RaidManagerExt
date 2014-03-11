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


$logged = 0;
$logon_name  = "";

if(isset($_SESSION['logged'])){
	$logged = $_SESSION['logged'];
	$logon_name = $_SESSION['logon_name'];
}
if(!$logged){
	header("location:index.php");
	exit(0);
}

//您的代码写在这里
	include "log/Log.php";

ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<script language="javascript">
//added by gaobo
function checkletter(obj)
{	  
    //var Letters = "1234567890";
    //for (i=0; i < obj.length; i++){
       //var CheckChar = obj.charAt(i);
       //if (Letters.indexOf(CheckChar) == -1) 
	   if(isNaN(obj))
	   {
	   alert("<?php echo $TIPS_ENTERNUM; ?>");
	   return false;
	   } 
	  //}
	   //alert("aaaaa");
	   //this.submit(); 
}
 
   function formsFocus()
   {
    if(document.forms[0])
    { document.forms[0].elements[0].focus(); }
    }	
	
	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	
</script>
<style type="text/css">
<!--
.STYLE1 {color: #CC6600}
-->
</style>
</head>
<body onLoad="formsFocus();">

<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><table width="200" border="0">
          <tr>
            <td height="20">&nbsp;</td>
          </tr>
        </table>
		  <br>
		
				 <table width="84%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
					  <tr> 
						<td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
						  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
							<tr> 
							  <td width="50">&nbsp;</td>
							  <td><strong><font color="#FFFFFF"><?php echo $LOG_TITLE ?></font></strong></td>
							</tr>
						  </table></td>
					  </tr>
					  <tr> 
						<td align="center" bgcolor="#FFFFFF"><br> 
						  <table width="90%" border="0" cellpadding="5" cellspacing="1" class="unnamed1">
							<tr align="center"> 
							  <td width="15%" height="25" bgcolor="#B8D3F8"><strong><?php  echo $LOG_USER ?></strong></td>
							  <td width="22%" bgcolor="#B8D3F8"><strong><?php  echo $LOG_TIME ?></strong></td>
							  <td bgcolor="#B8D3F8"><strong><?php  echo $LOG_RECORD ?></strong></td>
							</tr>
		
		<?php
			$number = 15;      //每页显示的记录数
			
			//得到要转向的页数
			$pageNum = $_GET['pageNumber'];			
			$pageCount = getPageCount($number);
			if(!isset($pageNum))
			{
				$pageNum = 1;
			}
			else
			{
				$pageNum = (int)($pageNum);
				//要转到的页数小于0
				if($pageNum<=0)
				{
					$pageNum = 1;
				}
				else
				{
					//要转到的页数大于总页数
					if($pageNum>$pageCount)
					{
						$pageNum = $pageCount;
					}
				}
			}
			
			//提取具体记录
			$logArray = readLog($pageNum,$number);
			$operator = "";
			$operate_time = "";
			$operate_log = "";
			foreach($logArray as $key=>$value)
			{
				$log = split("#", "$value");
				$operator = $log[0];
				$operate_time = $log[1];
				$operate_log = $log[2];
		       ?>
                    <tr align="center"> 
                      <td height="25" align="center" bgcolor="#DAE9FC"><?php echo $operator ?></td>
                      <td align="left" bgcolor="#DAE9FC"><?php echo $operate_time ?></td>
                      <td align="left" bgcolor="#DAE9FC"><?php echo $operate_log ?></td>
                    </tr>
	  <?php } ?>
				<form method="get" action="watchLog.php">
                    <tr> 
                      <td height="30" colspan="3" align="center" valign="middle">
					  
                            <span style="font-size: 12px;font-weight: normal;color: #666666;text-decoration: none;"> 
							<?php echo $PAGENUM; ?><span class="STYLE1"><?php echo $pageNum ?></span><?php echo $PAGE; ?>/<?php echo $TOTELPAGE; ?><span class="STYLE1"><?php echo getPageCount($number) ?></span><?php echo $PAGE; ?> &nbsp;
							<a href="watchLog.php?pageNumber=1"><?php echo $FIRSTPAGE; ?></a> &nbsp;
							<a href="watchLog.php?pageNumber=<?php echo $pageNum-1 ?>"><?php echo $PAGEUP; ?> </a> &nbsp;
							<a href="watchLog.php?pageNumber=<?php echo $pageNum+1 ?>"><?php echo $PAGEDOWN; ?> </a> &nbsp;
							<a href="watchLog.php?pageNumber=<?php echo getPageCount($number)?>"><?php echo $LASTPAGE; ?> </a>&nbsp;
							<?php echo $TURNTO; ?>
							<input name="pageNumber" type="text" size="2" style="height:14" onkeydown='if(event.keyCode==13) checkletter(this.value);' ONFOCUS="document.body.onselectstart = null" ONBLUR="document.body.onselectstart = returnFalse;">
						<?php echo $PAGE; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
					  	if($logon_name == 'root')
						{
						?>
						<a href="process_backup_log.php"><?php echo $LOGBACKUP; ?></a>                        
				  <?php }?>                          
					  </td>
                  </tr>
					  </form>
                  </table>
                </td>
              </tr>
            </table>
			
			
      <br></td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>
</html>