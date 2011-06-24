<?

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_SUBMIT);
$index->BodyHead();
$index->MainHead();

//$Cp=new Compiler($SETTINGS['dir_source'],$_GET['id'],$_SESSION['ID'],$_POST['lang_type'],$d['filename'],$d['datacnt'],$d['timelimit']);

$judge = new Judge($_GET['id']);

$id = $_GET['id'];
$outputdir = "../upload/".$id."/";
if (!file_exists($outputdir)) mkdir($outputdir);

echo "<div class=ptt>正在上传文件……</div>\n<div class=ptx>";
if ($_FILES["file"]["error"] > 0) {
	ShowError("错误: ".$_FILES["file"]["error"], $_FILES["file"]["error"]);
} else {
	echo "文件: ".$_FILES["file"]["name"]."<br />";
	echo "类型: ".$_FILES["file"]["type"]."<br />";
	echo "大小: ".($_FILES["file"]["size"])." B<br />";
	echo "位置: ".$_FILES["file"]["tmp_name"]."<br />";
	$upload_file_name = $outputdir.time().".".$_FILES["file"]["name"] ;
	if(move_uploaded_file($_FILES["file"]["tmp_name"],$upload_file_name) &&
	chmod($upload_file_name,0666)) {
		echo "复制到了: ".$upload_file_name;
	}
}

echo "</div><div class=ptt>正在检测提交语言……</div>\n<div class=ptx>";
if($_POST['lang_type']=='auto') {
	if($_FILES["file"]["type"]=="text/x-pascal")
		$Complie_CMD = $judge->Get_Complie_CMD($upload_file_name, $outputdir, 2);
	elseif($_FILES["file"]["type"]=="text/x-csrc")
		$Complie_CMD = $judge->Get_Complie_CMD($upload_file_name, $outputdir, 0);
	elseif($_FILES["file"]["type"]=="text/x-c++src")
		$Complie_CMD = $judge->Get_Complie_CMD($upload_file_name, $outputdir, 1);
	else {
		ShowError("暂时只支持自动检测 C/C++ 及 Pascal 语言！\n请返回后选择语言！",0);
	}
} else {
	$Complie_CMD = Get_Complie_CMD($upload_file_name, $outputdir, $_POST['lang_type']+1);
}
echo "对您所使用的语言使用如下编译命令：<br />";
echo "<pre>$Complie_CMD</pre>";

echo "<p>正在编译……";
	$pname = $outputdir."a.exe";
	if (file_exists($pname))
		unlink($pname);
	$handle = popen($Complie_CMD, 'r');
	echo "…";
	$tmp = rfile($handle);
	echo "…";
	pclose($handle);
	echo "…";
	if (file_exists($pname))
		echo "成功</p>\n<pre>\n$tmp\n</pre>";
	else {
		echo "<span style='color:red;'>失败</span></p>";
		ShowError("<p>编译错误信息：</p>\n<pre>\n$tmp\n</pre>");
	}


echo "<p>开始评测……</p>";

$sql="SELECT * FROM `problem` WHERE `problem_id`=$id";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_object($result);
/*
for ($P=1;$P<=$d[datacnt];$P++) {
	$Cp->run($P);
	$totaltime+=round($Cp->rtime,0);
	$avgmemory+=$Cp->memory;
	echo "测试数据："$P;
	echo $Cp->getresult();
	printf("运行时间：%.3f s",$Cp->rtime/1000.0);
	echo $Cp->memory;
	echo $Cp->exitcode;
}*/
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
