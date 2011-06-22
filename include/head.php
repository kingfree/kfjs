<?

function HTMLHead($title) {
	echo "<!DOCTYPE HTML>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />\n";
	echo "<link rel=stylesheet href='../include/v2ex.css' type='text/css'/>\n";
	echo "<link rel='shortcut icon' href='../images/KJS_icon.ico' />\n";
	global $MSG;
	echo "<title>\n{$title} - {_GB_OJ_NAME}\n</title>\n";
	echo "</head>";
}

function HTMLFoot() {
	echo "</html>\n";
}

function BodyHead() {
	global $MSG;
	echo "<body>\n";
	echo "<script type='text/javascript' src='../include/jquery.js'></script>\n";
	echo "<div id='Top'><a href='#;' name='_top'></a>\n";
    echo "<div id='TopMain'>\n";
	echo "<div style='display: block; float: left; margin-top: 10px; color: #fff;'>\n";
	function reginfo($path, $text) {
		echo " <a href=\"../{$path}\">{$text}</a> \n";
	}
	if(isset($_SESSION['user_id'])){
		$sid=$_SESSION['user_id'];
		reginfo("users/edit.php", _GB_USER_INFO);
		reginfo("users/info.php?user=$sid", $sid);
		reginfo("users/logout.php", _GB_LOGOUT);
	}else{
		reginfo("users/loginpage.php", _GB_LOGIN);
		reginfo("users/registerpage.php", _GB_REGISTER);
	}
	if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])){
		reginfo("admin", _GB_ADMIN);
	}
	echo "</div>\n";
	/*echo "<a href='../index'>
		<img src='../images/KJS_long_logo.png' border=0
		style='display: block; float: left; margin-top: 10px; margin-left: 20px;' />
		</a>\n";*/
	echo "<a href='../index/'><span style='font-family: FreeSerif; font-size: 22pt; display: block; float: left; margin-top: 2pt; margin-left: 20px;'><strong><em>
<font color=#ff0000>赤</font><font color=#ffAA00>橙</font><font color=#99ff00>黄</font><font color=#00ff00>绿</font><font color=#0099ff>青</font><font color=#0055ff>蓝</font><font color=#9900ff>紫</font>
</em></strong></span></a>";
	echo "<div id='Navigation'>\n";
	function lili($path, $text) {
		echo "<li><a href=\"../{$path}\">{$text}</a></li>\n";
	}
	function checkcontest($MSG_CONTEST){
		$sql="SELECT count(*) FROM `contest` WHERE `end_time`>NOW() AND `defunct`='N'";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if (intval($row['0'])==0) $retmsg=$MSG_CONTEST;
		else $retmsg="$MSG_CONTEST<i>({$row['0']})</i>";
		mysql_free_result($result);
		return $retmsg;
	}
	echo "<ul>\n";
	lili("index", _GB_HOME);
	lili("problem", _GB_PROBLEMS);
	lili("status", _GB_STATUS);
	lili("judge", _GB_JUDGER);
	lili("rank", _GB_RANKLIST);
	lili("users", _GB_USERGROUP);
	lili("contest", checkcontest(_GB_CONTEST));
	lili("documents", _GB_HELP);
	lili("documents/about.php", _GB_ABOUT);
	echo "</ul>\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "</div>\n";
}

function BodyFoot() {
	global $MSG;
	echo "<div id='Browser'>\n";
	echo GetBrowser($_SERVER['HTTP_USER_AGENT']);
	echo "</div>\n";
	echo "<div id='Bottom'>\n";
    echo "<div id='BottomMain'>\n";
    echo "<div class='fr' align='right' style='padding-top: 5px;'>\n";
	echo "<a href='http://www.gnu.org/licenses/gpl.html' target='_blank'>
		<img src='../images/gplv3.png' border=0 style='display: block; float: right;' />
		</a>\n";
	echo "</div>\n";
    echo "<span class='fade'>{_GB_OJ_NAME}</span>\n";
    echo "<div class='sep3'></div>\n";
    echo "<span class='fade'>{_GB_Copyrighted} &copy 2011 {_GB_AUTHOR}
    	{_GB_Based} <a href='http://code.google.com/p/hustoj/' target='_blank'>HUSTOJ</a></span>\n";
    echo "<div class='sep10'></div>\n";
    echo "<small>{_GB_Version} {_GB_VersionNumber}</small>\n";
    echo "</div>\n";
	echo "</div>\n";
	echo "</body>\n";
}

function MainHead() {
	echo "<div id='Wrapper'>\n";
	echo "<div id='Main'>\n";
}

function MainFoot() {
	echo "</div>\n";
	echo "</div>\n";
}


?>
