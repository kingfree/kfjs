<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_REGISTER);
$index->BodyHead();
$index->MainHead();

if (isset($_SESSION['user_id']))
	$index->ShowError(_GB_Please_Logout);

?>

<form action="../users/register.php" method=post>
	<center><table>
		<tr><td width=25%><?=_GB_USER_ID?>:
			<td width=75%><input name="user_id" size=20 type=text>*
		</tr>
		<tr><td><?=_GB_NICK?>:
			<td><input name="nick" size=30 type=text>
		</tr>
		<tr><td><?=_GB_REAL_NAME?>:
			<td><input name="real_name" size=10 type=text>
		</tr>
		<tr><td><?=_GB_PASSWORD?>:
			<td><input name="password" size=20 type=password>*
		</tr>
		<tr><td><?=_GB_REPEAT_PASSWORD?>:
			<td><input name="rptpassword" size=20 type=password>*
		</tr>
		<tr><td><?=_GB_SCHOOL?>:
			<td><input name="school" size=30 type=text>
		</tr>
		<tr><td><?=_GB_EMAIL?>:
			<td><input name="email" size=30 type=text>
		</tr>
		<tr><td>
			<td><input value=<?=_GB_REGISTER?> name="submit" type="submit">
				&nbsp; &nbsp;
				<input value=<?=_GB_RESET?> name="reset" type="reset">
		</tr>
	</table></center>
</form>

<?php

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
