<?php
/*
	传送参数并编译 
	传送应用 command language code
	传送并保存 Pname TimeLimit MemoryLimit CompareMethod
*/
require("filter.php");

function GetDefaultCompileCommand($Tname,$Source,$language)
{
	switch ($language)
	{
		case 'pas':	return "fpc {$Source} -So -XS -v0 -O1 -o\"{$Tname}\" 2>&1";
		case 'c':	return "gcc {$Source} -lm -w -O2 -static -o {$Tname} 2>&1";
		case 'cpp':	return "g++ {$Source} -lm -w -O2 -static -o {$Tname} 2>&1";
	}
}

function GetSourceFileName($Tname,$language)
{
	switch ($language)
	{
		case 'pas':	return $Tname.".pas";
		case 'c':	return $Tname.".c";
		case 'cpp':	return $Tname.".cpp";
	}
}

$rtv=array();
$command=$inf['command'];
$Tname=substr(md5(rand()),0,8);
$code=$inf['code'];
if (file_exists($Tname))
	unlink($Tname);

$App->Set("Tname",$Tname);
$App->Set("Pname",$inf['Pname']);
$App->Set("TimeLimit",$inf['TimeLimit']);
$App->Set("MemoryLimit",$inf['MemoryLimit']);
$App->Set("CompareMethod",$inf['CompareMethod']);

chdir($App->Get("ExecuteDIR"));
$permission=filter($code,$inf['language']);

if ($permission=="")
{
	$Source=GetSourceFileName($Tname,$inf['language']);
	$App->wf($Source,$code);

	if ($command=="")
	{
		$command=GetDefaultCompileCommand($Tname,$Source,$inf['language']);
	}
	else
	{
		$command=str_replace("{$Tname}",$Tname,$command);
		$command=str_replace("{$Source}",$Source,$command);
	}

	$command="timelimit 5 ".$command;

	$handle = popen($command, 'r');
	$CompileMessage=$App->rp($handle);
	pclose($handle);
}
else
{
	$CompileMessage="The string \"{$permission}\" is forbidden to appear in the code.";
}

$rtv['CompileMessage']=$CompileMessage;

if (file_exists($Tname))
	$rtv['Success']="1";
else
	$rtv['Success']="0";

echo array_encode($rtv);
?>