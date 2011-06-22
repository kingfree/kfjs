<?
@session_start();
require_once("../include/class.php");
Admin::LoadLang();
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link rel=stylesheet href='../include/kjs.css' type='text/css' />
<title><?=_GB_ADMIN?></title>
</head>

<body>
<div id=AdminMenu>
<h1 align=center><?=_ADMIN_ADMIN?></h1>
<hr />

<h3><?=_ADMIN_SYSTEM?></h3>
<ol>
	<li><a href="../admin/SysInfo.php" target="main"><?=_ADMIN_SysInfo?></a></li>
	<li><a href="../admin/Style.php" target="main"><?=_ADMIN_Style?></a></li>
</ol>
<h3><?=_ADMIN_PROBLEM?></h3>
<ol>
	<li><a href="../admin/AddProblem.php" target="main"><?=_ADMIN_AddProblem?></a></li>
	<li><a href="../admin/EditProblem.php" target="main"><?=_ADMIN_EditProblem?></a></li>
	<li><a href="../admin/CopyProblem.php" target="main"><?=_ADMIN_CopyProblem?></a></li>
	<li><a href="../admin/ImportProblem.php" target="main"><?=_ADMIN_ImportProblem?></a></li>
	<li><a href="../admin/ExportProblem.php" target="main"><?=_ADMIN_ExportProblem?></a></li>
</ol>
<h3><?=_ADMIN_CONTEST?></h3>
<ol>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_AddContest?></a></li>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_EditContest?></a></li>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_JudgeContest?></a></li>
</ol>
<h3><?=_ADMIN_USER?></h3>
<ol>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_AddUser?></a></li>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_EditUser?></a></li>
</ol>
<h3><?=_ADMIN_GROUP?></h3>
<ol>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_AddGroup?></a></li>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_EditGroup?></a></li>
</ol>
<h3><?=_ADMIN_JUDGE?></h3>
<ol>
	<li><a href="../admin/.php" target="main"><?=_ADMIN_Rejudge?></a></li>
</ol>
</div>
<?/*
<a href="../status.php" target="main"><b><?= _GB_SEEOJ?></b></a>
<a href="news_add_page.php" target="main"><b><?=_GB_ADD._GB_NEWS?></b></a>
<a href="news_list.php" target="main"><b><?=_GB_NEWS._GB_LIST?></b></a>
<a href="problem_add_page.php" target="main"><b><?=_GB_ADD._GB_PROBLEM?></b></a>
<a href="problem_list.php" target="main"><b><?=_GB_PROBLEM._GB_LIST?></b></a>
<a href="contest_add.php" target="main"><b><?=_GB_ADD._GB_CONTEST?></b></a>
<a href="contest_list.php" target="main"><b><?=_GB_CONTEST._GB_LIST?></b></a>
<a href="team_generate.php" target="main"><b><?=_GB_TEAMGENERATOR?></b></a>
<a href="setmsg.php" target="main"><b><?=_GB_SETMESSAGE?></b></a>
<a href="changepass.php" target="main"><b><?=_GB_SETPASSWORD?></b></a>
<a href="rejudge.php" target="main"><b><?=_GB_REJUDGE?></b></a>
<a href="privilege_add.php" target="main"><b><?=_GB_ADD._GB_PRIVILEGE?></b></a>
<a href="privilege_list.php" target="main"><b><?=_GB_PRIVILEGE._GB_LIST?></b></a>
<a href="source_give.php" target="main"><b><?=_GB_GIVESOURCE?></b></a>
<a href="problem_export.php" target="main"><b><?=_GB_EXPORT._GB_PROBLEM?></b></a>
<a href="problem_import.php" target="main"><b><?=_GB_IMPORT._GB_PROBLEM?></b></a>
<a href="update_db.php" target="main"><b><?=_GB_UPDATE_DATABASE?></b></a>
<a href="../online.php" target="main"><b><?=_GB_ONLINE?></b></a>
<a href="http://code.google.com/p/hustoj/" target="main"><b>HUSTOJ</b></a>
<a href="http://code.google.com/p/freeproblemset/" target="main"><b>Free Problem Set</b></a>
<a href="problem_copy.php" target="main"><font color="888888">Copy Problem</font></a>
*/?>
</body>
</html>
