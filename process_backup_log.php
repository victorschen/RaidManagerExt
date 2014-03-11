<?php


//缓存输出
ob_start();


	//选择正确的语言文件
	include "inc_config.php";
	$lang = $DEFAULT_LANGUAGE ;  
	//启动会话，这步必不可少 
    session_start();   
    if(isset($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
    }
	$include_file = "lang/string_table.". $lang .".php";
	include $include_file;
	
	//记录操作日志
	include "log/Log.php";
	writeLog("$BACKUP_LOG_LOG");

	header('Content-type: application/msword');
	header('Content-Disposition: attachment; filename=操作日志.doc;') ;
	
ob_end_flush();
?>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
		  <tr> 
			<td height="28" align="center"  bgcolor="#437CD3" class="unnamed1"><strong><font color="#FFFFFF"><?php echo $LOG_TITLE ?></font></strong>			 </td>
		  </tr>
		  <tr> 
			<td align="center" valign="top" bgcolor="#F5FCFF">
			  <table width="100%" border="1" cellpadding="5" cellspacing="1" class="unnamed1">
				<tr align="center"> 
				  <td width="15%" height="25" bgcolor="#C7E3F3"><strong><?php  echo $LOG_USER ?></strong></td>
				  <td width="22%" bgcolor="#C7E3F3"><strong><?php  echo $LOG_TIME ?></strong></td>
				  <td bgcolor="#C7E3F3"><strong><?php  echo $LOG_RECORD ?></strong></td>
				</tr>

		<?PHP
			$log = file("log/log");
			$count = count($log);
			
			foreach ($log as $key => $value) 
			{
				$log = split("#", "$value");
				$operator = $log[0];
				$operate_time = $log[1];
				$operate_log = $log[2];
		?>
		<tr align="center"> 
		  <td height="25" align="center" bgcolor="#E3F3F9"><?php  echo $operator ?></td>
		  <td align="left" bgcolor="#E3F3F9"><?php  echo $operate_time ?></td>
		  <td align="left" bgcolor="#E3F3F9"><?php  echo $operate_log ?></td>
		</tr>
		
		<?php
				
			}
			//清除指定行数的操作日志
			$NO = 500;   //剩余的操作日志条数
			clearLogByNO($NO);
			
			$time = date("Y-m-d H:i:s");
		?>
		<tr align="center">
		      <td height="25" colspan="3" align="center" valign="bottom" bgcolor="#E3F3F9">备份时间:<?php echo $time ?>&nbsp;&nbsp;日志数目:<?php echo $count ?>条</td>
		</tr>
	  </table>
	</td>
  </tr>
</table>
