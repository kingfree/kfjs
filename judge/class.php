<?

class Judge {

public $langtype, $filename, $rundir, $datadir, $start_num, $end_num, $pro_filename, $time_limit, $memory_limit;
public $input_template, $output_template, $answer_template;
public $compare_type, $program_type, $io_type;
public $Complie_CMD;
public $jid, $pid, $cid, $uid, $result, $detail, $score, $runtime, $memory, $ip, $submit_time;

public function __construct($pid=-1, $cid=-1) {
    $this->jid = $this->pid = $this->cid = $this->uid =
        $this->result = $this->detail = $this->score =
        $this->runtime = $this->memory = $this->ip = $this->submit_time = 0;
    $this->pid = $pid;
    $this->rundir = "../upload/".$this->pid."/";
    if (!file_exists($this->rundir)) mkdir($this->rundir);
    $this->io_type = $_POST['io_type'];
    chdir($this->rundir);
    $this->datadir = "../../data/".$this->pid."/";

    if(!isset($_SESSION['user_id']))
        ShowErrorGo("请登录！", -1);
    else {
        $this->uid = $_SESSION['user_id'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->submit_time = date("Y-m-d H:i:s");
        $this->detail = "";
    }
}

public function Upload() {
    echo "<div class=ptt>正在上传文件……</div>\n<div class=ptx>";
    if (!isset($_FILES["file"]) || $_FILES["file"]["error"] > 0) {
        ShowErrorGo("错误: ".$_FILES["file"]["error"], $_FILES["file"]["error"], -1);
    } else {
        echo "文件: ".$_FILES["file"]["name"]."<br />";
        echo "类型: ".$_FILES["file"]["type"]."<br />";
        echo "大小: ".$_FILES["file"]["size"]." B<br />";
        echo "位置: ".$_FILES["file"]["tmp_name"]."<br />";
        $this->filename = time().".".$_FILES["file"]["name"] ;
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$this->filename) &&
        chmod($this->filename,0666)) {
            echo "复制到了: ".$this->filename;
        }
    }
    echo "</div>\n";
}

public function CheckLang() {
    echo "<div class=ptt>正在检测文件……</div>\n<div class=ptx>";
    if($_FILES["file"]["size"]>100000) {
        unlink($this->filename);
        ShowErrorGo("文件过大！",-1);
    }

if($_POST['lang_type']=='auto') {
    if($_FILES["file"]["type"]=="text/x-pascal")
        $this->langtype = 2;
    elseif($_FILES["file"]["type"]=="text/x-csrc")
        $this->langtype = 0;
    elseif($_FILES["file"]["type"]=="text/x-c++src")
        $this->langtype = 1;
    else {
		ShowErrorGo("暂时只支持自动检测 C/C++ 及 Pascal 语言！请返回后选择语言！",-1);
	}
} else {
	$this->langtype = $_POST['lang_type'];
}
	$this->Get_Complie_CMD();
echo "对您所使用的语言使用如下编译命令：<br />";
echo "<pre>$this->Complie_CMD</pre>";
echo "处理源文件……";
$file = fopen($this->filename, "rw");
$code = "";
while(!feof($file))
    $code .= fgets($file);
echo "写入数据库……";
$this->GetNewJID();
$sql = "INSERT INTO `submit` (`jid`, `source`, `langtype`, `submit_time`) VALUES ('$this->jid', '".mysql_real_escape_string($code)."', '$this->langtype', NOW());";
mysql_query($sql) or die(mysql_error());
fclose($file);
if($_POST['io_type']==1)
    $this->filter($code,$this->langtype);
if(file_put_contents($this->filename, $code))
echo "完成！";

echo "</div>";
}

public function ReJedge() {
}

public function AddData() {
    $this->memory = $this->memory / ($this->end_num-$this->start_num+1) ;
    $sql = "UPDATE `submit` SET `pid`=$this->pid, `cid`=$this->cid, `uid`='$this->uid', `result`=$this->result, `detail`='$this->detail', `score`=$this->score, `runtime`=$this->runtime, `memory`=$this->memory, `ip`='$this->ip', `judge_time`=NOW() WHERE `jid`=$this->jid";
    //echo "<pre>".$sql."</pre>";
    mysql_query($sql) or die(mysql_error());
}


