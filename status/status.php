<?php
require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_STATUS);
$index->BodyHead();
$index->MainHead();

if (isset($_SESSION['user_id']))
	$now_user_id=$_SESSION['user_id'];
else
	$now_user_id="0";
if (isset($_SESSION['administrator']))
	$admin=1;
else
	$admin=0;

$list = new Status($_GET['jid'], $now_user_id, $admin);

$list->ShowStatus();

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
