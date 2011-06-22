<?php
require_once("../include/class.php");
$index = new Page();

$group=new Group($_GET['gid']);

$index->HTMLHead($group->group_name);
$index->BodyHead();
$index->MainHead();

?>
<center>

<table id=groupinfo>
<h2>团队信息</h2>
<?
if(isset($_SESSION['user_id']) && $group->GetAdminName()==$_SESSION['user_id'])
	echo "<a href=\"../group/edit.php?gid=$group->gid\">"._GB_EDIT."</a>";
?>
<tr><td><?=_GB_ID?><td><?=$group->gid?></tr>
<tr><td><?=_GB_GROUP?><td><?=$group->group_name?></tr>
<tr><td><?=_GB_COMMENT?><td><?=$group->comment?></tr>
</table>

<table id=groupuser>
<h2>团队用户</h2>
<?
$group->ShowUsers();
?>
</table>

</center>
<?

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
