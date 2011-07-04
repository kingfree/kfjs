<?php
ignore_user_abort(true);
set_time_limit(0);
require("kernel/coding.php");
require("socket.php");

$server="192.168.1.9/newoj/kernel/";
?>
<pre>
<?
echo "锁定";
$inf=array();
$inf['action']="lock";
$rtv=HttpSocket($server,$inf);
$inf=array_decode($rtv);
print_r($inf);

echo "编译";
$inf=array();
$inf['action']="compile";
//默认编译命令
$inf['command']="";
$inf['language']=$_POST['language'];
$inf['code']=stripslashes($_POST['code']);
$inf['Pname']=$_POST['filename'];
//时限1000毫秒
$inf['TimeLimit']=1000;
//内存限128MB
$inf['MemoryLimit']=128;
//标准比较
$inf['CompareMethod']="Simple";
//发送信息评测
$rtv=HttpSocket($server,$inf);
$inf=array_decode($rtv);
print_r($inf);

$cnt=$_POST['datacnt'];

echo "运行测试数据\n";

for ($i=1;$i<=$cnt;$i++)
{
	echo "运行 #",$i,"\n";
	$inf=array();
	$inf['action']="execute";
	$inf['ID']=$i;
	$rtv=HttpSocket($server,$inf);
	$inf=array_decode($rtv);
	print_r($inf);
}

echo "清理";
$inf=array();
$inf['action']="clear";
$rtv=HttpSocket($server,$inf);
$inf=array_decode($rtv);
print_r($inf);

echo "解锁";
$inf=array();
$inf['action']="free";
$rtv=HttpSocket($server,$inf);
$inf=array_decode($rtv);
print_r($inf);
?>
</pre>