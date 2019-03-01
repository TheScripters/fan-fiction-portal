<?php
include("../includes/db.php");
include("includes/slashes.php");
$p = $_REQUEST['p'];
if ($p == "update")
 {
   $indexUpdate = $_REQUEST['indexUpdate'];
   $updateForm = mysql_query("UPDATE ". $tblpre ."config SET Value = '$indexUpdate' WHERE Id = 'EditIndex'",$connect);
   mail("$sitename Editors <$editorEM>",strip_gpc_slashes("Editor's Index Updated"),strip_gpc_slashes("The editor's panel index page has been updated by an editor.\n\nYou can view it here: http://$site/editors.\n\nThank You\n$sitename"),"$sitename <$webmasterEM>");
   header("Location: index.php?mode=editidx");
 }
else
 {
$result = mysql_query("SELECT * FROM ". $tblpre ."config WHERE Id = 'EditIndex'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $index = $myrow['Value'];
  }
echo "<h2>Update Editor's Index</h2>";
echo "<center><form action=\"editupd.php?p=update\" name=\"updateForm\" method=\"post\">";
echo "<textarea cols=\"100\" rows=\"12\" name=\"indexUpdate\">$index</textarea><br><br>";
echo "<input type=\"submit\" value=\"Update!\"></form></center>";
 }
?>
