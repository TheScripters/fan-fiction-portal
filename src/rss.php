<?php
// Filename: rss.php
// Coded by: Adam Humpherys
// (c) 2006 TheScripters.com
$date = date("D\, j M Y H:i:s T");
include("includes/db.php");
$xml_header = 'xml version="1.0"';
header("Content-Type: application/xml");
echo '<'.'?xml version="1.0" encoding="UTF-8"?'.'>';
$rssLength = mysql_query("SELECT Value FROM ". $tblpre ."config WHERE Id = 'RSSLength'",$connect);
while($row = mysql_fetch_array($rssLength))
  {
    $rss = $row['Value'];
  }
?>
<rss version="2.0">
  <channel>
    <title>Kim Possible Fanfiction</title>
    <description><?echo "$site $rss";?> newest stories.</description>
    <link>http://www.<?echo$site;?></link>
    <copyright>Copyright 2005 <?echo$sitename?></copyright>
    <language>en-us</language>
    <lastBuildDate><?echo$date;?></lastBuildDate>
    <webMaster><?echo$editorEM;?></webMaster>
    <?php $result = mysql_query("SELECT * FROM ". $tblpre ."fics WHERE valid = 'True' ORDER BY fanFicId DESC LIMIT 0,$rss",$connect);
    while($myrow = mysql_fetch_array($result))
       {
         echo "\t\t<item>\n";
         echo "\t\t\t<title>";
         echo $myrow['ficTitle'];
         echo "</title>\n";
         echo "\t\t\t<description>";
         echo $myrow['ficTitle'];
         echo " - ";
         echo $myrow['chapter'];
         echo " -- Rated: (";
         echo $myrow['rating'];
         echo ")</description>\n";
         echo "\t\t\t<pubDate>";
         echo $myrow['datePosted'];
         echo "</pubDate>\n";
         echo "\t\t\t<link>http://www.$site/fics.php?fic=";
         echo $myrow['fanFicId'];
         echo "</link>\n";
         echo "\t\t</item>\n";
       }
    ?>
  </channel>
</rss>

