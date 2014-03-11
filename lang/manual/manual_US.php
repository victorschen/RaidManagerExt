<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=gb2312">
<link rel="STYLESHEET" href="../../style/default.css" type="text/css">
<link href="css/1.css" rel="stylesheet" type="text/css">
<script language="javascript">
function showHistorCom()
{
window.top.location = "http://storage.hust.edu.cn";
}
</script>
</head>
<body style="position:relative;background-image:url(../../images/_r3_c9.jpg);left:45">
<br><br>
<table width="80%" border="0" cellspacing="0" cellpadding="0" style="position:absolute; text-align:center">
              <tr> 
                <td></td>
              </tr>
              <tr> 
                <td></td>
              </tr>
            </table> 
            <table width="90%" border="0" cellpadding="3" cellspacing="1" bgcolor="9DCDED">
              <tr> 
                <td height="28" background="../../images/top-111.gif" bgcolor="#437CD3" class="unnamed1"> 
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr> 
                      <td width="50"></td>
                      <td><strong><font color="#FFFFFF">用 户 手 册</font></strong></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center" bgcolor="#FFFFFF" class="unnamed1"><br>
                  <table width="90%" border="0" align="left" cellpadding="0" cellspacing="0" class="unnamed1">
                    <tr>
                      <td style=" padding-left:20;text-align: justify"> <font color="#0066FF"><strong>1. 磁盘阵列管理系统概况： </strong></font><br>
      本管理系统操作界面主要分为两个部分：左边的菜单栏和右边的信息操作区。<br />
      菜单栏分为四类：配置、系统、设置和帮助。它们主要用来完成对磁盘阵列、网络、用户和日志进行各种相关操作。信息操作区，随着用户点击不同的菜单，显示不同的信息。主要用来显示用户的操作信息，和为用户提供操作本系统的界面接口。 
                            <hr size="1">
                            <p><font color="#0066FF"><strong>2. 磁盘阵列管理系统功能详细介绍：</strong></font> 
                                            <br>
                                            <strong><font color="#0066FF">1)  
            配置菜单栏</font> </strong><br>
            <strong>I)  配置阵列 </strong><br>
       用来完成阵列的创建和删除。<br /> 
     创建阵列的步骤为：<br />
     单击窗口左边的菜单：“配置”―&gt;“配置阵列”；
                           勾选所要创建阵列用的磁盘左边对应的复选框，然后点击左下的“创建阵列”即可
    填充磁盘阵列配置信息
     单击“创建阵列”，然后配置阵列的相应属性。<br/>      
       (1). 选择raid“级别”<br />
       目前，系统支持raid0、raid1、raid5、raid10和raid50共5种raid级别，其中raid级别为raid1时，分块大小将不可用。<br />
       勾选添加磁盘时应注意：<br />
       raid level 0中,非热备份盘的数目必须大于等于2<br />
       raid level 1中,非热备份盘的数目必须等于2<br />
       raid level 5中,非热备份盘的数目必须大于等于3<br />
       raid level 10中,非热备份盘的数目必须为偶数且大于等于4<br />
	   raid level 50中，非热备份盘的数目必须为偶数且大于等于6<br />
	   (2). 选择分块大小<br />
       单击“分块大小”后边的下拉框，选择具体的分块大小。其单位为Kbyte。<br />
       (3) 设置磁盘别名<br />
       可以给新创建的阵列设置一个方便记忆的别名。这里的别名必须是字母、数字或下划线组成，在12字符以内。<br />
       (4). 填入允许访问磁盘阵列的客户端IP<br />                             此处设定的IP，其作用是：当磁盘阵列配置好后，只有IP地址是以上文本框中填入的IP地址的用户，才可以使用“Microsoft iSCSI  Initiator”使用此磁盘阵列；其它IP地址的用户，都不能使用此磁盘阵列。<br />
       具体格式为：Default-  或者 Default-IP-  IP- IP-或IP- IP- IP- 若允许访问的IP地址为：61.183.184.2、219.138.75.46和211.138.26.12的用户使用此磁盘阵列，则输入以下内容：61.183.184.2-219.138.75.46-211.138.26.12-则此时，只有以上3个IP地址可以访问此新创建的阵列.
                              若输入Default-则表明除了限定IP的主机以外的所有其他用户都可以使用此磁盘阵列，例如假设现共有阵列1和阵列2这两个阵列，阵列1的限定IP是61.183.184.2-219.138.75.46-211.138.26.12-，阵列2的限定IP是Default-211.138.26.12-，那么表明阵列2不能被61.183.184.2-219.138.75.46-这两个IP地址访问。
                              default组中的阵列只能被那些没有限定了IP的主机访问，如果一台主机被限定了IP那么他只能查看到被限定给他的那些阵列
                              例如：<br />       
                              现在创建了三个阵列RAID0，RAID1，RAID3，分别限定允许访问的IP为Defaut－192.168.0.55－，192.168.0.54－，Default，那么对于对应ip为55的主机他只能看到RAID0，54只能看到RAID1，其他的Ip主机只能看到RAID0和RAID3<br />
							  注：设定的允许访问IP的数量请尽量控制在10个以内。<br />
                       
                              (5).选择通道<br />
                              阵列上有2个网卡，网卡0为通道0，网卡1为通道1，当选择通道0时，只能通过网卡0访问；如选择两个通道，则两网卡皆可访问。
                              
                              以上五步进行完毕后，点击确定按钮即可创建阵列。<br />
                              删除阵列的步骤为：<br />
                              (1) 单击窗口左边的菜单：“配置”―>“配置阵列”；<br />
                              (2) 点击所要删除的阵列所在行的“删除阵列”按钮<br/>
                                                         <strong><font color="#0066FF">2)  
                                                           设置菜单栏</font> </strong><br />
                          <strong>I)  网络设置 </strong><br />
                              用来完成阵列网络信息的查询和设置。<br />
                              修改网络设置的步骤为：<br />
                              (1) 单击窗口左边的菜单：“设置”―&gt;“网络设置”；<br />
                              (2) 选择网络设置要被修改的网卡；<br />
                              (3) 修改网卡的IP地址，子网掩码和网关。<br />
                              (4) 单击“确定”，保存上边的修改。 <br />
  <strong>II)  账户管理</strong> <br />
                              完成用户的创建、删除和修改。
  <br />
                              创建账户的步骤为：<br />
                              (1) 单击窗口左边的菜单：“设置”―>“账户管理”；<br />
                              (2) 在“用户名”后，输入要创建的账户的名字；<br />
                              (3) 输入密码和密码确认；<br />
                              (4) 在“权限”下边，为此账户选择相应的权限；<br />
                              (5) 单击“确定”，保存上边的修改。
                              <strong><font color="#0066FF"><br />
                              3)  
                              系统菜单栏</font> </strong><br />
                          <strong>I)  监控阵列 </strong><br />
                              用来实时监控磁盘和阵列的状态，并显示它们的详细信息。<br />
                              磁盘状态的监控，由监控界面上的阵列面板图片来完成。若阵列面板上的磁盘状态正常，则界面中相应位置上的磁盘的黄灯会一闪一闪；若磁盘损坏，则红灯会一闪一闪，且磁盘也在不停的闪动。若要查看磁盘的详细信息，在磁盘图片的上边，单击左键，就会出现相应磁盘的详细信息。
  <br />
                              阵列状态的监控，由监控界面上阵列面板下面的表格来完成。若用户已经创建了磁盘阵列，则相应的阵列信息会在表格中显示；若没有创建阵列，则表格显示空白。在表格上单击左键可以看到阵列详细信息框，单击此信息框可以方便的将其关闭。 <br />
  <strong>II)  关闭阵列</strong> <br />
                              用来关闭磁盘阵列。<br />
                              关闭阵列的步骤为：<br />
                              (1) 单击窗口左边的菜单：“系统”―&gt;“关闭阵列”；<br />
                              (2) 输入登录密码，点击“确认”；<br />
                              (3) 密码输入正确后，系统会弹出一关闭阵列确认对话框，单击“确定”以关闭阵列。 <br />
  <strong>III)  重启阵列 </strong><br />
                              用来重启磁盘阵列。<br />
                              重启阵列的步骤为：<br />
                              (1) 单击窗口左边的菜单：“系统”―&gt;“重启阵列”；<br />
                              (2) 输入登录密码，点击“确认”；<br />
                              (3) 密码输入正确后，系统会弹出一重启阵列确认对话框，单击“确定”以重启阵列。 <br />
  <strong>IV)  恢复出厂设置</strong> <br />
                              当系统出现不可恢复错误时，系统管理员可将阵列恢复为出厂时的设置。注意：当系统恢复为出厂设置时，当前阵列的配置信息，系统已创建的账户，都将被删除掉；网络设置将恢复为出厂时的默认设置。请谨慎使用此操作！<br />
                              恢复出厂设置的步骤为：<br />
                              (1) 单击窗口左边的菜单：“系统”―&gt;“恢复出厂设置”；<br />
                              (2) 输入登录密码，点击“确认”；<br />
                              (3) 密码输入正确后，系统会弹出一确认对话框，单击“确定”以将阵列恢复为出厂设置。<br />
							  注：此操作在进行了自我诊断与恢复功能后、重启设备前无法使用。<br />			  
