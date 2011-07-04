<?php

class User {
	public $uid;
	public $user_id;
	public $password;
	public $school;
	public $email;
	public $nick;
	public $real_name;
	public $submit;
	public $solved;
	public $defunct;
	public $ip;
	public $accesstime;
	public $volume;
	public $language;
	public $reg_time;
	public $group;
	public $rank;
	public function __construct($uid="0") {
		$this->user_id=$uid;
		if($uid!="0")
			$this->GetUserInfo();
	}
	public function IsValidUserName() {
		//只允许字母,数字和下划线
		if(eregi("^[a-zA-Z0-9_]", $this->user_id))
			return true;
		else
			return false;
	}
	public function GetUserInfo() {
		//检查是否为游客
		if($this->user_id=="0")
			return _ID_GUEST;
		//读数据库用户基本信息
		$sql="SELECT * FROM `users` WHERE `user_id`='{$this->user_id}'";
		$result=mysql_query($sql);
		//判断是否存在此用户
		$row_cnt=mysql_num_rows($result);
		if ($row_cnt==0)
			return _ID_NO;
		//载入基本信息
		$row=mysql_fetch_object($result);
		$this->school=$row->school;
		$this->email=$row->email;
		$this->nick=$row->nick;
		$this->real_name=$row->real_name;
		$this->submit=$row->submit;
		$this->solved=$row->solved;
		$this->defunct=$row->defunct;
		$this->ip=$row->ip;
		$this->accesstime=$row->accesstime;
		$this->volume=$row->volume;
		$this->language=$row->language;
		$this->password=$row->password;
		$this->reg_time=$row->reg_time;
		$this->group=explode(",", $row->user_group);
		mysql_free_result($result);
		// 题目解决次数
		$sql="SELECT count(DISTINCT pid) as `ac` FROM `submit` WHERE `uid`='{$this->user_id}' AND `result`=0";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->solved=$row->ac;
		mysql_free_result($result);
		// 提交次数
		$sql="SELECT count(jid) as `Submit` FROM `submit` WHERE `uid`='{$this->user_id}'";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->submit=$row->Submit;
		mysql_free_result($result);
		//更新
		$this->Update();
	}

	public function Update() {
		// 更新解决次数
		$sql="UPDATE `users` SET `solved`='".strval($this->solved)."',`submit`='".strval($this->submit)."' WHERE `user_id`='{$this->user_id}'";
		$result=mysql_query($sql);
		$sql="SELECT count(*) as `Rank` FROM `users` WHERE `solved`>$this->solved";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$this->rank=intval($row[0])+1;
		mysql_free_result($result);
	}

	public function InsLoginLog($password, $ip, $time) {
		$sql = "INSERT INTO `loginlog` VALUES('{$this->user_id}','{$password}','{$ip}',{$time})";
		@mysql_query($sql) or die(mysql_error());
	}

	public function ShowGroup($one=false, $grouparr="") {
		if($grouparr=="")
			$grouparr=$this->group;
		if($one)
			$n = 1;
		else
			$n = count($grouparr);
		for($i=0; $i<$n; $i++) {
			$sql="SELECT * FROM `group` WHERE `gid`='{$grouparr[$i]}'";
			$result=mysql_query($sql);
			$row=mysql_fetch_object($result);
			echo " <a href='../groups/info.php?gid={$row->gid}'>{$row->group_name}</a> ";
			mysql_free_result($result);
		}
	}

	public function CheckPassword($password) {
		$sql="SELECT `user_id` FROM `users` WHERE `user_id`='".$this->user_id."' AND `password`='".$password."'";
		$result=mysql_query($sql);
		$cnt_row=mysql_num_rows($result);
		mysql_free_result($result);
		if($cnt_row==1)
			return true;
		else
			return false;
	}

	public function PrintBasicUserInfo() {
		print_r($this->group);
		print($this->school.$this->email.$this->nick.$this->submit.$this->solved.$this->defunct);
	}

	public function GetNewUID() {
		$sql="SELECT max(`uid`) as uid FROM `users`";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$this->uid=$row->uid+1;
		mysql_free_result($result);
	}

}

?>
