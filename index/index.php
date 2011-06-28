<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_HOME);
$index->BodyHead();
$index->MainHead();
?>

<iframe src="../README" width=450px></iframe>
<iframe src="../ChangeLog" width=450px></iframe>

<iframe src="../INSTALL" width=900px></iframe>

<?php
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