<strong>V)自我诊断与恢复</strong><br/>
当系统执行操作时（如创建阵列、设置热备盘时），十余分钟内始终提示“有其他用户在进行操作，请稍候”，而实际上确认并无其他用户在执行操作，则系统管理员可进行阵列的自我诊断与恢复。<br />
                              注意：进行此操作阵列别名、限定IP及通道的绑定信息可能会被初始化。请慎用此操作！<br />
                              1.进入自我诊断与恢复<br />
进入“磁盘阵列管理系统”后，单击窗口左边的菜单：“系统”―&gt;“自我诊断与恢复” <br />
2.输入密码<br />
在“密码”后边的文本框中，输入登陆密码。<br />
输入完成后，点击“确认”以进行自我诊断与恢复；点击“取消”以重新输入密码。<br />
3.操作确认<br />
当用户密码输入正确，且单击“确定”后，系统弹出一提示框。<br />
单击“确定”以进行自我诊断与恢复；单击“取消”以取消自我诊断与恢复操作。自我诊断与恢复操作完成后，重启前无法创建阵列、设置热备盘，并且不能进行恢复出厂设置。请在阵列空闲时间及时重启阵列<br />

                            <hr size="1">
                        <br>
                        <font color="#0066FF"><strong>3. **注意事项** </strong></font><br>
                        1)  在重启磁盘阵列时，用户必须要耐心等待一段时间，系统的重启是要花费时间的。 <br>
                       
                        2)  本用户手册只是对系统操作的简要说明，若要查看详细的系统操作信息和相关产品介绍，请参考随机附带的详细用户手册和登录网站：<a href="#" onClick="showHistorCom()">http://www.casic.com.cn</a>。<br></td>
                    </tr>
                  </table>
                  <br>
                <br> </td>
              </tr>
            </table>
            <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
            </table>
</body>
</html>
