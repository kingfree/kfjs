<?
require_once("../include/class.php");
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])))
	exit(1);

$admin = new Admin();
$admin->HTMLHead(_ADMIN_EditProblem);
$admin->BodyHead(_ADMIN_EditProblem);

$sql="SELECT max(`problem_id`) as upid FROM `problem`";
$page_cnt=50;
$result=mysql_query($sql);
echo mysql_error();
$row=mysql_fetch_object($result);
$cnt=intval($row->upid);
$cnt=intval($cnt/$page_cnt)+(($cnt%$page_cnt)>0?1:0);
if (isset($_GET['page'])){
	$page=intval($_GET['page']);
}else $page=$cnt;
$pstart=$page_cnt*intval($page-1);
$pend=$pstart+$page_cnt;

for ($i=1;$i<=$cnt;$i++){
	if ($i>1) echo '&nbsp;';
	if ($i==$page) echo "<span class=red>$i</span>";
	else echo "<a href='problem_list.php?page=".$i."'>".$i."</a>";
}

$sql="select `problem_id`,`title`,`in_date`,`defunct` FROM `problem` where problem_id>=$pstart and problem_id<=$pend order by `problem_id` desc";
//echo $sql;
$result=mysql_query($sql) or die(mysql_error());
echo "<center><table width=90% border=1>";
echo "<form method=post action=contest_add.php>";
echo "<tr><td>PID<td>"._GB_Problem_Name."<td>"._GB_Date;
if(isset($_SESSION['administrator'])){
	echo "<td>"._GB_STATUS."<td>"._GB_EDIT."</tr>";
}
for (;$row=mysql_fetch_object($result);){
	echo "<tr>";
	echo "<td>";
	echo "<input type=checkbox name='pid[]' value='$row->problem_id'>";
	echo $row->problem_id;
	echo "<td><a href='../problem/problem.php?id=$row->problem_id'>".$row->title."</a>";
	echo "<td>".$row->in_date;
	if(isset($_SESSION['administrator'])){
		echo "<td><a href=problem_df_change.php?id=$row->problem_id>"
		.($row->defunct=="N"?"<span class=green>可用</span>":"<span class=red>不可用</span>")."</a>";
		echo "<td><a href=AddProblem.php?pid=$row->problem_id>"._GB_EDIT."</a>";
	}
	echo "</tr>";
}
echo "<tr><td colspan=5><input type=submit name='problem2contest' value='添加选中题目到新建比赛'>";
echo "</tr></form>";
echo "</table></center>";

$admin->BodyFoot();
$admin->HTMLFoot();
?>
