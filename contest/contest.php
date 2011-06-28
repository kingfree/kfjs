<?

require_once("../include/func.php");
LoadDB();
LoadAllFunc();
LoadLang();
ContestHead($_GET['cid']);

$title=$MSG['NO_SUCH_PROBLEM'];
if (isset($_GET['id']))
	$row=ReadProblem($_GET['id'],"0",$title);
else if (isset($_GET['cid']) && isset($_GET['pid']))
	$row=ReadProblem($_GET['pid'],$_GET['pid'],$title);
HTMLHead($title);
BodyHead();
if (isset($_GET['cid']))
	ContestHead();
MainHead();

echo "<h2 style=\"text-align: center;\">$title</h2>\n";
	$ct = $row->compare_type;
	$pt = $row->program_type;
	echo "<div><table frame=void width=100%>";
	echo "<td width=50%><div class='box'><h2>题目详细信息</h2>\n";
	echo "<table frame=box width=100% rules=all>";
	echo "<tr><td width=20%><span class=green>{$MSG['Problem_Name']}</span></td><td>$row->title</td>";
	echo "<td width=20%><span class=green>{$MSG['Problem_English_Name']}</span></td><td>$row->English</td></tr>";
	if($pt!=1) {
		echo "<tr><td width=15%><span class=green>{$MSG['Time_Limit']}</span></td><td>$row->time_limit s</td>";
		echo "<td width=15%><span class=green>{$MSG['Memory_Limit']}</span></td><td>$row->memory_limit MB</td></tr>";
	}
	echo "<tr><td><span class=green>{$MSG['File_Name']}</span></td><td>$row->program_filename</td>";
	echo "<td><span class=green>{$MSG['Problem_Source']}</span></td><td><a href='../problem/index.php?search=$row->source'>".nl2br($row->source)."</td></td></tr>";
	echo "<tr><td><span class=green>{$MSG['Judge_Type']}</span></td><td colspan=3>$judge_type[$pt]</td></tr>";
	echo "<tr><td><span class=green>{$MSG['Compare_Type']}</span></td><td colspan=3>$compare_type[$ct]</td></tr>";
	echo "</table></div></td>";
	echo "<td><table>";
	echo "<tr><div class='box' style='width: 320px; float:right;'>";
	echo "<h2>提交程序或答案</h2>";
	echo "<a href='problemstatus.php?id={$row->problem_id}'>状态</a> : 提交".$row->submit." ，解决".$row->accepted."";
	/*echo "<li>在线编写：[<a href='../problem/submitpage.php?id=$id'>{$MSG['SUBMIT']}</a>]</li>";
	echo "<form action='../problem/submitfile.php?id=$id' method='post'
		enctype='multipart/form-data'>
		<li><label for='file'>提交文件：</label>
		<input type='file' name='file' id='file' />
		<input type='submit' name='submit' value={$MSG['SUBMIT']} /></li>
		</form>";*/
	echo "<form action='../problem/submit.php?id=$row->problem_id' method=post enctype='multipart/form-data'>\n";
	if($pt==0 || $pt==2) {
		echo "<li>"; Language_Type(); echo "</li>\n";
	} else {
		echo "<li>"; Zip_File_Type(); echo "</li>\n";
	}
	if($pt==0) {
		echo "<li>"; IO_Type(); echo "</li>\n";
	}
	echo "<li><input type='file' name='file' id='file' size=20 /></li>\n";
	echo "<center><input class='lsbb' type='submit' name='submit' value={$MSG['SUBMIT']} class='Button'/></center>\n";
	echo "</form>\n";
	echo "</div></tr></table></td><td width=40px>&nbsp</td>\n";
	echo "</table></div>\n";

	echo "<div class='box'><h2>{$MSG['Description']}</h2>\n".$row->description."\n</div>\n";
	echo "<div class='box'><h2>{$MSG['Input']}</h2>\n".$row->input."\n</div>\n";
	echo "<div class='box'><h2>{$MSG['Output']}</h2>\n".$row->output."\n</div>\n";
	echo "<div class='box'><table frame=box width=80% rules=all>\n";
	echo "<tr>\n<th>{$MSG['Sample_Input']}</th>\n";
	echo "<th>{$MSG['Sample_Output']}</th>\n</tr>\n";
	echo "<tr>\n<td><pre>".($row->sample_input)."</pre></td>\n";
	echo "<td><pre>".($row->sample_output)."</pre></td>\n</tr>\n";
	echo "</table>\n</div>\n";
	echo "<div class='box'><h2>{$MSG['HINT']}</h2>\n".nl2br($row->hint)."\n</div>\n";;

MainFoot();
BodyFoot();
HTMLFoot();
?>
