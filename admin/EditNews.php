<?
require_once("../include/class.php");
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])))
	exit(1);

$admin = new Admin();
$admin->HTMLHead(_ADMIN_EditNews);
$admin->BodyHead(_ADMIN_EditNews);

$sql="select `news_id`,`user_id`,`title`,`time`,`defunct` FROM `news` order by `news_id` desc";
$result=mysql_query($sql) or die(mysql_error());

echo "<center><table width=90% border=1>";
echo "<tr><td>编号<td>题目<td>时间<td>状态</tr>";
for (;$row=mysql_fetch_object($result);){
	echo "<tr>";
	echo "<td>".$row->news_id;
	echo "<td><a href=AddNews.php?id=$row->news_id>".$row->title."</a>";
	echo "<td>".$row->time;
	echo "<td><a href=AddNews.php?id=$row->news_id>".($row->defunct=="N"?"<span class=green>可用</span>":"<span class=red>禁用</span>")."</a>";
	
	echo "</tr>";
}

echo "</tr></form>";
echo "</table></center>";

$admin->BodyFoot();
$admin->HTMLFoot();
?>

