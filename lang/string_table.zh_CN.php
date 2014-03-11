<?php	

	//language: Simpilied Chinese
	//All string tables are based on this file: string_table.zh_CN.php
	
	//Global Various:
	$PRODUCT_NAME		= "�������й���ϵͳ";
	$COPYRIGHT   		= "&copy; ��Ȩ���� ";
	$FIRM_NAME			= "���д洢";
	$VERSION_NAME		= "�汾";
	$VERSION			= "1.11";
	$BUILD_DATE			= "2008��3��15��";
       $AUTHOR           = "RAID���ù���������ߣ����д洢";
	$BANNER_IMAGE       = "images/zh_CN/banner.gif";
	$CHARSET            = "gb2312";


	//EXAMPLE:
	//IN PAGE: index.php
//  $STRING1 = "�ַ���1";
//  $STRING2 = "�ַ���2";


	$STYLE_NAME[1]		= "Ĭ��";
	$STYLE_FILE[1]      = "default";
	$STYLE_NAME[2]		= "��ɫ";
	$STYLE_FILE[2]      = "blue";

	//IN PAGE: inc_menu.php	
	$PLEASE_LOGON		= "δ��¼ϵͳ������ʹ�ù����ܡ����¼��";
	$LOGON				= "��¼ϵͳ";
	$USERNAME			= "��&nbsp;��&nbsp;��&nbsp;";
	$PASSWORD			= "��&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;";
	$LOGON_AS			= "�ѵ�¼";
	$SUBMIT				= "��¼";
	$LOGOUT				= "�˳���¼";
	$LOGON_SUCCESS		= "��¼�ɹ���2���к��Զ�����";
	$LOGON_FAILURE		= "��¼ʧ�ܣ��뷵������";
	$LOGGED_OUT			= "�ѳɹ��ǳ���2���Ӻ��Զ�����";
	
	$ITEM_FILE			= "����";
	$ITEM_CONFIG		= "��������";
	$ITEM_BACKUP		= "������Ϣ����";
	$ITEM_RESOTRE		= "������Ϣ�ָ�";
	$ITEM_SYSTEM		= "ϵͳ";
	$ITEM_CLOSE			= "�ر�����";
	$ITEM_RESTART		= "��������";
	$ITEM_SETTING		= "����";
	$ITEM_NETWORK		= "��������";
	$ITEM_STYLE			= "��������ʽ";
	$ITEM_HELP			= "����";
	$ITEM_ABOUT			= "����";
	$ITEM_ACCOUNT		= "�˻�����";
	$ITEM_RESOTRE_DEFAULT	= "�ָ���������";
	$ITEM_SAFEMODE      = "������ϻָ�";
	$ITEM_MONITOR			="���м��";
	$ITEM_LOG			= "������־";
	$ITEM_SUBRAID       = "��������";
	$ITEM_READSTAT      = "���м��";
	//added by gaobo 071003
	$ITEM_CONF_CONFIRM  = "����������Ϣ�ѷ����ı䣬�Ƿ��������?";
	//added by gaobo 071004
	$ITEM_SYSTEM_BUSY   = "ϵͳ���ڲ����У��������κβ���,���ĵȴ�!";
	
	//IN PAGE:  language.php
	$LANGUAGE_SETTINGS  = "��������ʽ";
	$LANGUAGE_COMMENT   = "'". $PRODUCT_NAME . "' ������ʾ�������������㲻ͬ���Һ͵����û�������ϰ�ߣ�������������ѡ�����ҳ�����ʽ��";
	$SELECT_LANGUAGE	= "��ѡ�� '". $PRODUCT_NAME ."' ����ʾ�����ԣ�";
	$SELECT_STYLE		= "��ѡ����ϲ������ʽ��";
	$BUTTON_OK			= "ȷ��";
	$BUTTON_CANCEL		= "ȡ��";
	$LANGUAGE_CHANGED_1	= "��ϲ��������".$PRODUCT_NAME."�Ѿ�����Ϊ��";
	$LANGUAGE_CHANGED_2	= "�´�ʹ��". $PRODUCT_NAME ."ʱ���Ը�������ΪĬ��ѡ�";
	
	
	//IN PAGE: raid_properties.php
	$COLLAPSE			= "�۵�";
	$EXTRACT			= "չ��";
	$SELECT_NODE		= "��ѡ�����Ľڵ㣬����ʾ�ýڵ����ϸ��Ϣ��";
	$RAID_OPTION		= "����ѡ��";
	$RAID_SAVE			= "�ύȷ��";
	$RAID_REBUILD		= "�ؽ�";
	$SAVE_CONFIG		= "��������";
	$SUBMIT_CONFIG		= "�ύ����";
	$SAVE_MESSAGES		= "�����ȷ��ҪӦ��������νṹ�е�RAID������������İ�ť����Ӧ�����õĹ����н��м�ʮ���ӵĵȴ�ʱ�䣬�����ĵĵȴ���";
	$PROPERTIES_TITLE	= "���������Լ�����";
	$PROPERTIES_DISKNUM	= "������Ŀ";
	$PROPERTIES_RAIDNUM	= "������Ŀ";
	//add by zhouzhou  2007-08-25
	$PROPERTIES_GLOBALDISKNUM = "ȫ���ȱ�����Ŀ";
	$PROPERTIES_TYPE	= "����";
	$PROPERTIES_STATUS	= "״̬";
	$PROPERTIES_SN		= "���к�";
	$PROPERTIES_VENDOR	= "������";
	$PROPERTIES_CAPACITY	= "����";
	$PROPERTIES_ISSPAREDISK	= "�ȱ�����";
	$PROPERTIES_SCSIID	= "���";
	$PROPERTIES_STATUS_OK	= "����";
	$PROPERTIES_STATUS_BAD	= "��";
	$PROPERTIES_INDEX	= "���";
	$PROPERTIES_LEVEL	= "����";
	$PROPERTIES_CHUNK	= "�ֿ��С";
	$PROPERTIES_RAIDSTAT	= "״̬";
	$PROPERTIES_RAIDCAP	= "����";
	$PROPERTIES_MAPPINGNO	= "ӳ��ͨ����";
	$PROPERTIES_RAIDDISKNUM	= "������";
	$PROPERTIES_RAIDNUM	= "������";
	$PROPERTIES_SINGERRAIDNUM	= "����������";
	$PROPERTIES_MULTYRAIDNUM	= "�༶������";	
	$PROPERTIES_RAIDDISKNUM	= "������";
	$PROPERTIES_SPAREDISKNUM	= "�ȱ�������";
	//Added by zz
	$PROPERTIES_ISHOTDISK	= "�ȱ�����";
	$PROPERTIES_LOCALSPAREDISKNUM	= "�ֲ��ȱ�������";	
	$PROPERTIES_POPEDOM	= "������ʵ�IP";
	//added by gaobo 071003
	$DEL_CREATE_ALERT	 = "�´��������а����ո�ɾ���������д��ڵĴ���!�����������!";
	//for the FireFox! added by gaobo 071101
	$OPERATION_FF    	 = "����";
	$DELETE_RAID_FF	     = "ɾ������";
	$CLICK_HERE_FF       = "����鿴";
	$DISK_DETAIL         = "������Ϣ";
	$RAID_DETAIL         = "���й���ϸ��Ϣһ��";
	$RAID_ALERT_FF_1     = "��ѡ�������������еĴ��̣�";
	$RAID_ALERT_FF_2     = "��Ҫ����ѡ��2�����ϵĴ��̲ſ����齨���У�";
	$ADD_SPAREDISK       = "����ȱ���";
	$ADD_SPAREDISK_ALERT = "�����·�������ñ����̺��ٽ�����ӣ�";
	$RESCAN_DEVICE       = "����ɨ���豸";
	$MODIFY_RAID         = "�޸�����";
	$ALIAS               = "����";
	$NEW_ALIAS           = "�±���";
	$RAID_ALIAS          = "���б���";
	$RAID_ALERT_3WARE1   = "�ȱ��̲�������������У�";
	$SET_SPARE           = "�����ȱ���";
	$UNSET_SPARE         = "ȡ���ȱ���";
	$BOXSELECTALL        = "ȫѡ";
	$BINDINGIP           = "��ͨ��";
	$SELECTBINDINGIP     = "ѡ��ͨ��";
	$BINDINGMSG          = "����Ϣ";
	$BINDCHANNAL         = "ͨ��";
	$CLICKMODIFY         = "����޸�";
	$ALIAS_ALERT         = "���б���ֻ����Сд��ĸ���ֺ��»���";
	$RAIDERRORALERT      = "�������𻵣���ɾ�������к��ٽ��������еĴ���!";
	$ALERTSAFEMODE1      = "�ս��й����������ָ������ܴ������м������ȱ��̣��������п���ʱ�估ʱ�����Իص�����״̬��";
	
	
	
	//IN PAGE: insertUpdate.xslt.php,added by zhouzhou 2007-07-31
	$PROPERTIES_NOT_ISSPAREDISK    = "��";
	$PROPERTIES_LOCAL_ISSPAREDISK  = "�ֲ�";
	$PROPERTIES_GLOBAL_ISSPAREDISK = "ȫ��";
	
	//IN PAGE: system_messages.php
	$LOG_MESSAGE		= "ϵͳ���";
	$LOG_LEVEL			= "����";
	$LOG_DATE			= "����";
	$LOG_TIME			= "ʱ��";
	$LOG_EVENT			= "�¼�";
	//added by gaobo 071010
	$LOG_ISSUBMIT_ALERT = "���������û��ύ���������е���Ϣ�����нṹ�����˸ı䣬ҳ�潫ͬ�����и��£�";
	
	//IN FILE: style/*.php
	
	$INSERT				= "����";
	$UPDATE				= "����";
	$REFRESH			= "ˢ��";
	$DELETE				= "ɾ��";
	$INSERT_SUBRAID		= "����������";
	//<!--zjf modify-->
        $INSERT_RAID		= "��������";
		$INSERT_SINGLE_RAID  = "������������";
		$INSERT_MULTY_RAID  = "�����༶����";
	$RAID				= "���� ";
	$SUBRAID			= "������ ";
	$RACK				= "���й�";
	$DISK				= "����";
	$ATTRIBUTE_NAME		= "����";
	$ATTRIBUTE_VALUE	= "����ֵ";
	$RACK_ATTRIBUTE		= "���м�����";
	$RAID_ATTRIBUTE		= "����������";
	$SUBRAID_ATTRIBUTE	= "����������";
	$DISK_ATTRIBUTE		= "��������";
	$SAVE				= "����";
	$CANCEL				= "ȡ��";
	$INSERT_POPEDOM     = "����ͨ��Ȩ��";
	
	//IN PAGE:	network.php
	$ETHERNET_SELECT	= "��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��";
	$ETHERNET0			= "����0";
	$ETHERNET1			= "����1";
	$BOND_SELECT		= "��&nbsp;��&nbsp;��&nbsp;��&nbsp;��&nbsp;��";
	$BONDING			= "������";
	$UNBONDING			= "��������";
	$IP_ADDRESS			= "IP&nbsp;��&nbsp;&nbsp;ַ";
	$SUBNET_MASK		= "��������";
	$GATEWAY			= "Ĭ������";
	$NETTIP				= "���棺���������Ӱ�״̬��Ϊ�ǰ�״̬��Ҫ��������";
	$DNS_SERVER[0]		= "��DNS������";
	$DNS_SERVER[1]		= "����DNS������1";
	$DNS_SERVER[2]		= "����DNS������2";
	$ERROR_IP_ADDRESS	= "�������IP��ַ����ȷ��";
	$ERROR_NETMASK		= "��������������벻��ȷ��";
	$ERROR_GATEWAY		= "�������Ĭ�����ز���ȷ��";
	$ERROR_DNS			= "�������DNS��ַ����ȷ��";
	$ERROR_DNS_LEAST	= "����������һ��DNS��ַ��";
	$CHECK_ERRORS		= "���������д�����������к�ɫ��ʾ����Ŀ��";
	$NETWORK_SETTINGS	= "��������";
	$NETWORK_TITLE		= "��������Ŀǰ���������ã�";
	$ERROR_ETHERNET		= "������ѡ��һ��������";
	
	$ERROR_DETIAL_1		= "����IP��ַ���ò���ȷ��IP��ַ����ʽΪ xxx.xxx.xxx.xxx�� �磺 192.168.0.127";
	$ERROR_DETIAL_2		= "���������������ò���ȷ����ȷ��ʽΪ xxx.xxx.xxx.xxx�� �磺 255.255.255.0";
	$ERROR_DETIAL_3		= "����Ĭ���������ò���ȷ����ȷ��ʽΪ xxx.xxx.xxx.xxx�� �磺 192.168.0.1";
	$ERROR_DETIAL_4		= "����DNS��ַ���ò���ȷ��DNS��ַ����ʽΪ xxx.xxx.xxx.xxx�� �磺 202.13.3.24";
	$ERROR_DRAG_DISK	= "���󣬴��̲�����Ϊ��һ���̵��ӽڵ㡣";
	$ERROR_DRAG_DISK_UNDER_SINGLE	= "���������еĴ��̲������Ƴ���";
	$ERROR_ADD_DISK_UNDER_MULTY		= "���󣬲�������༶����ֱ����Ӵ��̣��������µĵ�����������ӡ�";
	$ERROR_ADD_DISK_UNDER_SINGLERAID= "���󣬲�������RAID0������ȱ�����";
	$ERROR_DRAG_SINGLE_UNDER_MULTY	= "���󣬶༶�����еĵ������в������Ƴ�,�����Ҫ�Ƴ����У�����ɾ���༶���С�";
	$ERROR_ADD_SINGLE_UNDER_MULTY	= "����RIAD50ֻ�����RAID5��RAID60ֻ�����RAID6";
	$ERROR_DRAG_GLOBAL_HOTDISK = "����,ȫ���ȱ��ݴ��̲�����Ϊ�κ����л���̵��ӽڵ�.";
	//zjf modify
	$ERROR_DRAG_SINGLE	="���󣬵������в�����Ϊ��һ�������л���̵��ӽڵ㡣";
	
	
	//account.php
	$ACCOUNT_SETTINGS	= "�˻�����";
	$ADD_ACCOUNT		= "���һ���˻���";
	$MANAGE_ACCOUNT		= "���������˻���";
	$ACCOUNT_NAME		= "�˻���";
	$DELETE_ACCOUNT		= "ɾ���˻�";
	$MODIFY_ACCOUNT		= "�޸�����";
	$ROOT				= "����Ա";
	$MODIFY				= "�޸�";
	$IS_DELETE_ACCOUNT	= "ȷ��Ҫɾ������ʺţ�";
	$PRIVILEGE			= "Ȩ��";
	$MODIFY_PRIVILEGE	= "�޸�Ȩ��";
	$ACCOUNT_PASSWORD_CONFIRM	= "����ȷ��";
	$ERROR_USERNAME     = "�밴Ҫ����ȷ�����û��������磺'hustraid'";
	//2007-07-27 $FORMAT_USERNAME��$ERROR_ACCOUNT_PASSWORD��������added by zhouzhou
	$FORMAT_USERNAME    = "�û�������ĸ�����»�����ɣ�����ĸ��ͷС��12�ַ�";
	$FORMAT_PASSWORD	= "��������ĸ ���� �»�����ɣ�����Ϊ[4, 16]";
	$ERROR_ACCOUNT_PASSWORD = "�밴Ҫ����ȷ�������룬���磺'histor2007'";   
	//2007-07-30 $FORMAT_USERNAME��$ERROR_ACCOUNT_PASSWORD��������added by zhouzhou
	$ERROR_EMPTY_USERNAME   = "�û�������Ϊ��!";
	$ERROR_EMPTY_PASSWORD   = "���벻��Ϊ��!";
	$ERROR_EMPTY_CONFIRMPASSWORD = "����ȷ�ϲ���Ϊ��!";
	$ERROR_EQUAL_PASSWORD = "������������벻һ��!";
	$ACCOUNT_ADD_MESSAGE = "�˻������ʾ��Ϣ!";
	
	
	//process_account_add.php
	$ACCOUNT_ADD_FAILURE	= "���ʻ����Ѵ��ڣ��˻����ʧ�ܡ�";
	$ACCOUNT_ADD_SUCCESS	= "�˻���ӳɹ���";
	
	// process_account_modify.php
	$MODIFY_SUCCESS			= "�޸ĳɹ���";
	$MODIFY_FAIL			= "��������������޸ģ�";
	//actions.php
	$ACTIONS['rebuild']		= "�����ؽ���ִ�У���ȴ��ؽ���ϡ�";
	$ACTIONS['restart']		= "������������������Ƭ�̺󼴿�ʹ��";
	$ACTIONS['shutdown']	= "�����ѹر���ϡ�";
	$ACTIONS['restore']		= "���������ļ��ѻָ�����ȴ�����ִ����ϡ�";
	
	//about.php
	$ABOUT					= "����" . $PRODUCT_NAME;
	$CLOSE					= "�ر�";
	//added by gaobo 070918
	$BG_IMAGE_ABOUT			= "about_cn.jpg";
	
	//monitor.php
	$MONITOR_DISK			="����";
	$MONITOR_DISK_NORMAL	="�Ƶ������������״̬����";
	$MONITOR_DISK_BROKEN	="���������������𻵻�γ�";
	$MONITOR_DISK_NULL		="������̱��γ�";
	$MONITOR_SYSTEM_STATUS	="ϵͳ״̬";
	$MONITOR_DESCRIPTION	="˵����";
	//added by zhouzhou 2007-07-31 15:11
	$MONITOR_DISPLAY_DISKDETAIL = "������ʾ������ϸ��Ϣ";
	//added by gaobo 070924
	$MONITOR_ALERT_LOG_A	="������־��Ŀ�Ѵ�";
	$MONITOR_ALERT_LOG_B	="��,����1500��ʱ,ǰ�����־��������!�뼰ʱ����!";
	//added by gaobo 071004
	$MONITOR_RAIDCONF_ERROR ="���棡ϵͳ��⵽������Ϣ��������������ȷ�����ñ����ļ��ָ�����";
	
	//added by gaobo 
	//subRaid.php
	$SUBRAID_CONFIG         ="��������";
	$SUBRAID_DETAIL         ="������ϸ��Ϣ";
	$SUBRAID_TABLE          ="�����ṹʾ��ͼ";
	$TIP_SUBMIT             ="�����ȷ��ҪӦ���ϱ�ͼʾ�ṹ�еķ���������������İ�ť��";
	
	//mappingDetail.xslt.php
	$SUBRAID_DEVNAME         ="�������";
	$SUBRAID_BEGINSECTOR     ="��ʼջ";
	$SUBRAID_ENDSECTOR       ="����ջ";
	$SUBRAID_CAPACITY        ="��������";
	$SUBRAID_ENCRYPTLEVEL    ="���ܼ���";
	$SUBRAID_READUSERGROUP   ="�ɶ�Ȩ��";
	$SUBRAID_WRITEUSERGROUP  ="��дȨ��";
	$SUBRAID_DESCRIPTION     ="���̱���";
	
	//mappingTable.xslt.php
	$SUBRAID_RAIDNUMBER      ="���б��";
	$SUBRAID_INFO            ="������Ϣ";
	$SUBRAID_UNASSIGNED      ="δ����";
	$ModifyPartition         ="contextDelModify.xml";
	$AddPartition            ="contextAdd.xml";
	
	//createUpdate.xslt.php
	$ENCRYPT                 ="��������";
	$NOENCRYPT               ="������";
	$ITEM                    ="��Ŀ";
	$ITEM_VALUE              ="��Ŀֵ";
	
	//checkFormat.js.php
	$FORMAT_CAPACITY        ="����������ʽ�������������룡";
	$FORMAT_ENCRYPT         ="���벻��Ϊ�գ����������룡";
	$FORMAT_IP              ="������ʵ�IP��ʽ�������������룡";
	$TIP_CAPACITY           ="��ʾ�������ʽΪ����1����Ȼ��";
	$TIP_IP                 ="��ʾ�������ʽΪDefault-��192.168.0.1-192.168.0.3-";
	$TIP_DESCRIPTION        ="��ʾ��Ϊ������дһ���ʵ����������� ������";
	$TIP_ENCRYPTLEVEL       ="��ʾ��ѡ����ܼ�����ѡ ������ ���޷������������";
	$TIP_ENCRYPT            ="��ʾ����������󲻿ɸ��ģ����μ�����";
	$RAIDSTATALERT          ="���棡�������𻵣���ɾ����ɫ�ķ���ӳ�䲢ǰ����������ҳ����н�һ�������ã�";	
	$MAPPINGALERT           ="��Ǹ���ϴη���ӳ��û�гɹ��������½��з������ò�����";
	//added by gaobo
	//process_backup.php added by gaobo 070827
	$BACKUP_TIPS            ="���ڱ�����Ϣ�����Ժ�...";
	$BACKUP_TIPS_ERROR      ="��Ǹ��������Ϣʧ�ܣ������³��Բ���";	
	
	//help.php
	$HELP					= "�����ĵ�";
	$HELP_PARA1				= "����������һ�ְ�����Ӳ��������������һ��Ҫ�����һ�����壬�����������������п����������ϵͳ�������������RAID(Redundant Array of Independent Disks)����1987���ɼ��ݴ�ѧ��������У��������������Ŀ����Ϊ�����С�����۴����������İ�����̣��Խ��ʹ��������ݴ洢�ķ��ã���ʱRAID��ΪRedundant Array of Inexpensive Disks ���۵Ĵ������У���ͬʱҲϣ������������Ϣ�ķ�ʽ��ʹ�ô���ʧЧʱ����ʹ�����ݵķ�������ʧ���Ӷ�������һ��ˮƽ�����ݱ��������� �������еĹ���ԭ����������RAID�Ļ����ṹ�����������(Striping)������2������������̳��飬�γ�һ���������߼���.";
    $HELP_PARA2		      = "������ƵĴ�������֧�����»�����RAID����";	
	$HELP_PARA3		      = "1.RAID0������������У��Ĵ������С�����ͬʱ�ֲ��ڸ��������������ϣ�û
