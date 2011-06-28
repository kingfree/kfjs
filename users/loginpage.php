<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_HOME);
$index->BodyHead();
$index->MainHead();

if (isset($_SESSION['user_id']))
	$index->ShowError(_GB_Please_Logout);

?>

<form action="../users/login.php" method=post>
	<center>
	<table width=400 algin=center>
	<tr><td width=25%><?=_GB_USER_ID?>:<td width=75%><input name="user_id" type="text" size=20></tr>
	<tr><td><?=_GB_PASSWORD?>:<td><input name="password" type="password" size=20></tr>
	<tr><td><td><input name="submit" type="submit" size=10 value=<?=_GB_LOGIN?>></tr>
	</table>
	<center>
</form>


<?php

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
