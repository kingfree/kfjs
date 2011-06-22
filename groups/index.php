<?php
$rank = 0;
if(isset( $_GET ['start'] ))
	$rank = intval ( $_GET ['start'] );
ob_start ();

require_once("../include/class.php");
$index = new Page();

$index->HTMLHead(_GB_GROUP);
$index->BodyHead();
$index->MainHead();

$page_size=page_size;
if ($rank < 0)
	$rank = 0;

$sql = "SELECT * FROM `group` LIMIT " . strval ($rank) . ",$page_size";

$result = mysql_query ( $sql ); //mysql_error();
echo "<center><table width=90%>";
echo "<tr><td colspan=4 align=left>
		<form action=info.php>
		"._GB_GROUP."<input name=group_id>
		<input type=submit value="._GB_GO.">
		</form></td></tr>";
echo "<tr class='toprow'>
		<td width=10% align=center><b>"._GB_ID."</b>
		<td width=20% align=center><b>"._GB_GROUP."</b>
		<td width=20% align=center><b>"._GB_ADMIN."</b>
		<td align=center><b>"._GB_COMMENT."</b>
		<td width=10% align=center><b>"._GB_Application."</b>
		</tr>";
while ( $row = mysql_fetch_object ( $result ) ) {
	$rank ++;
	if ($rank % 2 == 1)
		echo "<tr class='oddrow'>";
	else
		echo "<tr class='evenrow'>";
	echo "<td align=center>" . $row->gid;
	echo "<td align=center><a href='../groups/info.php?gid=$row->gid'>".$row->group_name."</a>";
	$admin_name=Group::GetAdminName($row->admin);
	echo "<td align=center><a href='../users/info.php?user=$admin_name'>".$admin_name."</a>";
	echo "<td align=center>" . htmlspecialchars ($row->comment);
	echo "<td align=center><a href=apply.php?gid=$row->gid>"._GB_Application."</aa>";
	echo "</tr>";
}
echo "</table></center>";
mysql_free_result ( $result );
$sql = "SELECT count(*) as `mycount` FROM `group`";
$result = mysql_query ( $sql );
echo mysql_error ();
$row = mysql_fetch_object ( $result );
echo "<center>";
for($i = 0; $i < $row->mycount; $i += $page_size) {
	echo "<a href='../groups/index.php?start=" . strval ( $i ) . "'>";
	echo strval ( $i + 1 );
	echo "-";
	echo strval ( $i + $page_size );
	echo "</a>&nbsp;";
	if ($i % 250 == 200)
		echo "<br />";
}
echo "</center>";
mysql_free_result ( $result );

$index->MainFoot();
$index->BodyFoot();
$index->HTMLFoot();

?>
