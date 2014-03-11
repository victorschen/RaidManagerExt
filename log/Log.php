<?php
	$PATH_LOG = "log/log";    //��־�ļ���λ��
	$PATH_NO = 1500;   //��־�ļ�������¼��
	
	
	/*
	**function:		���û��Ĳ�����־$contentд����־�ļ���
	**content:		�û���
	**returnValue:	1����ȷ��0������
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
	**function:		��ȡ�û��Ĳ�����־
	**pageNo:		����ȡ��ҳ��
	**number:		һҳ��ʾ�ļ�¼��
	**returnValue:	������־��¼��һ������
	*/
	function readLog($pageNo, $number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		$count = count($log);   				//�ܼ�¼��
		$pageCount = getPageCount($number);		//��ҳ��
		
		//Ҫת����ҳ��С��0
		if($pageNo<=0)
		{
			$pageNo = 0;
		}
		else
		{
			//Ҫת����ҳ��������ҳ��
			if($pageNo>$pageCount)
			{
				$pageNo = $pageCount-1;
			}
			else
			{
				$pageNo = $pageNo-1;
			}
		}
		
		
		$start = $pageNo*$number;			//��ʼ��ȡλ��
		$array = array();					//������Ŷ�ȡ������־��¼
		
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
	**function:		�õ�������־����ҳ��
	**number:		һҳ��ʾ�ļ�¼��
	**returnValue:	������־����ҳ��
	*/
	function getPageCount($number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		$count = count($log);   				//�ܼ�¼��
		$pageCount = (int)($count%$number)==0 ? (int)($count/$number):((int)($count/$number)+1);	//��ҳ��
		
		return $pageCount;
	}
	
	/*
	**function:		��ָ����������־,����־��¼��ɾ����
	**number:		ʣ�����־������
	**returnValue:	�����Ƿ�ɹ�,1:�ɹ�;0:ʧ��
	*/
	function clearLogByNO($number)
	{
		global $PATH_LOG;
		global $PATH_NO;
		
		$log = file("$PATH_LOG");
		
		$fp = fopen("$PATH_LOG", "w");
		
		$count = count($log);
		if($number<=$count)   //�ܼ�¼������ʣ��ļ�¼��
		{
			for($i=0; $i<$number; $i++)
			{	
				fwrite($fp, $log[$i]);
			}
		}
		else  //�ܼ�¼��С��ʣ��ļ�¼��
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
	**function:		�õ�������־��������
	**returnValue:	������־��������
	*/
	function getRecordCount()
	{
		global $PATH_LOG;
		
		$log = file("$PATH_LOG");
		
		$count = count($log);
		
		return $count;
	}
?>
