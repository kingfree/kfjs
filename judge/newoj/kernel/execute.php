<?php
/*
	执行测试点
	传送应用测试点 ID
*/
require("compare.php");

function CreateLink($ID,$Pname,$TestdataDIR)
{
	DestroyLink($Pname);
	$target="{$TestdataDIR}/{$Pname}/{$Pname}{$ID}.in";
	if (!file_exists($target))
		return false;
	else
		symlink($target,"{$Pname}.in");
	return true;
}

function DestroyLink($Pname)
{
	if (file_exists("{$Pname}.in")) unlink("{$Pname}.in");
}

function GetMemory($Tname)
{
	exec("ps v -C {$Tname}",$mem);
	sscanf($mem[1],"%ld%s%s%s%s%ld%ld",&$ar[1],&$ar[2],&$ar[3],&$ar[4],&$ar[5],&$ar[6],&$ar[7]);
	return $ar[7];
}

function GetMicroTime()
{
	list($usec, $sec) = explode(" ",microtime()); 
	return $sec.substr($usec,1);
}

//初始化变量
$Counter=(int)$App->Get("Counter");
$Counter++;
$App->Set("Counter",$Counter);

$rtv=array();
$ID=$inf['ID'];
$MemoryLimit=(int)$App->Get("MemoryLimit")*1024;
$TimeLimit=$App->Get("TimeLimit");
$Tname=$App->Get("Tname");
$Pname=$App->Get("Pname");
$TestdataDIR=$App->Get("TestdataDIR");
$ExecuteDIR=$App->Get("ExecuteDIR");
$CompareMethod=$App->Get("CompareMethod");
$execute="(ulimit -v {$MemoryLimit}; ./{$Tname})";
$Result="";
$Score=0;
$runtime=0.0;
$Memory=0;
$ExitCode=-1;
chdir($ExecuteDIR);

//创建输入文件链接
$succ=CreateLink($ID,$Pname,$App->Get("TestdataDIR"));
if (!$succ)
{
	$Result="S";
}
else
{
	//创建进程
	$descriptor = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
	$process = proc_open($execute, $descriptor, $pipes);
	$status=proc_get_status($process);
	
	//获取初始内存
	$Memory=GetMemory($Tname);
	
	//继续程序运行
	fwrite($pipes[0],"1");
	fclose($pipes[0]);
	
	//卡时
	$time_start = GetMicroTime();
	$lmt=$time_start;
	
	for (;;)
	{
		$status=proc_get_status($process);
		if (!$status['running']) break; //运行结束
		
		$time_now = GetMicroTime();
		$runtime=($time_now-$time_start)*900; //放开部分时限
		
		if ($time_now-$lmt>0.05) //每50毫秒检测一次内存
		{
			$lmt=$time_now;
			$NewMemory=GetMemory($Tname);
			if ($NewMemory>$Memory)
				$Memory=$NewMemory;
		}
		
		if ($runtime>$TimeLimit) //超时
		{
			//杀死进程
			proc_terminate($process);
			exec("killall {$Tname}");
			$Result="T";
			break;
		}
	}
	
	$ExitCode=$status['exitcode'];
	proc_close($process);
	DestroyLink($Pname);
	
	if ($Result=="")
	{
		if ($ExitCode==137) //137超内存
			$Result="M";
		else if ($ExitCode!=0)
			$Result="E";
		else if (!file_exists("{$Pname}.out"))
			$Result="R";
		else
		{
			$fin=fopen("{$TestdataDIR}/{$Pname}/{$Pname}{$ID}.in","r");
			$fans=fopen("{$TestdataDIR}/{$Pname}/{$Pname}{$ID}.ans","r");
			$fout=fopen("{$Pname}.out","r");
			
			if ($CompareMethod=="Simple")
				$Score=SimpleCompare($fout,$fans);
			else if ($CompareMethod=="Verbatim")
				$Score=VerbatimCompare($fout,$fans);
			else if ($CompareMethod=="Plugin")
			{
				require("{$TestdataDIR}/{$Pname}/plugin.php");
				$Score=PluginCompare($fin,$fout,$fans,$Pname,$ID,$TestdataDIR,$ExecuteDIR);
				//插件接口 $fin,$fout,$fans,$Pname,$ID,$TestdataDIR,$ExecuteDIR
			}
			fclose($fin);
			fclose($fout);
			fclose($fans);
			if ($Score==0)
				$Result="W";
			else if ($Score==1)
				$Result="A";
			else
				$Result="P";
		}
	}
}

$rtv['Result']=$Result;
$rtv['Score']=$Score;
$rtv['Runtime']=$runtime;
$rtv['Memory']=$Memory;
$rtv['ExitCode']=$ExitCode;

echo array_encode($rtv);
?>