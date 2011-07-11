<?php
require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_DISCUSS);
$index->BodyHead();
$index->MainHead();
	$sql="SELECT `title`, `cid`, `pid`, `status`, `top_level` FROM `topic` WHERE `tid` = '".mysql_escape_string($_REQUEST['tid'])."' AND `status` <= 1";
	$result=mysql_query($sql) or die("Error! ".mysql_error());
	$rows_cnt = mysql_num_rows($result) or die("Error! ".mysql_error());
	$row= mysql_fetch_object($result);
	$isadmin = isset($_SESSION['administrator']);
?>

<center>
<div style="width:90%; margin:0 auto; text-align:left;"> 
<div style="text-align:left;font-size:80%;float:left;">[ <a href="newpost.php">发表新帖</a> ]</div>
<?/*
if ($isadmin){
	?><div style="font-size:80%; float:right"> 更改优先级：<?
	$adminurl = "threadadmin.php?target=thread&tid={$_REQUEST['tid']}&action=";
	if ($row->top_level == 0) echo "[ <a href=\"{$adminurl}sticky&level=3\">高级</a> ] [ <a href=\"{$adminurl}sticky&level=2\">中级</a> ] [ <a href=\"{$adminurl}sticky&level=1\">低级</a> ]"; else echo "[ <a href=\"{$adminurl}sticky&level=0\">标准</a> ]";
	?> | <?
	if ($row->status != 1) echo (" [ <a  href=\"{$adminurl}lock\">锁定</a> ]"); else echo(" [ <a href=\"{$adminurl}resume\">恢复</a> ]");
	?> | <?
	echo (" [ <a href=\"{$adminurl}delete\">删除</a> ]");
	?></div><?
}
 */?>
<table style="width:100%; clear:both">
<tr align=center class='toprow'>
	<td style="text-align:left">
	<a href="../discuss/index.php<?if ($row->pid!=0 && $row->cid!=null) echo "?pid=".$row->pid."&cid=".$row->cid;
	else if ($row->pid!=0) echo"?pid=".$row->pid; else if ($row->cid!=null) echo"?cid=".$row->cid;?>">
	<?php if ($row->pid!=0) echo "题目 ".$row->pid; else echo "主页";?></a> >> <?php echo nl2br(htmlspecialchars($row->title));?></td>
</tr>

<?php
	$sql="SELECT `rid`, `author_id`, `time`, `content`, `status` FROM `reply` WHERE `topic_id` = '".mysql_escape_string($_REQUEST['tid'])."' AND `status` <=1 ORDER BY `rid` LIMIT 30";
	$result=mysql_query($sql) or die("Error! ".mysql_error());
	$rows_cnt = mysql_num_rows($result);
	$cnt=0;

	for ($i=0;$i<$rows_cnt;$i++){
		mysql_data_seek($result,$i);
		$row=mysql_fetch_object($result);
		$url = "threadadmin.php?target=reply&rid={$row->rid}&tid={$_REQUEST['tid']}&action=";
        if(isset($_SESSION['user_id']))
            $isuser = strtolower($row->author_id)==strtolower($_SESSION['user_id']);
        else
            $isuser = 0;
?>
<tr class='<?php echo ($cnt=!$cnt)?'even':'odd';?>row'>
	<td>
		
		<a name=post<?php echo $row->rid;?>></a>
		<div style="display:inline;text-align:left; float:left; margin:0 10px"><a href="../users/info.php?user=<?echo $row->author_id?>"><?php echo $row->author_id; ?> </a> @ <?php echo $row->time; ?></div>
		<div class="mon" style="display:inline;text-align:right; float:right">
<!--			<?if (isset($_SESSION['administrator'])) {?>  
			<span>[ <a href="
				<? 
				if ($row->status==0) echo $url."disable\">禁用";
				else echo $url."resume\">恢复";
				?> </a> ]</span>
			<span>[ <a href="#">回复</a> ]</span> 
			<? } ?>
			<span>[ <a href="#">引用</a> ]</span>
			<span>[ <a href="#">编辑</a> ]</span>
			<span>[ <a 
			<?
				if ($isuser || $isadmin) echo "href=".$url."delete";
			?>
			>删除</a> ]</span>-->
			<span style="width:5em;text-align:right;display:inline-block;font-weight:bold;margin:0 10px">
			<?php echo $i+1;?>#</span>
		</div>
		<div>
			<?php	if ($row->status == 0) echo $row->content;
					else {
						if (!$isuser || $isadmin)echo "<div style=\"border-left:10px solid gray\"><font color=red><i>注意 : <br>此回复已被管理员锁定。</i></font></div>";
						if ($isuser || $isadmin) echo $row->content;
					}
			?>
		</div>
		<div style="text-align:left; clear:both; margin:10px 30px; font-weight:bold; color:red"></div>
	</td>
</tr>
<?php
	}
?>
</table>
<div style="font-size:90%; width:100%; text-align:center">[<a href="#">首页</a>]  [<a href="#">上一页</a>]  [<a href="#">下一页</a>] </div>
<?
if (isset($_SESSION['user_id'])){?>
<div style="font-size:80%;"><div style="margin:0 10px">回复楼主:</div></div>
<form action="post.php?action=reply" method=post>
<input type=hidden name=tid value=<?php echo $_REQUEST['tid'];?>>
<script> KE.show({ id : 'content'}); </script>
<center>
<div><textarea id=content name=content style="border:1px dashed #8080FF; width:800px; height:200px; margin:0 30px; padding:10px"></textarea></div>
<div><input type="submit" style="margin:5px 10px" value="回复"></input></div>
</center>
</form>
<?
}
?>

</center>
</div>

<?
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
