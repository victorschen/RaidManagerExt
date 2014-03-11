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
	
	var valid = false;
	
	function checkPassword()
	{
	 
		if(account.newpass.value == account.validatepass.value){		   
			valid = true;
			errorPass.style.display = 'none';
			
		}
		else{		    
			valid = false;
			errorPass.style.display = 'block';
		}
		return valid;
	}
	
	function checkWritten()
	{                    
		// alter by YanWei 2007-09    
		//modify by gaobo 071218                            
		var sPassword = account.newpass.value;		
		var regexp = /^(\w{4,16})$/;                           
		var result = regexp.test(sPassword);                  
		//  alert(result);                                        


		if(sPassword == ''||result == false){
			blankPass.style.display = 'block';		
			return false;
		}
		else{
			blankPass.style.display = 'none';	
			return true;
		}
	}
	
	function checkSubmit()
	{	
		if(!checkPassword())
		{
			setTimeout("shrink('errorPass',10)",0);
			return;
		}
		
		if(!checkWritten())
		{
			setTimeout("shrink('blankPass',10)",0);
			return;
		}	
		var isToSubmit = window.confirm('<?php echo $CONFIRM_MODIFY_PASS; ?>');
			if(isToSubmit == false)
			{
				return false;
			}
			else
			{		
			  account.submit();			
			}				
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

</script>
</head>
<body>

<table width="100%" height="100" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" id="main"><br><br>
			<form name="account" id="account" action="process_account_modify.php?flag=process_password_modify" method="post">
			<table width="80%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr> 
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $MODIFY_ACCOUNT; ?></font></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF" class="unnamed1"><br><strong><font color="#FF3300"><?php echo $CHANGE_PASSWORD; ?></font></strong><br><br>
                  <table width="530" border="0" cellpadding="0" cellspacing="1" class="unnamed1">
                    <tr> 
                      <td width="14" height="25" bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td width="29" bgcolor="#B8D3F8"><nobr><?php echo $OLD_PASSWORD; ?>：</nobr></td>
                      <td width="140" bgcolor="#DAE9FC"> 
                      <input name="oldpass2" type="password" size="20">                      </td>
                      <td width="342" bgcolor="#DAE9FC">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="25" bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td bgcolor="#B8D3F8"><nobr><?php echo $NEW_PASSWORD; ?>：</nobr></td>
                      <td bgcolor="#DAE9FC"><input name="newpass" type="password" size="20" onBlur='checkWritten();'></td>
                      <td bgcolor="#DAE9FC"><div id="blankPass" class="errorTip"><?php echo $ERROR_BLANKPASSWORD; ?></div></td>
                    </tr>
                    <tr>
                      <td height="25" bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td bgcolor="#B8D3F8"><nobr><?php echo $AGAIN_PASSWORD; ?>：</nobr></td>
                      <td bgcolor="#DAE9FC">
					  		<input onblur='checkPassword();' size="20"  type="password" name="validatepass" />
							<input type="hidden" name="oldpass3" value="<?php echo $logon_name; ?>" />
							<input type="hidden" name="flag" value="process_password_modify" />					  </td>
                      <td bgcolor="#DAE9FC"><div id="errorPass" class="errorTip"><?php echo $ERROR_PASSWORD; ?></div></td>
                    </tr>
                  </table>
                  <table width="50%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="checkSubmit()"></td>
                      <td><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="account.reset();"></td>
                    </tr>
                  </table>
                  <br> </td>
              </tr>
            </table>
		    </form>		
	  </td>
	</tr>
	<tr>
		<td colspan="2"><?php include "inc_footer.php"; ?></td>
	</tr>
</table>

</body>