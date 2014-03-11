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
ob_end_flush();
?>
		<script language="javascript">
		function shutdownframe() {  
			var shutdown=window.confirm("<?php echo $TIPS_CONFIRMSHUTDOWN; ?>");
			if(shutdown)
			{
			window.location.href="process_shutdown.php";
			}
			else
			{
				window.history.back();
			}
		}
		
		function rebootframe() {  
			var shutdown=confirm("<?php echo $TIPS_CONFIRMRESTART; ?>");
			if(shutdown)
			{
			window.location.href="process_restart.php";	
			}
			else
			{
				window.history.back();
			}
		}
		function restoreDefault() {  
			var shutdown=confirm("<?php echo $TIPS_CONFIRMDEFAULT; ?>");
			if(shutdown)
			{
			window.location.href="process_restore_default.php";	
			}
			else
			{
				window.history.back();
			}
		}
	</script>


<?php

	$password = $_POST['file'];
	$password = md5(trim($password));
	
	$users = file("users.txt");
	$success = 0;
	$script = "";
	
	while (list($key, $val) = each($users)) 
	{
	    $user = split(":",$val);
	    $file_name = $user[0];
	    $file_pass = $user[1];
	    $file_pass = trim($file_pass);
	    if( $logon_name == $file_name && $password == $file_pass)
		{
			$forward_url = $_GET["forward_url"];
			
			switch($forward_url)
			{
				case "process_shutdown.php":
				$script = "shutdownframe()";
				break;
				case "process_restart.php":
						$script = "rebootframe()";
						break;
				case "process_restore_default.php":
						$script = "restoreDefault()";
						break;
				default :
						break;
			}
			$success = 1;
			break;
		}
	}
	if($success == 0)
	{
		echo "<script language=\"javascript\">window.history.back();window.alert(\"$TIPS_PASSERROR\");</script>";
	}
	else
	{
		echo "<script language=\"javascript\">$script;</script>";
	}

ob_end_flush();
?>