public function Complie() {
echo "<div class=ptt>正在编译……</div>\n<div class=ptx>";
	if (file_exists("a.exe"))
		unlink("a.exe");
	$handle = popen("timeout 5 ".$this->Complie_CMD, 'r');
	echo "编译…";
	$tmp = $this->rfile($handle);
	echo "读取…";
	pclose($handle);
	echo "关闭…";
	if (file_exists("a.exe"))
		echo "成功<br />\n<pre>\n$tmp\n</pre>";
	else {
		echo "<span style='color:red;'>失败</span><br />";
        $this->result = _num_CE;
        $this->detail = _ch_CE;
        $this->score = 0;
        $this->memory = $this->runtime = -1;
        $this->Adddata();
		ShowErrorGo("编译错误信息：<br />\n<pre>\n$tmp\n</pre>",0);
    }
    echo "</div>";
}

public function GetInfo() {
$sql="SELECT * FROM `problem` WHERE `problem_id`=$this->pid";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_object($result);
$this->start_num = $row->start_num;
$this->end_num = $row->end_num;
$this->input_template = $row->input_template;
$this->output_template= $row->output_template;
$this->answer_template= $row->answer_template;
$this->pro_filename = $row->program_filename;
$this->time_limit = $row->time_limit;
$this->memory_limit = $row->memory_limit*1024;
$this->program_type = $row->program_type;
$this->compare_type = $row->compare_type;
}

function GetMemory() {
    if($_POST['io_type']!=1)
        return -1;
	exec("ps v -C a.exe",$mem);
    if(isset($mem[1])) {
        sscanf($mem[1],"%ld%s%s%s%s%ld%ld",&$ar[1],&$ar[2],&$ar[3],&$ar[4],&$ar[5],&$ar[6],&$ar[7]);
        return $ar[7];
    }
    return -1;
}

function GetMicroTime() {
	list($usec, $sec) = explode(" ",microtime()); 
	return $sec.substr($usec,1);
}

public function Judge() {
    echo "<div class=ptt>开始评测……</div>\n<div class=ptx>";
    $this->result = -1;
    $input_name = str_replace("#", "", $this->input_template);
    $output_name = str_replace("#", "", $this->output_template);
    $answer_name = str_replace("#", "", $this->answer_template);
    $score = 0;
    $ExitCode = 0;
    $runtime = 0.0;
    $Memory = 0;
    $s = -1;
    if($_POST['io_type']==1)
        $execute="(ulimit -v {$this->memory_limit}; ./a.exe)";
    else
        $execute="(ulimit -v {$this->memory_limit}; ./a.exe < $input_name > $output_name)";
    for($i=$this->start_num; $i<=$this->end_num; $i++) {
        echo "创建测试点{$i}…\n";
        if(file_exists($input_name)) unlink($input_name);
        $now_in = str_replace("#", $i, $this->input_template);
        $crlink="ln -s {$this->datadir}{$now_in} {$input_name}";
	    exec($crlink);

        echo "运行…\n";
        //创建进程
        $descriptor = array(0 => array("pipe", "r"),1 => array("pipe", "w"),2 => array("pipe", "w"));
        $process = proc_open($execute, $descriptor, $pipes);
        $status=proc_get_status($process);
        //获取初始内存
        $Memory=$this->GetMemory();
        //继续程序运行
        fwrite($pipes[0],"1");
        fclose($pipes[0]);
        //卡时
        $time_start = $this->GetMicroTime();
        $lmt=$time_start;
        for(;;) {
            $status=proc_get_status($process);
            if (!$status['running']) break; //运行结束
            $time_now = $this->GetMicroTime();
            $runtime=($time_now-$time_start)*900; //放开部分时限
            if ($time_now-$lmt>0.05) {//每50毫秒检测一次内存
                $lmt=$time_now;
                $NewMemory=$this->GetMemory();
                if ($NewMemory>$Memory)
                    $Memory=$NewMemory;
            }
            if ($runtime>$this->time_limit) {//超时
                //杀死进程
                proc_terminate($process);
                exec("killall a.exe");
                $s = 0;
                $now = _ch_TL;
                $score = 0;
                $this->result = _num_TL;
                echo GetJudgeInfo(_num_TL)."\n";
                break;
            }
        }
        $ExitCode=$status['exitcode'];
        proc_close($process);
        printf("返回【%d】，时间【%.2lf ms】，内存【%d KB】。", $ExitCode, $runtime, $Memory);
        $this->runtime += $runtime;
        $this->memory += $Memory;

        echo "比较…\n";
        if(file_exists($answer_name)) unlink($answer_name);
        $now_ans = str_replace("#", $i, $this->answer_template);
	    $crlink="ln -s {$this->datadir}{$now_ans} {$answer_name}";
        exec($crlink);
        if(!file_exists($output_name)) {
            $now = _ch_NO;
            $score = 0;
            $this->result = _num_NO;
            echo GetJudgeInfo(_num_NO)."\n";
        } else if($ExitCode == 137 && $s == -1) {
            $now = _ch_ML;
            $score = 0;
            $this->result = _num_ML;
            echo GetJudgeInfo(_num_ML)."\n";
        } else if($ExitCode != 0 && $s == -1) {
            $now = _ch_RE;
            $score = 0;
            $this->result = _num_RE;
            echo GetJudgeInfo(_num_RE)."\n";
        } else if($s == -1) {
            $fout=fopen($output_name,"r");
            $fin=fopen($input_name,"r");
            $fans=fopen($answer_name,"r");
            $score=$this->standard_compare($fans,$fout);
            if($score == 10) $now = _ch_AC;
                else if($score == 0) $now = _ch_WA;
                else $now = $score;
            fclose($fin);
            fclose($fout);
            fclose($fans);
            unlink($output_name);
        }

        echo "得分【{$score}】\n";
        $this->score += $score;
        $this->detail.= $now;

        echo "<br />";
    }

    if($this->result==-1) {if($this->score >= ($this->end_num - $this->start_num + 1)*10)
        $this->result = _num_AC;
    else
        $this->result = _num_WA;}

    echo "</div>";
}

	public function GetNewJID() {
		$sql="SELECT max(`jid`) as jid FROM `submit`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->jid = $row->jid+1;
		mysql_free_result($result);
	}

