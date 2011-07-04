<?php
class Status {

    public $jid, $pid, $cid, $uid, $result, $detail, $score, $runtime, $memory, $langtype, $submit_time, $judge_time;
    private $source, $ip;

	public function __construct($jid, $nowuser="0", $admin=0) {
        $this->jid = $jid;
        $sql = "SELECT * from `submit` WHERE `jid`=$this->jid";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
        mysql_free_result($result);
        $this->pid = $row->pid;
        $this->cid = $row->cid;
        $this->uid = $row->uid;
        if($this->uid==$nowuser || $admin==1)
            $this->source = $row->source;
        else
            $this->source = "不允许查看！";
        $this->result = $row->result;
        $this->detail = $row->detail;
        $this->score = $row->score;
        $this->runtime = $row->runtime;
        $this->memory = $row->memory;
        $this->ip = $row->ip;
        $this->langtype = $row->langtype;
        $this->submit_time = $row->submit_time;
        $this->judge_time = $row->judge_time;
    }

    public function ShowStatus() {
        echo "<div class=status>";
        if($this->langtype==0) $lang = 'c';
        if($this->langtype==1) $lang = 'cpp';
        if($this->langtype==2) $lang = 'pascal';
        echo "<div class=ptt>源代码</div>";
        echo "<div class=ptx><pre class='sh_$lang'>";
        echo htmlspecialchars($this->source);
        echo "</pre></div>";
        echo "</div>";
	}

	public function ShowStatus1() {
	echo "<div><table frame=void width=100%>";
            echo "<tr><td><a href='../status/status.php?jid=$this->jid'>".$this->jid."</a></td>\n";
            echo "<td><a href='../problem/problem.php?id=$this->pid'>".GetProblemTitle($this->pid)."</a></td>\n";
            echo "<td><a href='../users/info.php?user=$this->uid'>$this->uid</a></td>\n";
            echo "<td>".GetJudgeInfo($this->result)."</td>\n";
            echo "<td>".$this->detail."</td>\n";
            echo "<td>".$this->score."</td>\n";
            echo "<td>".GetLangInfo($this->langtype)."</td>\n";
            echo "<td>".($this->runtime == -1 ? "N/A" : $this->runtime." ms")."</td>\n";
            echo "<td>".($this->memory == -1 ? "N/A" : $this->memory." KB")."</td>\n";
            //echo "<td>".$row->ip."</td>\n";
            echo "<td>".$this->submit_time."</td>\n";
			echo "</tr>";
	echo "<td width=50%><div class='box' style='margin:0px 0px 0px 25px;'>\n";
	echo "<div class='ptt' style='width: 90%; margin : 10px 20px 0 10px;'>题目详细信息</div>\n";
	echo "<div class='ptx' style='width: 88%; margin : 0 30px 10px 10px;'><table frame=box width=95% rules=all style='margin : 5px;'>";
	echo "<tr><td width=20%><span class=green>"._GB_Status_Name."</span></td><td>$this->title</td>";
	echo "<td width=20%><span class=green>"._GB_Status_English_Name."</span></td><td>$this->English</td></tr>";
	if($this->program_type!=1) {
		echo "<tr><td width=15%><span class=green>"._GB_Time_Limit."</span></td><td>$this->time_limit s</td>";
		echo "<td width=15%><span class=green>"._GB_Memory_Limit."</span></td><td>$this->memory_limit MB</td></tr>";
	}
	echo "<tr><td><span class=green>"._GB_File_Name."</span></td><td>$this->program_filename</td>";
	echo "<td><span class=green>"._GB_Status_Source."</span></td><td><a href='../problem/index.php?search=$this->source'>".nl2br($this->source)."</td></td></tr>";
	echo "<tr><td><span class=green>"._GB_Judge_Type."</span></td><td colspan=3>{$judge_type[$this->program_type]}</td></tr>";
	echo "<tr><td><span class=green>"._GB_Compare_Type."</span></td><td colspan=3>{$compare_type[$this->compare_type]}</td></tr>";
	echo "</table></div></div></td>";
	echo "<td><table>";
	echo "<tr><div class='box' style='width: 340px; float:right;'>";
	echo "<div class='ptt' style='width: 310px; margin : 10px 20px 0 10px;'>提交程序或答案</div>";
	echo "<div class='ptx' style='width: 300px; margin : 0 30px 10px 10px;'>";
	echo "<a href='../judge/status.php?id={$this->jid}'>状态</a> : 提交".$this->submit." ，解决".$this->accepted."";
	echo "<form action='../judge/submit.php?id=$this->jid' method=post enctype='multipart/form-data'>\n";
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

}





class StatusList extends Status {

