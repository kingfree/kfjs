<?php
$inf=$_POST['inf'];
if ($inf!="")
	require("interface.php");
else
	header("Location: stat.php");
?>