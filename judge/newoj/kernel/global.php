<?php
require("application.php");
require("coding.php");

date_default_timezone_set('Asia/Shanghai');

global $App;

$App=new Application("vars/");

$vars=array();

$App->Get("Name");
$App->Get("Remark");
$App->Get("ConstructionTime");
$App->Get("ExecuteDIR");
$App->Get("TestdataDIR");
$App->Get("Status");
$App->Get("Counter");
$App->Get("PermissionIP");

$App->Get("Tname");
$App->Get("Pname");
$App->Get("TimeLimit");
$App->Get("MemoryLimit");
$App->Get("CompareMethod");

if ($App->Get("ConstructionTime")=="")
	$App->Set("ConstructionTime",time());
if ($App->Get("Counter")=="")
	$App->Set("Counter",0);

?>