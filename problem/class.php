<?php
class Problem {

	public $problem_id, $title, $description, $input, $output, $sample_input, $sample_output, $input_template, $output_template, $hint, $source, $in_date, $time_limit, $memory_limit, $program_filename, $program_type, $start_num, $end_num, $English, $compare_type, $defunct, $accepted, $submit, $solved;
	public $contest_id;

	public function GetNewPID() {
		$sql="SELECT max(`problem_id`) as pid FROM `problem`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->problem_id = $row->pid+1;
		mysql_free_result($result);
	}

	public function __construct($pid=-1, $cid=-1) {
		$this->problem_id = $pid;
		$this->contest_id = $cid;
		$this->title = "";
		$this->description = "";
		$this->input = "";
		$this->output = "";
		$this->sample_input = "";
		$this->sample_output = "";
		$this->input_template = "file#.in";
		$this->output_template = "file#.out";
		$this->answer_template = "file#.ans";
		$this->hint = "";
		$this->source = "";
		$this->in_date = "";
		$this->time_limit = 1;
		$this->memory_limit = 128;
		$this->program_filename = "file";
		$this->program_type = 0;
		$this->start_num = 1;
		$this->end_num = 10;
		$this->English = "";
		$this->compare_type = 0;
		$this->defunct = "N";
		$this->accepted = 0;
		$this->submit = 0;
		$this->solved = 0;
		if($pid==-1)
			$this->GetNewPID();
		else if($cid==-1)
			$this->ReadProblem();
		else
			$this->ReadContestProblem();
	}

