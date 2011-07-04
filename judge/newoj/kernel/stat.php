<?php
require("global.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kernel</title>
</head>

<body>

<p>名称 <?php echo $App->Get("Name");?>  </p>
<p>备注 <?php echo $App->Get("Remark");?></p>
<p>建立时间 <?php echo date("Y-m-d H:i:s",$App->Get("ConstructionTime"));?></p>
<p>执行目录 <?php echo $App->Get("ExecuteDIR");?></p>
<p>测试数据目录 <?php echo $App->Get("TestdataDIR");?></p>
<p>状态 <?php echo $App->Get("Status");?></p>
<p>计数 <?php echo $App->Get("Counter");?></p>
<p>允许IP <?php echo $App->Get("PermissionIP");?></p>

</body>
</html>
