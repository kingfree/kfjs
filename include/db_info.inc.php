<?
@session_start();
/*
用户名　 :  SAE_MYSQL_USER
密　　码 :  SAE_MYSQL_PASS
主库域名 :  SAE_MYSQL_HOST_M
从库域名 :  SAE_MYSQL_HOST_S
端　　口 :  SAE_MYSQL_PORT
数据库名 :  SAE_MYSQL_DB
*/
if(!class_exists('SaeMysql')) {
	//若不在SAE上则要自定数据库信息
	define("SAE_MYSQL_USER", "kfjs");
	define("SAE_MYSQL_PASS", "kfjs");
	define("SAE_MYSQL_HOST_M", "localhost");
	define("SAE_MYSQL_HOST_S", "");
	define("SAE_MYSQL_PORT", "80");
	define("SAE_MYSQL_DB", "kfjs");
}

mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or die('Could not connect: ' . mysql_error());
mysql_query("set names utf8");
mysql_set_charset("utf8");
mysql_select_db(SAE_MYSQL_DB) or die('Can\'t use foo : ' . mysql_error());

date_default_timezone_set("PRC");

?>
