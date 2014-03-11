<?php
$logged = 0;
$logon_name  = "";
//启动会话，这步必不可少 
session_start(); 
if(isset($_SESSION['logged'])){
	$logged = $_SESSION['logged'];
	$logon_name = $_SESSION['logon_name'];
}

//根据menuX传过来的值，决定菜单时展开还是收缩
$menu = array("", "", "", "");
for($i=1; $i<6; $i++)
{
	if(is_null($_GET["menu$i"]))
	{
		$menu[$i-1] = "none";
	}
}

?>
<script language="javascript" src="script/admin1.js"></script>
<script language=javascript>
//added by gaobo 071004
var flagCheckRaidSubmit = '0';
function shouAbout(){
	window.showModalDialog("about.php?a="+Math.random(),"","dialogHeight:320px;dialogWidth:454px;help:no;scroll:no;status:no");
}


function displayMenu(name)
{
    if (name.style.display=="none") {
        name.style.display="";
    }
    else {
        name.style.display="none";
    }

}
//配置页面树形菜单结构发生改变后尚未提交，此时用户离开配置页面则给予提示 added by gaobo 071003(typeof .flagChangConfig) != "undefined"
function checkConfigChange(urls)
{
  if(window.tree)
  {   
    if(window.tree.flagChangConfig =='1')
	{
	var isToAbert = window.confirm("<?php echo $ITEM_CONF_CONFIRM ?>");
	    if(isToAbert == true)
	   {	  
		 window.location.href = urls;	
	   }
	   else
	   {
		return false;
	   }	
	}  
  } 
   //added by gaobo 071004
  if(flagCheckRaidSubmit =='2')
   {
	 alert("<?php echo $ITEM_SYSTEM_BUSY ?>");	 
	 return false;
	}
  window.location.href = urls ;
}

/* 显示About */
function dispAboutDiv(e)  
{
var showAboutTable = new Array();
showAboutTable.push('<table width="460" height="285" background="images/<?php echo $BG_IMAGE_ABOUT;?>">');
showAboutTable.push('<tr><td width="39" height="142">&nbsp;</td><td width="72">&nbsp;</td><td width="234">&nbsp;</td><td width="87">&nbsp;</td></tr>');
showAboutTable.push('<tr><td height="15">&nbsp;</td><td valign="top"><nobr><font color="#FFFFFF"><?php echo $BANNER_VER; ?>：h1.09f.0222</font></nobr></td><td>&nbsp;</td><td>&nbsp;</td></tr>');
showAboutTable.push('<tr><td height="75">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>');
showAboutTable.push('<tr><td height="42" colspan="3"><div style="height:40px;cursor:pointer" onClick="linkToWeb()"></div></td>');
showAboutTable.push('<td align="center" valign="bottom"><input name="apply" type="button" style="width:64px" value="<?php echo $BUTTON_OK; ?>" onClick="shutdownAboutDiv()"></td></tr></table>');
var showAboutString = showAboutTable.join("");
/* 获取用户窗口正中的坐标 */
var middleWindowWidth = document.body.clientWidth/2;
var middleWindowHeight = document.body.clientHeight/2;
var oShowAbout = document.getElementById("showAboutDiv");
oShowAbout.innerHTML = showAboutString;
oShowAbout.style.display="block";
oShowAbout.style.left=middleWindowWidth + document.body.scrollLeft - 230;
oShowAbout.style.top=middleWindowHeight + document.body.scrollTop -215 ;
}
function shutdownAboutDiv()
{
document.getElementById("showAboutDiv").style.display="none";
}
function linkToWeb()
{
window.location.href='http://www.histor.com.cn';
}
</script>



