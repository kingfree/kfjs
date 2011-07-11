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
        echo "<div class=status>\n";

        if($this->langtype==0) $lang = 'c';
        elseif($this->langtype==1) $lang = 'cpp';
        elseif($this->langtype==2) $lang = 'pascal';

        echo "<div class=ptt>评测信息</div>\n";
        echo "<div class=ptx>\n";
        echo "<table frame=void width=100%>";
		echo "<tr><td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 1, 'int');\"><A>"._GB_RUNID."</A>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 2, 'int');\"><A>"._GB_PROBLEMS."</A></td>\n";
		echo "<td align=center><A>"._GB_USER."</A></td>\n";
		echo "<td align=center><A>"._GB_RESULT."</A></td>\n";
		echo "<td align=center><A>"._GB_DETAIL."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 6, 'int');\"><A>"._GB_SCORE."</A></td>\n";
		echo "<td align=center><A>"._GB_LANG."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 7, 'int');\"><A>"._GB_TIME."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 8, 'int');\"><A>"._GB_MEMORY."</A></td>\n";
		echo "<td><A>"._GB_IP."</A></td>\n";
		echo "<td align=center><A>"._GB_SUBMIT_TIME."</A></td>\n";
		echo "</tr>";

        echo "<tr><td align=center><a href='../status/status.php?jid=$this->jid'>".$this->jid."</a></td>\n";
        echo "<td align=center><a href='../problem/problem.php?id=$this->pid'>".GetProblemTitle($this->pid)."</a></td>\n";
        echo "<td align=center><a href='../users/info.php?user=$this->uid'>$this->uid</a></td>\n";
        echo "<td align=center>".GetJudgeInfo($this->result)."</td>\n";
        echo "<td align=center><span style=\"font-family:monospace;\">".GetDetailInfo($this->detail)."</span></td>\n";
        echo "<td align=center>".$this->score."</td>\n";
        echo "<td align=center>".GetLangInfo($this->langtype)."</td>\n";
        echo "<td align=center>".($this->runtime == -1 ? "N/A" : $this->runtime." ms")."</td>\n";
        echo "<td align=center>".($this->memory == -1 ? "N/A" : $this->memory." KB")."</td>\n";
        echo "<td>".$this->ip."</td>\n";
        echo "<td align=center>".$this->submit_time."</td>\n";
        echo "</tr></table>\n";
        echo "</div>\n";

        echo "<div class=ptt>源代码</div>\n";
        echo "<div class=ptx>\n<pre class='sh_$lang'>";
        echo htmlspecialchars($this->source);
        echo "</pre>\n</div>\n";

        echo "</div>\n";
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
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 1, 'int');\"><A>"._GB_RUNID."</A>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 2, 'int');\"><A>"._GB_PROBLEMS."</A></td>\n";
		echo "<td align=center><A>"._GB_USER."</A></td>\n";
		echo "<td align=center><A>"._GB_RESULT."</A></td>\n";
		echo "<td align=center><A>"._GB_DETAIL."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 6, 'int');\"><A>"._GB_SCORE."</A></td>\n";
		echo "<td align=center><A>"._GB_LANG."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 7, 'int');\"><A>"._GB_TIME."</A></td>\n";
		echo "<td align=center style=\"cursor:hand\" onclick=\"sortTable('statuslist', 8, 'int');\"><A>"._GB_MEMORY."</A></td>\n";
		//echo "<td><A>"._GB_IP."</A></td>\n";
		echo "<td align=center><A>"._GB_SUBMIT_TIME."</A></td>\n";
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
            echo "<td align=center><a href='../status/status.php?jid=$row->jid'>".$row->jid."</a></td>\n";
            echo "<td align=center><a href='../problem/problem.php?id=$row->pid'>".GetProblemTitle($row->pid)."</a></td>\n";
            echo "<td align=center><a href='../users/info.php?user=$row->uid'>$row->uid</a></td>\n";
            echo "<td align=center>".GetJudgeInfo($row->result)."</td>\n";
            echo "<td align=center><span style=\"font-family:monospace;\">".GetDetailInfo($row->detail)."</span></td>\n";
            echo "<td align=center>".$row->score."</td>\n";
            echo "<td align=center>".GetLangInfo($row->langtype)."</td>\n";
            echo "<td align=center>".($row->runtime == -1 ? "N/A" : $row->runtime." ms")."</td>\n";
            echo "<td align=center>".($row->memory == -1 ? "N/A" : $row->memory." KB")."</td>\n";
            //echo "<td>".$row->ip."</td>\n";
            echo "<td align=center>".$row->submit_time."</td>\n";
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
