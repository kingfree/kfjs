<?php

class Group {
	public $gid, $group_name, $group_user, $admin, $admin_name, $comment;
	public function __construct($gid=-1) {
		$this->gid = $gid;
		$this->group_name="";
		$this->admin="";
		$this->admin_name="";
		$this->comment="";
		$this->group_user=Array();
		if($gid!=-1)
			$this->GetGroupInfo();
	}

	public function GetGroupinfo($gid=-1) {
		if($gid==-1)
			$gid = $this->gid;
		$sql="SELECT * FROM `group` WHERE `gid`='{$gid}'";
		$result=mysql_query($sql);
		//判断是否存在此团队
		$row_cnt=mysql_num_rows($result);
		if ($row_cnt==0)
			return _ID_NO;
		//载入基本信息
		$row=mysql_fetch_object($result);
		$this->gid=$row->gid;
		$this->group_name=$row->group_name;
		$this->admin=$row->admin;
		$this->admin_name=$this->GetAdminName();
		$this->comment=$row->comment;
		$this->group_user=explode(",", $row->group_user);
		mysql_free_result($result);
	}

	public function GetAdminName($uid=-1) {
		if($uid==-1)
			$uid = $this->admin;
		$sql="SELECT `user_id` FROM `users` WHERE `uid`='{$uid}'";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$admin_name = $row->user_id;
		mysql_free_result($result);
		return $admin_name;
	}

	public function ShowUsers($one=false, $userarr="") {
		if($userarr=="")
			$userarr=$this->group_user;
		if($one)
			$n = 1;
		else
			$n = count($userarr);
		for($i=0; $i<$n; $i++) {
			$sql="SELECT * FROM `users` WHERE `uid`='{$userarr[$i]}'";
			//echo $sql;
			$result=mysql_query($sql);
			$row=mysql_fetch_object($result);
			if($row)
			echo " <a href='../users/info.php?user={$row->user_id}'>{$row->user_id}</a>
			<br />";
			mysql_free_result($result);
		}
	}

}

?>