	public function ReadProblem() {
		//查询数据库
		$id=intval($this->problem_id);
		if (!isset($_SESSION['administrator']) && $id!=1000)
			$sql="SELECT * FROM `problem` WHERE `problem_id`=$id AND `defunct`='N' AND `problem_id` NOT IN (
				SELECT `problem_id` FROM `contest_problem` WHERE `contest_id` IN(
						SELECT `contest_id` FROM `contest` WHERE `end_time`>NOW() or `private`='1'))
			";
		else
			$sql="SELECT * FROM `problem` WHERE `problem_id`=$id";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		mysql_free_result($result);
		//读取题目信息
		$this->problem_id=$row->problem_id;
		$this->title=$row->title;
		$this->description=$row->description;
		$this->input=$row->input;
		$this->output=$row->output;
		$this->sample_input=$row->sample_input;
		$this->sample_output=$row->sample_output;
		$this->input_template=$row->input_template;
		$this->output_template=$row->output_template;
		$this->answer_template=$row->answer_template;
		$this->hint=$row->hint;
		$this->source=$row->source;
		$this->in_date=$row->in_date;
		$this->time_limit=$row->time_limit;
		$this->memory_limit=$row->memory_limit;
		$this->program_filename=$row->program_filename;
		$this->program_type=$row->program_type;
		$this->start_num=$row->start_num;
		$this->end_num=$row->end_num;
		$this->English=$row->English;
		$this->compare_type=$row->compare_type;
		$this->defunct=$row->defunct;
		$this->accepted=$row->accepted;
		$this->submit=$row->submit;
		$this->solved=$row->solved;
	}

	public function ReadContestProblem($cid) {

	}

	public function Language_Type() {
		global $language_name, $io_type, $zipfile_name;
		echo "<label for='lang_type'>"._GB_Language_Type." : </label>\n";
		echo "<select name='lang_type'>\n";
		echo "<option value='auto'>"._GB_Auto_Check."</option>\n";
		for($i=0; $i<count($language_name); $i++)
			echo "<option value=$i>{$language_name[$i]}</option>\n";
		echo "</select>\n";
	}

	public function IO_Type() {
		global $language_name, $io_type, $zipfile_name;
	echo "<label for='io_type'>"._GB_IO_Type." : </label>\n";
		echo "<input type=radio name=io_type value='1' checked>{$io_type[1]}\n";
		echo "<input type=radio name=io_type value='0'>{$io_type[0]}\n";
		echo "</select>\n";
	}

	public function Zip_File_Type() {
		global $language_name, $io_type, $zipfile_name;
		echo "<label for='zip_type'>"._GB_Zip_File_Type." : </label>";
		echo "<select name='zip_type'>";
		echo "<option value=auto>"._GB_Auto_Check."</option>";
		for($i=0; $i<count($zipfile_name); $i++)
			echo "<option value=$i>{$zipfile_name[$i]}</option>";
		echo "</select>";
	}

	public function ShowProblem() {
		global $judge_type, $io_type, $compare_type;
	echo "<div><table frame=void width=100%>";
	echo "<td width=50%><div class='box' style='margin:0px 0px 0px 25px;'>\n";
	echo "<div class='ptt' style='width: 90%; margin : 10px 20px 0 10px;'>题目详细信息</div>\n";
	echo "<div class='ptx' style='width: 88%; margin : 0 30px 10px 10px;'><table frame=box width=95% rules=all style='margin : 5px;'>";
	echo "<tr><td width=20%><span class=green>"._GB_Problem_Name."</span></td><td>$this->title</td>";
	echo "<td width=20%><span class=green>"._GB_Problem_English_Name."</span></td><td>$this->English</td></tr>";
	if($this->program_type!=1) {
		echo "<tr><td width=15%><span class=green>"._GB_Time_Limit."</span></td><td>$this->time_limit s</td>";
		echo "<td width=15%><span class=green>"._GB_Memory_Limit."</span></td><td>$this->memory_limit MB</td></tr>";
	}
	echo "<tr><td><span class=green>"._GB_File_Name."</span></td><td>$this->program_filename</td>";
	echo "<td><span class=green>"._GB_Problem_Source."</span></td><td><a href='../problem/index.php?search=$this->source'>".nl2br($this->source)."</td></td></tr>";
	echo "<tr><td><span class=green>"._GB_Judge_Type."</span></td><td colspan=3>{$judge_type[$this->program_type]}</td></tr>";
	echo "<tr><td><span class=green>"._GB_Compare_Type."</span></td><td colspan=3>{$compare_type[$this->compare_type]}</td></tr>";
	echo "</table></div></div></td>";
	echo "<td><table>";
	echo "<tr><div class='box' style='width: 340px; float:right;'>";
	echo "<div class='ptt' style='width: 310px; margin : 10px 20px 0 10px;'>提交程序或答案</div>";
	echo "<div class='ptx' style='width: 300px; margin : 0 30px 10px 10px;'>";
	echo "<a href='../judge/status.php?id={$this->problem_id}'>状态</a> : 提交".$this->submit." ，解决".$this->accepted."";
	echo "<form action='../judge/submit.php?id=$this->problem_id' method=post enctype='multipart/form-data'>\n";
	if($this->program_type==0 || $this->program_type==2) {
		echo "<li>"; $this->Language_Type(); echo "</li>\n";
	} else {
		echo "<li>"; $this->Zip_File_Type(); echo "</li>\n";
	}
	if($this->program_type==0) {
		echo "<li>"; $this->IO_Type(); echo "</li>\n";
	}
	echo "<li><input type='file' name='file' id='file' size=20 /></li>\n";
	echo "<center><input class='lsbb' type='submit' name='submit' value="._GB_SUBMIT." class='Button'/></center>\n";
	echo "</form></div>\n";
	echo "</div></tr></table></td><td width=40px>&nbsp</td>\n";
	echo "</table></div>\n";
	
	echo "<div class=\"ptt\">"._GB_Description."</div>\n<div class=\"ptx\">".$this->description."</div>\n";
	echo "<div class=\"ptt\">"._GB_Input."</div>\n<div class=\"ptx\">".$this->input."</div>\n";
	echo "<div class=\"ptt\">"._GB_Output."</div>\n<div class=\"ptx\">".$this->output."</div>\n";
	echo "<div class=\"sio\"> ";
	echo "<div class=\"row\"> ";
	echo "  <div class=\"hio\">"._GB_Sample_Input."</div> ";
	echo "  <div class=\"hio\">"._GB_Sample_Output."</div> ";
	echo "</div><div class=\"row\"> ";
	echo "  <div class=\"io\"><pre>".($this->sample_input)."</pre></div> ";
	echo "  <div class=\"io\"><pre>".($this->sample_output)."</pre></div> ";
	echo "</div> ";
	echo "</div>";
	echo "<div class=\"ptt\">"._GB_HINT."</div>\n<div class=\"ptx\">".$this->hint."</div>\n";;
	}

	public function AddProblem() {
		$sql = "INSERT into `problem`(
`problem_id`,`title`,`English`,`time_limit`,`memory_limit`,`source`,
`program_type`,`compare_type`,`start_num`,`end_num`,
`program_filename`,`input_template`,`output_template`,`answer_template`,
`description`,`input`,`output`,`sample_input`,`sample_output`,`hint`,
`in_date`,`defunct`)
VALUES(
$this->problem_id,'$this->title','$this->English',$this->time_limit,$this->memory_limit,'$this->source',
$this->program_type,$this->compare_type,$this->start_num,$this->end_num,
'$this->program_filename','$this->input_template','$this->output_template','$this->answer_template',
'$this->description','$this->input','$this->output','$this->sample_input','$this->sample_output','$this->hint',
NOW(),'$this->defunct')";
		//echo $sql;
		if(@mysql_query($sql))
			return true;
		else {
			echo mysql_error();
			return false;
		}
	}

	public function UpdateProblem() {
		$sql="UPDATE `problem` set
`title`='$this->title',`English`='$this->English',
`time_limit`='$this->time_limit',`memory_limit`='$this->memory_limit',
`program_type`=$this->program_type, `compare_type`=$this->compare_type,
`start_num`=$this->start_num, `end_num`=$this->end_num,
`program_filename`='$this->program_filename',
`input_template`='$this->input_template',
`output_template`='$this->output_template',
`answer_template`='$this->answer_template',
`description`='$this->description',`input`='$this->input',`output`='$this->output',
`sample_input`='$this->sample_input',`sample_output`='$this->sample_output',`hint`='$this->hint',
`source`='$this->source',`in_date`=NOW()
WHERE `problem_id`=$this->problem_id";
		//echo $sql;
		if(@mysql_query($sql))
			return true;
		else {
			echo mysql_error();
			return false;
		}
	}


}





