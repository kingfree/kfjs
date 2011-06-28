<?
require_once("../include/class.php");
session_start();
unset($_SESSION['user_id']);
session_destroy();
HistoryGo(-1);
?>
