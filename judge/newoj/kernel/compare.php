<?php
function SimpleCompare($fout,$fans)
{
	do
	{
		$d1=fgetc($fans);
		while ($d1==" " || $d1=="\n" || $d1=="\r")
			$d1=fgetc($fans);
		$d2=fgetc($fout);
		while ($d2==" " || $d2=="\n" || $d2=="\r")
			$d2=fgetc($fout);
		if ($d1===false) break;
		if ($d2===false) return 0.0;
		if ($d1!=$d2) return 0.0;
	} while (true);
	if (!($d2===false))
	{
		while (!($d2===false))
		{
			$d2=fgetc($fout);
			if ($d2!=" " && $d2!="\n" && $d2!="\r")
				return 0.0;
		}
	}
	return 1.0;
}
?>