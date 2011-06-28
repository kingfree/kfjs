<html>
<head>
<title>后台管理</title>
</head>
<?
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator']))){
	echo "<a href='../users/loginpage.php'>请以管理员身份登录！</a>";
	echo "</html>";
	exit(1);
}
?>
<frameset cols="20,90">
<frame name="menu" src="../admin/menu.php">
<frame name="main" src="about:blank">
<noframes>

</noframes>
</frameset>
</html>
