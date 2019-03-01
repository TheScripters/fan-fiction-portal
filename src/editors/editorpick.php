<?php
$update = $_REQUEST['update'];
include("../includes/db.php");
include("includes/slashes.php");
$ficUpdate = mysql_query("UPDATE ". $tblpre ."config SET Value = '$update' WHERE Id = 'EditorPick'",$connect);
$result = mysql_query("SELECT * FROM ". $tblpre ."fics WHERE fanFicId = '$update'",$connect);
while($row = mysql_fetch_array($result))
   {
     $FicTitle = $row['ficTitle'];
     $chapter = $row['chapter'];
     $author = $row['author'];
     $authoremail = $row['authorEmail'];
   }
mail("$author <$authoremail>", strip_gpc_slashes("\"$FicTitle - $chapter\" Selected as Editor's Pick"), strip_gpc_slashes("Dear $author,\n\nYour fanfiction \"$FicTitle - $chapter\" has been selected for the editor's pick. This means it will be featured on the main page of $sitename.\n\nThank You.\n$sitename Editors"), "From: $sitename Editors <$editorEM>");
mail("$sitename Editors <$editorEM>", strip_gpc_slashes("Editor's Pick Updated"), strip_gpc_slashes("Dear Editors,\n\nOne of the editors has updated the editor's pick on $sitename Main to \"$FicTitle - $chapter\" and the author has been notified.\n\n$webmasterEM Webmaster"), "From: $site <$webmasterEM>");
header("Location: index.php?mode=pick");
?>