public function Congratulate() {
    echo "<div class=ptt>评测完成！</div>\n<div class=ptx>";
    $this->AddData();
    printf("运行编号：<a href='../status/status.php?jid=%s'>%d</a>\n题目：<a href='../problem/problem.php?id=%d'>%s</a>\n用户：%s<br />\n结果：%s\n详细结果：%s\n得分：%d<br />\n总耗时：%s\n平均内存使用：%s\n", $this->jid, $this->jid, $this->pid, GetProblemTitle($this->pid), $this->uid, GetJudgeInfo($this->result), $this->detail, $this->score, ($this->runtime == -1 ? "N/A" : $this->runtime." ms"), ($this->memory == -1 ? "N/A" : $this->memory." KB"));
}

	public function Get_Complie_CMD() {
	if($this->langtype==0)
		$s = "gcc \"{$this->filename}\" -lm -w -O2 -static -o a.exe 2>&1";
	elseif($this->langtype==1)
		$s = "g++ \"{$this->filename}\" -lm -w -O2 -static -o a.exe 2>&1";
	elseif($this->langtype==2)
		$s = "fpc \"{$this->filename}\" -So -XS -v0 -O1 -o\"a.exe\" 2>&1";
	else
		$s = "chmod +rx \"{$this->filename}\" && cp \"{$this->filename}\" \"a.exe\"";
	$this->Complie_CMD = $s;
}

function GetStatus($str) {
    $arr = parse_ini_file("../../judge/judge.ini");
    return $arr[$str];
}
function SetStatus($str, $value) {
    $arr = parse_ini_file("../../judge/judge.ini");
    $arr[$str] = $value;
    write_ini_file($arr, "../../judge/judge.ini");
}

function standard_compare($f1,$f2) {
	do
	{
		$d1=fgetc($f1);
		while ($d1==" " || $d1=="\n" || $d1=="\r")
			$d1=fgetc($f1);
		$d2=fgetc($f2);
		while ($d2==" " || $d2=="\n" || $d2=="\r")
			$d2=fgetc($f2);
		if ($d1===false) break;
		if ($d2===false) return 0;
		if ($d1!=$d2) return 0;
	} while (true);
	if (!($d2===false))
	{
		while (!($d2===false))
		{
			$d2=fgetc($f2);
			if ($d2!=" " && $d2!="\n" && $d2!="\r")
				return 0;
		}
	}
	return 10;
}

