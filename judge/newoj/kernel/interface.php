<return>
<?php
require("global.php");
$inf=array_decode($inf);

switch ($inf['action'])
{
	case "status":	require("status.php");	break;
	case "lock":	require("lock.php");	break;
	case "engross":	require("engross.php");	break;
	case "free":	require("free.php");	break;
	case "clear":	require("clear.php");	break;
	case "shutdown":	require("shutdown.php");	break;
	case "compile":	require("compile.php");	break;
	case "execute":	require("execute.php");	break;
}
?>