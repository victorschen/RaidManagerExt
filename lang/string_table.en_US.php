<?php	

	//language: English (United States)
	//All string tables are based on string_table.zh_CN.php, make sure this file as all various in that file.
	
	//Global Various:
	$PRODUCT_NAME		= "RAID Management System";
	$COPYRIGHT   		= "&copy; Copyright ";
	$FIRM_NAME			= "hust storage";
	$VERSION_NAME		= "Version";
	$VERSION			= "1.1";
	$BUILD_DATE			= "Nov 01, 2008";
    $AUTHOR             = "HustStorage";
	$BANNER_IMAGE       = "images/en_US/banner.gif";
	$CHARSET            = "gb2312";
	
	
	
	//EXAMPLE:
	//IN PAGE: index.php

	$STYLE_NAME[1]		= "Default";
	$STYLE_FILE[1]      = "default";
	$STYLE_NAME[2]		= "Blue";
	$STYLE_FILE[2]      = "blue";

	//IN PAGE: inc_menu.php	
	$LOGON				= "Logon";
	$USERNAME			= "Username";
	$PASSWORD			= "Password";
	$LOGON_AS			= "Logged as";
	$SUBMIT				= "Submit";
	$LOGOUT				= "Logout";
	$LOGON_SUCCESS		= "Success! Redirecting, wait for 2 seconds";
	$LOGON_FAILURE		= "Wrong Username or password, access denied.";
	$LOGGED_OUT			= "Logged out, Redirecting.";
	
	$ITEM_FILE			= "Configuration";
	$ITEM_CONFIG		= "Raid configuration";
	$ITEM_BACKUP		= "Configuration backup";
	$ITEM_RESOTRE		= "Configuration restore";
	$ITEM_SYSTEM		= "System";
	$ITEM_CLOSE			= "Shut down";
	$ITEM_RESTART		= "Restart";
	$ITEM_SETTING		= "Settings";
	$ITEM_NETWORK		= "Network";
	$ITEM_ACCOUNT		= "Account";
	$ITEM_STYLE			= "Regions & Styles";
	$ITEM_HELP			= "Help";
	$ITEM_ABOUT			= "About";
	$ITEM_RESOTRE_DEFAULT	= "Restore default";
	$ITEM_MONITOR			="Monitor";
	$ITEM_LOG			= "Operation log";
	$ITEM_READSTAT      = "RaidStat";
	$ITEM_SAFEMODE      = "Safe mode";  
	//added by gaobo 071003
	$ITEM_CONF_CONFIRM  = "Raid configuration has been changed,abert the changes and leave?";
	//added by gaobo 071004
	$ITEM_SYSTEM_BUSY   = "System busy,please wait!";
	
	//added by gaobo
	$ITEM_SUBRAID       = "Partition";
		
	//IN PAGE:  language.php
	$LANGUAGE_SETTINGS  = "Language & Styles";
	$LANGUAGE_COMMENT   = "'". $PRODUCT_NAME . "' can display many languages and styles, that fit for many people of regions ";
	$SELECT_LANGUAGE	= "please select the language that '". $PRODUCT_NAME ."' display.";
	$SELECT_STYLE		= "Please select stytle:";
	$BUTTON_OK			= "Ok";
	$BUTTON_CANCEL		= "Cancel";
	$LANGUAGE_CHANGED_1	= "Congratulations! default language  of ".$PRODUCT_NAME."is set to";
	$LANGUAGE_CHANGED_2	= "next time ". $PRODUCT_NAME ."will display this language as default";

	//IN PAGE: raid_properties.php
	$COLLAPSE			= "Collapse";
	$EXTRACT			= "Extract";
	$SELECT_NODE		= "Select a node to show detials.";
	$RAID_OPTION		= "Options";
    $RAID_OPTION1		= "Options1";
	$RAID_SAVE			= "Configuration";
	$RAID_SAVE1			= "Configuration1";
	$RAID_REBUILD		= "Rebuild";
	$SAVE_CONFIG		= "Save";
	$SUBMIT_CONFIG		= "Submit";
	$SAVE_MESSAGES		= "Please click the submit button, and then wait a moment";
	$PROPERTIES_TITLE	= "Configuration and properties";	
	
	$PROPERTIES_DISKNUM	= "disk number";
	$PROPERTIES_RAIDNUM	= "raid number";
	//add by zhouzhou 2007-08-25
	$PROPERTIES_GLOBALDISKNUM = "gSpareDisk number";	
	
	//zjf modify
	$PROPERTIES_SINGERRAIDNUM	= "single raid number";
	$PROPERTIES_MULTYRAIDNUM	= "multy raid number";	
	
	
	$PROPERTIES_TYPE	= "Type";
	$PROPERTIES_STATUS	= "Status";
	$PROPERTIES_SN		= "SN";
	$PROPERTIES_VENDOR	= "Vendor";
	$PROPERTIES_CAPACITY	= "Capacity";
	$PROPERTIES_ISSPAREDISK	= "IsSpareDisk";
	$PROPERTIES_SCSIID	= "scsiID";
	$PROPERTIES_STATUS_OK	= "Well";
	$PROPERTIES_STATUS_BAD	= "Damage";
	$PROPERTIES_INDEX	= "Index";
	$PROPERTIES_LEVEL	= "Level";
	$PROPERTIES_CHUNK	= "Chunk";
	$PROPERTIES_RAIDSTAT	= "Status";
	$PROPERTIES_RAIDCAP	= "Capacity";
	$PROPERTIES_MAPPINGNO	= "MappingNo.";
	$PROPERTIES_RAIDDISKNUM	= "Disk No.";
	$PROPERTIES_SPAREDISKNUM	= "SpareDisk No.";
	$PROPERTIES_POPEDOM	= "Popedom";
	//added by gaobo 071003
	$DEL_CREATE_ALERT	 = "The raid being created include the disk which in the raid just now has been deleted!Please try again!";
	//for the FireFox! added by gaobo 071101
	$OPERATION_FF    	 = "Operation";
	$DELETE_RAID_FF	     = "Delete raid";
	$CLICK_HERE_FF       = "Click here";
	$DISK_DETAIL         = "Disk detail";
	$RAID_DETAIL         = "Configuration and properties";
	$RAID_ALERT_FF_1     = "Please select the disk!";
	$RAID_ALERT_FF_2     = "In order to create the raid need least 2 disks！";
	$ADD_SPAREDISK       = "Add sparedisk";
	$ADD_SPAREDISK_ALERT = "Please set the sparedisks before add sparedisk！";
	$RESCAN_DEVICE       = "Rescan device";
	$MODIFY_RAID         = "Modify raid ";
	$ALIAS               = "Alias";
	$NEW_ALIAS           = "New alias";
	$RAID_ALIAS          = "Raid alias";
	$RAID_ALERT_3WARE1   = "Add a spare disk to a raid is not permision！";
	$SET_SPARE           = "Set spare";
	$UNSET_SPARE         = "Unset spare";
	$BOXSELECTALL        = "All";
	$BINDINGIP           = "Binding IP";
	$SELECTBINDINGIP     = "Select binding IP";
	$BINDINGMSG          = "Binding info";
	$BINDCHANNAL         = "Channal";
	$CLICKMODIFY         = "Click modify";
    $ALIAS_ALERT         = "Raid alias consists by small letters,numbers or _";
	$RAIDERRORALERT      = "Some raid error!Please delete them before create a new one!";
	$ALERTSAFEMODE1      = "Raid is running in safemode,can not create raid or set spare disk,please chose time to restart the device in order to exit the safe mode！";
	
	//IN PAGE: insertUpdate.xslt.php,added by zhouzhou 2007-07-31
	$PROPERTIES_ISHOTDISK          = "Sparedisk";
	$PROPERTIES_NOT_ISSPAREDISK    = "No";
	$PROPERTIES_LOCAL_ISSPAREDISK  = "Local";
	$PROPERTIES_GLOBAL_ISSPAREDISK = "Global";
	
	//IN PAGE: system_messages.php
	$LOG_MESSAGE		= "Raid monitor";
	$LOG_LEVEL			= "Level";
	$LOG_DATE			= "Date";
	$LOG_TIME			= "Time";
	$LOG_EVENT			= "Log";
	//added by gaobo 071010 已有其他用户提交了配置阵列的信息！阵列结构发生了改变，页面将同步进行更新
	$LOG_ISSUBMIT_ALERT = "Someone else submited the raid configuration！Raid configuration is changed,the page is going to reload!";
	
	//IN FILE: style/*.php
	
	$INSERT				= "Insert";
	$UPDATE				= "Update";
	$REFRESH			= "Refresh";
	$DELETE				= "Delete";
	$INSERT_SUBRAID		= "Insert Subraid";
	$INSERT_RAID		= "Insert raid";
	
	
	
	//zjf modify
	$INSERT_SINGLE_RAID  = "create single raid";
	$INSERT_MULTY_RAID  = "create multy raid";
	
	//zjf modify
	$RAID				= "Raid ";
	//$SINGLE_RAID		= "singleRaid ";
	//$MULTY_RAID			= "multyRaid";
	
	$SUBRAID			= "Subraid ";
	$RACK				= "Rack";
	$DISK				= "Disk";
	$ATTRIBUTE_NAME		= "Attributes";
	$ATTRIBUTE_VALUE	= "Values";
	$RACK_ATTRIBUTE		= "Rack Attributes";
	
	//zjf modify
	$RAID_ATTRIBUTE		= "Create New Raid";
	
	
	$SUBRAID_ATTRIBUTE	= "Subraid Attributes";
	$DISK_ATTRIBUTE		= "Disk Attributes";
	$SAVE				= "Save";
	$CANCEL				= "Cancel";
	$INSERT_POPEDOM     = "Insert popedom";
	
	//IN PAGE:	network.php
	$ETHERNET_SELECT	= "Ethernet card";	
	$ETHERNET0			= "Eth0";
	$ETHERNET1			= "Eth1";
	$BOND_SELECT		= "Binding select&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$BONDING			= "Binding";
	$UNBONDING			= "Unbinding";
	$IP_ADDRESS			= "IP Address";
	$SUBNET_MASK		= "Subnet Mask";
	$GATEWAY			= "Gateway";
	$NETTIP				= "Warning:RAID will be restarted if the network changer from binding to unbinding";
	$DNS_SERVER[0]		= "DNS 1";
	$DNS_SERVER[1]		= "DNS 2";
	$DNS_SERVER[2]		= "DNS 3";
	$ERROR_IP_ADDRESS	= "Address is invalid.";
	$ERROR_NETMASK		= "Subnet Mask is invalid.";
	$ERROR_GATEWAY		= "Default Gateway is invalid.";
	$ERROR_DNS			= "DNS Address is invalid";
	$ERROR_DNS_LEAST	= "You must input at least 1 dns address";
	$CHECK_ERRORS		= "Your settings have errors, please correct them.";
	$NETWORK_SETTINGS	= "Network Settings";
	$NETWORK_TITLE		= "Your current network settings are as follows:";
	$ERROR_ETHERNET		= "You must select one of the two ethernet cards.";
	
	$ERROR_DETIAL_1		= "Your IP Address is invalid, IP is like xxx.xxx.xxx.xxx, e.g. 192.168.0.127";
	$ERROR_DETIAL_2		= "Your Subnet Mask is invalid, it should like xxx.xxx.xxx.xxx, e.g. 255.255.255.0";
	$ERROR_DETIAL_3		= "Your Default Getway is invalid, it should like xxx.xxx.xxx.xxx, e.g. 192.168.0.1";
	$ERROR_DETIAL_4		= "Your DNS Server is invalid, it should like xxx.xxx.xxx.xxx, e.g. 202.13.3.24";

	$ERROR_DRAG_DISK	= "Error, Disk cannot be the son of another disk.";
	
	$ERROR_DRAG_DISK_UNDER_SINGLE	= "Error,cannot remove a disk in raid ";
	
	$ERROR_DRAG_SINGLE_UNDER_MULTY	= "Error,cannot remove single raid in multy raid, if you want,please delete the multy raid";
	$ERROR_ADD_SINGLE_UNDER_MULTY	= "Error,only the RAID5 can be add in the RAID50, and it's same for RAID60";
	
	//zjf modify
	$ERROR_DRAG_SINGLE	="Error,single raid cann't be the member of other single raid or disk";
	$ERROR_DRAG_GLOBAL_HOTDISK = "Warning, Global hot spare disk cannot be the member of another disk and of any array.";
	//added by zhouzhou 2007-08-09
	$ERROR_ADD_DISK_UNDER_MULTY = "Error,Disk cannot be the member of MultiRaid.Please add the disk to the SingleRaid first.";
	$ERROR_ADD_DISK_UNDER_SINGLERAID= "Error,Cann't add hot spare disk to the RAID0";
	// process_account_modify.php
	$MODIFY_SUCCESS			= "Success！";
	$MODIFY_FAIL			= "Failure, please try agaign！";
	
	//account.php
	$ACCOUNT_SETTINGS	= "Account settings";
	$ADD_ACCOUNT		= "Add account:";
	$MANAGE_ACCOUNT		= "Manage account:";
	$ACCOUNT_NAME		= "Account name";
	$DELETE_ACCOUNT		= "Delete account";
	$MODIFY_ACCOUNT		= "Modify account";
	$ROOT				= "Manager";
	$MODIFY				= "Modify";
	$IS_DELETE_ACCOUNT	= "Are you sure to delete the account?";
	$ACCOUNT_INFO		= "Account information";
	$OLD_PASSWORD		= "Old password";
	$NEW_PASSWORD		= "New password";
	$AGAIN_PASSWORD		= "New password again";
	$CHANGE_PASSWORD	= "Please input the old password at first!";
	$ERROR_BLANKPASSWORD	= "Please write down the new password!";
	$ERROR_PASSWORD		= "You two input is differ!";
	$PRIVILEGE			= "Privilege";
	$MODIFY_PRIVILEGE	= "Modify privilege";
	$ACCOUNT_PASSWORD_CONFIRM	= "Password confirm";
    //added by gaobo 070917
	$CONFIRM_MODIFY_PASS	= "Are you sure to modify the password?";
   	//2007-07-31 $FORMAT_USERNAME和$ERROR_ACCOUNT_PASSWORD两个变量added by zhouzhou
	$ERROR_USERNAME     = "Username format error.Legal one like:super123";
	$FORMAT_USERNAME    = "The first must be letter and less than 12 letters";	 
	$FORMAT_PASSWORD	= "The password consists by letters,numbers or _";   
	$ERROR_ACCOUNT_PASSWORD = "The length is 4~16,or unexpected password format.";  
	//$FORMAT_USERNAME    = "用户名由字母、数字和下划线组成!";
	//$ERROR_ACCOUNT_PASSWORD = "密码位数应大于4位,或者密码格式错误";   
	//2007-07-31 $FORMAT_USERNAME和$ERROR_ACCOUNT_PASSWORD两个变量added by zhouzhou
	$ERROR_EMPTY_USERNAME   = "You entered an empty username,which is not allowed.";
	$ERROR_EMPTY_PASSWORD   = "You entered an empty password,which is not allowed.";
	$ERROR_EMPTY_CONFIRMPASSWORD = "You entered an empty confirm password,which is not allowed.";
	$ERROR_EQUAL_PASSWORD = "You two input is differ!";
	$ACCOUNT_ADD_MESSAGE = "Add account message";
	
	//process_account_add.php  added by zhouzhou 2007-07-31
	//$ACCOUNT_ADD_FAILURE	= "Account added failure!";
	//$ACCOUNT_ADD_SUCCESS	= "Account added successed!";
	$ACCOUNT_ADD_FAILURE	= "This user has already existed!Account added failure!";
	$ACCOUNT_ADD_SUCCESS	= "Add account successed! You can use this account to login now...";

	//actions.php
	//$ACTIONS['rebuild']		= "阵列重建已执行，请等待重建完毕。";
	//$ACTIONS['restart']		= "阵列正在重新启动。片刻后即可使用";
	//$ACTIONS['shutdown']	= "阵列已关闭完毕。";
	//$ACTIONS['restore']		= "阵列配置文件已恢复，请等待程序执行完毕。";
	
	//about.php   added by zhouzhou 2007-07-31 15:04
	$ABOUT					= "About" . $PRODUCT_NAME;
	$CLOSE					= "Close";
	//added by gaobo 070918
	$BG_IMAGE_ABOUT			= "about_en.jpg";
	
	//monitor.php
	$MONITOR_DISK			="Disk";
	$MONITOR_DISK_NORMAL	="Yellow flag: Normal";
	$MONITOR_DISK_BROKEN	="Red flag: Bad";
	$MONITOR_DISK_NULL		="Null";
	$MONITOR_SYSTEM_STATUS	="Monitor system status";
	$MONITOR_DESCRIPTION	="Notice：";
	$ITEM_MANUAL            = "Manual";
	//added by zhouzhou 2007-07-31 15:11
	$MONITOR_DISPLAY_DISKDETAIL = "Click here to display the disk details.";
	//added by gaobo 070924
	$MONITOR_ALERT_LOG_A	="The Operation logs length is nearly";
	$MONITOR_ALERT_LOG_B	=",if it is over 1500,the logs at the beginning will be covered!Please backup in time!";
	//added by gaobo 071004 "警告！系统监测到配置信息出错！请立刻用正确的配置备份文件恢复配置"
	$MONITOR_RAIDCONF_ERROR ="Alert!Raid configuration error!Please restore the backup right now!";
	
	//gaobo modify
	//subRaid.php
	$SUBRAID_CONFIG         ="Partition Config";
	$SUBRAID_DETAIL         ="Partition detail";
	$SUBRAID_TABLE          ="Partition structure map";
	$TIP_SUBMIT             ="If you are sure to use the config of the partition sketch map above,please press the submit button.";
	
	//mappingDetail.xslt.php
	$SUBRAID_DEVNAME         ="SerialNo.";
	$SUBRAID_BEGINSECTOR     ="BeginSector";
	$SUBRAID_ENDSECTOR       ="EndSector";
	$SUBRAID_CAPACITY        ="Capacity";
	$SUBRAID_ENCRYPTLEVEL    ="EncryptLevel";
	$SUBRAID_READUSERGROUP   ="ReadUserGroup";
	$SUBRAID_WRITEUSERGROUP  ="WriteUserGroup";
	$SUBRAID_DESCRIPTION     ="Description";
	
	//mappingTable.xslt.php
	$SUBRAID_RAIDNUMBER      ="RaidSerialNo.";
	$SUBRAID_INFO            ="Partition Information";
	$SUBRAID_UNASSIGNED      ="Unassigned";
	$ModifyPartition         ="contextDelModify_EN.xml";
	$AddPartition            ="contextAdd_EN.xml";
	
	//createUpdate.xslt.php
	$ENCRYPT                 ="Password";
	$NOENCRYPT               ="NoEncrypt";
	$ITEM                    ="Item";
	$ITEM_VALUE              ="Item value";
	
	//checkFormat.js.php
	$FORMAT_CAPACITY        ="Partition capacity format error,please try again!";
	$FORMAT_ENCRYPT         ="You entered an empty password,which is not allowed!";
	$FORMAT_IP              ="IP format error,please try again!";
	$TIP_CAPACITY           ="Tips: the format is the natural number which > 1";
	$TIP_IP                 ="Tips: the format is Default-or 192.168.0.1-192.168.0.3-";
	$TIP_DESCRIPTION        ="Tips: make a discription for the partition，such as movies";
	$TIP_ENCRYPTLEVEL       ="Tips: Select a level, you can not input the password when you selected NoEncrypt";
	$TIP_ENCRYPT            ="Tips: the password can not be changed,so remember it carefully";
	$RAIDSTATALERT         ="Alert!There is raid damaged!Please delete the red partition and turn to the Raid configuration page to do something advanced.";
	$MAPPINGALERT           ="Sorry,partition mapping failed!Please try again!";	
	//gaobo modify
	
	//process_backup.php added by gaobo 070827
	$BACKUP_TIPS            ="Now backuping,please wait...";
	$BACKUP_TIPS_ERROR      ="Sorry,backup failed,please try again";
	
	//manual.php
	$MANUAL_html				= "lang/manual/manual_US.php";
	
	//help.php
	$HELP_html				= "lang/help/help_US.html";
	
		//monitor_disk_infor.php
	$MONITOR_ID				= "scsiID";
	$MONITOR_TYPE			= "Type";
	$MONITOR_STATUS			= "Status";
	$MONITOR_SN				= "Sn";
	$MONITOR_VENDOR			= "Vendor";
	$MONITOR_CAPACITY		= "Capacity";
	$MONITOR_SPAREDISK		= "IsSpareDisk";
	//added by zhouzhou 2007-07-31 14:36
	$MONITOR_DETAIL         = "Details";
	$MONITOR_DRAWORBAD_DISK = "Disk had pulled out or damaged.";
	$MONITOR_DISK           = "DISK";
	//added by gaobo 070924
	$MONITOR_CONFIRM        = "Confirm";
	$MONITOR_ERROR_TIPS     = "Disk is pull out or failure";       
	$MONITOR_CLOSE          = "Close";
	
	//confirm_shutdown.php
	$SHUTDOWN_PASSWORD		= "Password:  ";
	$SHUTDOWN_NOTICE		= "Notice:  ";
	$SHUTDOWN_TITLE			= "Shut down";
	$RESTART_TITLE			= "Restart";
	$RESTART_DEFAULT_TITLE	= "Restart default";
    $SAFEMODE_TITLE         = "Enter safemode";
	$SHUTDOWN_DESCRIPTION	= "The raid will be shut down!";
	$RESTART_DESCRIPTION	= "The raid will be restarted!";
	$RESTART_DEFAULT_DESCRIPTION	= "The raid will be restore default!";
	$SAFEMODE_DESCRIPTION ="Run the safemode，the description,popedom and binding channal may be restore default！";
	//added by zhouzhou 2007-08-01
	$CONFIRM_PASSWORD       = "Please input the password！";
	$AFTER_ISSAFEMODE_ALERT = "Now is in the safemode,please restart first!";
	
	//process_confirm_shutdown.php  added by zhouzhou 2007-08-01
	$CONFIRM_CLOSE_RAID     = "Are you sure to shut down the raid？";
	$CONFIRM_RESTART_RAID   = "Are you sure to restart the raid?";
	$CONFIRM_RESTORE_DEFAULT = "Are you sure to restore the default configuration？";
	$CONFIRM_WRONG_PASSWORD  = "Wrong Password！";
	
	//login.php
	$MESSAGE_LOWER			= "Invalid Username or password.Please try again.";
	$MESSAGE_GREATER		= "you have exceeded the input number limit, please contact with the administrator or try again after 24 hours";
	$MESSAGE_HELP			= "";  //Please login
	$MESSAGE_OTHER			= "";  //Please login
	//added by gaobo 070917 非翻译，切换中英文按钮用
	$BUTTEN_LOGIN			= "login.gif";
	$BUTTEN_RESET			= "reset.gif";
	//added by gaobo 071012 请使用IE浏览器于1024*768下浏览以取得最佳效果
	$FOOT_TIPS   			= "Please use IE6.0 FireFox2.0 to browse the 1024 * 768 to achieve the best results";
	
	//watchLog.php
	$LOG_TITLE				= "User log";
	$LOG_USER				= "User";
	$LOG_TIME				= "Time";
	$LOG_RECORD				= "Log";
	$SHUTDOWN_LOG			= "Close raid";
	$RESTART_LOG			= "Restart raid";
	$RESTART_DEFAULT_LOG	= "Restore default";
	$RESTORE_LOG			= "Restore";
	$NETWORK_LOG			= "Modify network configuration";
	$ACCOUNT_ADD_LOG		= "Add account：";
	$ACCOUNT_MODIFY_LOG		= "The password has been  modified successfully:";
	$ACCOUNT_MODIFY_ERROR_LOG			= "The password have not been modified successfully:";
	$ACCOUNT_DELETE_LOG		= "Delete the account：";
	$BACKUP_LOG				= "Backup the configuration";
	$LOGON_LOG				= "Logon";
	$LOGON_ERROR_LOG1		= "Following IP has exceeded its fault number";
	$LOGON_ERROR_LOG2		= " password error：";
	$LOGON_ERROR2_LOG		= "Ip has been forbidden ：";
	$LOGOUT_LOG				= "Logout";
	$CONFIGURATION_LOG		= "Modify the raid configuration";
	$PRIVILEGE_MODIFY_LOG	= "Modify the privilege：";
	$BACKUP_LOG_LOG			= "Backup the operation log";
	//added by gaobo 070917
	$LOGBACKUP              ="Log backup";
	$TIPS_ENTERNUM          ="The page No. must be Number!";
	$PAGENUM                ="Page";  //这里不是字面翻译
	$PAGE                   ="";      //为了显示效果专门留空
	$TOTELPAGE              ="Totel";
	$FIRSTPAGE              ="First page";
	$PAGEUP                 ="Page up";
	$PAGEDOWN               ="Page down";
	$LASTPAGE               ="End page";
	$TURNTO                 ="Turn to";
	$YES                    ="Yes";
	$NO                     ="No";
	//071219
	$BACKUP_ALERT           ="Once confirm backup Log，the early logs will be deleted even cancel download，are you sure to backup？";
	
	//view_privilege.php
	$PRIVILEGE_TITLE		= "Modify privilege";
	//added by gaobo 070917
	$PRIVILEGE_DISCRIPTION	= "The marked blocks means the user owned the privileges";    
	$CONFIRM_MODIFY_PRI 	= "Are you sure to modify the privilege?";
	
	//monitor.js.php
	$MONITOR_JS_TITLE		= "Raid Monitor";
	$MONITOR_JS_NO			= "Number";
	$MONITOR_JS_LEVEL		= "Level";
	$MONITOR_JS_STATUS		= "Status";
	$MONITOR_JS_CAPACITY	= "Capacity";
	$MONITOR_JS_LEFT_TIEM	= "Surplus time";
	$MONITOR_JS_SPEED		= "Speed";
	$MONITOR_JS_PERCENT		= "Percent";
	$MONITOR_JS_PICTURE		= "Process";
	$MONITOR_JS_NORMAL		= "Normal";
	$MONITOR_JS_RECOVERY	= "Recovery  ";
	$MONITOR_JS_RESYNC		= "Resync ";
	$MONITOR_JS_ERROR		= "Error ";
	$MONITOR_JS_DEGRADE		= "Degraded ";
	$MONITOR_JS_UNKNOW		= "Unknown";
	//added by gaobo 070924
	$FOR_HTTPREQUEST		= "Can not create XMLHttpRequest object.";
	$TIPS_DISK_INFO_IMAGE   = "Disk detail";
		//added by gaobo 071005
	$MONITOR_RAID_ATTRI     = "Raid Attribute";
	$MONITOR_DEVNAME        = "Device Name";
	$MONITOR_ISCISI_ID      = "iSCSI ID";	
	
	//failure.php
	$FAILURE_TITLE			= "Privilege error";
	$FAILURE_NO_PRIVILEGE	= "You have no privilege to do this, please contact with administrator!";
	//admin1.js.php
	$MESSAGE_REMOVE_ARRAY = "You should not remove the array ,when it consists of disks.";
    $MESSAGE_DELETE_GOOD_DISK = "You should not delete the good disk.";
	$MESSAGE_DELETE_SINGLERAID_FROMMULTIRAID = "Cannot delete SingleRaid from the MultiRaid.";	
	
	//restore.php   added by zhouzhou 2007-07-31
	$RESTORE_FILENAME       = "Filename:";
	$RESTORE_CONFIGURATION  = "Restore Configuration";
	$RESTORE_EXPLANATION    = "Click \"browse\" and select the configuration 
