<?php
require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_DISCUSS);
$index->BodyHead();
$index->MainHead();

	if (!isset($_SESSION['user_id'])){
		echo "<a href=../loginpage.php>Please Login First</a>";
		exit(0);
	}
?>

<center>
<div style="width:90%; text-align:left">
<h2 style="margin:0px 10px">发表新帖：<?php if (array_key_exists('cid',$_REQUEST) && $_REQUEST['cid']!='') echo ' For Contest '.$_REQUEST['cid'];?></h2>
<form action="post.php?action=new" method=post>
<input type=hidden name=cid value="<?php if (array_key_exists('cid',$_REQUEST)) echo $_REQUEST['cid'];?>">
<div style="margin:0px 10px">题目 : </div>
<div><input name=pid style="border:1px dashed #8080FF; width:100px; height:20px; font-size:75%;margin:0 10px; padding:2px 10px" value="<?php if(array_key_exists('pid',$_REQUEST)) echo $_REQUEST['pid']; ?>"></div>
<div style="margin:0px 10px">标题 : </div>
<div><input name=title style="border:1px dashed #8080FF; width:800px; height:20px; font-size:75%;margin:0 10px; padding:2px 10px"></div>
<script>
KE.show({ id : 'content'});
</script>
<div style="margin:0px 10px">贴子内容 : </div>
<div><textarea id="content" name="content" style="border:1px dashed #8080FF; width:800px; height:400px; margin:0 10px; padding:10px">
</textarea></div>
<div><input type="submit" style="margin:5px 10px" value="发贴"></input></div>
</form>
</div>
</center>
<?
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
