<?php

class Contest {
	public $cid, $name, $error;
	public $start_time, $end_time, $defunct, $description, $private, $langmask;
	public function __construct($cid=-1) {
		$this->error = "";
		if($cid==-1)
			$this->NewContest();
		else {
			$this->cid=$cid;
			$this->ReadContest();
		}
	}

	public function ShowContestList() {
		$sql="SELECT * FROM `contest` WHERE `defunct`='N' ORDER BY `contest_id` DESC";
		$result=mysql_query($sql);
		$color=false;
		echo "<center>\n";
		echo "<table width=90%>\n";
		echo "<tr class=toprow align=center>\n<td width=10%>
		"._GB_ID."<td width=50%>"._GB_ContestName."<td width=30%>"._GB_STATUS."<td width=10%>"._GB_Opening."\n</tr>\n";
		while($row=mysql_fetch_object($result)) {
			if ($color)
				echo "<tr align=center class=oddrow>";
			else
				echo "<tr align=center class=evenrow>\n";
			echo "<td>$row->contest_id";
			echo "<td><a href='../contest/index.php?cid=$row->contest_id'>$row->title</a>";
			$start_time=strtotime($row->start_time);
			$end_time=strtotime($row->end_time);
			$now=time();
			if($now>$end_time)
				echo "<td><font color=green>"._GB_Ended."@$row->end_time</font>";
			else if($now<$start_time)
				echo "<td><font color=blue>"._GB_NotStart."@$row->start_time</font>";
			else
				echo "<td><font color=red> "._GB_Running." </font>";
			$private=intval($row->private);
			if ($private==0)
				echo "<td><font color=blue>"._GB_Public."</font>";
			else
				echo "<td><font color=red>"._GB_Private."</font>";
			echo "</tr>\n";
			$color=!$color;
		}
		echo "</table>\n";
		echo "</center>\n";
		mysql_free_result($result);
	}

	public function ThrowError($msg="") {
		$this->error = $msg;
		$this->name  = $msg;
		return $msg;
	}

	public function ReadContest() {
		$this->cid=intval($this->cid);
		$sql="SELECT * FROM `contest` WHERE `contest_id`='$this->cid' AND `defunct`='N' ";
		$result=mysql_query($sql);
		$rows_cnt=mysql_num_rows($result);
		if ($rows_cnt==0)
			return $this->ThrowError(_GB_NO_SUCH_CONTEST);
		$row=mysql_fetch_object($result);
		$this->name = $row->title;
		$this->start_time=strtotime($row->start_time);
		$this->end_time=strtotime($row->end_time);
		$this->defunct=$row->defunct;
		$this->description=$row->description;
		$this->private=$row->private;
		$this->langmask=$row->langmask;
		if (!isset($_SESSION['administrator']) && time()<$this->start_time)
			return $this->ThrowError("隐藏比赛，管理员可见！");
		//if(!$contest_ok)
			//return $this->ThrowError(_GB_NOT_INVITED);
		mysql_free_result($result);
	}

	public function ShowContestIndex() {
		echo "<center>\n";
		echo "<h2>"._GB_CONTEST." - $this->name</h2>\n";
		echo "Start Time: ".strftime(DATE_W3C,$this->start_time);
		echo "End Time: ".$this->end_time."<br>";
		echo "Status:";
		if (time()>$this->end_time) echo "<font color=red>Ended</font>";
		else if (time()<$this->start_time) echo "<font color=red>Not Started</font>";
		else echo "<font color=red>Running</font>";
		if ($this->private=='0') echo "&nbsp;&nbsp;<font color=blue>Public</font>";
		else echo "&nbsp;&nbsp;<font color=red>Private</font>";

		$sql="SELECT `problem`.`title` as `title`,`problem`.`problem_id` as `pid`
		FROM `contest_problem`,`problem`
		WHERE `contest_problem`.`problem_id`=`problem`.`problem_id` AND `problem`.`defunct`='N'
		AND `contest_problem`.`contest_id`='$this->cid' ORDER BY `contest_problem`.`num`";
		$result=mysql_query($sql);
		$cnt=0;
		echo "<table width=60%>\n";
		echo "<tr class=toprow>\n";
		echo "<td width=5><td width=34%><b>Problem ID</b><td width=65%><b>Title</b></tr>";
		while ($row=mysql_fetch_object($result)){
			if ($cnt&1) echo "<tr class=oddrow>";
			else echo "<tr class=evenrow>";
			echo "<td>";
			if (isset($_SESSION['user_id']))
			echo check_ac($this->cid,$cnt);
			echo "<td>$this->pid Problem $PID[$cnt]
				<td><a href='../problem/problem.php?cid=$this->cid&pid=$cnt'>$this->title</a>
				</tr>";
		$cnt++;
		}
		echo "</table>\n<p />";
		echo "[<a href='status.php?cid=$this->cid'>Status</a>]";
		echo "[<a href='contest/rank.php?cid=$this->cid'>Standing</a>]";
		echo "[<a href='contest/statistics.php?cid=$this->cid'>Statistics</a>]";
		mysql_free_result($result);
		echo "</center>\n";
	}

	public function NewContest() {

	}

	public function ContestHead() {
		echo "<center><table width=90% id=TopContest><tr align=center>";
		echo "<td width=15%><a href='../contest/index.php?cid=$this->cid'>"._GB_CONTEST."</a>";
		echo "<td width=15%><a href='../discuss/contest.php?cid=$this->cid'>"._GB_DISCUSS."</a>";
		echo "<td width=15%><a href='../contest/problems.php?cid=$this->cid'>"._GB_PROBLEMS."</a>";
		echo "<td width=15%><a href='../contest/status.php?cid=$this->cid'>"._GB_STATUS."</a>";
		echo "</tr></table></center>";
	}
}
?>
