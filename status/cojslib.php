<?

function rfile($fp)
{
	$out="";
	while (!feof($fp))
		$out.= fgets($fp, 1024000);
	return $out;
}

?>
