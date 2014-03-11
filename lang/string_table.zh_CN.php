<?php	

	//language: Simpilied Chinese
	//All string tables are based on this file: string_table.zh_CN.php
	
	//Global Various:
	$PRODUCT_NAME		= "磁盘阵列管理系统";
	$COPYRIGHT   		= "&copy; 版权所有 ";
	$FIRM_NAME			= "华中存储";
	$VERSION_NAME		= "版本";
	$VERSION			= "1.11";
	$BUILD_DATE			= "2008年3月15日";
       $AUTHOR           = "RAID配置管理软件作者：华中存储";
	$BANNER_IMAGE       = "images/zh_CN/banner.gif";
	$CHARSET            = "gb2312";


	//EXAMPLE:
	//IN PAGE: index.php
//  $STRING1 = "字符串1";
//  $STRING2 = "字符串2";


	$STYLE_NAME[1]		= "默认";
	$STYLE_FILE[1]      = "default";
	$STYLE_NAME[2]		= "蓝色";
	$STYLE_FILE[2]      = "blue";

	//IN PAGE: inc_menu.php	
	$PLEASE_LOGON		= "未登录系统，不能使用管理功能。请登录。";
	$LOGON				= "登录系统";
	$USERNAME			= "用&nbsp;户&nbsp;名&nbsp;";
	$PASSWORD			= "密&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;";
	$LOGON_AS			= "已登录";
	$SUBMIT				= "登录";
	$LOGOUT				= "退出登录";
	$LOGON_SUCCESS		= "登录成功，2秒中后自动返回";
	$LOGON_FAILURE		= "登录失败，请返回重试";
	$LOGGED_OUT			= "已成功登出，2秒钟后自动返回";
	
	$ITEM_FILE			= "配置";
	$ITEM_CONFIG		= "配置阵列";
	$ITEM_BACKUP		= "配置信息备份";
	$ITEM_RESOTRE		= "配置信息恢复";
	$ITEM_SYSTEM		= "系统";
	$ITEM_CLOSE			= "关闭阵列";
	$ITEM_RESTART		= "重启阵列";
	$ITEM_SETTING		= "设置";
	$ITEM_NETWORK		= "网络设置";
	$ITEM_STYLE			= "语言与样式";
	$ITEM_HELP			= "帮助";
	$ITEM_ABOUT			= "关于";
	$ITEM_ACCOUNT		= "账户管理";
	$ITEM_RESOTRE_DEFAULT	= "恢复出厂设置";
	$ITEM_SAFEMODE      = "自我诊断恢复";
	$ITEM_MONITOR			="阵列监控";
	$ITEM_LOG			= "操作日志";
	$ITEM_SUBRAID       = "分区配置";
	$ITEM_READSTAT      = "阵列监控";
	//added by gaobo 071003
	$ITEM_CONF_CONFIRM  = "阵列配置信息已发生改变，是否放弃操作?";
	//added by gaobo 071004
	$ITEM_SYSTEM_BUSY   = "系统正在操作中，请勿做任何操作,耐心等待!";
	
	//IN PAGE:  language.php
	$LANGUAGE_SETTINGS  = "语言与样式";
	$LANGUAGE_COMMENT   = "'". $PRODUCT_NAME . "' 可以显示多种语言以满足不同国家和地区用户的语言习惯，此外您还可以选择多种页面的样式。";
	$SELECT_LANGUAGE	= "请选择 '". $PRODUCT_NAME ."' 所显示的语言：";
	$SELECT_STYLE		= "请选择您喜欢的样式：";
	$BUTTON_OK			= "确定";
	$BUTTON_CANCEL		= "取消";
	$LANGUAGE_CHANGED_1	= "恭喜您！您的".$PRODUCT_NAME."已经设置为：";
	$LANGUAGE_CHANGED_2	= "下次使用". $PRODUCT_NAME ."时将以该语言作为默认选项。";
	
	
	//IN PAGE: raid_properties.php
	$COLLAPSE			= "折叠";
	$EXTRACT			= "展开";
	$SELECT_NODE		= "请选择左侧的节点，以显示该节点的详细信息。";
	$RAID_OPTION		= "配置选项";
	$RAID_SAVE			= "提交确认";
	$RAID_REBUILD		= "重建";
	$SAVE_CONFIG		= "保存配置";
	$SUBMIT_CONFIG		= "提交配置";
	$SAVE_MESSAGES		= "如果您确定要应用左边树形结构中的RAID配置请点击下面的按钮。在应用配置的过程中将有几十秒钟的等待时间，请耐心的等待。";
	$PROPERTIES_TITLE	= "阵列配置以及属性";
	$PROPERTIES_DISKNUM	= "磁盘数目";
	$PROPERTIES_RAIDNUM	= "阵列数目";
	//add by zhouzhou  2007-08-25
	$PROPERTIES_GLOBALDISKNUM = "全局热备盘数目";
	$PROPERTIES_TYPE	= "类型";
	$PROPERTIES_STATUS	= "状态";
	$PROPERTIES_SN		= "序列号";
	$PROPERTIES_VENDOR	= "供货商";
	$PROPERTIES_CAPACITY	= "容量";
	$PROPERTIES_ISSPAREDISK	= "热备份盘";
	$PROPERTIES_SCSIID	= "编号";
	$PROPERTIES_STATUS_OK	= "正常";
	$PROPERTIES_STATUS_BAD	= "损坏";
	$PROPERTIES_INDEX	= "编号";
	$PROPERTIES_LEVEL	= "级别";
	$PROPERTIES_CHUNK	= "分块大小";
	$PROPERTIES_RAIDSTAT	= "状态";
	$PROPERTIES_RAIDCAP	= "容量";
	$PROPERTIES_MAPPINGNO	= "映射通道号";
	$PROPERTIES_RAIDDISKNUM	= "磁盘数";
	$PROPERTIES_RAIDNUM	= "阵列数";
	$PROPERTIES_SINGERRAIDNUM	= "单级阵列数";
	$PROPERTIES_MULTYRAIDNUM	= "多级阵列数";	
	$PROPERTIES_RAIDDISKNUM	= "磁盘数";
	$PROPERTIES_SPAREDISKNUM	= "热备份盘数";
	//Added by zz
	$PROPERTIES_ISHOTDISK	= "热备份盘";
	$PROPERTIES_LOCALSPAREDISKNUM	= "局部热备份盘数";	
	$PROPERTIES_POPEDOM	= "允许访问的IP";
	//added by gaobo 071003
	$DEL_CREATE_ALERT	 = "新创建的阵列包含刚刚删除的阵列中存在的磁盘!请分两步操作!";
	//for the FireFox! added by gaobo 071101
	$OPERATION_FF    	 = "操作";
	$DELETE_RAID_FF	     = "删除阵列";
	$CLICK_HERE_FF       = "点击查看";
	$DISK_DETAIL         = "磁盘信息";
	$RAID_DETAIL         = "阵列柜详细信息一览";
	$RAID_ALERT_FF_1     = "请选择用来创建阵列的磁盘！";
	$RAID_ALERT_FF_2     = "需要至少选中2块以上的磁盘才可以组建阵列！";
	$ADD_SPAREDISK       = "添加热备盘";
	$ADD_SPAREDISK_ALERT = "请在下方表格设置备份盘后再进行添加！";
	$RESCAN_DEVICE       = "重新扫描设备";
	$MODIFY_RAID         = "修改阵列";
	$ALIAS               = "别名";
	$NEW_ALIAS           = "新别名";
	$RAID_ALIAS          = "阵列别名";
	$RAID_ALERT_3WARE1   = "热备盘不允许被添加入阵列！";
	$SET_SPARE           = "设置热备盘";
	$UNSET_SPARE         = "取消热备盘";
	$BOXSELECTALL        = "全选";
	$BINDINGIP           = "绑定通道";
	$SELECTBINDINGIP     = "选择通道";
	$BINDINGMSG          = "绑定信息";
	$BINDCHANNAL         = "通道";
	$CLICKMODIFY         = "点击修改";
	$ALIAS_ALERT         = "阵列别名只限于小写字母数字和下划线";
	$RAIDERRORALERT      = "有阵列损坏！请删除损坏阵列后再进行新阵列的创建!";
	$ALERTSAFEMODE1      = "刚进行过自我诊断与恢复，不能创建阵列及设置热备盘，请在阵列空闲时间及时重启以回到正常状态！";
	
	
	
	//IN PAGE: insertUpdate.xslt.php,added by zhouzhou 2007-07-31
	$PROPERTIES_NOT_ISSPAREDISK    = "否";
	$PROPERTIES_LOCAL_ISSPAREDISK  = "局部";
	$PROPERTIES_GLOBAL_ISSPAREDISK = "全局";
	
	//IN PAGE: system_messages.php
	$LOG_MESSAGE		= "系统监控";
	$LOG_LEVEL			= "级别";
	$LOG_DATE			= "日期";
	$LOG_TIME			= "时间";
	$LOG_EVENT			= "事件";
	//added by gaobo 071010
	$LOG_ISSUBMIT_ALERT = "已有其他用户提交了配置阵列的信息！阵列结构发生了改变，页面将同步进行更新！";
	
	//IN FILE: style/*.php
	
	$INSERT				= "插入";
	$UPDATE				= "更新";
	$REFRESH			= "刷新";
	$DELETE				= "删除";
	$INSERT_SUBRAID		= "插入子阵列";
	//<!--zjf modify-->
        $INSERT_RAID		= "创建阵列";
		$INSERT_SINGLE_RAID  = "创建单级阵列";
		$INSERT_MULTY_RAID  = "创建多级阵列";
	$RAID				= "阵列 ";
	$SUBRAID			= "子阵列 ";
	$RACK				= "阵列柜";
	$DISK				= "磁盘";
	$ATTRIBUTE_NAME		= "属性";
	$ATTRIBUTE_VALUE	= "属性值";
	$RACK_ATTRIBUTE		= "阵列架属性";
	$RAID_ATTRIBUTE		= "创建新阵列";
	$SUBRAID_ATTRIBUTE	= "子阵列属性";
	$DISK_ATTRIBUTE		= "磁盘属性";
	$SAVE				= "保存";
	$CANCEL				= "取消";
	$INSERT_POPEDOM     = "增加通用权限";
	
	//IN PAGE:	network.php
	$ETHERNET_SELECT	= "网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡";
	$ETHERNET0			= "网卡0";
	$ETHERNET1			= "网卡1";
	$BOND_SELECT		= "是&nbsp;否&nbsp;绑&nbsp;定&nbsp;网&nbsp;卡";
	$BONDING			= "绑定网卡";
	$UNBONDING			= "不绑定网卡";
	$IP_ADDRESS			= "IP&nbsp;地&nbsp;&nbsp;址";
	$SUBNET_MASK		= "子网掩码";
	$GATEWAY			= "默认网关";
	$NETTIP				= "警告：如果将网络从绑定状态变为非绑定状态需要重启阵列";
	$DNS_SERVER[0]		= "主DNS服务器";
	$DNS_SERVER[1]		= "备用DNS服务器1";
	$DNS_SERVER[2]		= "备用DNS服务器2";
	$ERROR_IP_ADDRESS	= "您输入的IP地址不正确。";
	$ERROR_NETMASK		= "您输入的子网掩码不正确。";
	$ERROR_GATEWAY		= "您输入的默认网关不正确。";
	$ERROR_DNS			= "您输入的DNS地址不正确。";
	$ERROR_DNS_LEAST	= "请至少输入一个DNS地址。";
	$CHECK_ERRORS		= "您的设置有错误，请改正带有红色提示的条目。";
	$NETWORK_SETTINGS	= "网络设置";
	$NETWORK_TITLE		= "以下是您目前的网络设置：";
	$ERROR_ETHERNET		= "您必须选择一个网卡。";
	
	$ERROR_DETIAL_1		= "您的IP地址设置不正确，IP地址的形式为 xxx.xxx.xxx.xxx， 如： 192.168.0.127";
	$ERROR_DETIAL_2		= "您的子网掩码设置不正确，正确形式为 xxx.xxx.xxx.xxx， 如： 255.255.255.0";
	$ERROR_DETIAL_3		= "您的默认网关设置不正确，正确形式为 xxx.xxx.xxx.xxx， 如： 192.168.0.1";
	$ERROR_DETIAL_4		= "您的DNS地址设置不正确，DNS地址的形式为 xxx.xxx.xxx.xxx， 如： 202.13.3.24";
	$ERROR_DRAG_DISK	= "错误，磁盘不能作为另一磁盘的子节点。";
	$ERROR_DRAG_DISK_UNDER_SINGLE	= "错误，阵列中的磁盘不允许被移除。";
	$ERROR_ADD_DISK_UNDER_MULTY		= "错误，不允许向多级阵列直接添加磁盘，请在其下的单级阵列中添加。";
	$ERROR_ADD_DISK_UNDER_SINGLERAID= "错误，不允许向RAID0中添加热备份盘";
	$ERROR_DRAG_SINGLE_UNDER_MULTY	= "错误，多级阵列中的单级阵列不允许被移除,如果需要移出阵列，请先删除多级阵列。";
	$ERROR_ADD_SINGLE_UNDER_MULTY	= "错误，RIAD50只能添加RAID5，RAID60只能添加RAID6";
	$ERROR_DRAG_GLOBAL_HOTDISK = "警告,全局热备份磁盘不能作为任何阵列或磁盘的子节点.";
	//zjf modify
	$ERROR_DRAG_SINGLE	="错误，单级阵列不能作为另一单击阵列或磁盘的子节点。";
	
	
	//account.php
	$ACCOUNT_SETTINGS	= "账户设置";
	$ADD_ACCOUNT		= "添加一个账户：";
	$MANAGE_ACCOUNT		= "管理现有账户：";
	$ACCOUNT_NAME		= "账户名";
	$DELETE_ACCOUNT		= "删除账户";
	$MODIFY_ACCOUNT		= "修改密码";
	$ROOT				= "管理员";
	$MODIFY				= "修改";
	$IS_DELETE_ACCOUNT	= "确定要删除这个帐号？";
	$PRIVILEGE			= "权限";
	$MODIFY_PRIVILEGE	= "修改权限";
	$ACCOUNT_PASSWORD_CONFIRM	= "密码确认";
	$ERROR_USERNAME     = "请按要求正确输入用户名，例如：'hustraid'";
	//2007-07-27 $FORMAT_USERNAME和$ERROR_ACCOUNT_PASSWORD两个变量added by zhouzhou
	$FORMAT_USERNAME    = "用户名由字母数字下划线组成，以字母开头小于12字符";
	$FORMAT_PASSWORD	= "密码由字母 数字 下划线组成，长度为[4, 16]";
	$ERROR_ACCOUNT_PASSWORD = "请按要求正确输入密码，例如：'histor2007'";   
	//2007-07-30 $FORMAT_USERNAME和$ERROR_ACCOUNT_PASSWORD两个变量added by zhouzhou
	$ERROR_EMPTY_USERNAME   = "用户名不能为空!";
	$ERROR_EMPTY_PASSWORD   = "密码不能为空!";
	$ERROR_EMPTY_CONFIRMPASSWORD = "密码确认不能为空!";
	$ERROR_EQUAL_PASSWORD = "两次输入的密码不一致!";
	$ACCOUNT_ADD_MESSAGE = "账户添加提示信息!";
	
	
	//process_account_add.php
	$ACCOUNT_ADD_FAILURE	= "该帐户名已存在！账户添加失败。";
	$ACCOUNT_ADD_SUCCESS	= "账户添加成功。";
	
	// process_account_modify.php
	$MODIFY_SUCCESS			= "修改成功！";
	$MODIFY_FAIL			= "密码错误，请重新修改！";
	//actions.php
	$ACTIONS['rebuild']		= "阵列重建已执行，请等待重建完毕。";
	$ACTIONS['restart']		= "阵列正在重新启动。片刻后即可使用";
	$ACTIONS['shutdown']	= "阵列已关闭完毕。";
	$ACTIONS['restore']		= "阵列配置文件已恢复，请等待程序执行完毕。";
	
	//about.php
	$ABOUT					= "关于" . $PRODUCT_NAME;
	$CLOSE					= "关闭";
	//added by gaobo 070918
	$BG_IMAGE_ABOUT			= "about_cn.jpg";
	
	//monitor.php
	$MONITOR_DISK			="磁盘";
	$MONITOR_DISK_NORMAL	="黄灯闪：代表磁盘状态正常";
	$MONITOR_DISK_BROKEN	="红灯闪：代表磁盘损坏或拔出";
	$MONITOR_DISK_NULL		="代表磁盘被拔出";
	$MONITOR_SYSTEM_STATUS	="系统状态";
	$MONITOR_DESCRIPTION	="说明：";
	//added by zhouzhou 2007-07-31 15:11
	$MONITOR_DISPLAY_DISKDETAIL = "单击显示磁盘详细信息";
	//added by gaobo 070924
	$MONITOR_ALERT_LOG_A	="操作日志数目已达";
	$MONITOR_ALERT_LOG_B	="条,超过1500条时,前面的日志将被覆盖!请及时备份!";
	//added by gaobo 071004
	$MONITOR_RAIDCONF_ERROR ="警告！系统监测到配置信息出错！请立刻用正确的配置备份文件恢复配置";
	
	//added by gaobo 
	//subRaid.php
	$SUBRAID_CONFIG         ="分区配置";
	$SUBRAID_DETAIL         ="分区详细信息";
	$SUBRAID_TABLE          ="分区结构示意图";
	$TIP_SUBMIT             ="如果您确定要应用上边图示结构中的分区配置请点击下面的按钮。";
	
	//mappingDetail.xslt.php
	$SUBRAID_DEVNAME         ="分区编号";
	$SUBRAID_BEGINSECTOR     ="起始栈";
	$SUBRAID_ENDSECTOR       ="结束栈";
	$SUBRAID_CAPACITY        ="分区容量";
	$SUBRAID_ENCRYPTLEVEL    ="加密级别";
	$SUBRAID_READUSERGROUP   ="可读权限";
	$SUBRAID_WRITEUSERGROUP  ="可写权限";
	$SUBRAID_DESCRIPTION     ="磁盘别名";
	
	//mappingTable.xslt.php
	$SUBRAID_RAIDNUMBER      ="阵列编号";
	$SUBRAID_INFO            ="分区信息";
	$SUBRAID_UNASSIGNED      ="未分配";
	$ModifyPartition         ="contextDelModify.xml";
	$AddPartition            ="contextAdd.xml";
	
	//createUpdate.xslt.php
	$ENCRYPT                 ="加密密码";
	$NOENCRYPT               ="不加密";
	$ITEM                    ="项目";
	$ITEM_VALUE              ="项目值";
	
	//checkFormat.js.php
	$FORMAT_CAPACITY        ="分区容量格式有误，请重新输入！";
	$FORMAT_ENCRYPT         ="密码不能为空，请重新输入！";
	$FORMAT_IP              ="允许访问的IP格式有误，请重新输入！";
	$TIP_CAPACITY           ="提示：输入格式为大于1的自然数";
	$TIP_IP                 ="提示：输入格式为Default-或192.168.0.1-192.168.0.3-";
	$TIP_DESCRIPTION        ="提示：为分区填写一个适当的描述，如 资料盘";
	$TIP_ENCRYPTLEVEL       ="提示：选择加密级别，如选 不加密 则无法输入加密密码";
	$TIP_ENCRYPT            ="提示：输入密码后不可更改，请牢记密码";
	$RAIDSTATALERT          ="警告！有阵列损坏！请删除红色的分区映射并前往阵列配置页面进行进一步的设置！";	
	$MAPPINGALERT           ="抱歉，上次分区映射没有成功！请重新进行分区配置操作！";
	//added by gaobo
	//process_backup.php added by gaobo 070827
	$BACKUP_TIPS            ="正在备份信息，请稍候...";
	$BACKUP_TIPS_ERROR      ="抱歉，备份信息失败，请重新尝试操作";	
	
	//help.php
	$HELP					= "帮助文档";
	$HELP_PARA1				= "磁盘阵列是一种把若干硬磁盘驱动器按照一定要求组成一个整体，整个磁盘阵列由阵列控制器管理的系统。冗余磁盘阵列RAID(Redundant Array of Independent Disks)技术1987年由加州大学伯克利分校提出，最初的研制目的是为了组合小的廉价磁盘来代替大的昂贵磁盘，以降低大批量数据存储的费用（当时RAID称为Redundant Array of Inexpensive Disks 廉价的磁盘阵列），同时也希望采用冗余信息的方式，使得磁盘失效时不会使对数据的访问受损失，从而开发出一定水平的数据保护技术。 磁盘阵列的工作原理与特征：RAID的基本结构特征就是组合(Striping)，捆绑2个或多个物理磁盘成组，形成一个单独的逻辑盘.";
    $HELP_PARA2		      = "我们设计的磁盘阵列支持以下基本的RAID级别：";	
	$HELP_PARA3		      = "1.RAID0级，无冗余无校验的磁盘阵列。数据同时分布在各个磁盘驱动器上，没
