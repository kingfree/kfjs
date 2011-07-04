<?php
$rtv=array();
$rtv['Name']=$App->Get("Name");
$rtv['Remark']=$App->Get("Remark");
$rtv['ConstructionTime']=$App->Get("ConstructionTime");
$rtv['Status']=$App->Get("Status");
$rtv['Counter']=$App->Get("Counter");
$rtv['Success']="1";
echo array_encode($rtv);
?>