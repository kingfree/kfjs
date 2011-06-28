<?php
require_once("../include/class.php");
$index = new Page();
	$user = new User(mysql_escape_string($_POST['user_id']));
	$password=MD5($_POST['password']);
	session_destroy();
	session_start();
	$user->InsLoginLog($password, $_SERVER['REMOTE_ADDR'], "NOW()");
	if($user->CheckPassword($password)) {
		$_SESSION['user_id']=$user->user_id;
		$sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`='".$_SESSION['user_id']."'";
		$result=mysql_query($sql);
		while($row=mysql_fetch_assoc($result))
			$_SESSION[$row['rightstr']]=true;
		//setcookie("user", $row->user_id, time()+360000);
		HistoryGo(-2);
	} else
		ShowErrorGo(_GB_LOGIN_ERROR, -1);
?>
