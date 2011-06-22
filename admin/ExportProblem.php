<?php
require_once("../include/class.php");
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])))
	exit(1);

$admin = new Admin();

$admin->HTMLHead(_ADMIN_ExportProblem);
$admin->BodyHead(_ADMIN_ExportProblem);

?>

<form action='problem_export_xml.php' method=post>
	题目：从<input type=text size=10 name="start" value=1000>
	到<input type=text size=10 name="end" value=1000><br />
	或在<input type=text size=40 name="in" value=""><br />
	<input type='hidden' name='do' value='do'>
	<input type=submit name=submit value='导出'>
   <input type=submit value='下载'>
</form>
* from-to will working will empty IN <br>
* if using IN,from-to will not working.<br>
* IN can go with "," seperated problem_ids like [1000,1020]

<?
$admin->BodyFoot();
$admin->HTMLFoot();
?>