class ProblemList extends Problem {

	public $user_id, $cnt, $pstart, $pend, $sub_arr, $acc_arr, $search;
	public $result;

	public function __construct($uid, $page, $search="") {
		$this->user_id=$uid;
		$this->page=$page;
		$this->search=$search;
		$this->ReadProblemList();
	}

	public function GetProblemCount() {
		$page_size = 100;
		$sql="SELECT max(`problem_id`) as upid FROM `problem`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->cnt=intval($row->upid)/$page_size;
		$this->pstart=$page_size*intval($this->page)-$page_size;
		$this->pend=$this->pstart+$page_size;
	}

	public function CheckSubmitAC() {
		// 提交数组
		$this->sub_arr=Array();
		if($this->user_id!="0") {
		$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`='".$this->user_id."'".
			" AND `problem_id`>='{$this->pstart}'".
			" AND `problem_id`<'{$this->pend}'".
			" group by `problem_id`";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result))
			$this->sub_arr[$row[0]]=true;
		}
		// 通过数组
		$this->acc_arr=Array();
		if($this->user_id!="0") {
		$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`='".$this->user_id."'".
			" AND `problem_id`>='{$this->pstart}'".
			" AND `problem_id`<'{$this->pend}'".
			" AND `result`=4".
			" group by `problem_id`";
		$result=mysql_query($sql);
		while($row=mysql_fetch_array($result))
			$this->acc_arr[$row[0]]=true;
		}
	}

