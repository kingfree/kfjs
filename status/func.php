<?

function Get_Complie_CMD($filename, $outputdir, $langtype) {
	if($langtype==0)
		$s = "gcc \"{$filename}\" -lm -w -O2 -static -o \"{$outputdir}a.exe\" 2>&1";
	elseif($langtype==1)
		$s = "g++ \"{$filename}\" -lm -w -O2 -static -o \"{$outputdir}a.exe\" 2>&1";
	elseif($langtype==2)
		$s = "fpc \"{$filename}\" -So -XS -v0 -O1 -o\"{$outputdir}a.exe\" 2>&1";
	else
		$s = "chmod +rx \"{$filename}\" && cp \"{$filename}\" \"{$outputdir}a.exe\"";
	return($s);
}

function GetNoSharpString($str, $number) {
	$num = strpos($str, "#");
	$str = substr_replace($str, $number, $num, 1);
	return $str;
}

function createlink($i,$query) {
	//if (file_exists(GetNoSharpString(, "")) unlink("{$query['pname']}.in");
	$crlink="ln -s {$datadir}/{$query['pname']}/{$query['pname']}{$i}.in {$query['pname']}.in";
	exec($crlink);
}
function destroylink($i,$query) {
	if (file_exists("{$query['pname']}.in")) unlink("{$query['pname']}.in");
}
function getmicrotime() {
	list($usec, $sec) = explode(" ",microtime());
	return $sec.substr($usec,1);
}

function grade($query)
{
	global $compiledir,$datadir;
	$i=$query['grade'];
	$memorylimit=$query['memorylimit']*1024;
	getdir($query);
	createlink($i,$query);

	$tmp['timeout']=false;
	$tmp['runerr']=false;
	$tmp['noreport']=false;

	$execute="(ulimit -v {$memorylimit}; ./{$query['pname']})";

	$descriptorspec = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
	$process = proc_open($execute, $descriptorspec, $pipes);
	$status=proc_get_status($process);

	$pid=$status['pid']+2;
	exec("ps v -C {$query['pname']}",$mem);
	sscanf($mem[1],"%ld%s%s%s%s%ld%ld",&$ar[1],&$ar[2],&$ar[3],&$ar[4],&$ar[5],&$ar[6],&$ar[7]);
	fwrite($pipes[0],"1");
	fclose($pipes[0]);

	$tmp['memory']=$memory=$ar[7];

	$time_start = getmicrotime();
	setrunning(1);
	for (;;)
	{
		$status=proc_get_status($process);
		if (!$status['running']) break;
		$time_now = getmicrotime();
		$tmp['rtime']=($time_now-$time_start)*950;
		if ($tmp['rtime']>$query['timelimit']) //ʱ,ɱ
		{
			proc_terminate($process);
			//posix_kill($pid,1);
			exec("killall {$query['pname']}");
			$tmp['timeout']=true;
			break;
		}
	}
	setrunning(-1);

	$tmp['exitcode']=$status['exitcode'];
	//137 MLE

	if ($tmp['exitcode']==137)
	{
		$tmp['memoryout']=true;
	}

	if ($tmp['exitcode']!=0)
	{
		$tmp['runerr']=true;
	}

	if (!file_exists("{$query['pname']}.out"))
		$tmp['noreport']=true;
	else
	{
		$fin=fopen("{$datadir}/{$query['pname']}/{$query['pname']}{$i}.in","r");
		$fans=fopen("{$datadir}/{$query['pname']}/{$query['pname']}{$i}.ans","r");
		$fout=fopen("{$query['pname']}.out","r");

		if ($query['plugin']!=0)
		{
			$tmp['score']=standard_compare($fans,$fout);
		}
		if ($query['plugin']==0)
		{
			require("{$datadir}/{$query['pname']}/plugin.php");
			$tmp['score']=plugin_compare($fin,$fout,$fans);
		}
		fclose($fin);
		fclose($fout);
		fclose($fans);
	}
	proc_close($process);

	destroylink($i,$query);

	if (file_exists("{$query['pname']}.out"))
		rename("{$query['pname']}.out","{$query['pname']}{$i}.out");

	echo array_encode($tmp);
}


?>
