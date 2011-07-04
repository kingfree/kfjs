<?php
require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_STATUS);
$index->BodyHead();
$index->MainHead();

if (isset($_GET['page']))
	$page=intval($_GET['page']);
else
	$page=1;
if (isset($_SESSION['user_id']))
	$now_user_id=$_SESSION['user_id'];
else
	$now_user_id=0;
if (isset($_SESSION['administrator']))
	$admin="1";
else
	$admin="0";
if(isset($_GET['search']))
	$search=$_GET['search'];
else
	$search=0;

$list = new StatusList($now_user_id, $page, $search);

$list->ShowStatusList();

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
