<?php
$rtv=array();
if ($App->Get("Status")=="locked" || $App->Get("Status")=="engrossed")
{
	$dir=$App->Get("ExecuteDIR");
	$dh=opendir($dir);
	while ($file=readdir($dh)) 
	{
		if($file!="." && $file!="..") 
		{
			$fullpath=$dir."/".$file;
			if(!is_dir($fullpath)) 
			{
				unlink($fullpath);
			}
		}
	}
	closedir($dh);
	$rtv['Success']="1";
}
else
{
	$rtv['Success']="0";
}
echo array_encode($rtv);
?>