/*
	代码过滤器
	添加输入暂停
*/
function addpauser_pas($code)
{
	$e=0;
	$com=0;
	$ins=false;
	$pos=0;
	$yy=0;
	for ($i=strlen($code)-1;$i>=0;$i--)
	{
	
		$zs=substr($code,$i,1);
		if ($zs=="'" && $com==0)
			$yy=!$yy;
		
		if ($yy)
		{
			continue;
		}
		
		$zs=strtolower(substr($code,$i,1));
		if ($zs=="}")
			$com++;
		if ($zs=="{")
			$com--;
		
		$zs=strtolower(substr($code,$i,2));
		if ($zs=="//")
		{
			for ($j=$i;$j<=strlen($code)-1;$j++)
			{
				$zs=substr($code,$j,1);
				if ($zs=="\n")
					break;
				$end=strtolower(substr($code,$j,3));
				if ($end=="end")
				{
					$e--;
					if ($e==0)
						$ins=false;
				}
				$end=strtolower(substr($code,$j,5));
				if ($end=="begin")
				{
					$e++;
					if ($e==0)
						$ins=false;
				}
			}
		}
		
		$end=strtolower(substr($code,$i,3));
		if ($end=="end" && $com==0)
		{
			$e++;
			$ins=true;
		}
		$begin=strtolower(substr($code,$i,4));
		if ($begin=="case" && $com==0)
		{
			$e--;
			if ($e==0)
				$ins=false;
		}
		$begin=strtolower(substr($code,$i,5));
		if ($begin=="begin" && $com==0)
			$e--;
		if ($ins && $e==0)
		{
			$pos=$i;
			break;
		}
	}
	$pos+=5;
	$part=substr($code,0,$pos);
	$pc=$part . "  while (eof(input)) do  ;";
	$pc.=substr($code,$pos);
	return $pc;
}

function addpauser_c($code)
{
	$com=0;
	$yy=0;
	$pos=0;
	for ($i=0;$i<=strlen($code)-1;$i++)
	{
		$zs=substr($code,$i,2);
		if ($zs=='\"' && $com==0)
		{
			$i++;
			continue;
		}
		$zs=substr($code,$i,1);
		if ($zs=='"' && $com==0)
			$yy=!$yy;
		
		if ($yy)
		{
			continue;
		}
		
		$zs=substr($code,$i,2);
		if ($zs=='/*')
			$com++;
		if ($zs=='*/')
			$com--;
		if ($zs=='//')
		{
			for (;$i<=strlen($code)-1;$i++)
			{
				$zs=substr($code,$i,1);
				if ($zs=="\n")
					break;
			}
		}
		$main=substr($code,$i,5);
		if ($main==" main" || $main=="	main" || $main=="\nmain" && $com==0)
		{
			$pos=$i;
			break;
		}
	}
	for (;$i<=strlen($code)-1;$i++)
	{
		$zs=substr($code,$i,2);
		if ($zs=='/*')
			$com++;
		if ($zs=='*/')
			$com--;
		if ($zs=='//')
		{
			for (;$i<=strlen($code)-1;$i++)
			{
				$zs=substr($code,$i,1);
				if ($zs=="\n")
					break;
			}
		}
		$main=substr($code,$i,1);
		if ($main=="{" && $com==0)
		{
			$pos=$i;
			break;
		}
	}
	$pos+=2;
	$part=substr($code,0,$pos);
	$pc=$part . " getchar(); ";
	$pc.=substr($code,$pos);
	return $pc;
}

function filter(&$code,$lang)
{
	$banlist=array("fork","socket","exec","system","pipe");
	$banlist_pas=array('{$','inline',"'/tmp");
	$banlist_c=array('"/tmp');
	foreach ($banlist as $p=>$v)
	{
		if (!(strpos($code,$v)===false))
			return $v;
	}
	if ($lang==2)
	{
		foreach ($banlist_pas as $p=>$v)
		{
			if (!(strpos($code,$v)===false))
				return $v;
		}
		$code=$this->addpauser_pas($code);
	}
	else
	{
		foreach ($banlist_c as $p=>$v)
		{
			if (!(strpos($code,$v)===false))
				return $v;
		}
		$code=$this->addpauser_c($code);
	}
	return "";
}

function rfile($fp)
{
	$out="";
	while (!feof($fp)) 
		$out.= fgets($fp, 1024000);
	return $out;
}

function wfile($str,$fname)
{
	$fp=fopen($fname,"w");
	fputs($fp,$str,strlen($str));
	fclose($fp);
}

}

?>
