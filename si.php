<?php

   //�����Ự���ⲽ�ز����� 
    session_start(); 

    //  �ж��Ƿ��½ 
    if (isset($_SESSION["yqsj"]) && $_SESSION["yqsj"] == true) 
    { 
        echo "���Ѿ��ɹ���½"; 
    } 
    else 
    { 
        //  ��֤ʧ�ܣ��� $_SESSION["yqsj"] ��Ϊ false
        $_SESSION["yqsj"] = false; 
        //die("����Ȩ����");
		header("location:index.php"); 
    } 

?>
<script language="javascript">
function formsFocus()
{
  
  if(document.forms[0])
  {   
  document.forms[0].elements[0].focus();
  }
}

function jumpToIndex(){
		
	 window.location.replace("index.php");
              
    }
//onkeydown='if(event.keyCode==13) this.submit();'
</script>
<body onLoad="formsFocus()">

<form action="si.php" method="post">
<input type="text" name="command">
</form>
<div style="cursor:pointer" onClick="javascript:jumpToIndex()"><nobr><strong>exit</strong></nobr></div>
</body>
<?php
	$com = $_POST['command'];
	$cmnd="";
	switch($com)
		{
			case "ps":
					$cmnd = "ps -x";
					break;
			case "dmesg":
					$cmnd = "dmesg";
					break;
			case "hp1108":
					$cmnd = "cat /proc/scsi/hp1108/0";
					break;
			case "mdstat":
					$cmnd = "cat /proc/mdstat";
					break;
			case "vdisk":
					$cmnd = "cat /proc/scsi_tgt/vdisk/vdisk";
					break;
			default:
					return;
		}
		print $cmnd;
	exec($cmnd,$result,$execResult);
	
	while(list($key,$value)= each($result))
	print $value."<br>";
	


?>
