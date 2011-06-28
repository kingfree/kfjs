<?
require_once("../include/class.php");
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])))
	exit(1);

$admin = new Admin();
if(isset($_GET['pid'])) {
	$prob = new Problem($_GET['pid']);
} else
	$prob = new Problem();
/*
 title  English  time_limit memory_limit program_filename source
 input_template  output_template judge_type compare_type  contest_id
 description  input  output  sample_input sample_output  hint
*/
	$prob->title = mysql_real_escape_string($_POST['title']);
	$prob->English = mysql_real_escape_string($_POST['English']);
	$prob->time_limit = intval($_POST['time_limit']);
	$prob->memory_limit = intval($_POST['memory_limit']);
	$prob->program_filename = mysql_real_escape_string($_POST['program_filename']);
	$prob->source = mysql_real_escape_string($_POST['source']);
	$prob->input_template = mysql_real_escape_string($_POST['input_template']);
	$prob->output_template = mysql_real_escape_string($_POST['output_template']);
	$prob->answer_template = mysql_real_escape_string($_POST['answer_template']);
	$prob->start_num = intval($_POST['start_num']);
	$prob->end_num = intval($_POST['end_num']);
	$prob->judge_type = intval($_POST['judge_type']);
	$prob->compare_type = intval($_POST['compare_type']);
	$prob->description = mysql_real_escape_string($_POST['description']);
	$prob->input = mysql_real_escape_string($_POST['input']);
	$prob->output = mysql_real_escape_string($_POST['output']);
	$prob->sample_input = mysql_real_escape_string($_POST['sample_input']);
	$prob->sample_output = mysql_real_escape_string($_POST['sample_output']);
	$prob->hint = mysql_real_escape_string($_POST['hint']);
if(isset($_GET['pid'])) {
if($prob->UpdateProblem()) {
	echo "<h3>修改题目 ".$prob->problem_id." 成功！</h3>\n";
} else
	echo "<h1>修改题目 ".$prob->problem_id." 失败！</h1>";
} else {
if($prob->AddProblem()) {
	$basedir = OJ_DATA.$prob->problem_id;
	mkdir($basedir);
	echo "<h3>添加题目 ".$prob->problem_id." 成功！</h3>\n";
	echo "<p>请在".$basedir."目录下添加输入文件和答案文件，如下：\n";
	echo "<table>";
	echo "<tr><td>输入文件</td><td>答案文件</td></tr>\n";
	for($i=$prob->start_num; $i<=$prob->end_num; $i++) {
		echo "<tr><td>".str_replace("#",$i,$prob->input_template)."</td>
			<td>".str_replace("#",$i,$prob->answer_template)."</td></tr>\n";
	}
	echo "</table></p>\n";
	if($prob->judge_type==2)
		echo "<p>请在".$basedir."目录下添加 main.c/main.cpp/main.pas 主文件！</p>\n";
	if($prob->compare_type==2)
		echo "<p>请在".$basedir."目录下添加 checker.c/checker.cpp/checker.pas 评测插件源文件！</p>\n";
} else
	echo "<h1>添加题目 ".$prob->problem_id." 失败！</h1>";
}

?>