	public $user_id, $cnt, $pstart, $pend, $sub_arr, $acc_arr, $search, $sqlresult;

	public function __construct($uid, $page, $search="") {
		$this->user_id=$uid;
		$this->page=$page;
		$this->search=$search;
		$this->ReadStatusList();
	}

	public function GetStatusCount() {
		$page_size = 100;
		$sql="SELECT max(`jid`) as mjid FROM `submit`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->cnt=intval($row->mjid)/$page_size;
		$this->pstart=$page_size*intval($this->cnt - $this->page + 1);
		$this->pend=$this->pstart+$page_size;
	}

	public function ReadStatusList() {
		$this->GetStatusCount();
        $sql="SELECT * FROM `submit` WHERE ";
		//搜索
		if($this->search!="0"){
			$search=mysql_real_escape_string($this->search);
			$sql.=" ( title like '%$search%' or source like '%$search%')";
		} else {
			$sql.="  `jid`>='".strval($this->pstart)."' AND `jid`<'".strval($this->pend)."' ";
		}
		$sql.=" ORDER BY -`jid`";
		//开始执行
		$this->sqlresult=mysql_query($sql);
	}

	public function ShowStatusList() {
		echo "<center>\n";
		//搜索
		/*echo "<table width=90%><tr>\n";
		echo "<td align=center><form action=../status/status.php>"._GB_RUNID."<input type='text' name='id' size=8><input type='submit' value='"._GB_GO."' ></form></td>\n";
		echo "<td> &nbsp; </td>\n";
		echo "<td align=center><form>"._GB_SEARCH."<input type='text' name='search'><input type='submit' value=\""._GB_SEARCH."\" ></form></td>\n";
        echo "</tr></table>\n";*/
		//标题行
		echo "<table id='statuslist' width='90%'>";
		echo "<tr align=center class='toprow'>";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('statuslist', 1, 'int');\"><A>"._GB_RUNID."</A>\n";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('statuslist', 2, 'int');\"><A>"._GB_PROBLEM_ID."</A></td>\n";
		echo "<td><A>"._GB_USER."</A></td>\n";
		echo "<td><A>"._GB_RESULT."</A></td>\n";
		echo "<td><A>"._GB_DETAIL."</A></td>\n";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('statuslist', 6, 'int');\"><A>"._GB_SCORE."</A></td>\n";
		echo "<td><A>"._GB_LANG."</A></td>\n";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('statuslist', 7, 'int');\"><A>"._GB_TIME."</A></td>\n";
		echo "<td style=\"cursor:hand\" onclick=\"sortTable('statuslist', 8, 'int');\"><A>"._GB_MEMORY."</A></td>\n";
		//echo "<td><A>"._GB_IP."</A></td>\n";
		echo "<td><A>"._GB_SUBMIT_TIME."</A></td>\n";
		echo "</tr></thead><tbody>";
		//循环显示
		$cnt=0;
		while ($row=mysql_fetch_object($this->sqlresult)) {
			//阴阳行
			if($cnt)
				echo "<tr class='oddrow'>";
			else
				echo "<tr class='evenrow'>";
			//题目信息
    // $jid, $pid, $cid, $uid, $result, $detail, $score, $runtime, $memory, $ip, $submit_time;
            echo "<td><a href='../status/status.php?jid=$row->jid'>".$row->jid."</a></td>\n";
            echo "<td><a href='../problem/problem.php?id=$row->pid'>".GetProblemTitle($row->pid)."</a></td>\n";
            echo "<td><a href='../users/info.php?user=$row->uid'>$row->uid</a></td>\n";
            echo "<td>".GetJudgeInfo($row->result)."</td>\n";
            echo "<td>".$row->detail."</td>\n";
            echo "<td>".$row->score."</td>\n";
            echo "<td>".GetLangInfo($row->langtype)."</td>\n";
            echo "<td>".($row->runtime == -1 ? "N/A" : $row->runtime." ms")."</td>\n";
            echo "<td>".($row->memory == -1 ? "N/A" : $row->memory." KB")."</td>\n";
            //echo "<td>".$row->ip."</td>\n";
            echo "<td>".$row->submit_time."</td>\n";
			echo "</tr>";
			$cnt=1-$cnt;
		}
		mysql_free_result($this->sqlresult);
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
