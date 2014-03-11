<?php
	$PATH_BLACKLIST = "logon/blacklist.txt";
	/*
	**function:		验证用户名和密码是否正确
	**userName:		用户名
	**password:		密码
	**returnValue:	1：正确；0：错误
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
	**function:		得到用户的权限
	**userName:		用户名
	**returnValue:	非0：正确；0：错误
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
	**function:		将尝试输入密码次数超过N次的ip写入黑名单
	**ip:			客户端ip
	**returnValue:	1：成功；0：失败
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
	**function:		当用户正确登录后，判断他的ip是否存在于黑名单中，若存在，则删除掉
	**ip:			客户端ip
	**returnValue:	1：成功；0：失败
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
	**function:		将超过24小时的ip地址从黑名单中去掉
	**returnValue:	1：成功；0：失败
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
	**function:		得到客户端的ip地址
	**returnValue:	unknown：无法得到；其它：得到
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
	**function:		当用户登录时，从黑名单中查找此用户在黑名单中出现的次数
	**ip:			客户端ip
	**returnValue:	0：不在黑名单中；其它数字：在黑名单中出现的次数
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