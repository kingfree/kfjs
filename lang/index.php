<?
	$_SESSION['OJ_LANG']=$_GET['lang'];
	define("_GB_Lang", $_GET['lang']);
	echo "<script language='javascript'>\n";
	echo "history.go(-1);\n";
	echo "</script>";
?>