有容错能力，读写速度在RAID中最快，但因为任何一个磁盘驱动器损坏都会使整个RAID系统失效，所以安全系数反倒比单个的磁盘驱动器还要低。一般用在对数据安全要求不高，但对速度要求很高的场合。
";
	$HELP_PARA4		      = "2.RAID1级，镜象磁盘阵列。每一个磁盘驱动器都有一个镜像磁盘驱动器，镜像磁盘驱动器随时保持与原磁盘驱动器的内容一致。RAID1具有最高的安全性，但只有一个磁盘空间被用来存储数据。主要用在对数据安全性要求很高，而且要求能够快速恢复被损坏的数据的场合。
";
	$HELP_PARA5		      = "3.RAID10级，分块的镜象磁盘阵列。由RAID0和RAID1演变而来，通过分块镜像技术实现。分块技术使多个磁盘驱动器可以并行读/写，镜像技术使系统具有最高的可靠性。它虽综合了RAID0和RAID1的优点，但冗余度为50%，使数据存储空间减半。
";
	$HELP_PARA6                       ="4.RAID5级，无独立校验盘的奇偶校验磁盘阵列。同样采用奇偶校验来检查错误，但没有独立的校验盘，校验信息分布在各个磁盘驱动器上。RAID5对大小数据量的读写都有很好的性能。
