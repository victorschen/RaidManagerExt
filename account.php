<?php
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

//根据来源不同，显示账户是否添加成功
$account_flag = $_GET['tt'];
$messages = "";
if($account_flag =="1")
{
	$messages = $ACCOUNT_ADD_SUCCESS;
}
else
{
	if($account_flag == "0")
	{
		$messages = $ACCOUNT_ADD_FAILURE;
	}
	else
	{
		$messages = $ACCOUNT_ADD_MESSAGE;
	}
}


$logged = 0;
$logon_name  = "";

if(isset($_SESSION['logged'])){
	$logged = $_SESSION['logged'];
	$logon_name = $_SESSION['logon_name'];
}
if($logon_name != 'root'){
	header("location:index.php");
	exit(0);
}

//您的代码写在这里



ob_end_flush();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=<?php echo $CHARSET; ?>">
<title><?php echo $PRODUCT_NAME; ?></title>
<link rel="STYLESHEET" href="style/<?php echo $DEFAULT_STYLE;?>.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<script language="javascript" src="script/button.js"></script>
<script language="javascript">

    var message_error = new Array();
	var message_prompt = new Array();/*用户名格式提示信息变量2007-07-27 added by zhouzhou*/
	
    message_error[1] = "<nobr><?php echo $ERROR_USERNAME; ?></nobr>";
    message_error[2] = "<nobr><?php echo $ERROR_ACCOUNT_PASSWORD; ?></nobr>";
    
	message_prompt[1] = "<nobr><?php echo $FORMAT_USERNAME; ?></nobr>";
	
	// add by YanWei 2007-09
	message_prompt[2] = "<nobr><?php echo $FORMAT_PASSWORD; ?></nobr>";
	    
    /*
	  ***************************************************************
	  checkUserName(sUserName)函数功能描述:检查用户名的输入格式是否正确?
	  定义的用户名格式由字母、下划线和数字组成，且第一个字符必须是字母。
	  2007-07-27 added by ZhouZhou
	  ***************************************************************
	
	*/
    function checkUserName(sUserName){
			
    	 //   var regexp = /^([a-zA-Z]((\w){1}){0,19})$/;
			var regexp = /^[a-zA-Z](\w{0,11})$/;
	      var result = regexp.test(sUserName);
		  if(!result)
	     {  document.getElementById('username_id').innerHTML = message_error[1];	
			document.getElementById('username_id').style.display = 'block'; 
		    return 0;
		 }
	      else
	      {   
		      document.getElementById('username_id').innerHTML = "";	
			  document.getElementById('username_id').style.display = 'none'; 
		      
              return 1;
		    
	       }
    }
	 /*
	  ***************************************************************
	  userNameFormat()函数功能描述:提示用户名的输入格式由字母、下划线和
	  数字组成，且第一个字符必须是字母。
	  2007-07-27 added by ZhouZhou
	  ***************************************************************
		
	*/
   function userNameFormat(){
    	  
	       document.getElementById('username_id').innerHTML = message_prompt[1];	
			document.getElementById('username_id').style.display = 'block'; 
		 
    }
	
	/*
	  ***************************************************************
	  checkPassword(sPassword)函数功能描述:检查密码的输入格式是否正确?
	  定义的密码由字母、下划线和数字组成。
	  2007-07-27 added by ZhouZhou
	  ***************************************************************
	
	*/
    function checkPassword(id,sPassword){
    	   var regexp = /^(\w{4,16})$/;
	      var result = regexp.test(sPassword);
		  if(!result)
	     {  document.getElementById('password_'+id).innerHTML = message_error[2];	
			document.getElementById('password_'+id).style.display = 'block'; 
		    return 0;
		 }
	      else
	      {   
		      document.getElementById('password_'+id).innerHTML = "";	
			  document.getElementById('password_'+id).style.display = 'none'; 
		      
              return 1;
		    
	       }
    }
	 /*
	  ***************************************************************
	  passwordFormat()函数功能描述:提示密码的输入格式由字母、下划线和
	  数字组成。
	  2007-07-27 added by ZhouZhou
	  ***************************************************************
		该函数并没有使用，导致没有提示信息。
		alter by YanWei 2007-09
	*/
   function passwordFormat(id){
    	  
	       document.getElementById('password_'+id).innerHTML = message_prompt[2];	
			document.getElementById('password_'+id).style.display = 'block'; 
		 
    }
    
</script>

