<?

function GetProblemTitle($num) {
    $sql = "SELECT `title` FROM `problem` WHERE `problem_id`=$num";
    $result = mysql_query($sql);
    $row = mysql_fetch_object($result);
    return $row->title;
}

function GetJudgeInfo($num) {
    if($num==_num_AC) return "<span style='color:#33cc33;'><b>"._lg_AC."</b></span>";
    if($num==_num_WA) return "<span style='color:#ff0000;'>"._lg_WA."<span>";
    if($num==_num_TL) return "<span style='color:#ff6600;'>"._lg_TL."<span>";
    if($num==_num_ML) return "<span style='color:#cccc00;'>"._lg_ML."<span>";
    if($num==_num_RE) return "<span style='color:#000087;'>"._lg_RE."<span>";
    if($num==_num_NO) return "<span style='color:#6699ff;'>"._lg_NO."<span>";
    if($num==_num_CE) return "<span style='color:#cc00cc;'>"._lg_CE."<span>";
    if($num==_num_NS) return "<span style='color:#996666;'>"._lg_NS."<span>";
}

function GetDetailInfo($str) {
    $s = "";
    for($i=0; $i<strlen($str); $i++) {
        if($str[$i]==_ch_AC) $s .= "<span style='color:#33cc33;'><b>"._ch_AC."</b></span>";
        elseif($str[$i]==_ch_WA) $s .= "<span style='color:#ff0000;'>"._ch_WA."<span>";
        elseif($str[$i]==_ch_TL) $s .= "<span style='color:#ff6600;'>"._ch_TL."<span>";
        elseif($str[$i]==_ch_ML) $s .= "<span style='color:#cccc00;'>"._ch_ML."<span>";
        elseif($str[$i]==_ch_RE) $s .= "<span style='color:#000087;'>"._ch_RE."<span>";
        elseif($str[$i]==_ch_NO) $s .= "<span style='color:#6699ff;'>"._ch_NO."<span>";
        elseif($str[$i]==_ch_CE) $s .= "<span style='color:#cc00cc;'>"._ch_CE."<span>";
        elseif($str[$i]==_ch_NS) $s .= "<span style='color:#996666;'>"._ch_NS."<span>";
        else $s .= $str[$i];
    }
    return $s;
}

function GetLangInfo($num) {
    if($num==0) return "C";
    if($num==1) return "C++";
    if($num==2) return "Pascal";
    if($num==3) return "PHP";
    if($num==4) return "Java";
    if($num==5) return "Python";
    return "Unknown";
}

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
