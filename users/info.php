<?php
require_once("../include/class.php");
$index = new Page();

$user=new User($_GET['user']);

$index->HTMLHead($user->user_id);
$index->BodyHead();
$index->MainHead();

//$user->PrintBasicUserInfo();

?>
<center>

<table id=userinfo>
<h2>基本用户信息</h2>
<?
if(isset($_SESSION['user_id']) && strcmp($_GET['user'],$_SESSION['user_id'])==0)
	echo "<a href=\"../users/edit.php\">"._GB_EDIT."</a>";
?>
<tr><td><?=_GB_USER_ID?><td><?=$user->user_id?>
<td rowspan=5 align=center><? echo gravatar::showImage($user->email); ?>
</tr>
<tr><td><?=_GB_NICK?><td><?=$user->nick?></tr>
<?
if(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||(isset($_SESSION['user_id']) && strcmp($_GET['user'],$_SESSION['user_id'])==0))
	echo "<tr><td>"._GB_REAL_NAME."<td>".$user->real_name."</tr>";
?>
<tr><td><?=_GB_SCHOOL?><td><?=$user->school?></tr>
<tr><td><?=_GB_MAIL?><td><?=$user->email?></tr>
<tr><td><?=_GB_GROUP?><td><?=$user->ShowGroup()?></tr>
</table>

<table id=statics width=70%>
<h2>解决题目信息</h2>
<tr>
<td width=15%><?=_GB_Number?>
<td width=25% align=center><?=$user->rank?>
<td width=70% align=center>解决题目列表
</tr>
<tr><td><?=_GB_SOVLED?><td align=center><a href='status.php?user_id=<?=$user->user_id?>&jresult=4'><?=$user->solved?></a>
<td rowspan=10 align=center>
<script language='javascript'>
function p(id){document.write("<a href=../problem/problem.php?id="+id+">"+id+" </a>");}
<?php
$sql="SELECT DISTINCT `problem_id` FROM `solution` WHERE `user_id`='$user->user_id' AND `result`=4 ORDER BY `problem_id` ASC";
if (!($result=mysql_query($sql))) echo mysql_error();
while ($row=mysql_fetch_array($result))
	echo "p($row[0]);";
mysql_free_result($result);
?>
</script>
</tr>
<tr><td><?=_GB_SUBMIT?><td align=center><a href='status.php?user_id=<?=$user->user_id?>'><?=$user->submit?></a></tr>
<?php
	$sql="SELECT result,count(1) FROM `submit` WHERE `uid`='$user->user_id'  AND result>=4 group by result order by result";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
$jresult=Array(_GB_PD, _GB_PR, _GB_CI, _GB_RJ, _GB_AC, _GB_PE, _GB_WA, _GB_TLE, _GB_MLE, _GB_OLE, _GB_RE, _GB_CE, _GB_CO);
		echo "<tr><td>".$jresult[$row[0]]."<td align=center><a href=../status/user.php?uid=$user->user_id&jresult=".$row[0]." >".$row[1]."</a></tr>";
	}
	mysql_free_result($result);
echo "<tr id=pie><td>状态<td><div id='PieDiv' style='position:relative;height:105px;width:120px;'></div></tr>";

?>
<script language="javascript">
	var y= new Array ();
	var x = new Array ();
	var dt=document.getElementById("statics");
	var data=dt.rows;
	var n;
	for(var i=3;dt.rows[i].id!="pie";i++) {
			n=dt.rows[i].cells[0];
			n=n.innerText || n.textContent;
			x.push(n);
			n=dt.rows[i].cells[1].firstChild;
			n=n.innerText || n.textContent;
			n=parseInt(n);
			y.push(n);
	}
	var mypie=  new Pie("PieDiv");
	mypie.drawPie(y,x);
</script>
</table>


<?//用户登录信息
if (isset($_SESSION['administrator'])){
$sql="SELECT * FROM `loginlog` WHERE `user_id`='{$user->user_id}' order by `time` desc LIMIT 0,10";
$result=mysql_query($sql) or die(mysql_error());
echo "<h2>用户登录信息</h2>";
echo "<table id=loginlog>";
echo "<tr align=center><td>"._GB_USER_ID."<td>"._GB_PASSWORD."<td>IP<td>时间</tr>";
for (;$row=mysql_fetch_row($result);){
	echo "<tr align=center>";
	echo "<td>".$row[0];
	echo "<td>".$row[1];
	echo "<td>".$row[2];
	echo "<td>".$row[3];
	echo "</tr>";
}
echo "</table>";
mysql_free_result($result);
}
?>

</center>
<?

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