<script language="javascript">
	//判断是否要删除帐号
	function isDelAccount(to_url)
	{
		var isDelete = window.confirm("<?php echo $IS_DELETE_ACCOUNT?>");
		if(isDelete)
		{
			window.location.href = to_url;
		}
		else
		{
			window.location.href = "account.php";
		}
	}
	
	//判断文本筐是否为空
	function isTextNulls()
	{   
	    
		/*2007-07-30 added by ZhouZhou*/
		if(addAccount.names.value == "" || addAccount.names.value == null)
		{
			document.getElementById('username_id').innerHTML = "<nobr><?php echo $ERROR_EMPTY_USERNAME?></nobr>";	
			document.getElementById('username_id').style.display = 'block'; 
			setTimeout("shrink('username_id',10)",0);     //added by gaobo 071001
			return 1;
		}
	    else if (checkUserName(addAccount.names.value) == 0)
		{
		   setTimeout("shrink('username_id',10)",0);     //added by gaobo 071001			
		   return 0;
		}
		
		if(addAccount.passwords.value == "")
		{
			document.getElementById('password_1').innerHTML = "<nobr><?php echo $ERROR_EMPTY_PASSWORD?></nobr>";	
			document.getElementById('password_1').style.display = 'block'; 
			document.getElementById('password_2').innerHTML = "";	
			document.getElementById('password_2').style.display = 'none'; 
			setTimeout("shrink('password_1',10)",0);     //added by gaobo 071001
			return 1;
		}
		else if (checkPassword(1,addAccount.passwords.value) == 0)
		{
		   setTimeout("shrink('password_1',10)",0);     //added by gaobo 071001
		   return 0;
		}
		
		 if(addAccount.passwordsConfirm.value == "")
		{  		    
			document.getElementById('password_2').innerHTML = "<nobr><?php echo $ERROR_EMPTY_CONFIRMPASSWORD?></nobr>";	
			document.getElementById('password_2').style.display = 'block'; 
			setTimeout("shrink('password_2',10)",0);     //added by gaobo 071001
			return 1;
		}
		else if (checkPassword(2,addAccount.passwords.value) == 0)
		{
           return 0;		
		}
		
		if(addAccount.passwordsConfirm.value != addAccount.passwords.value)
		{
			document.getElementById('password_2').innerHTML = "<nobr><?php echo $ERROR_EQUAL_PASSWORD?></nobr>";			
			document.getElementById('password_2').style.display = 'block'; 			
			setTimeout("shrink('password_2',10)",0);     //added by gaobo 071001  
			return 1;
		   
		}
		
		addAccount.submit();
	}
  
	function shrink(error_control,times){
		times--;
		if(!times){
			document.getElementById(error_control).style.display = 'block';
			return;
		}
		if(document.getElementById(error_control).style.display == 'block'){
			document.getElementById(error_control).style.display = 'none';
		}
		else{
			document.getElementById(error_control).style.display = 'block';
		}
		setTimeout("shrink('"+ error_control +"'," + times + ")",100);
	}
	
  	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	  
</script>

</head>
<body onLoad="document.body.onselectstart = returnFalse;">

