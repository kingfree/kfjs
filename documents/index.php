<?

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_HELP);
$index->BodyHead();
$index->MainHead();
?>

<h1>如何使用王者自由评测系统？</h1>

<?include("../documents/noi.php")?>

<h2>关于</h2>
<h2>安装</h2>
<h2>使用</h2>
<h3>注册一个用户</h3>
<h3>用户信息设置</h3>
<h3>提交题目</h3>
<h3>参加比赛</h3>
<h2>管理</h2>
<h3>做也优秀的管理员</h3>


<?
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
