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
        $this->ip = "0.0.0.0";//$_SERVER['REMOTE_ADDR'];
        $this->submit_time = date("Y-m-d h:i:s");
        $this->detail = "";
        echo $this->submit_time;
    }
}

public function Upload() {
    echo "<div class=ptt>正在上传文件……</div>\n<div class=ptx>";
    if ($_FILES["file"]["error"] > 0) {
        ShowErrorGo("错误: ".$_FILES["file"]["error"], $_FILES["file"]["error"], 0);
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
echo "</div>";
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
$this->memory_limit = $row->memory_limit;
$this->program_type = $row->program_type;
$this->compare_type = $row->compare_type;
}

function getmicrotime()
{
	list($usec, $sec) = explode(" ",microtime());
	return $sec.substr($usec,1);
}
public function Judge() {
    echo "<div class=ptt>开始评测……</div>\n<div class=ptx>";
    $input_name = str_replace("#", "", $this->input_template);
    $output_name = str_replace("#", "", $this->output_template);
    $answer_name = str_replace("#", "", $this->answer_template);
    $score = 0;
    for($i=$this->start_num; $i<=$this->end_num; $i++) {

        echo "创建测试点{$i}…\n";
        if(file_exists($input_name)) unlink($input_name);
        $now_in = str_replace("#", $i, $this->input_template);
        $crlink="ln -s {$this->datadir}{$now_in} {$input_name}";
	    exec($crlink);

        echo "运行…\n";
        $execute="(ulimit -v {$this->memory_limit}; a.exe)";
        $runcmd = "./a.exe";
        exec($runcmd);

        echo "比较…\n";
        if(file_exists($answer_name)) unlink($answer_name);
        $now_ans = str_replace("#", $i, $this->answer_template);
	    $crlink="ln -s {$this->datadir}{$now_ans} {$answer_name}";
        exec($crlink);
        if(!file_exists($output_name)) {
            $now = _ch_NO;
            echo _ch_NO."\n";
        } else {
        $fout=fopen($output_name,"r");
        $fin=fopen($input_name,"r");
    	$fans=fopen($answer_name,"r");
        $score=$this->standard_compare($fans,$fout);
        if($score == 10) $now = _ch_AC;
        else if($score == 0) $now = _ch_WA;
        else $now = $score;
        echo "得分【{$score}】\n";
        $this->score += $score;
        $this->detail+= $now;
		fclose($fin);
		fclose($fout);
		fclose($fans);
        if(file_exists($output_name)) unlink($output_name);
        }

        echo "<br />";
    }

    if($this->score >= $this->end_num - $this->start_num + 1)
        $this->result = _num_AC;
    else
        $this->result = _num_WA;
    $this->runtime = 0;
    $this->memory = 0;

    echo "</div>";
/*
for ($P=1;$P<=$d[datacnt];$P++) {
	$Cp->run($P);
	$totaltime+=round($Cp->rtime,0);
	$avgmemory+=$Cp->memory;
	echo "测试数据："$P;
	echo $Cp->getresult();
	printf("运行时间：%.3f s",$Cp->rtime/1000.0);
	echo $Cp->memory;
	echo $Cp->exitcode;
}*/
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

	public function GetNewJID() {
		$sql="SELECT max(`jid`) as jid FROM `submit`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->jid = $row->jid+1;
		mysql_free_result($result);
	}

public function AddData() {
    $this->GetNewJID();
    $sql = "INSERT into `submit`(`jid`, `pid`, `cid`, `uid`, `result`, `detail`, `score`, `runtime`, `memory`, `ip`, `submit_time`, `judge_time`) VALUES($this->jid, $this->pid, $this->cid, \"$this->uid\", $this->result, \"$this->detail\", $this->score, $this->runtime, $this->memory, \"$this->ip\", \"$this->submit_time\", NOW())";
    //echo "<pre>".$sql."</pre>";
    mysql_query($sql) or die(mysql_error());
}

public function Congratulate() {
    echo "<div class=ptt>评测完成！</div>\n<div class=ptx>";
    $this->AddData();
    echo $this->detail;
    echo "</div>\n";
}

	public function Get_Complie_CMD() {
	if($this->langtype==0)
		$s = "gcc \"{$this->filename}\" -lm -w -O2 -static -o a.exe 2>&1";
	elseif($this->langtype==1)
		$s = "g++ \"{$this->filename}\" -lm -w -O2 -static -o a.exe 2>&1";
	elseif($this->langtype==2)
		$s = "fpc \"{$this->filename}\" -o\"a.exe\" 2>&1";
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

}

?>