<table width="100%" height="100%" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><br>
		  <br>
		
			<table width="80%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr>
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1">
<table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr>
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $ACCOUNT_SETTINGS; ?></font></strong></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td height="25" align="center" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"><strong><?php echo $ADD_ACCOUNT; ?></strong></td>
              </tr>
			  <tr>
			    <td align="center" valign="bottom" bgcolor="#D6E6FA"><font color="FF4800"><?php echo $messages?></font></td>
			  </tr>
			  <form action="process_account_add.php" method="post" name="addAccount" id="addAccount" onSubmit="return isTextNulls()">
				  <tr> 
					<td align="center" bgcolor="#FFFFFF"><br> 
					  <table width="600" border="0" cellpadding="0" cellspacing="1" class="unnamed1">
						<tr> 
						  <td width="14" height="25" bgcolor="#D6E6FA"><img src="images/dot.gif" width="14" height="11"></td>
						  <td width="19" bgcolor="#D6E6FA"><nobr><?php echo "$USERNAME:"; ?></nobr></td>
						  <td width="133" bgcolor="#F0F5FD"> <input name="names" type="text" size="17" style="width:130px" onblur='checkUserName(this.value);document.body.onselectstart = returnFalse;' onfocus='userNameFormat();document.body.onselectstart = null;'  value = "" onkeydown='if(event.keyCode==13) event.keyCode=9;'></td>
		                  <td width="419" bgcolor="#F0F5FD"><div id='username_id' class='errorTip_account'></div></td>                   
						</tr>
						<tr> 
						  <td height="25" bgcolor="#D6E6FA"><img src="images/dot.gif" width="14" height="11"></td>
						  <td bgcolor="#D6E6FA"><nobr><?php echo "$PASSWORD:"; ?></nobr></td>
						  <td bgcolor="#F0F5FD" width="133"> <input name="passwords" id='1' type="password" size="17" style="width:130px" onfocus='passwordFormat(1);document.body.onselectstart = null;' onblur='checkPassword("1",this.value);document.body.onselectstart = returnFalse;' onkeydown='if(event.keyCode==13) event.keyCode=9;'></td>
						  <td bgcolor="#F0F5FD" width="419"><div id='password_1' class='errorTip_account'></div></td>
						</tr>
						<tr> 
						  <td height="25" bgcolor="#D6E6FA"><img src="images/dot.gif" width="14" height="11"></td>
						  <td bgcolor="#D6E6FA"><nobr><?php echo "$ACCOUNT_PASSWORD_CONFIRM:"; ?></nobr></td>
						  <td bgcolor="#F0F5FD"> <input name="passwordsConfirm" id='2' type="password" size="17" style="width:130px" onfocus='password_2.innerHTML = "";password_2.style.display = "none";document.body.onselectstart = null; ' onblur='checkPassword("2",this.value);document.body.onselectstart = returnFalse;' onkeydown='if(event.keyCode==13) event.keyCode=9;'></td>
						  <td bgcolor="#F0F5FD"><div id='password_2' class='errorTip_account'></div></td>
						</tr>
						<tr> 
                      <td height="25" colspan="4" align="center" bgcolor="#D6E6FA"><?php echo "$PRIVILEGE" ?></td>
                    </tr>
						
                      
                    <tr bgcolor="#E3F3F9"> 
                      <td height="25" colspan="4" align="center" bgcolor="#F0F5FD"> 
                        <table width="98%" border="0" cellpadding="5" cellspacing="0" class="unnamed1">
                          <tr> 
                            <td><input type="checkbox" name="privilege[]" value="Configuration" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_CONFIG ?></td>
                            
                            <td><input type="checkbox" name="privilege[]" value="Network" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_NETWORK ?> </td>
							<td><input type="checkbox" name="privilege[]" value="Shut down" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_CLOSE ?></td>
                            <td><input type="checkbox" name="privilege[]" value="Restart" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_RESTART ?></td>
                          </tr>
                          <tr> 
                            <td><!--<input type="checkbox" name="privilege[]" value="Account">
						            <?php echo $ITEM_ACCOUNT ?>
									<input type="checkbox" name="privilege[]" value="Restore default">
						            <?php echo $ITEM_RESOTRE_DEFAULT ?>
									-->
									<input type="checkbox" name="privilege[]" value="Log" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_LOG ?>									</td>
                            <td><input type="checkbox" name="privilege[]" value="Monitor" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_MONITOR ?></td>
                            
							<!--td><input type="checkbox" name="privilege[]" value="Backup" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_BACKUP ?></td-->
                            <!--td><input type="checkbox" name="privilege[]" value="Restore" onkeydown='if(event.keyCode==13) isTextNulls();'>
						            <?php echo $ITEM_RESOTRE ?> </td-->
                          </tr>
                        </table>
                      </td>
                    </tr>
					
					
						
						<tr align="center"> 
						  <td height="25" colspan="4"> 
							<table width="50%" border="0" cellspacing="0" cellpadding="5">
							  <tr> 
								<td align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="isTextNulls();"></td>
								<td><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="addAccount.reset()"></td>
							  </tr>
							</table></td>
						</tr>
					  </table> 
					<br> </td>
				  </tr>
			  </form>
              <tr> 
                <td align="center" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"><strong><?php echo $MANAGE_ACCOUNT; ?></strong></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF" class="unnamed1"><br> 
                  <table width="80%" border="0" cellpadding="0" cellspacing="1" class="unnamed1">
                    <tr align="center" bgcolor="#C7E3F3"> 
                      <td height="25" bgcolor="#D6E6FA"><strong><?php echo $ACCOUNT_NAME;?></strong></td>
                      <td bgcolor="#D6E6FA"><strong><?php echo $DELETE_ACCOUNT;?></strong></td>
                      <td bgcolor="#D6E6FA"><strong><?php echo $MODIFY_ACCOUNT;?></strong></td>
                      <td bgcolor="#D6E6FA"><strong><?php echo $MODIFY_PRIVILEGE;?></strong></td>
					  <!--td bgcolor="#D6E6FA"><strong>cifs帐户</strong></td-->
                    </tr>
					<?php
						$users = file("users.txt");
						while (list($key, $val) = each($users)) {
							$user = split(":",$val);
							echo "<tr align=\"center\" bgcolor=\"#F0F5FD\">";
							echo "<td height=\"25\">". $user[0] ."</td>";
							if($user[0]=='root'){
								echo "<td height=\"25\"><font color=\"#666666\">$ROOT</font></td>";
							}
							else{
								$href = "process_account_del.php?user=" . "$user[0]";
								echo "<td><a href=\"#\" onclick=\"isDelAccount('$href')\">$DELETE</a></td>";
							}
							
							echo "<td><a href='view_account.php?user=" . $user[0]."&menu2=display'>$MODIFY</a></td>";
							
							
							if($user[0]=='root'){
								echo "<td height=\"25\"><font color=\"#666666\">$MODIFY</font></td>";
							}
							else{
								echo "<td><a href='view_privilege.php?user=" . $user[0]."&menu2=display'>$MODIFY</a></td>";
							}
						
						/*
						   if($user[0]=='root'){
								echo "<td height=\"25\"><font color=\"#666666\">不可加入cifs组</font></td>";
							}
							else{
								echo "<td>转为cifs帐户</td>";
							}
						*/
						
						
						
							echo "</tr>";
						}
					?>
                  </table>
                <br> </td>
              </tr>
            </table>
		
		
		
		
		
		
	  </td>
	</tr>
	<tr>
		<td colspan="2" ><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>