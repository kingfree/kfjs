<?php
require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_EDIT);
$index->BodyHead();
$index->MainHead();

if (!isset($_SESSION['user_id']))
	$index->ShowError("<a href=../users/loginpage.php>"._GB_Please_Login."</a>");

$sql="SELECT `school`,`nick`,`email`,`real_name` FROM `users` WHERE `user_id`='".$_SESSION['user_id']."'";
$result=mysql_query($sql);
$row=mysql_fetch_object($result);

?>
<h2><?=_GB_EDIT?></h2>
<form action="../users/modify.php" method=post>
	<center><table>
		<tr><td width=25%><?=_GB_USER_ID?>:
			<td width=75%><?=$_SESSION['user_id']?>
		</tr>
		<tr><td><?=_GB_NICK?>:
			<td><input name="nick" size=50 type=text value="<?=htmlspecialchars($row->nick)?>" >
		</tr>
		<tr><td><?=_GB_OLD_PASSWORD?>:
			<td><input name="opassword" size=20 type=password>（如不修改请留空）
		</tr>
		<tr><td><?=_GB_NEW_PASSWORD?>:
			<td><input name="npassword" size=20 type=password>（如不修改请留空）
		</tr>
		<tr><td><?=_GB_REPEAT_PASSWORD?>:
			<td><input name="rptpassword" size=20 type=password>（如不修改请留空）
		</tr>
		<tr><td><?=_GB_REAL_NAME?>:
			<td><input name="real_name" size=30 type=text value="<?=htmlspecialchars($row->real_name)?>" >
		</tr>
		<tr><td><?=_GB_SCHOOL?>:
			<td><input name="school" size=30 type=text value="<?=htmlspecialchars($row->school)?>" >
		</tr>
		<tr><td><?=_GB_EMAIL?>:
			<td><input name="email" size=30 type=text value="<?=htmlspecialchars($row->email)?>" >
		</tr>
		<tr><td>
			<td><input value=<?=_GB_SUBMIT?> name="submit" type="submit">
				&nbsp; &nbsp;
				<input value=<?=_GB_RESET?> name="reset" type="reset">
		</tr>
	</table></center>
</form>

<h2>如何为你的账户设置头像：</h2>
<ul>
<li>注册：进入<a href="http://cn.gravatar.com/">Gravatar网站</a>，点击左上角菜单里的Sign Up，填写你在本网站注册使用的电子邮箱（QQ邮箱无法注册），接着输入两次密码，提交。</li>
<li>验证：进入你的邮箱，从Gravatar发出的信件中拷贝那段链接地址，在浏览器输入。 </li>
<li>设置昵称、密码。</li>
<li>选择上传图片：一般都是从电脑中上传（My computer’s hard drive）。</li>
<li>按提示剪裁大小。</li>
<li>评级：你的头像要被分级的，直接选择G（通用型）。</li>
<li>等待审核：可能需要站方短暂审核一下，一般选择了G，而你的图片没什么特别的，很快就通过。一般遇上慢的情况也就10分钟左右。</li>
</ul>

<?php
mysql_free_result($result);

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
