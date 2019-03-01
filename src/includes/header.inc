<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?echo$sitename?></title>
<meta name="resource-type" content="document">
<meta name="revisit-after" content="5">
<meta name="description" content="<?echo$description?>">
<meta name="robots" content="ALL">
<meta name="distribution" content="Global">
<meta name="copyright" content="© 2005-2006 TheScripters.com">
<meta name="author" content="TheScripters">
<meta http-equiv="reply-to" content="<?echo$webmasterEM?>">
<link title="RSS" rel="alternate" type="application/rss+xml" href="http://<?echo$site?>/rss.php">
<link rel="stylesheet" href="includes/ffp.css" type="text/css">
</head>

<body>
<h1><?echo$sitename?></h1>
<? $userNameSession=$_SESSION["ffpuser"]; ?>
<table width="100%">
<tr><td align="right">
<?
//if the user is logged in...
if ($userNameSession)
 {
   $sql6 = mysql_query("SELECT Editor FROM ". $tblpre ."authors WHERE AuthorName = '$userNameSession'",$connect);
   while($row6 = mysql_fetch_array($sql6))
     {
       $is_editor = $row6['Editor'];
     }
  echo "<font size=+1>Welcome, $userNameSession | <a href=\"authors.php?mode=Update\">Update Profile</a> | <a href=\"logout.php\">Logout</font>";
 }
else
 {
  echo "<font size=+1><a href=\"login.php\">Login</a> | <a href=\"index.php?mode=register\">Register</a></font>";
 }
?>
</td></tr>
</table>
<table width="100%">
  <tr>
    <td valign="top" width="110"><h3>Menu:</h3>
      <ul>
      <li><a href="index.php" onmouseover="window.status='';return true">Main</a></li>
      <li><a href="fics.php?fic=atoz" onmouseover="window.status='';return true"><nobr>Fics A-Z</nobr></a></li>
      <?
      if ($userNameSession)
        {
         echo "<li><a href=\"index.php?mode=submit\" onmouseover=\"window.status='';return true\"><nobr>Submit Story</nobr></a></li>";
        }
      ?>
      <li><a href="authors.php" onmouseover="window.status='';return true"><nobr>Author Profile</nobr></li>
      <li><a href="index.php?mode=latest" onmouseover="window.status='';return true"><nobr>Latest Stories</nobr></a></li>
      <li><a href="index.php?mode=rules" onmouseover="window.status='';return true">Rules and Guidelines</li>
      <li><a href="index.php?mode=links" onmouseover="window.status='';return true">Linkage</a></li>
      <?
      if ($userNameSession)
        {
          if ($is_editor == "Yes")
             {
               echo "<br><br><li><a href=\"editors\">Control Panel</a></li>";
             }
        }
      ?>
      </ul><br><br><br><br>
      <br><br><a href="http://www.thescripters.com" target="_blank" title="Coded by TheScripters.com"><img src="images/ts-coded1-sm.png" border="0" alt="Coded By TheScripters.com"></a>
    </td>
    <td>
