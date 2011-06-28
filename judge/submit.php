<?

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_SUBMIT);
$index->BodyHead();
$index->MainHead();

if(!isset($_GET['id']))
	$index->ShowError("出错！");
$judge = new Judge($_GET['id']);

$judge->Upload();
$judge->CheckLang();
$judge->Complie();
$judge->GetInfo();
$judge->Judge();
$judge->Congratulate();

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();
?>