<table class="inc_menu_table" width="205" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="205" valign="top" background="images/_r14_c1.jpg"><table class="inc_menu_table" width="98%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="35" bgcolor="#FFFFFF"><table class="inc_menu_table" width="202" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="22"><img src="images/_r2_c10.jpg" width="22" height="44" /></td>
              <td width="160" background="images/0_r2_c3.jpg"><font color="#FFFFFF"><strong>
                <?php
					  	if($logged)
						{
							echo "$LOGON_AS:$logon_name ";
							echo "<a href='process_logout.php'  style=\"color:#FFFFFF\">&nbsp;&nbsp;<nobr><strong>$LOGOUT</strong></nobr></a>";
						}
					  ?>
              </strong></font></td>
              <td width="23"><img src="images/11_r2_c8.jpg" width="23" height="44" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table class="inc_menu_table" width="202" border="0"  cellpadding="0" cellspacing="0">
            <tr>
              <td width="22" align="left" valign="top" background="images/_r6_c1.jpg"><img src="images/_r3_c1.jpg" width="22" height="323" /></td>
              <td width="157"><table class="inc_menu_table" width="157" height="100%" border="0" cellpadding="0" cellspacing="0" background="images/bei.jpg">
                  <tr>
                    <td width="157" align="center" valign="top" bgcolor="#FFFFFF"><table class="inc_menu_table" width="85%" height="5" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                        </tr>
                      </table>
                        <table class="inc_menu_table" width="157" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="157"><table class="inc_menu_table" width="96%" border="0" cellspacing="0" cellpadding="0">
                                <?php 
					  	if($logged)  {
					   ?>
                                <tr>
                                  <td height="17"><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="32"><img src="images/r4_c2.jpg" width="32" height="29" /></td>
                                        <td width="115" background="images/_r4_c3.jpg" class="unnamed1"><a href="javaScript:void(0)" onclick="displayMenu(menu1)"><strong><font color="0066CC"><?php echo $ITEM_FILE ?></font></strong></a></td>
                                        <td width="15" background="images/_r4_c5.jpg" class="unnamed1">&nbsp;</td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td background="images/_r5_c2.jpg"><div id="menu1" style="display:<?php echo $menu[0]; ?>">
                                      <table class="inc_menu_table" width="100%"  border="0" cellspacing="5" cellpadding="0">
                                        <tr>
                                          <td height="1" bgcolor="#999999"></td>
                                        </tr>
                                        <tr>
                                          <td><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=index');"><?php echo $ITEM_CONFIG ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
										
                                        <!--tr>
                                          <td><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0" >
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=process_backup');"><?php echo $ITEM_BACKUP ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
										
                                        <tr>
                                          <td><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=restore');"><?php echo $ITEM_RESOTRE ?></a></font></td>
                                              </tr>											  
                                          </table></td>
                                        </tr-->
										
                                      </table>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="5"><img src="images/_r7_c2.jpg" width="157" height="11" /></td>
                                </tr>
                            </table></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td height="6"></td>
                          </tr>
                          <?php 
					  	if($logged)  {
					   ?>
                          <tr>
                            <td><table class="inc_menu_table" width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="17"><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="32"><img src="images/r4_c2.jpg" width="32" height="29" /></td>
                                        <td width="110" background="images/_r4_c3.jpg" class="unnamed1"><a href="javaScript:void(0)" onclick="displayMenu(menu2)"><strong><font color="0066CC"><?php echo $ITEM_SETTING ?></font></strong></a></td>
                                        <td width="15" background="images/_r4_c5.jpg" class="unnamed1">&nbsp;</td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td background="images/_r5_c2.jpg"><div id="menu2" style="display:<?php echo $menu[1] ?>">
                                      <table class="inc_menu_table" width="98%" border="0" cellspacing="5" cellpadding="1">
                                        <tr>
                                          <td height="1" bgcolor="#999999"></td>
                                        </tr>
                                        <tr>
                                          <td><table class="inc_menu_table" width="93%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td width="124" class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=network');"><?php echo $ITEM_NETWORK ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <?php
								//if($logon_name=='root')
								//{
								?>
                                        <tr>
                                          <td><table class="inc_menu_table" width="91%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td width="121" class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=account');"><?php echo $ITEM_ACCOUNT ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <?php // } ?>
                                      </table>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="5"><img src="images/_r7_c2.jpg" width="157" height="11" /></td>
                                </tr>
                            </table></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td height="6"></td>
                          </tr>
                          <?php
					if($logged)
					{
					?>
                          <tr>
                            <td><table class="inc_menu_table" width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="17"><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="32"><img src="images/r4_c2.jpg" width="32" height="29" /></td>
                                        <td width="110" background="images/_r4_c3.jpg" class="unnamed1"><a href="javaScript:void(0)" onclick="displayMenu(menu3)"><strong><font color="0066CC"><?php echo $ITEM_SYSTEM ?></font></strong></a></td>
                                        <td width="15" background="images/_r4_c5.jpg" class="unnamed1">&nbsp;</td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td background="images/_r5_c2.jpg"><div id="menu3" style="display:<?php echo $menu[2] ?>">
                                      <table class="inc_menu_table" width="95%" border="0" cellspacing="5" cellpadding="1">
                                        <tr>
                                          <td height="1" bgcolor="#999999"></td>
                                        </tr>
                                        <tr>
                                          <td><table class="inc_menu_table" width="91%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#"  onclick="checkConfigChange('control.php?url=monitor');"><?php echo $ITEM_MONITOR ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <!--readstat.php
								<tr> 
                                  <td><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                            <td width="18">&nbsp;</td> 
                                        <td class="unnamed1"><font color="#666666"><img src="images/dot.gif" width="14" height="11"><a href="control.php?url=readstat"><!--?php echo $ITEM_READSTAT ?></a></font></td>
                                      </tr>
                                    </table></td>
                                </tr>-->
                                        <!--分区管理
                                        <tr>
                                          <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="control.php?url=subRaid"><?php echo $ITEM_SUBRAID ?></a></font></td>
                                              </tr>
                                          </table></td>
                                        </tr>
                                        分区管理-->
                                        <tr>
                                          <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#"  onclick="checkConfigChange('control.php?url=process_shutdown');"><?php echo $ITEM_CLOSE ?></a></font></td><!-- onclick="shutdownframe()" -->
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=process_restart');"><?php echo $ITEM_RESTART ?></a></font></td><!--  onclick="rebootframe()"-->
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <?php
								if($logon_name=='root')
								{
								?>
                                        <tr>
                                          <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=process_restore_default');"><?php echo $ITEM_RESOTRE_DEFAULT ?></a></font></td><!-- onclick="restoreDefault()"-->
                                              </tr>
                                          </table></td>
                                        </tr>
                                        <?php  } ?>
                                        <tr>
                                          <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="18">&nbsp;</td>
                                                <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('control.php?url=operation_log');"><?php echo $ITEM_LOG ?></a></font></td> <!-- onclick="restoreDefault()"-->
                                              </tr>
                                          </table></td>
                                        </tr>
                                      </table>
                                  </div></td>
                                </tr>
                                <tr>
                                  <td height="5"><img src="images/_r7_c2.jpg" width="157" height="11" /></td>
                                </tr>
                            </table></td>
                          </tr>
                          <?php } ?><tr>
                            <td height="6"></td>
                          </tr>
                          <?php
					if($logged)
					{
					?>                       
                    <?php } ?>                          
                          <tr>
                            <td height="138" align="left" valign="top"><table class="inc_menu_table" width="96%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="17"><table class="inc_menu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="32"><img src="images/r4_c2.jpg" width="32" height="29" /></td>
                                      <td width="110" background="images/_r4_c3.jpg" class="unnamed1"><a href="javaScript:void(0)" onclick="displayMenu(menu4)"><strong><font color="0066CC"><?php echo $ITEM_HELP ?></font></strong></a></td>
                                      <td width="15" background="images/_r4_c5.jpg" class="unnamed1">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td background="images/_r5_c2.jpg"><div id="menu4" style="display:<?php echo $menu[3] ?>">
                                    <table class="inc_menu_table" width="92%" border="0" cellspacing="5" cellpadding="1">
                                      <tr>
                                        <td height="1" bgcolor="#999999"></td>
                                      </tr>
                                      <tr>
                                        <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="18">&nbsp;</td>
                                              <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('help.php?menu4=display');"><?php echo $ITEM_HELP ?></a></font></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <?php 
									if($logged)  {
								   ?>
                                      <tr>
                                        <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="18">&nbsp;</td>
                                              <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#" onclick="checkConfigChange('manual.php?menu4=display');"><?php echo $ITEM_MANUAL ?></a></font></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <?php } ?>
                                      <tr>
                                        <td><table class="inc_menu_table" width="90%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="18">&nbsp;</td>
                                              <td class="unnamed1"><font color="#666666"><img src="images/_r8_c3.jpg" width="25" height="19" /><a href="#"   onclick="dispAboutDiv(event);"><?php echo $ITEM_ABOUT ?></a></font></td><!---->
                                            </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                </div></td>
                              </tr>
                              <tr>
                                <td height="11"><img src="images/_r7_c2.jpg" width="157" height="11" /></td>
                              </tr>
                            </table></td>
                          </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table></td>
              <td width="23" align="left" valign="top" background="images/_r6_c8.jpg"><img src="images/_r3_c6.jpg" width="23" height="323" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="14" valign="bottom" background="images/_r14_c1.jpg"  bgcolor="#2B6FAC"><img src="images/_r16_c1.jpg" width="202" height="14" /></td>
  </tr>
</table>
<div id="showAboutDiv" style="position:absolute;display:none;overflow:visible;width:460px;height:285px;padding:6px;border-style:solid;border-width:1px;background:#FFFFFF;border-color:9DCDED">