���ݴ���������д�ٶ���RAID����죬����Ϊ�κ�һ�������������𻵶���ʹ����RAIDϵͳʧЧ�����԰�ȫϵ�������ȵ����Ĵ�����������Ҫ�͡�һ�����ڶ����ݰ�ȫҪ�󲻸ߣ������ٶ�Ҫ��ܸߵĳ��ϡ�
";
	$HELP_PARA4		      = "2.RAID1��������������С�ÿһ����������������һ��������������������������������ʱ������ԭ����������������һ�¡�RAID1������ߵİ�ȫ�ԣ���ֻ��һ�����̿ռ䱻�����洢���ݡ���Ҫ���ڶ����ݰ�ȫ��Ҫ��ܸߣ�����Ҫ���ܹ����ٻָ����𻵵����ݵĳ��ϡ�
";
	$HELP_PARA5		      = "3.RAID10�����ֿ�ľ���������С���RAID0��RAID1�ݱ������ͨ���ֿ龵����ʵ�֡��ֿ鼼��ʹ����������������Բ��ж�/д��������ʹϵͳ������ߵĿɿ��ԡ������ۺ���RAID0��RAID1���ŵ㣬�������Ϊ50%��ʹ���ݴ洢�ռ���롣
";
	$HELP_PARA6                       ="4.RAID5�����޶���У���̵���żУ��������С�ͬ��������żУ���������󣬵�û�ж�����У���̣�У����Ϣ�ֲ��ڸ��������������ϡ�RAID5�Դ�С�������Ķ�д���кܺõ����ܡ�
