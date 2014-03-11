<?php
	$PATH_BLACKLIST = "logon/blacklist.txt";
	/*
	**function:		��֤�û����������Ƿ���ȷ
	**userName:		�û���
	**password:		����
	**returnValue:	1����ȷ��0������
	*/
	function  validateUserPassword($userName, $password)
	{
		$users = file("users.txt");
		$password_md5 = md5($password);
		
		while(list($key, $value) = each($users))
		{
			$user = split(":",$value);
			$file_name = $user[0];
			$file_pass = $user[1];
			$file_pass = trim($file_pass);
			
			if(($userName==$file_name) && ($password_md5==$file_pass))
			{
				return 1;
			}
		}
		
		return 0;
	}
	
	/*
	**function:		�õ��û���Ȩ��
	**userName:		�û���
	**returnValue:	��0����ȷ��0������
	*/
	function  getPrivilege($userName)
	{
		$users = file("users.txt");
		
		while(list($key, $value) = each($users))
		{
			$user = split(":",$value);
			$file_name = $user[0];
			
			if($userName==$file_name)
			{
				return $user[2];
			}
		}
		
		return 0;
	}
	
	/*
	**function:		���������������������N�ε�ipд�������
	**ip:			�ͻ���ip
	**returnValue:	1���ɹ���0��ʧ��
	*/
	function addInBlackList($ip)
	{
		global $PATH_BLACKLIST;
		$blacklist = file("$PATH_BLACKLIST");
		$isInBlackList = 0;
		
		$ip_address ="";
		$time = "";
		$count = "";
		
		while(list($key, $value) = each($blacklist))
		{	
			$arrayBakLst = split("#", $value);
			$ip_address = $arrayBakLst[0];
			
			if($ip_address==$ip)
			{
				$time = trim($arrayBakLst[1]);
				$count = trim($arrayBakLst[2]);
				$count = (int)$count + 1;
				$blacklist[$key] = "$ip#$time#$count\n";
				
				$fp = fopen("$PATH_BLACKLIST", "w");
				foreach($blacklist as $keys=>$values)
				{
					fwrite($fp, $values);
				}
				fclose($fp);
				
				$isInBlackList = 1;
				break;
			}
		}
		
		if($isInBlackList==0)
		{
			$time = time();
			$count = "1";
			
			$fp = fopen("$PATH_BLACKLIST", "a");
			fwrite($fp, "$ip#$time#$count\n");
			fclose($fp);
		}
		
		return 1;
	}
	
	/*
	**function:		���û���ȷ��¼���ж�����ip�Ƿ�����ں������У������ڣ���ɾ����
	**ip:			�ͻ���ip
	**returnValue:	1���ɹ���0��ʧ��
	*/
	function deleteFromBlackList($ip)
	{
		global $PATH_BLACKLIST;
		$blacklist = file("$PATH_BLACKLIST");
		$ip_address ="";
		
		while(list($key, $value) = each($blacklist))
		{	
			$arrayBakLst = split("#", $value);
			$ip_address = $arrayBakLst[0];
			
			if($ip_address==$ip)
			{
				$blacklist[$key] = "";
			}
		}
				
		$fp = fopen("$PATH_BLACKLIST", "w");
		foreach($blacklist as $keys=>$values)
		{
			if($values!="")
			{
				fwrite($fp, $values);
			}
		}
		fclose($fp);
		
		return 1;
	}
	
	/*
	**function:		������24Сʱ��ip��ַ�Ӻ�������ȥ��
	**returnValue:	1���ɹ���0��ʧ��
	*/
	function refreshBlackList()
	{
		global $PATH_BLACKLIST;
		$blacklist = file("$PATH_BLACKLIST");
		$TIME = 24*60*60;
		$time = "";
		
		while(list($key, $value) = each($blacklist))
		{	
			$arrayBakLst = split("#", $value);
			$time = $arrayBakLst[1];
			$leftTime = time()-(int)$time;
			
			if($leftTime-$TIME >= 0)
			{
				$blacklist[$key] = "";
			}
		}
				
		$fp = fopen("$PATH_BLACKLIST", "w");
		foreach($blacklist as $keys=>$values)
		{
			if($values!="")
			{
				fwrite($fp, $values);
			}
		}
		fclose($fp);
		
		return 1;
	}
	
	/*
	**function:		�õ��ͻ��˵�ip��ַ
	**returnValue:	unknown���޷��õ����������õ�
	*/
	function getClientIp()
	{
		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
			   $ip = getenv("HTTP_CLIENT_IP");
		   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			   $ip = getenv("HTTP_X_FORWARDED_FOR");
		   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
			   $ip = getenv("REMOTE_ADDR");
		   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			   $ip = $_SERVER['REMOTE_ADDR'];
		   else
			   $ip = "unknown";
			   
	   return($ip);
	}
	
	/*
	**function:		���û���¼ʱ���Ӻ������в��Ҵ��û��ں������г��ֵĴ���
	**ip:			�ͻ���ip
	**returnValue:	0�����ں������У��������֣��ں������г��ֵĴ���
	*/
	function getErrorInputNO($ip)
	{
		global $PATH_BLACKLIST;
		$blacklist = file("$PATH_BLACKLIST");
		$ip_address ="";
		$count = 0;
		
		while(list($key, $value) = each($blacklist))
		{	
			$arrayBakLst = split("#", $value);
			$ip_address = $arrayBakLst[0];
			
			if($ip_address==$ip)
			{
				$count = (int)$arrayBakLst[2];
				return $count;
			}
		}
		
		return 0;
	}
	
	//addInBlackList('192.168.1.1');
	//deleteFromBlackList('192.168.1.1');
	//echo getErrorInputNO('192.168.1.1');
?>