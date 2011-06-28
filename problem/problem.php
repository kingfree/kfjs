<?php

require_once("../include/class.php");
$index = new Page();

if(isset($_GET['id']))
	$prob = new Problem($_GET['id']);
else if(isset($_GET['cid']) && isset($_GET['pid']))
	$prob = new Problem($_GET['pid'], $_GET['cid']);
else
	header("Location: ../problem");

//$row=ReadProblem($_GET['id'],"0",$title);
//$row=ReadProblem($_GET['pid'],$_GET['cid'],$title);

$index->HTMLHead($prob->title);
$index->BodyHead();
if (isset($_GET['cid']))
	$index->ContestHead();
$index->MainHead();

echo "<h2 align=center>$prob->problem_id : $prob->title</h2>\n";
$prob->ShowProblem();

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
