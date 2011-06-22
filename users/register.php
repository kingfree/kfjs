<?php
require_once("../include/class.php");
$index = new Page();

$user = new User($_POST['user_id']);

$err_str="";
$err_cnt=0;
$len;
$user->user_id=trim($_POST['user_id']);
$user->email=trim($_POST['email']);
$user->school=trim($_POST['school']);

$len=strlen($user->user_id);
if($len>20){
	$err_str=$err_str._GB_User_ID_Too_Long."\\n";
	$err_cnt++;
}else if($len<3){
	$err_str=$err_str._GB_User_ID_Too_Short."\\n";
	$err_cnt++;
}
if(!$user->IsValidUserName()){
	$err_str=$err_str._GB_User_Name_Char."\\n";
	$err_cnt++;
}
$user->nick=trim($_POST['nick']);
$len=strlen($user->nick);
if($len>100){
	$err_str=$err_str._GB_Nick_Name_Too_Long."\\n";
	$err_cnt++;
} else if ($len==0)
	$user->nick=$user->user_id;
$user->real_name=trim($_POST['real_name']);
$len=strlen($user->real_name);
if($len>20) {
	$err_str=$err_str._GB_Real_Name_Too_Long;
	$err_cnt++;
}
if(strcmp($_POST['password'],$_POST['rptpassword'])!=0){
	$err_str=$err_str._GB_Password_Not_Same."\\n";
	$err_cnt++;
}
if (strlen($_POST['password'])<6){
	$err_cnt++;
	$err_str=$err_str._GB_Password_Too_Short."\\n";
}
$len=strlen($_POST['school']);
if ($len>100){
	$err_str=$err_str._GB_School_Too_Long."\\n";
	$err_cnt++;
}
$len=strlen($_POST['email']);
if ($len>100){
	$err_str=$err_str._GB_Email_Too_Long."\\n";
	$err_cnt++;
}
if ($err_cnt>0)
	ShowErrorGo($err_str, -1);

$user->password=MD5($_POST['password']);
$sql="SELECT `user_id` FROM `users` WHERE `users`.`user_id` = '".$user->user_id."'";
$result=mysql_query($sql);
$rows_cnt=mysql_num_rows($result);
mysql_free_result($result);
if ($rows_cnt == 1)
	ShowErrorGo(_GB_User_Existed, -1);

$user->nick=mysql_real_escape_string(htmlspecialchars ($user->nick));
$user->real_name=mysql_real_escape_string(htmlspecialchars ($user->real_name));
$user->school=mysql_real_escape_string(htmlspecialchars ($user->school));
$user->email=mysql_real_escape_string(htmlspecialchars ($user->email));
$user->ip=$_SERVER['REMOTE_ADDR'];

$user->GetNewUID();

$sql="INSERT INTO `users`("
."`uid`,`user_id`,`email`,`ip`,`accesstime`,`password`,`reg_time`,`nick`,`real_name`,`school`)"
."VALUES('".$user->uid."','".$user->user_id."','".$user->email."','".$_SERVER['REMOTE_ADDR']."',NOW(),'".$user->password."',NOW(),'".$user->nick."','".$user->real_name."','".$user->school."')";
mysql_query($sql);// or die("Insert Error!\n");

$sql="INSERT INTO `loginlog` VALUES('$user->user_id','$user->password','$user->ip',NOW())";
mysql_query($sql);
$_SESSION['user_id']=$user->user_id;

$sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`='".$_SESSION['user_id']."'";
$result=mysql_query($sql);
echo mysql_error();
while ($row=mysql_fetch_assoc($result))
$_SESSION[$row['rightstr']]=true;
$_SESSION['ac']=Array();
$_SESSION['sub']=Array();

header("Location: ../index");
?>