information backuped,  raid will back to that previous state.  ";
    $RESTORE_UPLOAD         = "Browse...";
	$RESTORE_SAVED_CONFIGURATION  = "Please select the location of the configurable file.";
	//added by gaobo 071004
	$RESTORE_UPLOAD_CONF_A = "Are you sure to upload the file";
	$RESTORE_UPLOAD_CONF_B = "？";
	
    //added by gaobo 070914
		//tree.js.php
	$ERROR_DRAG_DISK_STOS   = "The disk in a singleRaid can not be drag to another singleRaid!";
	$ERROR_DRAG_DISK_STOD   = "A disk can not drag out from a running raid !"; //gaobo 070917
	$ERROR_DRAG_DISK_DTOR   = "A data disk can not drag in a running raid !"; //gaobo 070918
		//contexLUN.php
	$TIPS_DELRAID           ="Are you sure to delete the raid?";
		//confirm_shutdown.php
	$TIPS_ENTERPASSWORD     ="Please enter the password！";
	//added by gaobo 070914
	
	//added by gaobo 070917
		//process_confirm_shutdown.php 
	$TIPS_CONFIRMSHUTDOWN   ="Are you sure to shutdown the raid?";
	$TIPS_CONFIRMRESTART    ="Are you sure to restart the raid?";
	$TIPS_CONFIRMDEFAULT    ="Are you sure to restore all of the configuration to default?";
	$TIPS_CONFIRSAFEMODE    ="Are you sure to run the raid in safemode？";
	$TIPS_PASSERROR         ="Password error！";

    
	//raid_properties.js.php added by gaobo 070918
	$CASE_RAID0_B          ="Ihere is no hot spare disk in raid0!";
	$CASE_RAID0            ="The number of data disk in raid0 must be at least 2";
	$CASE_RAID1            ="The number of data disk in raid1 must be 2";
	$CASE_RAID4            ="The number of data disk in raid4 must be at least 3";
	$CASE_RAID5            ="The number of data disk in raid5 must be at least 3";
	$CASE_RAID6            ="The number of data disk in raid6 must be at least 4";
	$CASE_RAID10           ="The number of data disk in raid10 must be even and at least 4";
	$CASE_RAID50           ="The number of data disk in raid50 must be even and at least 6";
	$CONFIRM_RAID_PRO      ="Are you sure to submit?";
	$TIPS_IP_RAID          ="IP format error!Please try again!";
	$TIPS_IPFORM           ="Tips：IP format is like Default- or 192.168.0.1-192.168.0.3-";
	$TIPS_FRONT            ="Tips：";
	$TIPS_RAID_PRO_A       ="The totel capacity of the raid is over the capacity of ";
	$TIPS_RAID_PRO_B       ="!";
	//added by gaobo 071007
	$ALERT_ISINCONF        ="Other user is operating,please wait！";
	$ALERT_NO_OPERATION    ="You can not submit without doing anything！";
	$TIPS_ALIAS            ="Raid alias consists by letters,numbers or _ less than 12 letters";
	
	//process_restore.php  added by gaobo 070926
	$ALERT_RESTORE_ERROR   ="Restore error!Please check out the uploading file!";
	//added by gaobo 071008 上传的文件打开出错！请检查上传的文件格式是否正确
	$ALERT_UPLOADFILE_ERROR  ="Can not open the upload file!Please check out the format of the uploading file！";
	//added by gaobo 071004
	$PRO_RES_XMLERROR      ="The format of xml is error!Please check out the backup file and try again！";
	$PRO_RES_BAK_TIP_A     ="Now the raid configuration is being restore,please wait...";
	$PRO_RES_BAK_TIP_B     ="Restore completed！Please wait...";
	
	//process_shutdown.php shutdown_processbar.js.php added by gaobo 070927
	$SHUTDOWN_IMAGE       ="shutdown_en.jpg";
	$SHUTDOWN_TIP_A       ="Now the raid is being shutdown,please wait…";
	$SHUTDOWN_TIP_B       ="Raid is shutdown,thanks for using HUSTRAID RaidManager…";
	
	//process_restart.php restart_processbar.js.php added by gaobo 070927
	$RESTART_IMAGE        ="restart_en.jpg";
	$RESTART_TIP_A        ="Now the raid is being restart,please wait…";
	$RESTART_TIP_B        ="Raid is restarted,welcome to use HUSTRAID RaidManager!";

	//save_config.php added by gaobo 071001
	$SAVECONF_ALERT       ="Someone else is operating the raid,please wait!";
	$SAVECONF_TIP         ="Now operating,please wait...when the page return,if the raid configuration has not change,please click the refresh button.";	
	//added by gaobo 071203
    $SAFEMODE_IMAGE        ="safemode.jpg";
	$PRO_SAFEMODE_TIP_A     ="Now loading the safemode,please wait...";
	$PRO_SAFEMODE_TIP_B     ="Raid is running in safemode,please wait...";
	
	//inc_banner.php added by gaobo 071001
	$BANNER_JPG           ="1-1-en_US.jpg";	
	$BANNER_VER           ="VER";	

	//process_network.php added by gaobo 071001
	$PRO_NETWORK_TIP_A    ="Now saving the network configuration...";   
	$PRO_NETWORK_TIP_B    ="The network configuration is saved,now link to";
	$PRO_NETWORK_ALERT    ="Modify failure,please check out and try again！";
	
	//process_restore_default.php added by gaobo 071002
	$PRO_DEFAULT_TIP_A    ="Now system is being restore to default,please wait...";
	$PRO_DEFAULT_TIP_B    ="Restore completed!,welcome to use HUSTRAID RaidManager!";	
	
	//071220
	$SYSBUSY_ALERT        ="System busy,please try again later...";
?>
