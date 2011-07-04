<?php
$rtv=array();
if ($App->Get("Status")=="free")
{
	$App->Set("Status","locked");
	$rtv['Success']="1";
}
else
{
	$rtv['Success']="0";
}
echo array_encode($rtv);
?>