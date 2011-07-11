<?php

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_HOME);
$index->BodyHead();
$index->MainHead();
?>
<!--
<iframe src="../README" width=450px></iframe>
<iframe src="../ChangeLog" width=450px></iframe>

<iframe src="../INSTALL" width=900px></iframe>
-->

<?php

echo "<div>\n<table frame=void width=100%>\n";

echo "<td>\n";
$sql="SELECT * FROM `news` WHERE `defunct`!='Y' ORDER BY `importance` ASC,`time` DESC LIMIT 5";
$result=mysql_query($sql);
if($result) {
    echo "<div class=box style='width:300px; margin:10px;'>\n";
    while ($row=mysql_fetch_object($result)){
        echo "<div class='ptt' style='width: 270px; margin : 10px 20px 0 10px;'>"
            .$row->title."</b> <small>[".$row->user_id."]</small></div>";
        echo "<div class='ptx' style='width: 260px; margin : 0 30px 10px 10px;'>"
            .$row->content."</div>";
    }
    mysql_free_result($result);
    echo "</div>\n";
}

echo "<div class=box style='width:300px; margin:10px;'>\n";
$sql="SELECT max(`jid`) as mjid FROM `submit`";
$result=mysql_query($sql);
$row=mysql_fetch_object($result);
$mjid=intval($row->mjid);
mysql_free_result($result);
echo "<div class='ptt' style='width: 270px; margin : 10px 20px 0 10px;'>最新评测</div>";
echo "<div class='ptx' style='width: 260px; margin : 0 30px 10px 10px;'>";
echo "<table id='statuslist' width='90%'>";
echo "<tr align=center class='toprow'>";
echo "<td align=center>JID</td>\n";
echo "<td align=center>"._GB_PROBLEMS."</td>\n";
echo "<td align=center>"._GB_RESULT."</td>\n";
echo "</tr>";
$sql="SELECT `jid`,`pid`,`result` FROM `submit` WHERE jid>$mjid-5 ORDER BY `jid` DESC";
$result=mysql_query($sql);
$cnt=0;
while ($row=mysql_fetch_object($result)) {
    if($cnt)
        echo "<tr class='oddrow'>";
    else
        echo "<tr class='evenrow'>";
    echo "<td align=center><a href='../status/status.php?jid=$row->jid'>".$row->jid."</a></td>\n";
    echo "<td align=center><a href='../problem/problem.php?id=$row->pid'>".GetProblemTitle($row->pid)."</a></td>\n";
    echo "<td align=center>".GetJudgeInfo($row->result)."</td>\n";
    echo "</tr>\n";
    $cnt=1-$cnt;
}
mysql_free_result($result);
echo "</table></div>";
echo "</div>\n";
echo "</td>\n";

echo "<td>\n";


echo "<div class=box style='width:600px; margin:0px;'>\n";
$sql="SELECT max(`problem_id`) as mpid FROM `problem`";
$result=mysql_query($sql);
$row=mysql_fetch_object($result);
$mpid=intval($row->mpid);
mysql_free_result($result);
echo "<div class='ptt' style='width: 570px; margin : 10px 20px 0 10px;'>最新题目</div>";
echo "<div class='ptx' style='width: 560px; margin : 0 30px 10px 10px;'>";
echo "<table id='statuslist' width='92%'>";
echo "<tr align=center class='toprow'>";
echo "<td align=center>PID</td>\n";
echo "<td align=center>"._GB_PROBLEMS."</td>\n";
echo "<td align=center>"._GB_SOURCE."</td>\n";
echo "</tr>";
$sql="SELECT `problem_id`,`title`,`source` FROM `problem` WHERE problem_id>$mpid-8 ORDER BY `problem_id` DESC";
$result=mysql_query($sql);
$cnt=0;
while ($row=mysql_fetch_object($result)) {
    if($cnt)
        echo "<tr class='oddrow'>";
    else
        echo "<tr class='evenrow'>";
    echo "<td align='center'>".$row->problem_id."</td>";
    echo "<td align='left'><a href='../problem/problem.php?id=".$row->problem_id."'>".$row->title."</a></td>";
    echo "<td align='center'><a href='../problem/index.php?search=$row->source'>".$row->source."</a></td>";
    echo "</tr>\n";
    $cnt=1-$cnt;
}
mysql_free_result($result);
echo "</table></div>";
echo "</div>\n";

echo "<div class=box style='width:600px; margin:20px 10px 0px 0px;'>\n";
echo "<div class='ptt' style='width: 570px; margin: 10px 20px 0 10px;'>更新日志</div>";
echo "<div class='ptx' style='width: 560px; margin: 0 30px 10px 10px;'>";
echo "<iframe src='../ChangeLog' width=550px></iframe>";
echo "</div></div>";

echo "</td>\n";
echo "</table>\n</div>\n";
?>

<?

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
