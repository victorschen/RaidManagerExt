<?php
	$PATH_LOG = "log/log";    //日志文件的位置
	$PATH_NO = 1500;   //日志文件的最大记录数
	
	
	/*
	**function:		将用户的操作日志$content写入日志文件中
	**content:		用户名
	**returnValue:	1：正确；0：错误
	*/
	function writeLog($content)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		
		$fp = fopen("$PATH_LOG", "w");
		$time = date("Y-m-d H:i:s");
		$message = $_SESSION['logon_name'].'#'.$time.'#'.$content."\n";
		fwrite($fp, $message);
		
		$count = count($log);
		if($count<$PATH_NO)
		{	
			foreach($log as $key=>$value)
			{
				fwrite($fp, $value);
			}
		}
		else
		{
			foreach($log as $key=>$value)
			{
				if($key==$PATH_NO-1)
				{
					continue;
				}
				fwrite($fp, $value);
			}
		}
		
		fclose($fp);
	}
	
	/*
	**function:		读取用户的操作日志
	**pageNo:		欲读取的页数
	**number:		一页显示的记录数
	**returnValue:	包含日志记录的一个数组
	*/
	function readLog($pageNo, $number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		$count = count($log);   				//总记录数
		$pageCount = getPageCount($number);		//总页数
		
		//要转到的页数小于0
		if($pageNo<=0)
		{
			$pageNo = 0;
		}
		else
		{
			//要转到的页数大于总页数
			if($pageNo>$pageCount)
			{
				$pageNo = $pageCount-1;
			}
			else
			{
				$pageNo = $pageNo-1;
			}
		}
		
		
		$start = $pageNo*$number;			//开始读取位置
		$array = array();					//用来存放读取到的日志记录
		
		if($count-$start<=$number)
		{
			for($i=$start,$j=0; $i<$count; $i++,$j++)
			{
				$array[$j] = $log[$i];
			}
		}
		else
		{
			for($i=0; $i<$number; $i++)
			{
				$array[$i] = $log[$start+$i];
			}
		}
		
		return $array;
	}
	
	/*
	**function:		得到操作日志的总页数
	**number:		一页显示的记录数
	**returnValue:	操作日志的总页数
	*/
	function getPageCount($number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		$count = count($log);   				//总记录数
		$pageCount = (int)($count%$number)==0 ? (int)($count/$number):((int)($count/$number)+1);	//总页数
		
		return $pageCount;
	}
	
	/*
	**function:		把指定条数的日志,从日志记录中删除掉
	**number:		剩余的日志的条数
	**returnValue:	操作是否成功,1:成功;0:失败
	*/
	function clearLogByNO($number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		
		$fp = fopen("$PATH_LOG", "w");
		
		$count = count($log);
		if($number<=$count)   //总记录数大于剩余的记录数
		{
			for($i=0; $i<$number; $i++)
			{	
				fwrite($fp, $log[$i]);
			}
		}
		else  //总记录数小于剩余的记录数
		{
			foreach($log as $key=>$value)
			{
				fwrite($fp, $value);
			}
		}
		
		
		fclose($fp);
		return 1;
	}
	
	/*
	**function:		得到操作日志的总条数
	**returnValue:	操作日志的总条数
	*/
	function getRecordCount()
	{
		global $PATH_LOG;
		
		$log = file("$PATH_LOG");
		
		$count = count($log);
		
		return $count;
	}
?>
