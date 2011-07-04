<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
function getz($Ab)
{
	$str='/^';
	$Ab=str_replace('*','[a-zA-Z0-9]{0,8}',$Ab);
	$Ab=str_replace('?','[a-zA-Z0-9]{1}',$Ab);
	$str.=$Ab.'$/';
	return $str;
}

$s=array("EXCHANGE","EXTRA","HARDWARE","MOUSE","NETWORK");
//$s=array("EXCHANGE","EXX","HARDWARE","MOUSE","NETWORK");
$z=getz($_GET['e']);
for ($i=0;$i<5;$i++)
	echo preg_match($z,$s[$i]);
//*=[a-zA-Z0-9]{1,8} ?=[a-zA-Z0-9]{1}
echo $z;
?>
</body>
</html>
