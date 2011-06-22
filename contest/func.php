<?

function tbb($path, $text) {
	echo '<a class=hd href="';
	echo $path;
	echo '">'.$text.'</a> ';
}

function ContestHead($cid=0) {
	global $MSG;
	echo "<center><div>";
	tbb("../contest/index.php?cid=$cid", $MSG['HOME']);
	tbb("../contest/contest.php?cid=$cid", $MSG['PROBLEMS']);
	tbb("../contest/rank.php?cid=$cid", $MSG['RANKLIST']);
	tbb("../contest/status.php?cid=$cid", $MSG['STATUS']);
	tbb("../contest/statistics.php?cid=$cid", $MSG['STATISTICS']);
	echo "</div></center>";
}

function ReadContestList() {
	$sql="SELECT * FROM `contest` WHERE `defunct`='N' ORDER BY `contest_id` DESC";
	$result=mysql_query($sql);
	return $result;
}

function ShowContestList($result) {
	global $MSG;
$color=false;
echo "<center><table width=90%><caption>{$MSG['CONTEST']}</caption>";
echo "<tr class=toprow align=center><td width=10%>编号<td width=50%>名称<td width=30%>状态<td width=10%>开放</tr>";
while ($row=mysql_fetch_object($result)){
	if ($color) echo "<tr align=center class=oddrow>";
	else echo "<tr align=center class=evenrow>";
	echo "<td>$row->contest_id";
	echo "<td><a href='../contest/index.php?cid=$row->contest_id'>$row->title</a>";
	$start_time=strtotime($row->start_time);
	$end_time=strtotime($row->end_time);
	$now=time();
	if ($now>$end_time)
		echo "<td><font color=green>Ended@$row->end_time</font>";
	else if ($now<$start_time)
		echo "<td><font color=blue>Start@$row->start_time</font>";
	else
		echo "<td><font color=red> Running </font>";
	$private=intval($row->private);
	if ($private==0) echo "<td><font color=blue>{$MSG['Public']}</font>";
	else echo "<td><font color=red>{$MSG['Private']}</font>";
	echo "</tr>";
	$color=!$color;
}
echo "</table></center>";
mysql_free_result($result);
}

?>
