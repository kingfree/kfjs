<?php

function array_encode($arr)
{
	$sa=array();
	$i=0;
	foreach($arr as $k=>$v)
	{
		$sa[$i]=base64_encode($k);
		$sa[$i+1]=base64_encode($v);
		$i+=2;
	}
	$s=implode("?",$sa);
	return base64_encode($s);
}

function array_decode($s)
{
	$arr=array();
	$s=base64_decode($s);
	$sa=explode("?",$s);
	$i=0;
	$t="";
	foreach($sa as $k=>$v)
	{
		if ($i==0)
			$t=base64_decode($v);
		else
			$arr[$t]=base64_decode($v);
		$i=!$i;
	}
	return $arr;
}

?>
