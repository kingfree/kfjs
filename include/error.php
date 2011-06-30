<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_ERROR);
$index->BodyHead();
$index->MainHead();
?>

<div class=error>
<script language='javascript'>
alert("<?=$_POST['errormsg']?>");
history.go($_POST['id']);
</script>
</div>

<?php
$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
