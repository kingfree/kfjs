<?php

class Page {
	public $title;
	public function __construct() {
		$this->LoadDataBase();
		$this->LoadLang();
	}
	public function LoadDataBase() {
		require_once("../include/db_info.inc.php");
		require_once("../include/config.inc.php");
	}
	public function LoadLang() {
		if(isset($_SESSION['OJ_LANG']))
			define("_GB_Lang", $_SESSION['OJ_LANG']);
		elseif(isset($_GET['lang']))
			define("_GB_Lang", $_GET['lang']);
		elseif(!defined("_GB_Lang"))
			define("_GB_Lang", "cn");
		global $language_name, $io_type, $zipfile_name, $judge_type, $compare_type;
		require_once("../lang/" . _GB_Lang . ".php");
	}
	public function MainHead() {
		echo "<div id='Wrapper'>\n";
		echo "<div id='Main'>\n";
	}
	public function MainFoot() {
		echo "</div>\n";
		echo "</div>\n";
	}
	public function LoadScript() {
		echo "<script type=\"text/javascript\" src=\"../include/jquery.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../include/wz_jsgraphics.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../include/pie.js\"></script>\n";
		echo "<script type=\"text/javascript\" src=\"../include/sortTable.js\"></script>";
		echo "<script charset=\"utf-8\" src=\"../editor/kindeditor.js\"></script>";
	}
	public function BodyHead() {
		echo "<body>\n";
		$this->LoadScript();
		echo "<table id=Top>\n";
		echo "<tr>\n";
		echo "	<td width=140px><div id=TopUser>\n";
		$this->ShowUser();
		echo "	</div></td>\n";
		echo "	<td><div id=TopLogo>\n";
		echo _GB_Logo_Name;
		echo "\n	</div></td>\n";
		echo "	<td width=350px align=right><div id=TopLinkBar>\n";
		$this->ShowLinkBar();
		echo "&nbsp;	</div></td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}
	public function BodyFoot() {
		$this->StatusBar();
		echo "<table id=Bottom>\n";
		echo "<tr>\n";
		echo "	<td width=30%><div id=BottomLang>\n";
		$this->ShowLang();
		echo "	</div></td>\n";
		echo "	<td><div id=BottomCopy>\n";
		$this->ShowCopyright();
		echo "	</div></td>\n";
		echo "	<td width=30%><div id=BottomLinks>\n";
		$this->ShowLinks();
		echo "	</div></td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "</body>\n";
	}

	public function StatusBar() {
		echo "<table id=Status>\n";
		echo "<tr>\n";
		echo "<td width=20% align=left>"._GB_Title."</td>\n";
		echo "<td align=center>".GetBrowser($_SERVER['HTTP_USER_AGENT'])."</td>\n";
		//echo "<td width=30% align=right>当前时间: <span id=nowdate></span>&nbsp;</td>\n";
		echo "<td width=30% align=right>服务器时间: ".strftime("%b %d %Y %X",time())."&nbsp;</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}

	public function HTMLHead($title) {
		echo "<!DOCTYPE HTML>\n";
		echo "<html>\n";
		echo "<head>\n";
		$this->ShowMeta();
		echo "<link rel=stylesheet href='../include/kjs.css' type='text/css' />\n";
		echo "<link rel='shortcut icon' href='../images/kjs.ico' />\n";
		$this->title = $title;
		echo "<title>\n" . $this->title . " - " . _GB_Title . " " . _GB_Version_Number . "\n</title>\n";
		echo "</head>\n";
	}
	public function HTMLFoot() {
		echo "</html>\n";
		//include("../include/time.php");
	}
	public function ShowMeta() {
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />\n";
	}

	public function ShowUser() {
		if(isset($_SESSION['user_id'])) {
			$user = new User($_SESSION['user_id']);
			echo " <a href='../users/info.php?user={$user->user_id}'>" . $user->user_id . "</a>\n";
			echo " <a href='../users/logout.php'>" . _GB_LOGOUT . "</a>\n";
		} else {
			echo " <a href='../users/loginpage.php'>" . _GB_LOGIN . "</a>\n";
			echo " <a href='../users/regpage.php'>" . _GB_REGISTER . "</a>\n";
		}
		if(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator']))
			echo " <a href='../admin' target='_blank'>" . _GB_ADMIN . "</a>\n";
	}

	public function ShowLinkBar() {
		echo " <a href='../index'>" . _GB_HOME . "</a>\n";
		echo " <a href='../problem'>" . _GB_PROBLEMS . "</a>\n";
		echo " <a href='../index/datas.php'>" . _GB_DATAS . "</a>\n";
		//echo " <a href='../data'>" . _GB_DATAS . "</a>\n";
		echo " <a href='../contest'>" . _GB_CONTEST . "</a>\n";
		echo " <a href='../status'>" . _GB_STATUS . "</a>\n";
		echo " <a href='../users'>" . _GB_USER . "</a>\n";
		echo " <a href='../groups'>" . _GB_GROUP . "</a>\n";
		echo " <a href='../discuss'>" . _GB_DISCUSS . "</a>\n";
		echo " <a href='../documents'>" . _GB_HELP . "</a>\n";
		echo " <a href='../documents/about.php'>" . _GB_ABOUT . "</a>\n";
	}

	public function ShowLang() {
		echo " <a href='../lang/index.php?lang=cn'>简体中文</a>\n";
		echo " <a href='../lang/index.php?lang=zh'>正體中文</a>\n";
		echo " <a href='../lang/index.php?lang=en'>English</a>\n";
		echo " <a href='../lang/index.php?lang=ja'>日本語</a>\n";
		echo " <a href='../lang/index.php?lang=kr'>한국어</a>\n";
	}

	public function ShowCopyright() {
		echo "<p>" . _GB_Copyrighted . " &copy 2011-2012</p>\n";
		echo "<p>" . _GB_Version . " " . _GB_Version_Number . "</p>\n";
	}

	public function ShowLinks() {
		echo "<a href='http://www.gnu.org/licenses/gpl.html' target='_blank'>
		<img src='../images/gplv3.png' border=0 style='display: block; float: right;' />
		</a>\n";
		//加载新浪微博插件
		//include("../include/weibo.php");
	}

	public function ShowError($errormsg, $errorcode=0) {
		echo "<div id=error>$errormsg</div>";
		$this->MainFoot();
		$this->BodyFoot();
		print "<script language='javascript'>\n";
		print "alert(\"" .	$errormsg . "\");\n";
		print "</script>";
		$this->HTMLFoot();
		exit($errorcode);
	}
}

//加载全局函数
require_once("../include/func.php");
//加载类
require_once("../users/class.php");
require_once("../problem/class.php");
require_once("../judge/class.php");
require_once("../status/class.php");
require_once("../admin/class.php");
require_once("../contest/class.php");
require_once("../groups/class.php");
//加载插件
require_once("../include/gravatar.php");


?>