	public function ReadProblemList() {
		$this->GetProblemCount();
		$this->CheckSubmitAC();
		//按用户ID读取题目
		if($this->user_id!="0") {
			$sql="SELECT `problem_id`,`title`,`source`,`submit`,`accepted` FROM `problem` WHERE ";
		} else {
		$sql="SELECT `problem_id`,`title`,`source`,`submit`,`accepted` FROM `problem` ".
			"WHERE `defunct`='N' AND `problem_id` NOT IN(
				SELECT `problem_id` FROM `contest_problem` WHERE `contest_id` IN (
					SELECT `contest_id` FROM `contest` WHERE
					(`end_time`>NOW() or private=1)and `defunct`='N'
				)
			) AND";
		}
		//搜索
		if($this->search!="0"){
			$search=mysql_real_escape_string($this->search);
			$sql.=" ( title like '%$search%' or source like '%$search%')";
		} else {
			$sql.="  `problem_id`>='".strval($this->pstart)."' AND `problem_id`<'".strval($this->pend)."' ";
		}
		$sql.=" ORDER BY `problem_id`";
		//开始执行
		$this->result=mysql_query($sql);
	}

	public function ShowProblemList() {
		echo "<center>\n";
		//题目搜索
		echo "<table width=90%><tr>\n";
		echo "<td align=center><form action=../problem/problem.php>"._GB_PROBLEM_ID."<input type='text' name='id' size=8><input type='submit' value='"._GB_GO."' ></form></td>\n";
		echo "<td> &nbsp; </td>\n";
		echo "<td align=center><form>"._GB_SEARCH."<input type='text' name='search'><input type='submit' value=\""._GB_SEARCH."\" ></form></td>\n";
		echo "</tr></table>\n";
		//标题行
		echo "<table id='problemset' width='90%'>";
		echo "<tr align=center class='toprow'>";
		echo "<td width='5'><td style=\"cursor:hand\" onclick=\"sortTable('problemset', 1, 'int');\" width=10%><A>"._GB_PROBLEM_ID."</A>";
		echo "<td width='60%'>"._GB_TITLE."</td><td width='20%'>"._GB_SOURCE."</td>";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('problemset', 4, 'int');\" width='5%'><A>"._GB_AC."</A></td>";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('problemset', 5, 'int');\" width='5%'><A>"._GB_SUBMIT."</A></td></tr>";
		echo "</thead><tbody>";
		//循环显示
		$cnt=0;
		while ($row=mysql_fetch_object($this->result)) {
			//阴阳行
			if($cnt)
				echo "<tr class='oddrow'>";
			else
				echo "<tr class='evenrow'>";
			//是否通过
			echo "<td>";
			if(isset($this->sub_arr[$row->problem_id])) {
				if (isset($this->acc_arr[$row->problem_id]))
					echo "<span class=yes>Y</span>";
				else
					echo "<span class=no>N</span>";
			}
			echo "</td>";
			//题目信息
			echo "<td align='center'>".$row->problem_id."</td>";
			echo "<td align='left'><a href='../problem/problem.php?id=".$row->problem_id."'>".$row->title."</a></td>";
			echo "<td align='center'><a href='../problem/index.php?search=$row->source'>".$row->source."</a></td>";
			echo "<td align='center'><a href='../status/index.php?problem_id=".$row->problem_id."&jresult=4'>".$row->accepted."</a></td><td align='center'><a href='../status/index.php?problem_id=".$row->problem_id."'>".$row->submit."</a></td>";
			echo "</tr>";
			$cnt=1-$cnt;
		}
		mysql_free_result($this->result);
		echo "</tbody>\n";
		echo "</table>\n";
		//显示页码
		echo "<h4>";
		for($i=1;$i<=$this->cnt+1;$i++) {
			if ($i>1)
				echo '&nbsp;';
			if ($i==$this->page)
				echo "<span class=red>$i</span>";
			else
				echo "<a href='../problem/index.php?page=".$i."'>".$i."</a>";
		}
		echo "</h4>\n";
		echo "</center>\n";
	}

}
?>
