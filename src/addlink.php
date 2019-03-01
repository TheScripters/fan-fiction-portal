<?php
include("includes/db.php");
if ($_GET['p'] == "add")
  {
    $SiteTitle = $_GET['title'];
    $Address = $_GET['linkage'];
    $linkbanner = $_GET['banner'];
    if (empty($Address) || empty($SiteTitle))
      {
        include("includes/header.inc");
        echo "<h2>Add Link</h2>
<br><center><font size=\"+2\" color=\"#FF0000\">Address and/or site title empty!</font><br>
<form action=\"addlink.php?p=add\" method=\"post\">
<b>Link Address:</b> <input type=\"text\" name=\"linkage\" value=\"$Address\"><br>
<b>Site Title:</b> <input type=\"text\" name=\"title\" value=\"$SiteTitle\"><br>
<b>Site Banner:</b> <input type=\"text\" name=\"banner\" value=\"$linkbanner\"><br>
<input type=\"submit\" value=\"Submit Link\"></form>";
        include("includes/footer.inc");
        exit;
      }
    else
      {
        $sql = mysql_query("INSERT INTO ". $tblpre ."links VALUES ('', '$linkage', '$title', '', '$banner', '0', 'False')",$connect);
        header("Location: index.php?mode=links");
      }
  }
include("includes/header.inc");
?>
<h2>Add Link</h2>
<br><center>
<form action="addlink.php?p=add" method="post">
<b>Link Address:</b> <input type="text" name="linkage" value="http://"><br>
<b>Site Title:</b> <input type="text" name="title"><br>
<b>Site Banner:</b> <input type="text" name="banner"><br>
<input type="submit" value="Submit Link"></form>
<?
include("includes/footer.inc");
?>
