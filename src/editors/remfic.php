<?php
include("../includes/db.php");
include("includes/slashes.php");
$rem = $_REQUEST['rem'];
$result1 = mysql_query("SELECT author, authorEmail, ficTitle, chapter FROM ". $tblpre ."fics WHERE fanFicId = '$rem'",$connect);
while($row = mysql_fetch_array($result1))
  {
    $author = $row['author'];
    $authorEmail = $row['authorEmail'];
    $ficTitle = $row['ficTitle'];
    $chapter = $row['chapter'];
  }
$result = mysql_query("DELETE FROM ". $tblpre ."fics WHERE fanFicId = '$rem' LIMIT 1",$connect);
mail(strip_gpc_slashes("$author <$authorEmail>"),"Fanfiction Story Removed From $sitename",strip_gpc_slashes("Dear $author,\n\nWe regret to inform you that \"$ficTitle - $chapter\" has been removed from $sitename. There are many possible reasons why this may have happened. We encourage you to email $editorEM to find out exactly why it was removed.\n\nThank you.\nKPFanFiction Editors"),"$sitename Editors <$editorEM>");
mail("$sitename Editors <$editorEM>","Fic Removed By Editor",strip_gpc_slashes("Dear editors,\n\nAn editor has removed \"$ficTitle - $chapter\" from $sitename. The author has been notified thus.\n\n$sitename Team"),"$sitename <$webmasterEM>");
header("Location: index.php?mode=ficedit");
?>

