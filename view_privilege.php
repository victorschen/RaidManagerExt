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

	$account_name = $_GET['user'];


	//得到用户的权限
	$user_password = file("users.txt");
	$privilege_in_file = "";
	
	while(list($key, $value) = each($user_password))
	{
		$user_pass = split(":", $value);
		$username_in_file = $user_pass[0];
		$password_in_file = trim($user_pass[1]);
		
		if($account_name==$username_in_file)
		{
			$privilege_in_file = trim($user_pass[2]);
			
			break;
		}
	}

	//判断用户是否具有所指定的权限
	function showCheckedByPrivilege($privilege_in_file, $pri)
	{
		if(($privilege_in_file=="") || (strpos($privilege_in_file, $pri)===false))
		{
			echo "";
		}
		else
		{
			echo "checked='checked'";
		}
	}
	
	
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
  	//added by gaobo 070930
	function returnFalse()
   {
      return false;
    }	  
</script>
</head>
<body onLoad="document.body.onselectstart = returnFalse;">

<table width="100%" height="100%" cellpadding="0" cellspacing="0" id="layout" >
	<tr>
		<td colspan="2" id="banner"><?php include "inc_banner.php"; ?></td>
	</tr>
	<tr>
		<td id="menu"><?php include "inc_menu.php"; ?></td>
		<td align="center" background="images/_r3_c9.jpg" id="main"><br>
		  <br>
			<form name="account" id="account" action="process_privilege_modify.php" method="post">
			<table width="80%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr> 
                <td height="28" background="images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50">&nbsp;</td>
                      <td><strong><font color="#FFFFFF"><?php echo $ACCOUNT_INFO; ?></font></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF"><br> 
                  <table width="80%" border="0" cellpadding="0" cellspacing="1" class="unnamed1">
                    <tr> 
                      <td width="5%" height="25" bgcolor="#B8D3F8"><img src="images/dot.gif" width="14" height="11"></td>
                      <td width="18%" bgcolor="#B8D3F8"><?php echo $ACCOUNT_NAME; ?>：</td>
                      <td width="77%" bgcolor="#DAE9FC"> 
                        <input name="userNames" type="text" size="20" value="<?php echo $account_name; ?>" disabled>
						<input name="userName" type="hidden" size="20" value="<?php echo $account_name; ?>" >                      </td>
                    </tr>
                  </table>
                <br> </td>
              </tr>
              <tr> 
                <td align="center" background="images/h2_bg01.gif" bgcolor="#437CD3" class="unnamed1"><strong><?php echo $PRIVILEGE_TITLE; ?></strong></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF" class="unnamed1"><strong><?php echo $PRIVILEGE_DISCRIPTION; ?></strong><br>
				<table width="98%" border="0" cellpadding="5" cellspacing="0" class="unnamed1">
                          <tr> 
                            <td><input type="checkbox" name="privilege[]" value="Configuration" <?php showCheckedByPrivilege($privilege_in_file, 'a') ?> >
						            <?php echo $ITEM_CONFIG ?></td>
                            
                            <td><input type="checkbox" name="privilege[]" value="Network" <?php showCheckedByPrivilege($privilege_in_file, 'd') ?>>
						            <?php echo $ITEM_NETWORK ?> </td>
							<td><input type="checkbox" name="privilege[]" value="Shut down" <?php showCheckedByPrivilege($privilege_in_file, 'g') ?>>
						            <?php echo $ITEM_CLOSE ?></td>
                            <td><input type="checkbox" name="privilege[]" value="Restart" <?php showCheckedByPrivilege($privilege_in_file, 'h') ?>>
						            <?php echo $ITEM_RESTART ?></td>
                          </tr>
                          <tr> 
                            <td><input type="checkbox" name="privilege[]" value="Log" <?php showCheckedByPrivilege($privilege_in_file, 'j') ?>>
						            <?php echo $ITEM_LOG ?> </td>
                            <td><input type="checkbox" name="privilege[]" value="Monitor" <?php showCheckedByPrivilege($privilege_in_file, 'f') ?>>
						            <?php echo $ITEM_MONITOR ?></td>
                            
							<!--td><input type="checkbox" name="privilege[]" value="Backup" <?php showCheckedByPrivilege($privilege_in_file, 'b') ?>>
						            <?php echo $ITEM_BACKUP ?></td>
                            <td><input type="checkbox" name="privilege[]" value="Restore" <?php showCheckedByPrivilege($privilege_in_file, 'c') ?>>
						            <?php echo $ITEM_RESOTRE ?> </td-->
                          </tr>
                  </table>
						<br>
						<table width="50%" border="0" cellspacing="0" cellpadding="5">
                    <tr> 
                      <td align="center"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="{if(confirm('<?php echo $CONFIRM_MODIFY_PRI; ?>')){account.submit()}return false;}"></td>
                      <td><input name="cancel" type="button" style="width:64px" value="<?php echo $BUTTON_CANCEL; ?>" onClick="javascript:history.go(-1);"></td>
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
</html>