";
	$HELP_PARA7		      = "5.RAID6�����ֿ齻���˫���ݴ�Ĵ������С�RAID6��RAID5��ȣ������˵ڶ���������У����Ϣ�顣����������У��ϵͳʹ�ò�ͬ���㷨�����ݵĿɿ��Էǳ��ߡ���ʹ�������ͬʱʧЧ��Ҳ����Ӱ�����ݵ�ʹ�á�����Ҫ�����У����Ϣ����Ĵ��̿ռ䣬�����RAID5�и���ġ�д��ʧ����RAID6��д���ܷǳ����ҪӦ���ڶ����ݿɿ���Ҫ��ǳ��ߵĳ��ϡ�
";
	//view_account.php
	$ACCOUNT_INFO			= "�˻���Ϣ";
	$OLD_PASSWORD			= "��&nbsp;��&nbsp;��&nbsp;";
	$NEW_PASSWORD			= "��&nbsp;��&nbsp;��&nbsp;";
	$AGAIN_PASSWORD			= "����ȷ��";
	$CHANGE_PASSWORD		= "Ҫ�������룬�������������";
	$ERROR_PASSWORD			= "��������������벻һ��";
	// alter by YanWei
	$ERROR_BLANKPASSWORD	= "��������ĸ�����»������,����4��16";
	//added by gaobo 070917
	$CONFIRM_MODIFY_PASS	= "ȷ��Ҫ����������?";
	
	$ITEM_MANUAL            = "�ֲ�";
	
	
	//manual.php
	$MANUAL_html				= "lang/manual/manual_CN.php";
	
	//help.php
	$HELP_html				= "lang/help/help_CN.html";
	
	//monitor_disk_infor.php
	$MONITOR_ID				= "���";
	$MONITOR_TYPE			= "����";
	$MONITOR_STATUS			= "״̬";
	$MONITOR_SN				= "���к�";
	$MONITOR_VENDOR			= "������";
	$MONITOR_CAPACITY		= "����";
	$MONITOR_SPAREDISK		= "�ȱ�����";
	//added by zhouzhou 2007-07-31 14:36
	$MONITOR_DETAIL         = "��ϸ��Ϣ";
	$MONITOR_DRAWORBAD_DISK = "���̱��γ��������";
	$MONITOR_DISK           = "����";
	//added by gaobo 070924
	$MONITOR_CONFIRM        = "ȷ��";
	$MONITOR_ERROR_TIPS     = "���̱��γ��������";       
	$MONITOR_CLOSE          = "�ر�";
	
	//confirm_shutdown.php
	$SHUTDOWN_PASSWORD		= "����:  ";
	$SHUTDOWN_NOTICE		= "ע��:";
	$SHUTDOWN_TITLE			= "�ر�ȷ��";
	$RESTART_TITLE			= "����ȷ��";
	$RESTART_DEFAULT_TITLE	= "�ָ�ȷ��";
	$SAFEMODE_TITLE         = "���������ָ�ȷ��";
	$SHUTDOWN_DESCRIPTION	= "�˲������ر����У�";
	$RESTART_DESCRIPTION	= "�˲������������У�";
	$RESTART_DEFAULT_DESCRIPTION	= "�˲������ָ�����Ϊ����ʱ�����ã�";
	$SAFEMODE_DESCRIPTION ="���н������������ָ�,���б������޶�IP��ͨ���İ���Ϣ���ܻᱻ��ʼ����";
	//added by zhouzhou 2007-08-01
	$CONFIRM_PASSWORD       = "���������룡";
	$AFTER_ISSAFEMODE_ALERT = "�ս��й����������ָ������������ٽ��лָ��������ã�";
	
	//added by zhouzhou 2007-08-01 process_confirm_shutdown.php
	$CONFIRM_CLOSE_RAID     = "�Ƿ�ȷ���ر����У�";
	$CONFIRM_RESTART_RAID   = "�Ƿ�ȷ���������У�";
	$CONFIRM_RESTORE_DEFAULT = "�Ƿ�ָ��������ã�";
	$CONFIRM_WRONG_PASSWORD  = "�������";
	
	//login.php
	$MESSAGE_LOWER			= "�û�����������������µ�¼��";
	$MESSAGE_GREATER		= "������������ѳ����涨������ϵ����Ա��24Сʱ���ٳ��ԣ�";
	$MESSAGE_HELP			= "";  //����û�е�¼�����ȵ�¼��
	$MESSAGE_OTHER			= "";  //����û�е�¼�����ȵ�¼��
	//added by gaobo 070917 �Ƿ��룬�л���Ӣ�İ�ť��
	$BUTTEN_LOGIN			= "button01.jpg";
	$BUTTEN_RESET			= "button02.jpg";
	//added by gaobo 071012
	$FOOT_TIPS   			= "����ʹ��IE6.0 FireFox2.0�������1024*768���Ϸֱ����������ȡ�����Ч��";
	
	//watchLog.php
	$LOG_TITLE				= "�û�������־";
	$LOG_USER				= "�û�";
	$LOG_TIME				= "ʱ��";
	$LOG_RECORD				= "������¼";
	$SHUTDOWN_LOG			= "���йر����в���";
	$RESTART_LOG			= "�����������в���";
	$RESTART_DEFAULT_LOG	= "���лָ��������ò���";
	$RESTORE_LOG			= "��������������Ϣ�ָ�����";
	$NETWORK_LOG			= "�����޸��������ò���";
	$ACCOUNT_ADD_LOG		= "������ʺţ�";
	$ACCOUNT_MODIFY_LOG		= "�ɹ��Ķ������ʺţ������������޸Ĳ�����";
	$ACCOUNT_MODIFY_ERROR_LOG			= "�������ʺŽ��������޸Ĳ�����������ʧ�ܣ�";
	$ACCOUNT_DELETE_LOG		= "�ɹ���ɾ���������ʺţ�";
	$BACKUP_LOG				= "����������Ϣ���ݲ���";
	$LOGON_LOG				= "�ɹ���¼ϵͳ";
	$LOGON_ERROR_LOG1		= "����IP��ַ���������û��� ";
	$LOGON_ERROR_LOG2		= " ʱ���������";
	$LOGON_ERROR2_LOG		= "����IP��ַ�û������Ե�¼�Ĵ�����������涨��IP����ֹ��";
	$LOGOUT_LOG				= "�˳�ϵͳ";
	$CONFIGURATION_LOG		= "�޸������е�����";
	$PRIVILEGE_MODIFY_LOG	= "�������û�������Ȩ���޸ģ�";
	$BACKUP_LOG_LOG			= "���в�����־���ݲ���";
	//added by gaobo 070917
	$LOGBACKUP              ="������־����";
	$TIPS_ENTERNUM          ="�����ҳ�����Ϊ���֣�";
	$PAGENUM                ="��";
	$PAGE                   ="ҳ";
	$TOTELPAGE              ="��";
	$FIRSTPAGE              ="��ҳ";
	$PAGEUP                 ="��ҳ";
	$PAGEDOWN               ="��ҳ";
	$LASTPAGE               ="ĩҳ";
	$TURNTO                 ="ת��";
	$YES                    ="��";
	$NO                     ="��";
	//071219
	$BACKUP_ALERT           ="һ��ȷ�ϱ�����־����ʹȡ�����أ�Ҳ������������־ֻ���������500������ȷ��Ҫ������־��";
	
	//view_privilege.php
	$PRIVILEGE_TITLE		= "�޸�Ȩ��";
	$PRIVILEGE_DISCRIPTION	= "��ѡ��򹳴����û����д�Ȩ��";
	//added by gaobo 070917
	$CONFIRM_MODIFY_PRI 	= "ȷ��Ҫ����Ȩ����?";
	
	//monitor.js.php
	$MONITOR_JS_TITLE		= "�� �� �� ��";
	$MONITOR_JS_NO			= "���б��";
	$MONITOR_JS_LEVEL		= "����";
	$MONITOR_JS_STATUS		= "״̬";
	$MONITOR_JS_CAPACITY	= "����";
	$MONITOR_JS_LEFT_TIEM	= "ʣ��ʱ��";
	$MONITOR_JS_SPEED		= "�ٶ�";
	$MONITOR_JS_PERCENT		= "�ٷֱ�";
	$MONITOR_JS_PICTURE		= "����";
	$MONITOR_JS_NORMAL		= "����";
	$MONITOR_JS_RECOVERY	= "�����ؽ�";
	$MONITOR_JS_RESYNC		= "����ͬ��";
	$MONITOR_JS_ERROR		= "��";
	$MONITOR_JS_DEGRADE		= "����";
	$MONITOR_JS_UNKNOW		= "δ֪״̬";
	//added by gaobo 070924
	$FOR_HTTPREQUEST		= "���ܴ���XMLHttpRequest����ʵ��.";
	$TIPS_DISK_INFO_IMAGE   = "������ϸ��Ϣ";
	//added by gaobo 071005
	$MONITOR_RAID_ATTRI     = "��������";
	$MONITOR_DEVNAME        = "�豸���";
	$MONITOR_ISCISI_ID      = "���̱��";	
	
	//failure.php
	$FAILURE_TITLE			= "Ȩ �� �� ��";
	$FAILURE_NO_PRIVILEGE	= "��û��Ȩ�޽��д˲���������ϵ����Ա����Ȩ�ޣ�";
	//admin1.js.php
	$MESSAGE_REMOVE_ARRAY   = "����һ�����д��̵����У������ܾ����������Ƴ���!";
	$MESSAGE_DELETE_GOOD_DISK = "����һ���õĴ���,���������������Ƴ�!";
	$MESSAGE_DELETE_SINGLERAID_FROMMULTIRAID = "�����ڶ༶������ɾ����������!";
	
	//restore.php  added by zhouzhou 2007-07-31
	$RESTORE_FILENAME       = "�ļ���:";
	$RESTORE_CONFIGURATION  = "�ָ�����";
	$RESTORE_EXPLANATION    = "˵������������ѡ���ϴα��ݵ�������Ϣ�����н��ָ������汸��ʱ�����á�";
	$RESTORE_UPLOAD         = "���...";
	$RESTORE_SAVED_CONFIGURATION  = "��ѡ�������ļ���λ��!";
	//added by gaobo 071004
	$RESTORE_UPLOAD_CONF_A = "ȷ���ϴ����";
	$RESTORE_UPLOAD_CONF_B = "�ļ���";
	
	//added by gaobo 070914
	//tree.js.php 
	$ERROR_DRAG_DISK_STOS   = "�������еĴ��̲�����������һ���У�";
	$ERROR_DRAG_DISK_STOD   = "��������״̬�����У��������ϳ����̣�"; //gaobo 070917
	$ERROR_DRAG_DISK_DTOR   = "���������е����в��������������̣�"; //gaobo 070918
	//contexLUN.php 
	$TIPS_DELRAID           ="ȷ��Ҫɾ��������?";
	//confirm_shutdown.php 
	$TIPS_ENTERPASSWORD     ="���������룡";
	//added by gaobo 070914
	
	//added by gaobo 070917
	//process_confirm_shutdown.php
	$TIPS_CONFIRMSHUTDOWN   ="�Ƿ�ȷ���ر����У�";
	$TIPS_CONFIRMRESTART    ="�Ƿ�ȷ���������У�";
	$TIPS_CONFIRMDEFAULT    ="�Ƿ�ָ��������ã�";
	$TIPS_CONFIRSAFEMODE    ="�Ƿ�������е����������ָ���";	
	$TIPS_PASSERROR         ="�������";
    
	//raid_properties.js.php added by gaobo 070918
	$CASE_RAID0_B          ="raid level 0�У�û���ȱ�����";
	$CASE_RAID0            ="raid level 0��,���ȱ����̵���Ŀ������ڵ���2";
	$CASE_RAID1            ="raid level 1��,���ȱ����̵���Ŀ�������2";
	$CASE_RAID4            ="raid level 4��,���ȱ����̵���Ŀ������ڵ���3";
	$CASE_RAID5            ="raid level 5��,���ȱ����̵���Ŀ������ڵ���3";
	$CASE_RAID6            ="raid level 6��,���ȱ����̵���Ŀ������ڵ���4";
	$CASE_RAID10           ="raid level 10��,���ȱ����̵���Ŀ����Ϊ��С��4��ż��";
	$CASE_RAID50           ="raid level 50��,���ȱ����̵���Ŀ����Ϊ��С��6��ż��";
	$CONFIRM_RAID_PRO      ="��ȷ��Ҫ���д˲�����";
	$TIPS_IP_RAID          ="������ʵ�IP��ʽ�������������룡";
	$TIPS_IPFORM           ="��ʾ�������ʽΪ Default- �� 192.168.0.1-192.168.0.3-";
	$TIPS_FRONT            ="��ʾ��";
	$TIPS_RAID_PRO_A       ="��ǰ���������е���������������";
	$TIPS_RAID_PRO_B       ="ϵ������������������";
	//added by gaobo 071007
	$ALERT_ISINCONF        ="�Ѿ����û��ڽ��в��������Ժ�";
	$ALERT_NO_OPERATION    ="δ���κ����ò����벻Ҫ�ύ��";
	$TIPS_ALIAS            ="���̱���12�ַ����ڣ���Сд��ĸ�����»������";
	
	//process_restore.php  added by gaobo 070926
	$ALERT_RESTORE_ERROR   ="�ָ����ó��������ϴ����ļ��Ƿ���ȷ��";
	//added by gaobo 071008
	$ALERT_UPLOADFILE_ERROR  ="�ϴ����ļ��򿪳��������ϴ����ļ���ʽ�Ƿ���ȷ��";
	
	//added by gaobo 071004
	$PRO_RES_XMLERROR      ="XML��ʽ������ȷ�Ϻ������ύ�����ļ���";
	$PRO_RES_BAK_TIP_A     ="���ڻָ����ݵ�������Ϣ�����Ժ�...";
	$PRO_RES_BAK_TIP_B     ="������Ϣ�ѻָ�����ȴ�ҳ����ת...";
	
	//process_shutdown.php shutdown_processbar.js.php added by gaobo 070927
	$SHUTDOWN_IMAGE       ="shutdown.jpg";
	$SHUTDOWN_TIP_A       ="���ڹر����У����Ժ�";
	$SHUTDOWN_TIP_B       ="�����Ѿ��ر�,ллʹ�ô洢��������ϵͳ��";
	
	//process_restart.php restart_processbar.js.php added by gaobo 070927
	$RESTART_IMAGE        ="restart.jpg";
	$RESTART_TIP_A        ="�����������У����Ժ�";
	$RESTART_TIP_B        ="�����Ѿ��������,��ӭʹ�ô洢��������ϵͳ��";
	
	//save_config.php added by gaobo 071001
	$SAVECONF_ALERT       ="���ڶ����н��в��������Ժ����ύ���ã�";
	$SAVECONF_TIP         ="���ڴ����У����Ժ�...ҳ�淵�غ�������б��ṹû��ˢ�£����ֶ�ˢ��";

	
	//added by gaobo 071203
    $SAFEMODE_IMAGE        ="safemode.jpg";
	$PRO_SAFEMODE_TIP_A     ="�������ڽ������������ָ������Ժ�...";
	$PRO_SAFEMODE_TIP_B     ="���е����������ָ�������ϣ���ȴ�ҳ����ת...";
	
	//inc_banner.php added by gaobo 071001
	$BANNER_JPG           ="1-1-zh_CN.jpg";
	$BANNER_VER           ="�汾";
	
	//process_network.php added by gaobo 071001
	$PRO_NETWORK_TIP_A    ="���ڱ���������Ϣ...";   
	$PRO_NETWORK_TIP_B    ="�����ļ��Ѿ����棬�Ժ��Զ����ӵ�";
	$PRO_NETWORK_ALERT    ="�޸�ʧ�ܣ��������޸ģ�";
	
	//process_restore_default.php added by gaobo 071002
	$PRO_DEFAULT_TIP_A    ="���Ժϵͳ���ڽ��лָ���������";
	$PRO_DEFAULT_TIP_B    ="�ѻָ�Ϊ��������,��ӭʹ�øô������й���ϵͳ!";	
	
	//071220
	$SYSBUSY_ALERT        ="ϵͳæ�����Ժ�����...";
	
?>
