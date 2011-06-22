<?php
require_once("../include/class.php");
@session_start();
if (!(isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])))
	exit(1);

$admin = new Admin();
if(isset($_GET['pid'])) {
	$admin->HTMLHead(_ADMIN_EditProblem);
	$admin->BodyHead(_ADMIN_EditProblem);
	$prob = new Problem($_GET['pid']);
	$pid="?pid=".$_GET['pid'];
} else {
	$admin->HTMLHead(_ADMIN_AddProblem);
	$admin->BodyHead(_ADMIN_AddProblem);
	$prob = new Problem();
	$pid="";
}
?>
<p><?=_GB_PROBLEM_ID?>:
<?=$prob->problem_id?></p>
<form method=POST action=problem_add.php<?=$pid?>>
<p><?=_GB_Problem_Name?>:
<input type=text name=title size=30 value="<?=$prob->title?>">

<?=_GB_Problem_English_Name?>:
<input type=text name=English size=30 value="<?=$prob->English?>"></p>

<p><?=_GB_Time_Limit?>:
<input type=text name=time_limit size=26 value="<?=$prob->time_limit?>">s
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?=_GB_Memory_Limit?>:
<input type=text name=memory_limit size=26 value="<?=$prob->memory_limit?>">MB</p>

<p><?=_GB_File_Name?>:
<input type=text name=program_filename size=30 value="<?=$prob->program_filename?>">

<?=_GB_Problem_Source?>:
<input type=text name=source size=30 value="<?=$prob->source?>"></p>

<p><?=_GB_Input_Template?>:
<input type=text name=input_template size=30 value="<?=$prob->input_template?>">

<?=_GB_Output_Template?>:
<input type=text name=output_template size=30 value="<?=$prob->output_template?>"></p>

<p><?=_GB_Answer_Template?>:
<input type=text name=answer_template size=30 value="<?=$prob->answer_template?>">

<?=_GB_StartNum?>:
<input type=text name=start_num size=10 value="<?=$prob->start_num?>">

<?=_GB_EndNum?>:
<input type=text name=end_num size=10 value="<?=$prob->end_num?>"></p>

<p><?=_GB_Judge_Type?>:
	<input type=radio name=judge_type value='0' checked><?echo $judge_type[0];?>
	<input type=radio name=judge_type value='1'><?echo $judge_type[1];?>
	<input type=radio name=judge_type value='2'><?echo $judge_type[2];?>
</p>

<p><?=_GB_Compare_Type?>:
	<input type=radio name=compare_type value='0' checked><?echo $compare_type[0];?>
	<input type=radio name=compare_type value='1'><?echo $compare_type[1];?>
	<input type=radio name=compare_type value='2'><?echo $compare_type[2];?>
</p>

<p>所属比赛:
	<select name=contest_id>
<?
$sql="SELECT `contest_id`,`title` FROM `contest` WHERE `start_time`>NOW() order by `contest_id`";
$result=mysql_query($sql);
echo "<option value=''>无</option>";
if(mysql_num_rows($result)) {
	for (;$row=mysql_fetch_object($result);)
		echo "<option value='$row->contest_id'>$row->contest_id $row->title</option>";
}
?>
	</select>
</p>

<script>
KE.show({ id : 'description'});
KE.show({ id : 'input'});
KE.show({ id : 'output'});
KE.show({ id : 'hint'});
</script>

<h3><?=_GB_Description?></h3>
<textarea id="description" name="description" style="width:640px;height:300px;">
<?=$prob->description?>
</textarea>

<h3><?=_GB_Input?></h3>
<textarea id="input" name="input" style="width:640px;height:300px;">
<?=$prob->input?>
</textarea>

<h3><?=_GB_Output?></h3>
<textarea id="output" name="output" style="width:640px;height:300px;">
<?=$prob->output?>
</textarea>

<h3><?=_GB_Sample_Input?></h3>
<textarea id="sample_input" name="sample_input" style="width:640px;height:300px;">
<?=$prob->sample_input?>
</textarea>

<h3><?=_GB_Sample_Output?></h3>
<textarea id="sample_output" name="sample_output" style="width:640px;height:300px;">
<?=$prob->sample_output?>
</textarea>

<h3><?=_GB_HINT?></h3>
<textarea id="hint" name="hint" style="width:640px;height:300px;">
<?=$prob->hint?>
</textarea>

<p />
<center>
<input class='lsbb' type='submit' name='submit' value="<?=_GB_SUBMIT?>" class='Button'/>
</center>
</form>
<p />

<?
$admin->BodyFoot();
$admin->HTMLFoot();
?>
