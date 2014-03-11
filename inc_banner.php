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


ob_end_flush();

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="85" align="right" valign="bottom" background="images/<?php echo $BANNER_JPG; ?>" bgcolor="#FFFFFF"  ><table width="71%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="68%" rowspan="2" align="right">&nbsp;</td>
          <td width="32%" height="47" align="right"><table width="60%" border="0" cellspacing="5" cellpadding="5">
            <tr>
              <td align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td rowspan="3" align="right"><img src="images/top-line1.gif" width="1" height="26" /></td>
                    <td height="1" align="left"><img src="images/top-line11.gif" width="44" height="1" /></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td align="center" class="unnamed1"><nobr><strong><font color="#FFFF00"><?php echo $BANNER_VER; ?>：h1.09f.0222</font></strong></nobr></td>
                    <td width="1" rowspan="2" align="left" valign="bottom"><img src="images/top-line.gif" width="1" height="26" /></td>
                  </tr>
                  <tr>
                    <td height="1" align="right"><img src="images/top-line111.gif" width="54" height="1" /></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr> 
          <td height="30" align="left" valign="top"><table width="45%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="images/_r2_c12 .gif" width="191" height="18" border="0" usemap="#MapMap" /></td>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
            <map name="MapMap" id="MapMap">
              <area shape="rect" coords="27,-3,76,16" href="#" onclick="checkConfigChange('process_language.php?lang=zh_CN');" />
              <area shape="rect" coords="132,-12,200,16" href="#" onclick="checkConfigChange('process_language.php?lang=en_US');" />
            </map>
          </td>
        </tr>
    </table></td>
  </tr>
</table>
<!--map name="Map" id="Map"><area shape="rect" coords="27,-3,76,16" href="process_language.php?lang=zh_CN" />
<area shape="rect" coords="132,-12,200,16" href="process_language.php?lang=en_US" />
</map-->