";
	$HELP_PARA7		      = "5.RAID6级，分块交叉和双盘容错的磁盘阵列。RAID6与RAID5相比，增加了第二个独立的校验信息块。两个独立的校验系统使用不同的算法，数据的可靠性非常高。即使两块磁盘同时失效，也不会影响数据的使用。但需要分配给校验信息更大的磁盘空间，相对于RAID5有更大的“写损失”。RAID6的写性能非常差，主要应用于对数据可靠性要求非常高的场合。
";
	//view_account.php
	$ACCOUNT_INFO			= "账户信息";
	$OLD_PASSWORD			= "旧&nbsp;密&nbsp;码&nbsp;";
	$NEW_PASSWORD			= "新&nbsp;密&nbsp;码&nbsp;";
	$AGAIN_PASSWORD			= "密码确认";
	$CHANGE_PASSWORD		= "要更改密码，请先输入旧密码";
	$ERROR_PASSWORD			= "您两次输入的密码不一致";
	// alter by YanWei
	$ERROR_BLANKPASSWORD	= "密码由字母数字下划线组成,长度4至16";
	//added by gaobo 070917
	$CONFIRM_MODIFY_PASS	= "确定要更改密码吗?";
	
	$ITEM_MANUAL            = "手册";
	
	
	//manual.php
	$MANUAL_html				= "lang/manual/manual_CN.php";
	
	//help.php
	$HELP_html				= "lang/help/help_CN.html";
	
	//monitor_disk_infor.php
	$MONITOR_ID				= "编号";
	$MONITOR_TYPE			= "类型";
	$MONITOR_STATUS			= "状态";
	$MONITOR_SN				= "序列号";
	$MONITOR_VENDOR			= "供货商";
	$MONITOR_CAPACITY		= "容量";
	$MONITOR_SPAREDISK		= "热备份盘";
	//added by zhouzhou 2007-07-31 14:36
	$MONITOR_DETAIL         = "详细信息";
	$MONITOR_DRAWORBAD_DISK = "磁盘被拔除或磁盘损坏";
	$MONITOR_DISK           = "磁盘";
	//added by gaobo 070924
	$MONITOR_CONFIRM        = "确定";
	$MONITOR_ERROR_TIPS     = "磁盘被拔除或磁盘损坏";       
	$MONITOR_CLOSE          = "关闭";
	
	//confirm_shutdown.php
	$SHUTDOWN_PASSWORD		= "密码:  ";
	$SHUTDOWN_NOTICE		= "注意:";
	$SHUTDOWN_TITLE			= "关闭确认";
	$RESTART_TITLE			= "重启确认";
	$RESTART_DEFAULT_TITLE	= "恢复确认";
	$SAFEMODE_TITLE         = "自我诊断与恢复确认";
	$SHUTDOWN_DESCRIPTION	= "此操作将关闭阵列！";
	$RESTART_DESCRIPTION	= "此操作将重启阵列！";
	$RESTART_DEFAULT_DESCRIPTION	= "此操作将恢复阵列为出厂时的配置！";
	$SAFEMODE_DESCRIPTION ="阵列进行自我诊断与恢复,阵列别名、限定IP及通道的绑定信息可能会被初始化！";
	//added by zhouzhou 2007-08-01
	$CONFIRM_PASSWORD       = "请输入密码！";
	$AFTER_ISSAFEMODE_ALERT = "刚进行过自我诊断与恢复，请重启后再进行恢复出厂设置！";
	
	//added by zhouzhou 2007-08-01 process_confirm_shutdown.php
	$CONFIRM_CLOSE_RAID     = "是否确定关闭阵列？";
	$CONFIRM_RESTART_RAID   = "是否确定重启阵列？";
	$CONFIRM_RESTORE_DEFAULT = "是否恢复出厂设置？";
	$CONFIRM_WRONG_PASSWORD  = "密码错误！";
	
	//login.php
	$MESSAGE_LOWER			= "用户名或密码错误，请重新登录！";
	$MESSAGE_GREATER		= "您的输入次数已超过规定，请联系管理员或24小时后再尝试！";
	$MESSAGE_HELP			= "";  //您还没有登录，请先登录！
	$MESSAGE_OTHER			= "";  //您还没有登录，请先登录！
	//added by gaobo 070917 非翻译，切换中英文按钮用
	$BUTTEN_LOGIN			= "button01.jpg";
	$BUTTEN_RESET			= "button02.jpg";
	//added by gaobo 071012
	$FOOT_TIPS   			= "建议使用IE6.0 FireFox2.0浏览器于1024*768以上分辨率下浏览以取得最佳效果";
	
	//watchLog.php
	$LOG_TITLE				= "用户操作日志";
	$LOG_USER				= "用户";
	$LOG_TIME				= "时间";
	$LOG_RECORD				= "操作记录";
	$SHUTDOWN_LOG			= "进行关闭阵列操作";
	$RESTART_LOG			= "进行重启阵列操作";
	$RESTART_DEFAULT_LOG	= "进行恢复出厂设置操作";
	$RESTORE_LOG			= "进行阵列配置信息恢复操作";
	$NETWORK_LOG			= "进行修改网络设置操作";
	$ACCOUNT_ADD_LOG		= "添加了帐号：";
	$ACCOUNT_MODIFY_LOG		= "成功的对如下帐号，进行了密码修改操作：";
	$ACCOUNT_MODIFY_ERROR_LOG			= "对如下帐号进行密码修改操作，但操作失败：";
	$ACCOUNT_DELETE_LOG		= "成功的删除了以下帐号：";
	$BACKUP_LOG				= "进行配置信息备份操作";
	$LOGON_LOG				= "成功登录系统";
	$LOGON_ERROR_LOG1		= "如下IP地址，在输入用户名 ";
	$LOGON_ERROR_LOG2		= " 时，密码错误：";
	$LOGON_ERROR2_LOG		= "如下IP地址用户，尝试登录的错误次数超过规定，IP被禁止：";
	$LOGOUT_LOG				= "退出系统";
	$CONFIGURATION_LOG		= "修改了阵列的配置";
	$PRIVILEGE_MODIFY_LOG	= "对如下用户进行了权限修改：";
	$BACKUP_LOG_LOG			= "进行操作日志备份操作";
	//added by gaobo 070917
	$LOGBACKUP              ="操作日志备份";
	$TIPS_ENTERNUM          ="输入的页码必须为数字！";
	$PAGENUM                ="第";
	$PAGE                   ="页";
	$TOTELPAGE              ="共";
	$FIRSTPAGE              ="首页";
	$PAGEUP                 ="上页";
	$PAGEDOWN               ="下页";
	$LASTPAGE               ="末页";
	$TURNTO                 ="转到";
	$YES                    ="是";
	$NO                     ="否";
	//071219
	$BACKUP_ALERT           ="一旦确认备份日志，即使取消下载，也会清空最早的日志只留下最近的500条，您确认要备份日志吗？";
	
	//view_privilege.php
	$PRIVILEGE_TITLE		= "修改权限";
	$PRIVILEGE_DISCRIPTION	= "复选框打钩代表用户具有此权限";
	//added by gaobo 070917
	$CONFIRM_MODIFY_PRI 	= "确定要更改权限吗?";
	
	//monitor.js.php
	$MONITOR_JS_TITLE		= "阵 列 监 控";
	$MONITOR_JS_NO			= "阵列编号";
	$MONITOR_JS_LEVEL		= "级别";
	$MONITOR_JS_STATUS		= "状态";
	$MONITOR_JS_CAPACITY	= "容量";
	$MONITOR_JS_LEFT_TIEM	= "剩余时间";
	$MONITOR_JS_SPEED		= "速度";
	$MONITOR_JS_PERCENT		= "百分比";
	$MONITOR_JS_PICTURE		= "进度";
	$MONITOR_JS_NORMAL		= "正常";
	$MONITOR_JS_RECOVERY	= "正在重建";
	$MONITOR_JS_RESYNC		= "正在同步";
	$MONITOR_JS_ERROR		= "损坏";
	$MONITOR_JS_DEGRADE		= "降级";
	$MONITOR_JS_UNKNOW		= "未知状态";
	//added by gaobo 070924
	$FOR_HTTPREQUEST		= "不能创建XMLHttpRequest对象实例.";
	$TIPS_DISK_INFO_IMAGE   = "磁盘详细信息";
	//added by gaobo 071005
	$MONITOR_RAID_ATTRI     = "阵列属性";
	$MONITOR_DEVNAME        = "设备编号";
	$MONITOR_ISCISI_ID      = "磁盘编号";	
	
	//failure.php
	$FAILURE_TITLE			= "权 限 问 题";
	$FAILURE_NO_PRIVILEGE	= "您没有权限进行此操作，请联系管理员分配权限！";
	//admin1.js.php
	$MESSAGE_REMOVE_ARRAY   = "这是一个挂有磁盘的阵列，您不能就这样把它移除了!";
	$MESSAGE_DELETE_GOOD_DISK = "这是一个好的磁盘,您不能这样将它移除!";
	$MESSAGE_DELETE_SINGLERAID_FROMMULTIRAID = "不能在多级阵列中删除单级阵列!";
	
	//restore.php  added by zhouzhou 2007-07-31
	$RESTORE_FILENAME       = "文件名:";
	$RESTORE_CONFIGURATION  = "恢复配置";
	$RESTORE_EXPLANATION    = "说明：点击浏览后选择上次备份的配置信息，阵列将恢复到保存备份时的配置。";
	$RESTORE_UPLOAD         = "浏览...";
	$RESTORE_SAVED_CONFIGURATION  = "请选择配置文件的位置!";
	//added by gaobo 071004
	$RESTORE_UPLOAD_CONF_A = "确认上传这个";
	$RESTORE_UPLOAD_CONF_B = "文件吗？";
	
	//added by gaobo 070914
	//tree.js.php 
	$ERROR_DRAG_DISK_STOS   = "在阵列中的磁盘不允许被拖至另一阵列！";
	$ERROR_DRAG_DISK_STOD   = "正常运行状态的阵列，不允许拖出磁盘！"; //gaobo 070917
	$ERROR_DRAG_DISK_DTOR   = "正常运行中的阵列不允许拖入数据盘！"; //gaobo 070918
	//contexLUN.php 
	$TIPS_DELRAID           ="确定要删除阵列吗?";
	//confirm_shutdown.php 
	$TIPS_ENTERPASSWORD     ="请输入密码！";
	//added by gaobo 070914
	
	//added by gaobo 070917
	//process_confirm_shutdown.php
	$TIPS_CONFIRMSHUTDOWN   ="是否确定关闭阵列？";
	$TIPS_CONFIRMRESTART    ="是否确定重启阵列？";
	$TIPS_CONFIRMDEFAULT    ="是否恢复出厂设置？";
	$TIPS_CONFIRSAFEMODE    ="是否进行阵列的自我诊断与恢复？";	
	$TIPS_PASSERROR         ="密码错误！";
    
	//raid_properties.js.php added by gaobo 070918
	$CASE_RAID0_B          ="raid level 0中，没有热备份盘";
	$CASE_RAID0            ="raid level 0中,非热备份盘的数目必须大于等于2";
	$CASE_RAID1            ="raid level 1中,非热备份盘的数目必须等于2";
	$CASE_RAID4            ="raid level 4中,非热备份盘的数目必须大于等于3";
	$CASE_RAID5            ="raid level 5中,非热备份盘的数目必须大于等于3";
	$CASE_RAID6            ="raid level 6中,非热备份盘的数目必须大于等于4";
	$CASE_RAID10           ="raid level 10中,非热备份盘的数目必须为不小于4的偶数";
	$CASE_RAID50           ="raid level 50中,非热备份盘的数目必须为不小于6的偶数";
	$CONFIRM_RAID_PRO      ="您确定要进行此操作吗？";
	$TIPS_IP_RAID          ="允许访问的IP格式有误，请重新输入！";
	$TIPS_IPFORM           ="提示：输入格式为 Default- 或 192.168.0.1-192.168.0.3-";
	$TIPS_FRONT            ="提示：";
	$TIPS_RAID_PRO_A       ="当前已配置阵列的总容量，超过了";
	$TIPS_RAID_PRO_B       ="系列所允许的最大容量！";
	//added by gaobo 071007
	$ALERT_ISINCONF        ="已经有用户在进行操作，请稍后！";
	$ALERT_NO_OPERATION    ="未做任何配置操作请不要提交！";
	$TIPS_ALIAS            ="磁盘别名12字符以内，由小写字母数字下划线组成";
	
	//process_restore.php  added by gaobo 070926
	$ALERT_RESTORE_ERROR   ="恢复配置出错！请检查上传的文件是否正确！";
	//added by gaobo 071008
	$ALERT_UPLOADFILE_ERROR  ="上传的文件打开出错！请检查上传的文件格式是否正确！";
	
	//added by gaobo 071004
	$PRO_RES_XMLERROR      ="XML格式错误！请确认后重新提交备份文件！";
	$PRO_RES_BAK_TIP_A     ="正在恢复备份的配置信息，请稍后...";
	$PRO_RES_BAK_TIP_B     ="配置信息已恢复！请等待页面跳转...";
	
	//process_shutdown.php shutdown_processbar.js.php added by gaobo 070927
	$SHUTDOWN_IMAGE       ="shutdown.jpg";
	$SHUTDOWN_TIP_A       ="正在关闭阵列，请稍候…";
	$SHUTDOWN_TIP_B       ="阵列已经关闭,谢谢使用存储磁盘阵列系统…";
	
	//process_restart.php restart_processbar.js.php added by gaobo 070927
	$RESTART_IMAGE        ="restart.jpg";
	$RESTART_TIP_A        ="正在重启阵列，请稍候…";
	$RESTART_TIP_B        ="阵列已经重启完毕,欢迎使用存储磁盘阵列系统…";
	
	//save_config.php added by gaobo 071001
	$SAVECONF_ALERT       ="正在对阵列进行操作，请稍后再提交配置！";
	$SAVECONF_TIP         ="正在处理中，请稍后...页面返回后，如果阵列表单结构没有刷新，请手动刷新";

	
	//added by gaobo 071203
    $SAFEMODE_IMAGE        ="safemode.jpg";
	$PRO_SAFEMODE_TIP_A     ="阵列正在进行自我诊断与恢复，请稍后...";
	$PRO_SAFEMODE_TIP_B     ="阵列的自我诊断与恢复进行完毕！请等待页面跳转...";
	
	//inc_banner.php added by gaobo 071001
	$BANNER_JPG           ="1-1-zh_CN.jpg";
	$BANNER_VER           ="版本";
	
	//process_network.php added by gaobo 071001
	$PRO_NETWORK_TIP_A    ="正在保存配置信息...";   
	$PRO_NETWORK_TIP_B    ="配置文件已经保存，稍后将自动链接到";
	$PRO_NETWORK_ALERT    ="修改失败，请重新修改！";
	
	//process_restore_default.php added by gaobo 071002
	$PRO_DEFAULT_TIP_A    ="请稍侯，系统正在进行恢复操作……";
	$PRO_DEFAULT_TIP_B    ="已恢复为出厂设置,欢迎使用该磁盘阵列管理系统!";	
	
	//071220
	$SYSBUSY_ALERT        ="系统忙，请稍候重试...";
	
?>
