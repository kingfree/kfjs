<?

//if($_SESSION['postkey']!=$_POST['postkey'])
	//exit(1);
require_once("../include/class.php");
$index = new Page();

$err_str="";
$err_cnt=0;
$len;
$user_id=$_SESSION['user_id'];
$email=trim($_POST['email']);
$school=trim($_POST['school']);
$nick=trim($_POST['nick']);
$real_name=trim($_POST['real_name']);
$len=strlen($nick);
if($len>100){
	$err_str=$err_str._GB_Nick_Name_Too_Long;
	$err_cnt++;
}else if($len==0)
	$nick=$user_id;
$len=strlen($real_name);
if($len>20) {
	$err_str=$err_str._GB_Real_Name_Too_Long;
	$err_cnt++;
}
$password=MD5($_POST['opassword']);
$sql="SELECT `user_id` FROM `users` WHERE `user_id`='".$user_id."' AND `password`='".$password."'";
$result=mysql_query($sql);
$rows_cnt=mysql_num_rows($result);
mysql_free_result($result);
if($rows_cnt==0 && $_POST['opassword']!=""){
	$err_str=$err_str._GB_Old_Password_Wrong;
	$err_cnt++;
}
$len=strlen($_POST['npassword']);
if ($len<6 && $len>0){
	$err_cnt++;
	$err_str=$err_str._GB_Password_Too_Short;
}else if (strcmp($_POST['npassword'],$_POST['rptpassword'])!=0 && $_POST['opassword']!=""){
	$err_str=$err_str._GB_Password_Not_Same;
	$err_cnt++;
}
$len=strlen($_POST['school']);
if ($len>100){
	$err_str=$err_str._GB_School_Too_Long;
	$err_cnt++;
}
$len=strlen($_POST['email']);
if ($len>100){
	$err_str=$err_str._GB_Email_Too_Long;
	$err_cnt++;
}
if($err_cnt>0)
	ShowErrorGo($err_str, -1);

if($_POST['opassword']!="")
	$passwordset="`password`='".(MD5($_POST['npassword']))."',";
else
	$passwordset="";
$nick=mysql_real_escape_string(htmlspecialchars ($nick));
$real_name=mysql_real_escape_string(htmlspecialchars ($real_name));
$school=mysql_real_escape_string(htmlspecialchars ($school));
$email=mysql_real_escape_string(htmlspecialchars ($email));
$sql="UPDATE `users` SET"
.$passwordset
."`nick`='".($nick)."',"
."`real_name`='".($real_name)."',"
."`school`='".($school)."',"
."`email`='".($email)."' "
."WHERE `user_id`='".mysql_real_escape_string($user_id)."'"
;

mysql_query($sql);// or die("Insert Error!\n");
header("Location: ../index");
?>
