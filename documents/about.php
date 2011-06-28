<?

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_ABOUT);
$index->BodyHead();
$index->MainHead();
?>

本评测系统基于HUSTOJ开发，GPL协议。采用LAMP构架。

<iframe src="GPLV3.zh.html" width=900px></iframe>

<?
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
