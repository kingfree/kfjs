<?

function GetBrowser($agent) {
	//$str=$agent."\n";
	$str="";
	$app="建议您换用<a href=\"http://google.com/chrome\">Chrome</a>或<a href=\"http://firefox.com\">Firefox</a>以获取优质体验。";
		$str="未能识别您的浏览器，您太高端了！可能$app";
	if(eregi("Safari", $agent))
		$str="您正在使用 Apple Safari 浏览器，获得了网站的美观体验！";
	if(eregi("Chrome", $agent))
		$str="您正在使用 Google Chrome 浏览器，获得了网站的最佳体验！";
	if(eregi("Chromium", $agent))
		$str="您正在使用 Google Chromium 浏览器，获得了网站的最佳体验！";
	if(eregi("Firefox", $agent))
		$str="您正在使用 Mozilla Firefox 浏览器，获得了网站的优质体验！";
	if(eregi("Konqueror", $agent))
		$str="您正在使用 Konqueror 浏览器，获得了网站的不错体验！";
	if(eregi("Opera", $agent))
		$str="您正在使用 Opera 浏览器，获得了网站的快速体验！";
	if(eregi("lynx", $agent))
		$str="您正在使用 Lynx 文字模式浏览器，您是一位极客！欢迎使用本系统！";
	if(eregi("Maxthon", $agent))
		$str="您正在使用 Maxthon 傲游浏览器，获得了网站的一般体验！$app";
	if(eregi("MSIE", $agent))
		$str="您正在使用 Internet Explorer 浏览器，获得了网站的一般体验！$app";
	if(eregi("360SE", $agent))
		$str="您正在使用 360 不安全浏览器，获得了网站的糟糕体验！$app";
	if(eregi("QQ", $agent))
		$str="您正在使用 QQ 龟速浏览器，获得了网站的操蛋体验！$app";
	if(eregi("TencentTraveler", $agent))
		$str="您正在使用 Tencent Traveler 麻花浏览器，获得了网站的艰难体验！$app";
	//return $agent;
	return $str;
}

function HistoryGo($id) {
	echo "<script language='javascript'>\n";
	echo "history.go($id);\n";
	echo "</script>";
}

function ShowErrorGo($errormsg, $id, $errorcode=0) {
	echo "$errormsg\n";
	echo "<script language='javascript'>\n";
	echo "alert(\"" .	$errormsg . "\");\n";
	echo "history.go($id);\n";
	echo "</script></body></html>";
	exit($errorcode);
}

function   write_ini_file($array,$filename)   {   
      $ok   =   "";   
      $s   =   "";   
      foreach($array   as   $k=>$v)   {   
          if(is_array($v))   {   
              if($k   !=   $ok)   {   
                  $s   .=   LF."[$k]".LF;   
                  $ok   =   $k;   
              }   
              $s   .=   write_ini_file($v,"");   
          }else   {   
              if(trim($v)   !=   $v   ||   strstr($v,"["))   
  $v   =   "\"$v\"";   
              $s   .=   "$k   =   $v".LF;   
          }   
      }   
      if($filename   ==   "")   
          return   $s;   
      else   {   
          $fp   =   fopen($filename,"w");   
          fwrite($fp,$s);   
          fclose($fp);   
      }   
  }

?>
