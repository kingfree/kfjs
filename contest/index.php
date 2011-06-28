<?
require_once("../include/class.php");
$index = new Page();

if (isset($_GET['cid'])) {
	$contest = new Contest($_GET['cid']);
$index->HTMLHead($contest->name);
$index->BodyHead();
$index->MainHead();
	if($contest->error!="")
		$index->ShowError($contest->error);
	else {
		$contest->ContestHead();
		$contest->ShowContestIndex();
	}
} else {
	$contest = new Contest(-1);
$index->HTMLHead(_GB_CONTEST);
$index->BodyHead();
$index->MainHead();
	$contest->ShowContestList();
}

/*

$contest_ok=true;
$str_private="SELECT count(*) FROM `contest` WHERE `contest_id`='$cid' && `private`='1'";
$result=mysql_query($str_private);
$row=mysql_fetch_row($result);
mysql_free_result($result);
if ($row[0]=='1' && !isset($_SESSION['c'.$cid])) $contest_ok=false;
if (isset($_SESSION['administrator'])) $contest_ok=true;

	// check contest valid
	$sql="SELECT * FROM `contest` WHERE `contest_id`='$cid' AND `defunct`='N' ";
	$result=mysql_query($sql);
	$rows_cnt=mysql_num_rows($result);
	echo "<center>";
	if ($rows_cnt==0){
		mysql_free_result($result);
		ShowError("无此比赛！",0);
	}else{
		$row=mysql_fetch_object($result);
		$now=time();
		$start_time=strtotime($row->start_time);
		$end_time=strtotime($row->end_time);
		echo "<h3>{$MSG['CONTEST']}:{$row->title}</h3>开始时间: <font color=#993399>$row->start_time</font> ";
		echo "结束时间: <font color=#993399>$row->end_time</font><br>";
		echo "当前时间: <font color=#993399>".date("Y-m-d H:i:s")."</font> 状态:";
		if ($now>$end_time) echo "<font color=red>{$MSG['已结束']}</font>";
		else if ($now<$start_time) echo "<font color=red>{$MSG['未开始']}</font>";
		else echo "<font color=red>{$MSG['进行中']}</font>";
		if ($row->private=='0') echo "&nbsp;&nbsp;<font color=blue>{$MSG['Public']}</font>";
		else echo "&nbsp;&nbsp;<font color=red>{$MSG['Pravite']}</font>";
		if (!isset($_SESSION['administrator']) && $now<$start_time){
			echo "</center>";
MainFoot();
BodyFoot();
HTMLFoot();
			exit(0);
		}
	}
	if (!$contest_ok)
		ShowError("未受邀请！",1);
	$sql="SELECT `problem`.`title` as `title`,`problem`.`problem_id` as `pid`
		FROM `contest_problem`,`problem`
		WHERE `contest_problem`.`problem_id`=`problem`.`problem_id` AND `problem`.`defunct`='N'
		AND `contest_problem`.`contest_id`='$cid' ORDER BY `contest_problem`.`num`";
	$result=mysql_query($sql);
	$cnt=0;
	echo "<table width=60%><tr class=toprow><td width=5><td width=34%><b>题号</b><td width=65%><b>题目</b></tr>";
	while ($row=mysql_fetch_object($result)){
		if ($cnt&1) echo "<tr class=oddrow>";
		else echo "<tr class=evenrow>";
		echo "<td>";
		if (isset($_SESSION['user_id'])) echo check_ac($cid,$cnt);
		echo "<td>$row->pid 题目 $PID[$cnt]
			<td><a href='../problem/problem.php?cid=$cid&pid=$cnt'>$row->title</a>
			</tr>";
		$cnt++;
	}
	echo "</table><br>";
	mysql_free_result($result);
	echo "[<a href='../contest/status.php?cid=$cid'>{$MSG['STATUS']}</a>]";
	echo "[<a href='../contest/rank.php?cid=$cid'>{$MSG['RANKLIST']}</a>]";
	echo "[<a href='../contest/statistics.php?cid=$cid'>{$MSG['STATISTICS']}</a>]";
	echo "</center>";
}else {
	ShowContestList(ReadContestList());
}*/

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>

