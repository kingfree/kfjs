<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_DATAS);
$index->BodyHead();
$index->MainHead();
?>

<iframe src="../data" width=900px height=300px></iframe>

<?php
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
