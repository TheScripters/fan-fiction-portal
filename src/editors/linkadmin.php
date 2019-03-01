<?
if ($_GET['mode'] == "validate")
   {
     include("../includes/db.php");
     include("includes/header.inc")
     $linkId = $_REQUEST['link'];
     $links = mysql_fetch_array(mysql_query("SELECT * FROM ". $tblpre ."links WHERE LinkId = '$linkId'",$connect));
     echo "<h2>Validate</h2>";
     echo "<br><br>";
     echo "<center>Choose a category for ";
     echo $links['LinkTitle'];
     echo " &nbsp; <form action=\"linkadd.php\" method=\"post\" name=\"LinkValidation\"><select name=\"CatSelect\""
     $linkcat = mysql_query("SELECT * FROM ". $tblpre ."linkcategories",$connect);
     while($row = mysql_query($linkcat))
       {
         echo "<option value=\"";
         echo $row['CatId'];
         echo "\" name=\"CatSelect\">";
         echo $row['CatName'];
         echo "</option>";
       }
     echo "</select>";
     echo "<br><br>";
     echo "Please enter a description: <input type=\"text\" name=\"LinkDesc\"><input type=\"hidden\" name=\"Link\" value=\"$linkId\"></form>";
     include("includes/footer.inc");
     exit;
   }
if ($_GET['mode'] == "delete")
   {
     include("../includes/db.php");
     $linkId = $_REQUEST['link'];
     $sql = mysql_query("DELETE FROM ". $tblpre ."links WHERE LinkId = '$linkId'",$connect);
     include("includes/header.inc");
     echo "<h2>Link Deletion</h2>";
     echo "<br><br><center>Link deleted!</center>";
     include("includes/footer.inc");
     exit;
   }
?>
<table>
  <tr><th>Site Name</th><th>Site Address</th><th>Site Banner</th><th>Action</th></tr>
<?
$linklist = mysql_query("SELECT * FROM ". $tblpre ."links WHERE Active = 'No'",$connect);
while($links = mysql_fetch_array($linklist))
  {
    echo "<tr><td align=\"center\">";
    echo $links['LinkTitle'];
    echo "</td><td><a href=\"";
    echo $links['Linkage'];
    echo "\" target=\"_blank\">";
    echo $links['Linkage'];
    echo "</a></td><td><img src=\"";
    echo $links['Linkage'];
    echo "\"></td><td><a href=\"linkadmin.php?mode=verify&link=";
    echo $links['LinkId'];
    echo "\">Validate</a> &nbsp;<a href=\"linkadmin.php?mode=delete&link=";
    echo $links['LinkId'];
    echo "\">Remove</a></td></tr>";
  }
?>

