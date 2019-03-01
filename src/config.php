<?
$sql = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'WebmasterEmail'",$connect);
while($row = mysql_fetch_array($sql))
  {
    $webmasterEM = $row['Value'];
  }
$sql1 = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'SiteName'",$connect);
while($row1 = mysql_fetch_array($sql1))
  {
    $sitename = $row1['Value'];
  }
$sql2 = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'Copyright'",$connect);
while($row2 = mysql_fetch_array($sql2))
  {
    $copyright = $row2['Value'];
  }
$sql3 = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'Description'",$connect);
while($row3 = mysql_fetch_array($sql3))
  {
    $description = $row3['Value'];
  }
$sql4 = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'Site'",$connect);
while($row4 = mysql_fetch_array($sql4))
  {
    $site = $row4['Value'];
  }
$sql5 = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'EditorsEmail'",$connect);
while($row5 = mysql_fetch_array($sql5))
  {
    $editorEM = $row5['Value'];
  }
?>
